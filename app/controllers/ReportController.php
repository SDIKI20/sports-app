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
<?php
class ReportController extends Controller {
    public function __construct(){
        session_start();
        if(!$this->isLoggedIn()){
            $this->redirect('auth/login');
        }
        $this->memberModel = $this->model('Member');
        $this->subscriptionModel = $this->model('Subscription');
    }

    public function index(){
        $this->view('reports/index');
    }

    public function export_members(){
        $members = $this->memberModel->getMembers();
        
        // Set headers for CSV download
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=members_report.csv');
        
        $output = fopen('php://output', 'w');
        fputcsv($output, array('ID', 'Name', 'Email', 'Phone', 'Team', 'Join Date'));
        
        foreach($members as $member){
            fputcsv($output, array(
                $member->id, 
                $member->full_name, 
                $member->email, 
                $member->phone, 
                $member->team_name, 
                $member->join_date
            ));
        }
        fclose($output);
    }

    public function export_finance(){
        $subs = $this->subscriptionModel->getSubscriptions();
        
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=finance_report.csv');
        
        $output = fopen('php://output', 'w');
        fputcsv($output, array('ID', 'Member', 'Amount', 'Date', 'Status', 'Type'));
        
        foreach($subs as $sub){
            fputcsv($output, array(
                $sub->id, 
                $sub->full_name, 
                $sub->amount, 
                $sub->date, 
                $sub->status, 
                $sub->type
            ));
        }
        fclose($output);
    }
    
    // PDF Generation Placeholder
    // Requires FPDF library in vendor/fpdf/fpdf.php
    public function export_pdf(){
        if(file_exists('../vendor/fpdf/fpdf.php')){
            require('../vendor/fpdf/fpdf.php');
            
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(40,10,'Member Report');
            $pdf->Ln(20);
            
            $members = $this->memberModel->getMembers();
            $pdf->SetFont('Arial','',12);
            
            foreach($members as $member){
                $pdf->Cell(40,10, $member->full_name . ' - ' . $member->email);
                $pdf->Ln();
            }
            
            $pdf->Output();
        } else {
            die('FPDF library not found. Please install it in vendor/fpdf/');
        }
    }
}
