<?php
require_once("tcpdf/tcpdf.php");

$host = "localhost";
$user = "root";
$password = "";
$db = "labpsi";

$data = new mysqli($host, $user, $password, $db);

if ($data->connect_error) {
    die("Connection error: " . $data->connect_error);
}

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetPageOrientation('L');

$pdf->SetCreator('Lab Psikologi');
$pdf->SetAuthor('Admin Lab Psikologi');
$pdf->SetTitle('Data Pendaftar Lab PSI');
$pdf->SetSubject('Data Pendaftaran Asisten dan Programmer Lab PSI');
$pdf->SetKeywords('Lab PSI, Pendaftaran, Asisten, Programmer');

$pdf->SetFont('times', '', 9, '', true);

$pdf->setPrintHeader(false);

$pdf->AddPage();

$pdf->SetFont('times', 'B', 16);
$pdf->Cell(0, 10, 'Data Pendaftaran Asisten dan Programmer Lab Psikologi Universitas Gunadarma', 0, 1, 'C');

$pdf->SetFont('times', '', 9, '', true);
$pdf->Ln(10);

$html = '<table border="1" cellpadding="5" cellspacing="0" style="font-size:10px;">';
$html .= '<thead style="background-color:#22336d; color:#fff; font-weight:bold; text-align:center;"><tr><th>No</th><th>Nama</th><th>NPM</th><th>Kelas</th><th>Jurusan</th><th>Lokasi Kampus</th><th>TTL</th><th>Jenis Kelamin</th><th>Alamat</th><th>NoHP</th><th>Email</th><th>Posisi</th><th>IPK Terakhir</th></tr></thead><tbody style="text-align:center;">';

$sql = "SELECT * FROM registrations";
$result = $data->query($sql);

if ($result === false) {
    die("Invalid query: " . $data->error);
}

$counter = 1;
while ($row = $result->fetch_assoc()) {
    $html .= "<tr>";
    $html .= "<td>{$counter}</td>";
    $html .= "<td>{$row['Nama']}</td>";
    $html .= "<td>{$row['NPM']}</td>";
    $html .= "<td>{$row['Kelas']}</td>";
    $html .= "<td>{$row['Jurusan']}</td>";
    $html .= "<td>{$row['Lokasi_Kampus']}</td>";
    $html .= "<td>{$row['Tanggal_Lahir']}</td>";
    $html .= "<td>{$row['Jenis_Kelamin']}</td>";
    $html .= "<td>{$row['Alamat']}</td>";
    $html .= "<td>{$row['NoHP']}</td>";
    $html .= "<td>{$row['Email']}</td>";
    $html .= "<td>{$row['Posisi']}</td>";
    $html .= "<td>{$row['IPK_Terakhir']}</td>";
    $html .= "</tr>";
    $counter++;
}

$html .= '</tbody></table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('Data Pendaftaran Aslab.pdf', 'D');
$data->close();
?>
.