<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function ubahDataRole($id)
    {
        $data = [
            "role" => $this->input->post('role', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('user_role', $data);
    }

    public function hapusDataRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }
}