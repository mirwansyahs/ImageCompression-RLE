<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
    public function getRowUserById($id)
    {
        return $this->db->get_where('datakecelakaan', ['id' => $id]);
    }

    public function getRLEByName($name)
    {
        return $this->db->get_where('data_rle', ['name' => $name])->row_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('datakecelakaan', ['id' => $id])->row_array();
    }

    public function getDetailUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function hapusDataKecelakaan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('datakecelakaan');
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function ubahDataKecelakaan($id, $arrFileName)
    {
        $data = [
            "namapendata" => $this->input->post('namapendata', true),
            // "kode" => $this->input->post('kode', true),
            "jeniskecelakaan" => $this->input->post('jeniskecelakaan', true),
            "tanggal" => $this->input->post('tanggal', true),
            "korban" => $this->input->post('korban', true),
            "ket_korban" => $this->input->post('ket_korban', true),
            "nama" => $this->input->post('nama', true),
            "namasaksi" => $this->input->post('namasaksi', true),
            "detail" => $this->input->post('detail', true),
            "alamat" => $this->input->post('alamat', true),
        ];
        if ($arrFileName['bukti1'] != null)
            $data['bukti1'] = $arrFileName['bukti1'];
        else if ($arrFileName['bukti2'] != null)
            $data['bukti2'] = $arrFileName['bukti2'];
        // else if ($arrFileName['bukti3'] != null)
        //     $data['bukti3'] = $arrFileName['bukti3'];
        // else if ($arrFileName['bukti4'] != null)
        //     $data['bukti4'] = $arrFileName['bukti4'];
        $this->db->where('id', $id);
        $this->db->update('datakecelakaan', $data);
    }

    public function ubahDataUser($id, $foto)
    {
        $data = [
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "password" => $this->input->post('password', true),
            "role_id" => $this->input->post('role_id', true),
            "date_created" => $this->input->post('date_created', true),
        ];
        if ($foto != null) $data['image'] = $foto;
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function getTambahDataKecelakaan()
    {
        return $this->db->get('datakecelakaan')->result();
    }


    public function getTambahDataUser()
    {
        return $this->db->get('user')->result();
    }

    // public function cariDataKecelakaan()
    // {
    //     $keyword = $this->input->post('keyword', true);
    //     $this->db->like('namapendata', $keyword);
    //     $this->db->or_like('kode', $keyword);
    //     $this->db->or_like('jeniskecelakaan', $keyword);
    //     $this->db->or_like('tanggal', $keyword);
    //     $this->db->or_like('korban', $keyword);
    //     $this->db->or_like('ket_korban', $keyword);
    //     $this->db->or_like('nama', $keyword);
    //     $this->db->or_like('namasaksi', $keyword);
    //     $this->db->or_like('detail', $keyword);
    //     $this->db->or_like('alamat', $keyword);
    //     $this->db->or_like('bukti1', $keyword);
    //     $this->db->or_like('bukti2', $keyword);
    //     $this->db->or_like('bukti3', $keyword);
    //     $this->db->or_like('bukti4', $keyword);
    //     return $this->db->get('datakecelakaan')->result_array();
    // }

    // public function cariDataUser()
    // {
    //     $keyword = $this->input->post('keyword', true);
    //     $this->db->like('name', $keyword);
    //     // $this->db->or_like('email', $word);
    //     // $this->db->or_like('image', $word);
    //     // $this->db->or_like('password', $word);
    //     // $this->db->or_like('role_id', $word);
    //     // $this->db->or_like('date_created', $word);
    //     return $this->db->get('user')->result_array();
    // }

    public function getSubRole()
    {
        $query = "SELECT `user`.*, `user_role`.`role`
        FROM `user` JOIN `user_role`
        ON `user`.`role_id` = `user_role`.`id`
        ";

        return $this->db->query($query)->result_array();
    }
}