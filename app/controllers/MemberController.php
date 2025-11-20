<?php
class MemberController extends Controller {
    private $memberModel;
    private $teamModel;
    private $skillModel;

    public function __construct(){
        session_start();
        if(!$this->isLoggedIn()){
            $this->redirect('auth/login');
        }
        $this->memberModel = $this->model('Member');
        $this->teamModel = $this->model('Team');
        $this->skillModel = $this->model('Skill');
    }

    public function index(){
        $members = $this->memberModel->getMembers();
        $data = ['members' => $members];
        $this->view('members/index', $data);
    }

    public function search(){
        $q = '';
        if(isset($_GET['q'])){
            $q = trim($_GET['q']);
        }
        $members = $this->memberModel->searchMembers($q);
        $data = ['members' => $members, 'q' => $q];
        $this->view('members/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'address' => trim($_POST['address']),
                'join_date' => trim($_POST['join_date']),
                'team_id' => trim($_POST['team_id']),
                'major' => trim(isset($_POST['major']) ? $_POST['major'] : ''),
                'name_err' => '',
                'email_err' => ''
            ];

            if(empty($data['name'])){ $data['name_err'] = 'Please enter name'; }
            if(empty($data['email'])){ $data['email_err'] = 'Please enter email'; }

            if(empty($data['name_err']) && empty($data['email_err'])){
                $newId = $this->memberModel->addMember($data);
                if($newId){
                    // handle skills if provided (comma separated)
                    if(!empty($_POST['skills'])){
                        $skills = array_map('trim', explode(',', $_POST['skills']));
                        $this->skillModel->addSkills($newId, $skills);
                    }
                    $this->redirect('member');
                } else {
                    die('Something went wrong');
                }
            } else {
                $teams = $this->teamModel->getTeams();
                $data['teams'] = $teams;
                $this->view('members/add', $data);
            }
        } else {
            $teams = $this->teamModel->getTeams();
            $data = [
                'name' => '', 'email' => '', 'phone' => '', 'address' => '', 
                'join_date' => date('Y-m-d'), 'team_id' => '', 'teams' => $teams
            ];
            $this->view('members/add', $data);
        }
    }

    public function edit($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'address' => trim($_POST['address']),
                'team_id' => trim($_POST['team_id']),
                'major' => trim(isset($_POST['major']) ? $_POST['major'] : ''),
                'name_err' => '',
                'email_err' => ''
            ];

            if(empty($data['name'])){ $data['name_err'] = 'Please enter name'; }

            if(empty($data['name_err'])){
                if($this->memberModel->updateMember($data)){
                    // update skills
                    if(isset($_POST['skills'])){
                        $skills = array_filter(array_map('trim', explode(',', $_POST['skills'])));
                        $this->skillModel->addSkills($id, $skills);
                    }
                    $this->redirect('member');
                } else {
                    die('Something went wrong');
                }
            } else {
                $teams = $this->teamModel->getTeams();
                $data['teams'] = $teams;
                $this->view('members/edit', $data);
            }
        } else {
            $member = $this->memberModel->getMemberById($id);
            $teams = $this->teamModel->getTeams();
            // get skills as comma-separated
            $skillObjs = $this->skillModel->getSkillsByMember($id);
            $skills = [];
            foreach($skillObjs as $s) $skills[] = $s->skill_name;
            $data = [
                'id' => $id,
                'name' => $member->full_name,
                'email' => $member->email,
                'phone' => $member->phone,
                'address' => $member->address,
                'team_id' => $member->team_id,
                'major' => isset($member->major) ? $member->major : '',
                'skills' => implode(', ', $skills),
                'teams' => $teams
            ];
            $this->view('members/edit', $data);
        }
    }

    public function profile($id){
        $member = $this->memberModel->getMemberById($id);
        if(!$member){
            $this->redirect('member');
        }
        // skills
        $skillObjs = $this->skillModel->getSkillsByMember($id);
        $skills = [];
        foreach($skillObjs as $s) $skills[] = $s->skill_name;

        $data = ['member' => $member, 'skills' => $skills];
        $this->view('members/profile', $data);
    }

    public function exportPdf($id){
        $member = $this->memberModel->getMemberById($id);
        if(!$member){
            $this->redirect('member');
        }
        $skillObjs = $this->skillModel->getSkillsByMember($id);
        $skills = [];
        foreach($skillObjs as $s) $skills[] = $s->skill_name;

        require_once APPROOT . '/../fpdf186/fpdf.php';
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,10, 'Member Profile',0,1,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(40,8,'Name:');
        $pdf->Cell(0,8, $member->full_name,0,1);
        $pdf->Cell(40,8,'Email:');
        $pdf->Cell(0,8, $member->email,0,1);
        $pdf->Cell(40,8,'Phone:');
        $pdf->Cell(0,8, $member->phone,0,1);
        $pdf->Cell(40,8,'Team:');
        $pdf->Cell(0,8, isset($member->team_name) ? $member->team_name : '',0,1);
        $pdf->Cell(40,8,'Major:');
        $pdf->Cell(0,8, isset($member->major) ? $member->major : '',0,1);
        $pdf->Cell(40,8,'Skills:');
        $pdf->MultiCell(0,8, implode(', ', $skills));
        $pdf->Output();
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($this->memberModel->deleteMember($id)){
                $this->redirect('member');
            } else {
                die('Something went wrong');
            }
        } else {
            $this->redirect('member');
        }
    }
}
