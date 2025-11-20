<?php
class MemberController extends Controller {
    public function __construct(){
        session_start();
        if(!$this->isLoggedIn()){
            $this->redirect('auth/login');
        }
        $this->memberModel = $this->model('Member');
        $this->teamModel = $this->model('Team');
    }

    public function index(){
        $members = $this->memberModel->getMembers();
        $data = ['members' => $members];
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
                'name_err' => '',
                'email_err' => ''
            ];

            if(empty($data['name'])){ $data['name_err'] = 'Please enter name'; }
            if(empty($data['email'])){ $data['email_err'] = 'Please enter email'; }

            if(empty($data['name_err']) && empty($data['email_err'])){
                if($this->memberModel->addMember($data)){
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
                'name_err' => '',
                'email_err' => ''
            ];

            if(empty($data['name'])){ $data['name_err'] = 'Please enter name'; }

            if(empty($data['name_err'])){
                if($this->memberModel->updateMember($data)){
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
            $data = [
                'id' => $id,
                'name' => $member->full_name,
                'email' => $member->email,
                'phone' => $member->phone,
                'address' => $member->address,
                'team_id' => $member->team_id,
                'teams' => $teams
            ];
            $this->view('members/edit', $data);
        }
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
