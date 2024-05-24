<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Update Data</title>
</head>
<body>
    <div class="container">
        <div class="search-results">
            <h1>Update Data</h1>
            <?php
                $host = "localhost";
                $user = "root";
                $password = "";
                $db = "labpsi";

                $conn = new mysqli($host, $user, $password, $db);
                if ($conn->connect_error) {
                    die("Connection error: " . $conn->connect_error);
                }

                $id = $_GET['id'];

                $sql = "SELECT * FROM registrations WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
            ?>
                    <div class="tbl-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Lokasi Kampus</th>
                                    <th>NoHP</th>
                                    <th>Email</th>
                                    <th>Posisi</th>
                                    <th>IPK Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $row["id"] ?></td>
                                    <td><?= htmlspecialchars($row["Nama"]) ?></td>
                                    <td><?= htmlspecialchars($row["NPM"]) ?></td>
                                    <td><?= htmlspecialchars($row["Kelas"]) ?></td>
                                    <td><?= htmlspecialchars($row["Jurusan"]) ?></td>
                                    <td><?= htmlspecialchars($row["Lokasi_Kampus"]) ?></td>
                                    <td><?= htmlspecialchars($row["NoHP"]) ?></td>
                                    <td><?= htmlspecialchars($row["Email"]) ?></td>
                                    <td><?= htmlspecialchars($row["Posisi"]) ?></td>
                                    <td><?= htmlspecialchars($row["IPK_Terakhir"]) ?></td>
                                </tr>
                                <!-- Data lainnya -->
                            </tbody>
                        </table>
                    </div>
            <?php
                }
                $conn->close();
            ?>
            <div class="form first">
                <form action="updatedata.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                    <span class="title">Data Individu</span>
                    <div class="fields">
                        <div class="input-field">
                            <label for="Nama">Nama Lengkap</label>
                            <input type="text" name="Nama" id="Nama" value="<?php echo $row['Nama']; ?>" required>
                        </div>
                        <div class="input-field">
                            <label for="Kelas">Kelas</label>
                            <input type="text" name="Kelas" id="Kelas" value="<?php echo $row['Kelas']; ?>" required>
                        </div>
                        <div class="input-field">
                            <label for="Posisi">Posisi</label>
                            <select name="Posisi" required>
                                <option value="Asisten">Asisten</option>
                                <option value="Programmer">Programmer</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="NPM">NPM</label>
                            <input type="text" name="NPM" id="NPM" value="<?php echo $row['NPM']; ?>" required>
                        </div>
                        <div class="input-field">
                            <label for="Jurusan">Jurusan</label>
                            <input type="text" name="Jurusan" id="Jurusan" value="<?php echo $row['Jurusan']; ?>" required>
                        </div>
                        <div class="input-field">
                            <label for="Lokasi_Kampus">Lokasi Kampus</label>
                            <input type="text" name="Lokasi_Kampus" id="Lokasi_Kampus" value="<?php echo $row['Lokasi_Kampus']; ?>" required>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="input-field">
                            <label for="Tanggal_Lahir">Tempat, Tanggal Lahir</label>
                            <input type="text" name="Tanggal_Lahir" id="Tanggal_Lahir" value="<?php echo $row['Tanggal_Lahir']; ?>" required>
                        </div>
                        <div class="input-field">
                            <label for="Alamat">Alamat</label>
                            <input type="text" name="Alamat" id="Alamat" value="<?php echo $row['Alamat']; ?>" required>
                        </div>
                        <div class="input-field">
                            <label for="Email">Email</label>
                            <input type="text" name="Email" id="Email" value="<?php echo $row['Email']; ?>" required>
                        </div>
                        <div class="input-field">
                            <label for="Jenis_Kelamin">Jenis Kelamin</label>
                            <select name="Jenis_Kelamin" required>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="NoHP">No.Hp</label>
                            <input type="text" name="NoHP" id="NoHP" value="<?php echo $row['NoHP']; ?>" required>
                        </div>
                        <div class="input-field">
                            <label for="IPK_Terakhir">IPK Terakhir</label>
                            <input type="text" name="IPK_Terakhir" id="IPK_Terakhir" value="<?php echo $row['IPK_Terakhir']; ?>" required>
                        </div>
                    </div>
                    <span class="title">Dokumen</span>
                    <div class="fields">
                        <div class="input-field">
                            <label for="cv_filename">CV</label>
                            <input type="file" name="cv_filename" accept=".pdf, .doc, .docx" required>
                        </div>
                        <div class="input-field">
                            <label for="krs_filename">KRS</label>
                            <input type="file" name="krs_filename" accept=".pdf, .doc, .docx" required>
                        </div>
                        <div class="input-field">
                            <label for="pas_foto_filename">Pas Foto</label>
                            <input type="file" name="pas_foto_filename" accept="image/*" required>
                        </div>
                        <div class="input-field">
                            <label for="ktm_filename">KTM</label>
                            <input type="file" name="ktm_filename" accept="image/*" required>
                        </div>
                        <div class="input-field">
                            <label for="ktp_filename">KTP</label>
                            <input type="file" name="ktp_filename" accept=".pdf, .jpg, .jpeg, .png" required>
                        </div>
                        <div class="input-field">
                            <label for="rangkuman_nilai_filename">Rangkuman Nilai</label>
                            <input type="file" name="rangkuman_nilai_filename" accept=".pdf, .doc, .docx" required>
                        </div>
                        <div class="input-field">
                            <label for="certificate_filename">Certificate (Optional)</label>
                            <input type="file" name="certificate_filename" accept=".pdf, .doc, .docx">
                        </div>
                    </div>
                    <button type="submit" class="nextBtn">
                        <span class="btnText">Update</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
