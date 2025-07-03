<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
    public function __construct()
    {
        parent::__construct();
    }

    public function load_view($view, $data = [])
    {
        $CI =& get_instance();
        $html = $CI->load->view($view, $data, TRUE);
        $this->loadHtml($html);
        $this->render();
        $this->stream($this->filename, array("Attachment" => 0));
    }
}
