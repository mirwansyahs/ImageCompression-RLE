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

    // public function upload_multiple($field_name,$path){
    //     $this->load->library('upload');
    //     $files = $_FILES;
    //     $cpt = count($_FILES[$field_name]['name']);//count for number of image files
    //     $image_name =array();
    //     for($i=0; $i<$cpt; $i++)
    //     {           
    //         $_FILES[$field_name]['name']= $files[$field_name]['name'][$i];
    //         $_FILES[$field_name]['type']= $files[$field_name]['type'][$i];
    //         $_FILES[$field_name]['tmp_name'] = $files[$field_name]['tmp_name'][$i];
    //         $_FILES[$field_name]['error']= $files[$field_name]['error'][$i]; 
    //         $_FILES[$field_name]['size'] = $files[$field_name]['size'][$i];
    
    //         $this->upload->initialize($this->set_upload_options($path));
    //          //for initalizing configuration for each image
    //         $this->upload->do_upload($field_name);  
    
    //         $data = array('upload_data' => $this->upload->data()); 
    //         $image_name[]=$data['upload_data']['file_name'];
    //         //store file name into array
    
    //     }
    //     return $image_name;//all images name which is uploaded
    // }
    // public function set_upload_options($path)
    // {   
    //     $config = array();
    //     $config['upload_path'] = $path;
    //     $config['allowed_types'] = '*';
    //     $config['overwrite']     = FALSE;
    
    //     return $config;
    // }