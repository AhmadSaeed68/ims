<?php
    class Pdf extends CI_Controller{

        function invoice_pdf(){
            $this->load->model('pdf_model');
            $pdf=$this->pdf_model->invoice_pdf();
            $html=$this->load->view('pdf/invoice_pdf',['pdf'=>$pdf],true);
             $this->load->library('M_pdf');
            $this->m_pdf->pdf=new mPDF('c','A4','','',32,25,27,25,16,13);
            $this->m_pdf->pdf->defHTMLHeaderByName(
                'myHeader2',
                '<div style="text-align: center; font-weight: bold;">Chapter 2</div>'
            );
            $stylesheet = file_get_contents('../../../assets/css/bootstrap.min.css');
            $this->m_pdf->pdf->SetDisplayMode('fullpage');
            $this->m_pdf->pdf->list_indent_first_level = 0;
            $this->m_pdf->pdf->WriteHTML($stylesheet,1);

            $this->m_pdf->pdf->WriteHTML($html,2);
            $this->m_pdf->pdf->Output('mpdf.pdf','D');

            
        }

        function single_invoice_pdf($invoice_code){
            $this->load->model('pdf_model');
            $pdf=$this->pdf_model->single_invoice_pdf($invoice_code);
            $html=$this->load->view('pdf/single_invoice_pdf',['pdf'=>$pdf],true);
            $this->load->library('M_pdf');
            $this->m_pdf->pdf=new mPDF('c','A4','','',32,25,27,25,16,13);
            $this->m_pdf->pdf->defHTMLHeaderByName(
                'myHeader2',
                '<div style="text-align: center; font-weight: bold;">Chapter 2</div>'
            );
            $stylesheet = file_get_contents('../../../assets/css/bootstrap.min.css');
            $this->m_pdf->pdf->SetDisplayMode('fullpage');
            $this->m_pdf->pdf->list_indent_first_level = 0;
            $this->m_pdf->pdf->WriteHTML($stylesheet,1);

            $this->m_pdf->pdf->WriteHTML($html,2);
            $this->m_pdf->pdf->Output('mpdf.pdf','D');
        }

        function po_order_pdf()
        {
            $this->load->model('pdf_model');
            $pdf=$this->pdf_model->po_order_pdf();
            $html=$this->load->view('pdf/po_order_pdf',['pdf'=>$pdf],true);
             $this->load->library('M_pdf');
            $this->m_pdf->pdf=new mPDF('c','A4','','',32,25,27,25,16,13);
            $this->m_pdf->pdf->defHTMLHeaderByName(
                'myHeader2',
                '<div style="text-align: center; font-weight: bold;">Chapter 2</div>'
            );
            $stylesheet = file_get_contents('../../../assets/css/bootstrap.min.css');
            $this->m_pdf->pdf->SetDisplayMode('fullpage');
            $this->m_pdf->pdf->list_indent_first_level = 0;
            $this->m_pdf->pdf->WriteHTML($stylesheet,1);

            $this->m_pdf->pdf->WriteHTML($html,2);
            $this->m_pdf->pdf->Output('mpdf.pdf','D');
        }

        
    }
?>