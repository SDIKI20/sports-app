<?php
class EventController extends Controller {
    private $eventModel;
    private $memberModel;

    public function __construct(){
        session_start();
        if(!$this->isLoggedIn()){
            $this->redirect('auth/login');
        }
        $this->eventModel = $this->model('Event');
        $this->memberModel = $this->model('Member');
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

    public function participants($id){
        $participants = $this->eventModel->getParticipants($id);
        $data = ['participants' => $participants, 'event_id' => $id];
        $this->view('events/participants', $data);
    }

    public function register($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $member_id = intval($_POST['member_id']);
            if($this->eventModel->registerParticipant($id, $member_id)){
                $this->redirect('event/participants/' . $id);
            } else {
                die('Unable to register participant');
            }
        } else {
            // show registration form with members list
            $members = $this->memberModel->getMembers();
            $data = ['members' => $members, 'event_id' => $id];
            $this->view('events/register', $data);
        }
    }

    public function attendance($event_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $member_id = intval($_POST['member_id']);
            $attended = isset($_POST['attended']) ? 1 : 0;
            if($this->eventModel->setAttendance($event_id, $member_id, $attended)){
                $this->redirect('event/participants/' . $event_id);
            } else {
                die('Unable to update attendance');
            }
        } else {
            $this->redirect('event/participants/' . $event_id);
        }
    }
}
