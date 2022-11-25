<?php

class rle_lib
{
    public $path_rle = './assets/img/datakecelakaan_rle/';

    // fungsi kompres atau encod
    public function compress($source_file, $toleration_persen = 0)
    {
        // membuka gambar berdasarkan format gambarnya
        $ext = pathinfo($source_file, PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        if ($ext == "png") {
            $im = imagecreatefrompng($source_file);
        } else if ($ext == "jpg" || $ext == "jpeg") {
            $im = imagecreatefromjpeg($source_file);
        } else if ($ext == "gif") {
            $im = imagecreatefromgif($source_file);
        } else {
            $im = imagecreatefromstring(file_get_contents($source_file));
        }


        // mengatur tingkat toleransi kode warna desimal yang sama
        $toleration = $toleration_persen * 255 / 100;

        $imagew = imagesx($im);
        $imageh = imagesy($im);

        $r_array = array();
        $g_array = array();
        $b_array = array();
        // $bw_array = array();

        // perulangan untuk mengambil data warna (rgb)
        // membaca jumlah karakter yang akan dikompresi 
        for ($i = 0; $i < $imagew; $i++) { //perulangan data dari lebar gambar
            for ($j = 0; $j < $imageh; $j++) { //perulangan data dari tinggi gambar

                // here we are getting rgb value

                $rgb = ImageColorAt($im, $i, $j);

                // here we are going to extract value for r, g, b

                $rr = ($rgb >> 16) & 0xFF;
                $gg = ($rgb >> 8) & 0xFF;
                $bb = $rgb & 0xFF;

                $r_array[] = $rr;
                $g_array[] = $gg;
                $b_array[] = $bb;

                // get the Value from the RGB value

                $g = round(($rr + $gg + $bb) / 3);
                // $bw_array[] = $g;

                //  $val = imagecolorallocate($im, $g, $g, $g);

                $val = imagecolorallocate($im, $rr, $gg, $bb);

                // here we are set the gray value

                imagesetpixel($im, $i, $j, $val);
            }
        }

        // konversikan semua data hasil kompresi.
        // algoritma rle data warna merah
        // lakukan proses kompresi data karakter bila ditemukan karakter yang sama secara berurutan lebih dari dua.
        // rle compress r_array
        $r_array_rle = array();
        $r_array_rle_count = 0;
        $r_array_rle_value = (int) 0;

        foreach ($r_array as $key => $value) {
            // jika sama maka kedua bit tersebut dikeluarkan, dan dihitung pengulangan yang terjadi untuk dicatat, kemudian lakukan perulangan untuk perintah selanjutnya. 
            if ($value < $r_array_rle_value + $toleration / 2 && $value >= $r_array_rle_value - $toleration / 2 && $r_array_rle_count < 255) {
                $r_array_rle_count++; // Tambahkan deretan bit yang menyatakan karakter yang berulang. 
            } else {
                // beri bit penanda pada data kompresi.
                if ($r_array_rle_count > 0) {
                    // jika berbeda tambahkan deretan bit untuk menyatakan jumlah nilai data yang sama berurutan
                    $r_array_rle[] = $r_array_rle_count;
                    $r_array_rle[] = $r_array_rle_value;
                }
                $r_array_rle_count = 1;
                $r_array_rle_value = $value;
            }
        }

        // add last value
        $r_array_rle[] = $r_array_rle_count;
        $r_array_rle[] = $r_array_rle_value;


        // algoritma rle data warna hijau
        // rle compress g_array
        $g_array_rle = array();
        $g_array_rle_count = 0;
        $g_array_rle_value = (int) 0;

        foreach ($g_array as $key => $value) {
            if ($value < $g_array_rle_value + $toleration / 2 && $value >= $g_array_rle_value - $toleration / 2 && $g_array_rle_count < 255) {
                $g_array_rle_count++;
            } else {
                if ($g_array_rle_count > 0) {
                    $g_array_rle[] = $g_array_rle_count;
                    $g_array_rle[] = $g_array_rle_value;
                }
                $g_array_rle_count = 1;
                $g_array_rle_value = $value;
            }
        }

        // add last value
        $g_array_rle[] = $g_array_rle_count;
        $g_array_rle[] = $g_array_rle_value;


        // algoritma rle data warna biru
        // rle compress b_array
        $b_array_rle = array();
        $b_array_rle_count = 0;
        $b_array_rle_value = (int) 0;

        foreach ($b_array as $key => $value) {
            if ($value < $b_array_rle_value + $toleration / 2 && $value >= $b_array_rle_value - $toleration / 2 && $b_array_rle_count < 255) {
                $b_array_rle_count++;
            } else {
                if ($b_array_rle_count > 0) {
                    $b_array_rle[] = $b_array_rle_count;
                    $b_array_rle[] = $b_array_rle_value;
                }
                $b_array_rle_count = 1;
                $b_array_rle_value = $value;
            }
        }

        // add last value
        $b_array_rle[] = $b_array_rle_count;
        $b_array_rle[] = $b_array_rle_value;

        // // rle compress bw_array
        // $bw_array_rle = array();
        // $bw_array_rle_count = 0;
        // $bw_array_rle_value = (int) 0;

        // foreach ($bw_array as $key => $value) {
        //     if ($value < $bw_array_rle_value + $toleration / 2 && $value >= $bw_array_rle_value - $toleration / 2 && $bw_array_rle_count < 255) {
        //         $bw_array_rle_count++;
        //     } else {
        //         if ($bw_array_rle_count > 0) {
        //             $bw_array_rle[] = $bw_array_rle_count;
        //             $bw_array_rle[] = $bw_array_rle_value;
        //         }
        //         $bw_array_rle_count = 1;
        //         $bw_array_rle_value = $value;
        //     }
        // }

        // // add last value
        // $bw_array_rle[] = $bw_array_rle_count;
        // $bw_array_rle[] = $bw_array_rle_value;


        // menamai data gambar untuk disisipkan file
        // store bin file r g b
        $file_name = uniqid();
        $file_r_name = $this->path_rle . $file_name . '_r.bin';
        $file_g_name = $this->path_rle . $file_name . '_g.bin';
        $file_b_name = $this->path_rle . $file_name . '_b.bin';

        // menyimpan data ukuran gambar 
        // store json w h image
        $file_json_name = $this->path_rle . $file_name . '.json';

        // membuka file dengan fungsi menulis atau write 
        $file_r = fopen($file_r_name, 'w');
        $file_g = fopen($file_g_name, 'w');
        $file_b = fopen($file_b_name, 'w');

        $file_json = fopen($file_json_name, 'w');

        // simpan karakter hasil kompresi.
        // menulis file .bin 
        // write bin
        fwrite($file_r, $this->decarray2bin($r_array_rle));
        fwrite($file_g, $this->decarray2bin($g_array_rle));
        fwrite($file_b, $this->decarray2bin($b_array_rle));

        $file_r = fopen($file_r_name, 'r');
        $r_array_rle_de = $this->bin2decarray(fread($file_r, filesize($file_r_name)));
        $r_array_rle_decompressed = array();

        // write json
        $json = array(
            'w' => $imagew,
            'h' => $imageh,
        );

        fwrite($file_json, json_encode($json));

        // output

        $r_array_100 = array();
        $g_array_100 = array();
        $b_array_100 = array();

        $lenght_arr = 100;
        if (count($r_array) < 100) $lenght_arr = count($r_array);
        for ($i = 0; $i < $lenght_arr; $i++) {
            $r_array_100[] = $r_array[$i];
            $g_array_100[] = $g_array[$i];
            $b_array_100[] = $b_array[$i];
        }

        // output hasil kompresi.
        $data = array(
            'name' => $file_name,
            'toleration' => $toleration_persen,
            'original_size_r' => count($r_array),
            'compressed_size_r' => count($r_array_rle),
            'compression_ratio_r' => count($r_array) / count($r_array_rle),
            'original_size_g' => count($g_array),
            'compressed_size_g' => count($g_array_rle),
            'compression_ratio_g' => count($g_array) / count($g_array_rle),
            'original_size_b' => count($b_array),
            'compressed_size_b' => count($b_array_rle),
            'compression_ratio_b' => count($b_array) / count($b_array_rle),
            'array_r' => $r_array_100,
            'array_g' => $g_array_100,
            'array_b' => $b_array_100,
            // 'bw_array_rle' => $bw_array_rle,
            'imagew' => $imagew,
            'imageh' => $imageh,
        );

        return $data;
    }

    public function decompress($file_name)
    {
        // membuka file .bin hasil kompres
        $file_r_name = $this->path_rle . $file_name . '_r.bin';
        $file_g_name = $this->path_rle . $file_name . '_g.bin';
        $file_b_name = $this->path_rle . $file_name . '_b.bin';

        // membuka file data ukuran gambar 
        $file_json_name = $this->path_rle . $file_name . '.json';

        $file_r = fopen($file_r_name, 'r');
        $file_g = fopen($file_g_name, 'r');
        $file_b = fopen($file_b_name, 'r');

        $file_json = fopen($file_json_name, 'r');

        $json = json_decode(fread($file_json, filesize($file_json_name)), true);

        // dari bin ke array 
        $r_array_rle = $this->bin2decarray(fread($file_r, filesize($file_r_name)));
        $g_array_rle = $this->bin2decarray(fread($file_g, filesize($file_g_name)));
        $b_array_rle = $this->bin2decarray(fread($file_b, filesize($file_b_name)));


        // get image size
        $imagew = $json['w'];
        $imageh = $json['h'];

        $r_array_rle_decompressed = array();
        $g_array_rle_decompressed = array();
        $b_array_rle_decompressed = array();
        // $bw_array_rle_decompressed = array();

        // algoritma dekompres warna merah 
        // decompress rle
        $r_array_rle_decompressed = array();
        foreach ($r_array_rle as $key => $value) {
            if ($key % 2 == 0) {
                for ($i = 0; $i < $value; $i++) {
                    $r_array_rle_decompressed[] = $r_array_rle[$key + 1];
                }
            }
        }

        // algoritma dekompres warna hijau 
        $g_array_rle_decompressed = array();
        foreach ($g_array_rle as $key => $value) {
            if ($key % 2 == 0) {
                for ($i = 0; $i < $value; $i++) {
                    $g_array_rle_decompressed[] = $g_array_rle[$key + 1];
                }
            }
        }

        // algoritma dekompres warna biru 
        $b_array_rle_decompressed = array();
        foreach ($b_array_rle as $key => $value) {
            if ($key % 2 == 0) {
                for ($i = 0; $i < $value; $i++) {
                    $b_array_rle_decompressed[] = $b_array_rle[$key + 1];
                }
            }
        }

        // $bw_array_rle_decompressed = array();
        // foreach ($bw_array_rle as $key => $value) {
        //     if ($key % 2 == 0) {
        //         for ($i = 0; $i < $value; $i++) {
        //             $bw_array_rle_decompressed[] = $bw_array_rle[$key + 1];
        //         }
        //     }
        // }

        // membuka hasil dekompres kedalam bentuk gambar 
        // create new image
        $im2 = imagecreatetruecolor($imagew, $imageh);

        // fill image with decompressed rle

        $index = 0;
        for ($i = 0; $i < $imagew; $i++) {
            for ($j = 0; $j < $imageh; $j++) {
                $rgb = imagecolorallocate($im2, $r_array_rle_decompressed[$index], $g_array_rle_decompressed[$index], $b_array_rle_decompressed[$index]);
                imagesetpixel($im2, $i, $j, $rgb);
                $index++;
            }
        }

        return $im2;
    }

    public function decarray2bin($array)
    {
        $bin = '';
        foreach ($array as $value) {
            $bin .= chr($value);
        }
        return $bin;
    }

    public function bin2decarray($bin)
    {
        $array = array();
        for ($i = 0; $i < strlen($bin); $i++) {
            $array[] = ord($bin[$i]);
        }
        return $array;
    }
}