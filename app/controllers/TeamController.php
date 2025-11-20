<?php
class TeamController extends Controller {
    public function __construct(){
        session_start();
        if(!$this->isLoggedIn()){
            $this->redirect('auth/login');
        }
        $this->teamModel = $this->model('Team');
    }

    public function index(){
        $teams = $this->teamModel->getTeams();
        $data = ['teams' => $teams];
        $this->view('teams/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'coach' => trim($_POST['coach']),
                'category' => trim($_POST['category']),
                'name_err' => ''
            ];

            if(empty($data['name'])){ $data['name_err'] = 'Please enter team name'; }

            if(empty($data['name_err'])){
                if($this->teamModel->addTeam($data)){
                    $this->redirect('team');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('teams/add', $data);
            }
        } else {
            $data = ['name' => '', 'coach' => '', 'category' => ''];
            $this->view('teams/add', $data);
        }
    }
}
