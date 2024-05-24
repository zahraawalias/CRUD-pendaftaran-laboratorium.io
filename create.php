<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "labpsi";
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nama = $_POST['Nama'];
    $NPM = $_POST['NPM'];
    $Kelas = $_POST['Kelas'];
    $Jurusan = $_POST['Jurusan'];
    $Lokasi_Kampus = $_POST['Lokasi_Kampus'];
    $Tanggal_Lahir = $_POST['Tanggal_Lahir'];
    $Jenis_Kelamin = $_POST['Jenis_Kelamin'];
    $Alamat = $_POST['Alamat'];
    $NoHP = $_POST['NoHP'];
    $Email = $_POST['Email'];
    $Posisi = $_POST['Posisi'];
    $IPK_Terakhir = $_POST['IPK_Terakhir'];

    $cv_filename = $_FILES['cv_filename']['name'];
    $krs_filename = $_FILES['krs_filename']['name'];
    $pas_foto_filename = $_FILES['pas_foto_filename']['name'];
    $ktm_filename = $_FILES['ktm_filename']['name'];
    $ktp_filename = $_FILES['ktp_filename']['name'];
    $rangkuman_nilai_filename = $_FILES['rangkuman_nilai_filename']['name'];
    $certificate_filename = $_FILES['certificate_filename']['name'];

    $uploadDirectory = "uploads/";

    $cvFilePath = $uploadDirectory . $cv_filename;
    $krsFilePath = $uploadDirectory . $krs_filename;
    $pasFotoFilePath = $uploadDirectory . $pas_foto_filename;
    $ktmFilePath = $uploadDirectory . $ktm_filename;
    $ktpFilePath = $uploadDirectory . $ktp_filename;
    $rangkumanNilaiFilePath = $uploadDirectory . $rangkuman_nilai_filename;
    $certificateFilePath = $uploadDirectory . $certificate_filename;

    move_uploaded_file($_FILES['cv_filename']['tmp_name'], $cvFilePath);
    move_uploaded_file($_FILES['krs_filename']['tmp_name'], $krsFilePath);
    move_uploaded_file($_FILES['pas_foto_filename']['tmp_name'], $pasFotoFilePath);
    move_uploaded_file($_FILES['ktm_filename']['tmp_name'], $ktmFilePath);
    move_uploaded_file($_FILES['ktp_filename']['tmp_name'], $ktpFilePath);
    move_uploaded_file($_FILES['rangkuman_nilai_filename']['tmp_name'], $rangkumanNilaiFilePath);
    move_uploaded_file($_FILES['certificate_filename']['tmp_name'], $certificateFilePath);

    $sql = "INSERT INTO registrations (Nama, NPM, Kelas, Jurusan, Lokasi_Kampus, Tanggal_Lahir, Jenis_Kelamin, 
    Alamat, NoHP, Email, Posisi, IPK_Terakhir, cv_filename, krs_filename, pas_foto_filename, ktm_filename, 
    ktp_filename, rangkuman_nilai_filename, certificate_filename)
            VALUES ('$Nama', '$NPM', '$Kelas', '$Jurusan', '$Lokasi_Kampus', '$Tanggal_Lahir', '$Jenis_Kelamin', 
            '$Alamat', '$NoHP', '$Email', '$Posisi', '$IPK_Terakhir', '$cv_filename', '$krs_filename', 
            '$pas_foto_filename', '$ktm_filename', '$ktp_filename', '$rangkuman_nilai_filename', '$certificate_filename')";
  
    if ($conn->query($sql) === TRUE) {
        $newId = $conn->insert_id;

        header("Location: create.php?id=".$newId);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <title>Website Landing Page</title>
  </head>
  <body>
  <nav>
      <div class="logo"><a href="#">Lab Psikologi</a></div>
  </nav>
    <section class="page">
      <div class="landing">
        <h1>Registrasi Berhasil!</h1>
        <p>
            Terima Kasih telah ikut berpartisipasi di Lab Psikologi Universitas Gunadarma! <br>
            Silahkan tunggu konfirmasi selanjutnya melalui email yang telah anda daftarkan.
        </p>
        <a href="index.php"><button class="bar">Home</button></a>
      </div>
    </section>
  </body>
</html>

