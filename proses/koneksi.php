<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "webasramapnl");
if (!$conn) {
    die("Error");
}


function format_rupiah($angka)
{
    $rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $rupiah;
}


function get_api_data($api_url)
{
    // Mengambil data dari API menggunakan file_get_contents
    $response = file_get_contents($api_url);

    // Mengubah JSON menjadi array PHP
    $data = json_decode($response, true);

    // Mengembalikan data hasil penguraian JSON
    return $data;
}

function open_json($file_path)
{
    // Membaca isi file JSON
    $json_data = file_get_contents($file_path);

    // Mengonversi JSON ke dalam bentuk array PHP
    $decoded_data = json_decode($json_data, true);

    // Mengembalikan data yang sudah di-decode
    return $decoded_data;
}




function uploadGambar($file, $url)
{
    $targetDirectory = $url;
    $originalFileName = basename($file["name"]);
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

    // Generate a unique identifier (random string)
    $randomString = bin2hex(random_bytes(8));

    // Create a random file name using the unique identifier and original file extension
    $randomFileName = $randomString . '.' . $fileExtension;

    $targetFile = $targetDirectory . $randomFileName;
    $uploadOk = 1;
    $imageFileType = strtolower($fileExtension);

    $pesanerror = "";

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $pesanerror = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $pesanerror = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        $pesanerror = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > 500000) {
        $pesanerror = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        $pesanerror = "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            $status = ["success", $randomFileName];
            return $status;
        } else {
            $status = ["error", $pesanerror];
            return "error";
        }
    }
}




?>