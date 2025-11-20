<?php
class DashboardController extends Controller {
    public function __construct(){
        session_start();
        if(!$this->isLoggedIn()){
            $this->redirect('auth/login');
        }
        $this->memberModel = $this->model('Member');
        $this->teamModel = $this->model('Team');
        $this->eventModel = $this->model('Event');
        $this->subscriptionModel = $this->model('Subscription');
    }

    public function index(){
        $memberCount = $this->memberModel->getMemberCount();
        $teamCount = $this->teamModel->getTeamCount();
        $eventCount = $this->eventModel->getEventCount();
        $income = $this->subscriptionModel->getTotalIncome();

        $data = [
            'member_count' => $memberCount,
            'team_count' => $teamCount,
            'event_count' => $eventCount,
            'total_income' => $income
        ];

        $this->view('dashboard/index', $data);
    }
}
