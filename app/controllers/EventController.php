<?php
class EventController extends Controller {
    public function __construct(){
        session_start();
        if(!$this->isLoggedIn()){
            $this->redirect('auth/login');
        }
        $this->eventModel = $this->model('Event');
    }

    public function index(){
        $events = $this->eventModel->getEvents();
        $data = ['events' => $events];
        $this->view('events/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'date' => trim($_POST['date']),
                'location' => trim($_POST['location']),
                'type' => trim($_POST['type']),
                'description' => trim($_POST['description']),
                'name_err' => ''
            ];

            if(empty($data['name'])){ $data['name_err'] = 'Please enter event name'; }

            if(empty($data['name_err'])){
                if($this->eventModel->addEvent($data)){
                    $this->redirect('event');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('events/add', $data);
            }
        } else {
            $data = ['name' => '', 'date' => '', 'location' => '', 'type' => '', 'description' => ''];
            $this->view('events/add', $data);
        }
    }
}
