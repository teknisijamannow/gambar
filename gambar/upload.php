<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Periksa apakah ada file yang dikirimkan
if(isset($_FILES['gambar'])) {
  $file = $_FILES['gambar'];

  // Periksa apakah ada error dalam pengiriman file
  if($file['error'] === UPLOAD_ERR_OK) {
    $nama_file = $file['name'];
    $lokasi_sementara = $file['tmp_name'];

    $direktori_simpan = 'uploads/';


    // Pindahkan file ke direktori tujuan
    if(move_uploaded_file($lokasi_sementara, $direktori_simpan . $nama_file)) {
      echo "Gambar berhasil diunggah dan disimpan.";
    } else {
      echo "Gagal menyimpan gambar.";
    }
  } else {
    echo "Error dalam pengiriman gambar.";
  }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
  <input type="file" name="gambar" accept="image/*">
  <input type="submit" value="Upload Gambar">
</form>
</body>
</html>