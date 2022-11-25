<?php
function upload_bukti($name)
{
    $CI = &get_instance();
    $config['upload_path'] = './assets/img/datakecelakaan/';
    $config['allowed_types'] = 'jpg|png';
    $CI->load->library('upload', $config);
    if (!$CI->upload->do_upload($name)) {
        $error = array('error' => $CI->upload->display_errors());
        echo '<script>alert("' . $error . '");history.back();</script>';
        return null;
    } else {
        $file = $CI->upload->data();
        return $file['file_name'];
    }
}

function upload_bukti_with_rle($name)
{
    $CI = &get_instance();
    $config['upload_path'] = './assets/img/datakecelakaan/';
    $config['allowed_types'] = 'jpg|png';
    $CI->load->library('upload', $config);
    if ($CI->upload->do_upload($name)) {
        $data = $CI->upload->data();

        $CI->load->library('rle_lib');
        $compress = $CI->rle_lib->compress($data['full_path'], 20);
    
        // input to database
        $CI->load->model('RLE_model', 'rle_model');
    
        $rle_model = $CI->rle_model;
    
        $rle_model->insert($compress);
    
        unlink($data['full_path']);
        
        return '/rle/decompress/' . $compress['name'];    
    } else {
        $error = array('error' => $CI->upload->display_errors());
        echo '<script>alert("' . $error . '");history.back();</script>';
        return null;
    }
}