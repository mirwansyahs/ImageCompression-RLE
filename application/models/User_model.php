<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getRowUserById($id)
    {
        return $this->db->get_where('datakecelakaan', ['id' => $id]);
    }

    public function getRLEByName($name)
    {
        return $this->db->get_where('data_rle', ['name' => $name])->row_array();
    }
    public function getTambahDataKecelakaan()
    {
        return $this->db->get('datakecelakaan')->result();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('datakecelakaan', ['id' => $id])->row_array();
    }

    public function ubahDataKecelakaan($id, $arrFileName)
    {
        $data = [
            "namapendata" => $this->input->post('namapendata', true),
            "kode" => $this->input->post('kode', true),
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

    public function hapusDataKecelakaan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('datakecelakaan');
    }
}