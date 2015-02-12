<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class m_pdf {

    function m_pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
    function load()
    {
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
        return new mPDF("","Letter","10","",20,20,30,0,10,20,"");
    }
}