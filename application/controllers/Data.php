<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('upload');
        $this->load->model('Data_model');
    }

    public function index()
    {
        $data['title'] = 'Data Laporan Kecelakaan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['datakecelakaan'] = $this->db->get('datakecelakaan')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/index', $data);
        $this->load->view('templates/footer');
    }

    public function user()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Data_model', 'role');

        $data['datauser'] = $this->role->getSubRole();
        // $data['datauser'] = $this->db->get('user')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/datauser', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Data Laporan Kecelakaan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Data_model');

        $detail = $this->Data_model->getUserById($id);
        $data['detail'] = $detail;

        # query for retrieve data row by id
        $query = $this->Data_model->getRowUserById($id);
        $row = $query->row();
        
        # assign bukti1 & bukti2 field to variable
        $bukti1 = $row->bukti1;
        $bukti2 = $row->bukti2;
        # take only last string after forward slash
        $base1 = basename($bukti1);
        $base2 = basename($bukti2);

        # query for get size_r by name
        $data_rle1 = $this->Data_model->getRLEByName($base1);
        $data_rle2 = $this->Data_model->getRLEByName($base2);

        # assign to array
        $data['bukti1'] = $data_rle1;
        $data['bukti2'] = $data_rle2; 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/detail', $data);
        $this->load->view('templates/footer');
    }

    public function detailuser($id)
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('Data_model');

        $detailuser = $this->Data_model->getDetailUserById($id);
        $data['detailuser'] = $detailuser;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/detailuser', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->load->model('Data_model');
        $this->Data_model->hapusDataKecelakaan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kecelakaan Deleted!</div>');
        redirect('data');
    }

    public function hapusdatauser($id)
    {
        $this->load->model('Data_model');
        $this->Data_model->hapusDataUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Deleted!</div>');
        redirect('data/user');
    }

    public function edit($id)
    {
        $data['title'] = 'Data Laporan Kecelakaan';
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datakecelakaan'] = $this->db->get_where('datakecelakaan', ['id' => $id])->row_array();

        $this->load->model('Data_model');

        $this->form_validation->set_rules('namapendata', 'Nama Pendata', 'required|trim');
        // $this->form_validation->set_rules('kode', '', 'required|trim');
        $this->form_validation->set_rules('jeniskecelakaan', 'Jenis Kecelakaan', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('korban', 'Korban', 'required|trim');
        $this->form_validation->set_rules('ket_korban', 'Keterangan Korban', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Korban', 'required|trim');
        $this->form_validation->set_rules('namasaksi', 'Nama Saksi', 'required|trim');
        $this->form_validation->set_rules('detail', 'Detail', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $arrFileName = array();
            $arrFileName['bukti1'] = upload_bukti_with_rle('bukti1');
            $arrFileName['bukti2'] = upload_bukti_with_rle('bukti2');
            // $arrFileName['bukti3'] = upload_bukti_with_rle('bukti3');
            // $arrFileName['bukti4'] = upload_bukti_with_rle('bukti4');
            $this->Data_model->ubahDataKecelakaan($id, $arrFileName);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kecelakaan Edited!</div>');
            redirect('data');
        }
    }

    public function edituser($id)
    {
        $data['title'] = 'Data User';
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->model('Data_model', 'data');

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        // $this->form_validation->set_rules('image', 'Image', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('role_id', 'Role_id', 'required|trim');
        $this->form_validation->set_rules('date_created', 'Date_created', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/edituser', $data);
            $this->load->view('templates/footer');
        } else {
            $foto_profile = null;
            if(!empty($_FILES['image'])) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'jpg|png';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    echo '<script>alert("' . $error . '");history.back();</script>';
                } else {
                    $file = $this->upload->data();
                    $foto_profile = $file['file_name'];
                }
            }
            $this->Data_model->ubahDataUser($id, $foto_profile);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Edited!</div>');
            redirect('data/user');
        }
    }

    public function tambah()
    {
        $data['title'] = 'Data Laporan Kecelakaan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Data_model', 'data');

        $data['Tambah'] = $this->data->getTambahDataKecelakaan();
        $data['datakecelakaan'] = $this->db->get('datakecelakaan')->result_array();

        //$this->form_validation->set_rules('namapendata', 'Nama Pendata', 'required');
        // $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('jeniskecelakaan', 'Jenis Kecelakaan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('korban', 'Korban', 'required');
        $this->form_validation->set_rules('ket_korban', 'Keterangan Korban', 'required');
        $this->form_validation->set_rules('nama', 'Nama Korban', 'required');
        $this->form_validation->set_rules('namasaksi', 'Nama Saksi', 'required');
        $this->form_validation->set_rules('detail', 'Detail', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/data', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'namapendata' => $this->session->userdata('name'),
                // 'kode' => $this->input->post('kode'),
                'jeniskecelakaan' => $this->input->post('jeniskecelakaan'),
                'tanggal' => $this->input->post('tanggal'),
                'korban' => $this->input->post('korban'),
                'ket_korban' => $this->input->post('ket_korban'),
                'nama' => $this->input->post('nama'),
                'namasaksi' => $this->input->post('namasaksi'),
                'detail' => $this->input->post('detail'),
                'alamat' => $this->input->post('alamat'),
                "bukti1" => upload_bukti_with_rle('bukti1'),
                "bukti2" => upload_bukti_with_rle('bukti2'),
                // "bukti3" => upload_bukti_with_rle('bukti3'),
                // "bukti4" => upload_bukti_with_rle('bukti4'),
            ];
            $this->db->insert('datakecelakaan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data Kecelakaan Added!</div>');
            redirect('data/index');
        }
    }

    public function tambahuser()
    {

        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Data_model', 'data');

        $data['TambahUser'] = $this->data->getTambahDataUser();
        
        $this->load->model('Data_model', 'role');
        $data['datauser'] = $this->role->getSubRole();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', ' Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        // $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('role_id', 'Role_id', 'required');
        //$this->form_validation->set_rules('date_created', 'date_created', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/datauser', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './assets/img/profile/';
            $config['allowed_types']        = 'gif|jpg|png';
            // $config['max_size']             = 100;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                // echo $error['error'];
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('data/datauser', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = $this->upload->data();

                // $password = $this->input->post('password', true);
                // $pass = md5($password);
                $data = [
                    "name" => $this->input->post('name', true),
                    "email" => $this->input->post('email', true),
                    "image" => $upload_data['file_name'],
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    // "password" => $pass,
                    "role_id" => $this->input->post('role_id', true),
                    "date_created" => date('d F Y'),
                ];

                $this->db->insert('user', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data User Added!</div>');
                redirect('data/user');
            }
        }
    }



    public function pdf()
    {
        // $this->load->library('dompdf_gen');

        // // $data['datakecelakaan'] = $this->Data_model->tampil('datakecelakaan')->result();
        // $data['datakecelakaan'] = $this->db->get('datakecelakaan')->result_array();

        // $this->load->view('data/laporan_pdf', $data);

        // $paper_size = 'A4';
        // $orientation = 'landscape';
        // $html = $this->output->get_output();
        // $this->dompdf->set_paper($paper_size, $orientation);

        // $this->dompdf->load_html($html);
        // $this->dompdf->render();
        // $this->dompdf->stream("laporan_data_kecelakaan.pdf", array('Attachment' => 0));

        
        // $data['datakecelakaan'] = $this->db->get('datakecelakaan')->result_array();
        
        // include APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        // $dompdf = new Dompdf();
        
        // $html = $this->load->view('data/export_pdf.php', $data,true);
        // $dompdf->load_html($html);
        // $dompdf->set_paper('A4', 'landscape');
        // $dompdf->render();
        // $pdf = $dompdf->output();
        // $dompdf->stream('laporan_data_kecelakaan', array("Attachment" => FALSE));

        $data['datakecelakaan'] = $this->db->get('datakecelakaan')->result_array();
        
        include APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        $dompdf = new Dompdf();
        
        $html = $this->load->view('data/export_pdf.php', $data,true);
        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        $dompdf->stream('laporan_data_kecelakaan'.".pdf", array("Attachment" => FALSE));
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }

    public function print()
    {
        $data['datakecelakaan'] = $this->db->get('datakecelakaan')->result_array();
        $this->load->view('data/export_pdf.php', $data);

        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('data/index', $data);
        // $this->load->view('templates/footer');
    }
}