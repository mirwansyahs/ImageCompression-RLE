<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RLE extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('rle_lib');
    }

    public function index()
    {
        $this->load->view('rle');
    }

    public function decompress($name)
    {
        $decompress = $this->rle_lib->decompress($name);

        header('Content-type: image/jpeg');
        imagejpeg($decompress);
    }
}
