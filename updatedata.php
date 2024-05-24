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
    $id = $_POST['id'];

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

    $cv_filename = isset($_FILES['cv']['name']) ? $_FILES['cv']['name'] : '';
    $krs_filename = isset($_FILES['krs']['name']) ? $_FILES['krs']['name'] : '';
    $pas_foto_filename = isset($_FILES['pas_foto']['name']) ? $_FILES['pas_foto']['name'] : '';
    $ktm_filename = isset($_FILES['ktm']['name']) ? $_FILES['ktm']['name'] : '';
    $ktp_filename = isset($_FILES['ktp']['name']) ? $_FILES['ktp']['name'] : '';
    $rangkuman_nilai_filename = isset($_FILES['rangkuman_nilai']['name']) ? $_FILES['rangkuman_nilai']['name'] : '';
    $certificate_filename = isset($_FILES['certificate']['name']) ? $_FILES['certificate']['name'] : '';

    $uploadDirectory = "uploads/";

    $cvUpdate = !empty($cv_filename) ? "cv_filename='$cv_filename'," : "";

    $sql = "UPDATE registrations 
            SET Nama='$Nama', NPM='$NPM', Kelas='$Kelas', Jurusan='$Jurusan', Lokasi_Kampus='$Lokasi_Kampus', Tanggal_Lahir='$Tanggal_Lahir', Jenis_Kelamin='$Jenis_Kelamin', 
            Alamat='$Alamat', NoHP='$NoHP', Email='$Email', Posisi='$Posisi', IPK_Terakhir='$IPK_Terakhir', 
            $cvUpdate
            krs_filename='$krs_filename',
            pas_foto_filename='$pas_foto_filename',
            ktm_filename='$ktm_filename',
            ktp_filename='$ktp_filename',
            rangkuman_nilai_filename='$rangkuman_nilai_filename',
            certificate_filename='$certificate_filename'
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: admindashboard.php");  // Mengarahkan kembali ke halaman admindashboard.php
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
