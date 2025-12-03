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

    // Export members list as CSV
    public function exportCsv(){
        // use Member model to fetch members with aggregated skills
        $memberModel = $this->model('Member');
        $members = $memberModel->getMembers();

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=members_export_' . date('Ymd') . '.csv');

        $output = fopen('php://output', 'w');
        // CSV header
        fputcsv($output, ['ID','Full Name','Email','Phone','Team','Major','Skills','Join Date']);

        foreach($members as $m){
            fputcsv($output, [
                isset($m->id) ? $m->id : '',
                isset($m->full_name) ? $m->full_name : '',
                isset($m->email) ? $m->email : '',
                isset($m->phone) ? $m->phone : '',
                isset($m->team_name) ? $m->team_name : '',
                isset($m->major) ? $m->major : '',
                isset($m->skills) ? $m->skills : '',
                isset($m->join_date) ? $m->join_date : ''
            ]);
        }

        fclose($output);
        exit;
    }

    // Export members list as PDF using bundled FPDF
    public function exportPdf(){
        // try to include FPDF from project root
        $fpdfPath = dirname(__DIR__, 2) . '/fpdf186/fpdf.php';
        if(file_exists($fpdfPath)){
            require_once $fpdfPath;
        } else {
            // fallback: try the vendor path if present
            if(file_exists(dirname(__DIR__,2) . '/vendor/fpdf/fpdf.php')){
                require_once dirname(__DIR__,2) . '/vendor/fpdf/fpdf.php';
            }
        }

        $memberModel = $this->model('Member');
        $members = $memberModel->getMembers();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(0,10,'Members Export',0,1,'C');
        $pdf->Ln(2);

        $pdf->SetFont('Arial','B',10);
        // Header
        $pdf->Cell(10,7,'ID',1);
        $pdf->Cell(50,7,'Name',1);
        $pdf->Cell(50,7,'Email',1);
        $pdf->Cell(25,7,'Major',1);
        $pdf->Cell(55,7,'Skills',1);
        $pdf->Ln();

        $pdf->SetFont('Arial','',9);
        foreach($members as $m){
            $pdf->Cell(10,6,isset($m->id)?$m->id:'',1);
            $pdf->Cell(50,6,substr(isset($m->full_name)?$m->full_name:'' ,0,30),1);
            $pdf->Cell(50,6,substr(isset($m->email)?$m->email:'' ,0,30),1);
            $pdf->Cell(25,6,substr(isset($m->major)?$m->major:'' ,0,15),1);
            $pdf->Cell(55,6,substr(isset($m->skills)?$m->skills:'' ,0,35),1);
            $pdf->Ln();
            // simple page break handling
            if($pdf->GetY() > 260){
                $pdf->AddPage();
            }
        }

        $filename = 'members_export_' . date('Ymd') . '.pdf';
        $pdf->Output('D', $filename);
        exit;
    }
}
