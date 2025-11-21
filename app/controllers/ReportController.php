<?php
class ReportController extends Controller {
    private $reportModel;

    public function __construct(){
        session_start();
        if(!$this->isLoggedIn()){
            $this->redirect('auth/login');
        }
        $this->reportModel = $this->model('Report');
    }

    // Main reports page with charts
    public function index(){
        $topSkills = $this->reportModel->getTopSkills(10);
        $majorDist = $this->reportModel->getMajorDistribution();
        $paidStats = $this->reportModel->getPaidMembersStats();
        $topEvents = $this->reportModel->getTopEvents(10);
        $subsOverTime = $this->reportModel->getSubscriptionsOverTime();

        $data = [
            'topSkills' => $topSkills,
            'majorDist' => $majorDist,
            'paidStats' => $paidStats,
            'topEvents' => $topEvents,
            'subsOverTime' => $subsOverTime
        ];

        $this->view('reports/index', $data);
    }

    // JSON endpoints for AJAX if needed
    public function apiTopSkills(){
        header('Content-Type: application/json');
        echo json_encode($this->reportModel->getTopSkills(20));
        exit;
    }

    public function apiMajorDist(){
        header('Content-Type: application/json');
        echo json_encode($this->reportModel->getMajorDistribution());
        exit;
    }

    public function apiSubscriptionsOverTime(){
        header('Content-Type: application/json');
        echo json_encode($this->reportModel->getSubscriptionsOverTime());
        exit;
    }

    public function searchBySkill(){
        $skill = isset($_GET['skill']) ? trim($_GET['skill']) : '';
        $results = $this->reportModel->searchMembersBySkill($skill);
        $data = ['results' => $results, 'skill' => $skill];
        $this->view('reports/search', $data);
    }
}
