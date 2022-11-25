<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('uploadbaru');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $this->load->library('upload');
                // $config['max_size'] = '2048';
                $config = [];
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = "gif|jpg|jpeg|png";
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('image')) {
                    echo $this->upload->display_errors();
                } else {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }

    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password change!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function tambahdatakecelakaan()
    {
        $data['title'] = 'Data Kecelakaan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('User_model', 'data');

        $data['Tambah'] = $this->data->getTambahDataKecelakaan();
        $data['datakecelakaan'] = $this->db->get_where('datakecelakaan', array('namapendata' => $this->session->userdata('name')))->result_array();

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
            $this->load->view('user/tambahdatakecelakaan', $data);
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
            redirect('user/tambahdatakecelakaan');
        }


        // $data['title'] = 'Tambah Data Kecelakaan';
        // $data['user'] = $this->db->get_where('user', ['email' =>
        // $this->session->userdata('email')])->row_array();
        // $this->load->model('User_model', 'user');

        // $data['tambahDatakecelakaan'] = $this->user->getTambahDataKecelakaan();
        // $data['datakecelakaan'] = $this->db->get('datakecelakaan')->result_array();

        // $this->form_validation->set_rules('namapendata', 'Nama Pendata', 'required');
        // $this->form_validation->set_rules('kode', 'Kode', 'required');
        // $this->form_validation->set_rules('jeniskecelakaan', 'Jenis Kecelakaan', 'required');
        // $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        // $this->form_validation->set_rules('korban', 'Korban', 'required');
        // $this->form_validation->set_rules('ket_korban', 'Keterangan Korban', 'required');
        // $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('namasaksi', 'Nama Saksi', 'required');
        // $this->form_validation->set_rules('detail', 'Detail', 'required');
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('bukti1', 'Bukti 1', 'required');
        // $this->form_validation->set_rules('bukti2', 'Bukti 2', 'required');
        // $this->form_validation->set_rules('bukti3', 'Bukti 3', 'required');
        // $this->form_validation->set_rules('bukti4', 'Bukti 4', 'required');

        // if ($this->form_validation->run() == false) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/sidebar', $data);
        //     $this->load->view('templates/topbar', $data);
        //     $this->load->view('user/tambahdatakecelakaan', $data);
        //     $this->load->view('templates/footer');
        // } else {
        //     $data = [
        //         'namapendata' => $this->input->post('namapendata'),
        //         'kode' => $this->input->post('kode'),
        //         'jeniskecelakaan' => $this->input->post('jeniskecelakaan'),
        //         'tanggal' => $this->input->post('tanggal'),
        //         'korban' => $this->input->post('korban'),
        //         'ket_korban' => $this->input->post('ket_korban'),
        //         'nama' => $this->input->post('url'),
        //         'namasaksi' => $this->input->post('namasaksi'),
        //         'detail' => $this->input->post('detail'),
        //         'alamat' => $this->input->post('alamat'),
        //         'bukti1' => $this->input->post('url'),
        //         'bukti2' => $this->input->post('bukti2'),
        //         'bukti3' => $this->input->post('bukti3'),
        //         'bukti4' => $this->input->post('bukti4')
        //     ];
        //     $this->db->insert('datakecelakaan', $data);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Data Kecelakaan Added!</div>');
        //     redirect('user/tambahdatakecelakaan');
        // }
    }

    public function editdata($id)
    {
        $data['title'] = 'Data Kecelakaan';
        $data['id'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datakecelakaan'] = $this->db->get_where('datakecelakaan', ['id' => $id])->row_array();

        $this->load->model('User_model');

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
            $this->load->view('user/editdata', $data);
            $this->load->view('templates/footer');
        } else {
            $arrFileName = array();
            $arrFileName['bukti1'] = upload_bukti_with_rle('bukti1');
            $arrFileName['bukti2'] = upload_bukti_with_rle('bukti2');
            // $arrFileName['bukti3'] = upload_bukti_with_rle('bukti3');
            // $arrFileName['bukti4'] = upload_bukti_with_rle('bukti4');
            $this->User_model->ubahDataKecelakaan($id, $arrFileName);
            // $this->session->set_flashdata('flash', 'Diubah');
            // redirect('user/tambahdatakecelakaan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kecelakaan Edited!</div>');
            redirect('user/tambahdatakecelakaan');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Tambah Data Kecelakaan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->model('User_model');

        $detail = $this->User_model->getUserById($id);
        $data['detail'] = $detail;

        # query for retrieve data row by id
        $query = $this->User_model->getRowUserById($id);
        $row = $query->row();
        
        # assign bukti1 & bukti2 field to variable
        $bukti1 = $row->bukti1;
        $bukti2 = $row->bukti2;
        # take only last string after forward slash
        $base1 = basename($bukti1);
        $base2 = basename($bukti2);

        # query for get size_r by name
        $data_rle1 = $this->User_model->getRLEByName($base1);
        $data_rle2 = $this->User_model->getRLEByName($base2);

        # assign to array
        $data['bukti1'] = $data_rle1;
        $data['bukti2'] = $data_rle2; 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->load->model('User_model');
        $this->User_model->hapusDataKecelakaan($id);
        // $this->session->set_flashdata('flash', 'Dihapus');
        // redirect('user/tambahdatakecelakaan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kecelakaan Deleted!</div>');
        redirect('user/tambahdatakecelakaan');
    }
}