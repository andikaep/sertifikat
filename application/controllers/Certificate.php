<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller {
    public function index() {
        $this->load->view('certificate_form');
    }

    public function generate_certificate() {
        require_once(APPPATH . 'third_party/fpdf/fpdf.php');
        
        $name = $this->input->post('name');

        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->Image('assets/pn.png', 0, 0, 210, 297);

        $pdf->SetFont('Arial', 'B', 28);
        $pdf->SetXY(50, 120);
        $pdf->Cell(100, 10, $name, 0, 1, 'C');

        $pdf->SetFont('Arial', '', 16);
        $pdf->SetXY(50, 140);
        $pdf->Cell(100, 10, '10 September 2024', 0, 1, 'C');

        $pdf->Output('D', 'Certificate_' . $name . '.pdf');
    }
}
