<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RLE_model extends CI_Model
{
    public $table = 'data_rle';
    
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }
    
    public function insert($data)
    {
        $name = $data['name'];
        $toleration = $data['toleration'];
        $original_size_r = $data['original_size_r'];
        $compressed_size_r = $data['compressed_size_r'];
        $compression_ratio_r = $data['compression_ratio_r'];
        $original_size_g = $data['original_size_g'];
        $compressed_size_g = $data['compressed_size_g'];
        $compression_ratio_g = $data['compression_ratio_g'];
        $original_size_b = $data['original_size_b'];
        $compressed_size_b = $data['compressed_size_b'];
        $compression_ratio_b = $data['compression_ratio_b'];
        $array_r = json_encode($data['array_r']);
        $array_g = json_encode($data['array_g']);
        $array_b = json_encode($data['array_b']);
        $imagew = $data['imagew'];
        $imageh = $data['imageh'];

        return $this->db->insert($this->table, [
            'name' => $name,
            'toleration' => $toleration,
            'original_size_r' => $original_size_r,
            'compressed_size_r' => $compressed_size_r,
            'compression_ratio_r' => $compression_ratio_r,
            'original_size_g' => $original_size_g,
            'compressed_size_g' => $compressed_size_g,
            'compression_ratio_g' => $compression_ratio_g,
            'original_size_b' => $original_size_b,
            'compressed_size_b' => $compressed_size_b,
            'compression_ratio_b' => $compression_ratio_b,
            'array_r' => $array_r,
            'array_g' => $array_g,
            'array_b' => $array_b,
            'imagew' => $imagew,
            'imageh' => $imageh,
        ]);
    }
}