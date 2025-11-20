<?php
class SubscriptionController extends Controller {
    public function __construct(){
        session_start();
        if(!$this->isLoggedIn()){
            $this->redirect('auth/login');
        }
        $this->subscriptionModel = $this->model('Subscription');
        $this->memberModel = $this->model('Member');
    }

    public function index(){
        $subscriptions = $this->subscriptionModel->getSubscriptions();
        $data = ['subscriptions' => $subscriptions];
        $this->view('subscriptions/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'member_id' => trim($_POST['member_id']),
                'amount' => trim($_POST['amount']),
                'date' => trim($_POST['date']),
                'status' => trim($_POST['status']),
                'type' => trim($_POST['type']),
                'amount_err' => ''
            ];

            if(empty($data['amount'])){ $data['amount_err'] = 'Please enter amount'; }

            if(empty($data['amount_err'])){
                if($this->subscriptionModel->addSubscription($data)){
                    $this->redirect('subscription');
                } else {
                    die('Something went wrong');
                }
            } else {
                $members = $this->memberModel->getMembers();
                $data['members'] = $members;
                $this->view('subscriptions/add', $data);
            }
        } else {
            $members = $this->memberModel->getMembers();
            $data = [
                'member_id' => '', 'amount' => '', 'date' => date('Y-m-d'), 
                'status' => 'paid', 'type' => 'monthly', 'members' => $members
            ];
            $this->view('subscriptions/add', $data);
        }
    }
}
