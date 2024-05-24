<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Registration Form</title>
</head>
<body>
    <div class="container">
        <h1>Formulir Pendaftaran</h1>
        <form action="create.php" method="POST" >
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Data Mahasiswa</span>
                        <div class="fields">
                            <div class="input-field">
                                <label for="Nama">Nama Lengkap</label>
                                <input type="text" name="Nama" id="Nama" required>
                            </div>
                            <div class="input-field">
                                <label for="Kelas">Kelas</label>
                                <input type="text" name="Kelas" id="Kelas" required>
                            </div>
                            <div class="input-field">
                                <label for="Posisi">Posisi</label>
                                <select  name="Posisi" id="Posisi" required>
                                    <option value="Asisten">Asisten</option>
                                    <option value="Programmer">Programmer</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="NPM">NPM</label>
                                <input type="text" name="NPM" id="NPM" required>
                            </div>
                            <div class="input-field">
                                <label for="Jurusan">Jurusan</label>
                                <input type="text" name="Jurusan" id="Jurusan" required>
                            </div>
                            <div class="input-field">
                                <label for="Lokasi_Kampus">Lokasi Kampus</label>
                                <input type="text" name="Lokasi_Kampus" id="Lokasi_Kampus" required>
                            </div>
                        </div>
                    </div>
                    <div class="details ID">
                        <span class="title">Data Individu</span>
                        <div class="fields">
                            <div class="input-field">
                                <label for="Tanggal_Lahir">Tempat, Tanggal Lahir</label>
                                <input type="text" name="Tanggal_Lahir" id="Tanggal_Lahir" required>
                            </div>
                            <div class="input-field">
                                <label for="Alamat">Alamat</label>
                                <input type="text" name="Alamat" id="Alamat" required>
                            </div>
                            <div class="input-field">
                                <label for="Email">Email</label>
                                <input type="text" name="Email" id="Email" required>
                            </div>
                            <div class="input-field">
                                <label for="Jenis_Kelamin">Jenis Kelamin</label>
                                <select name="Jenis_Kelamin" id="Jenis_Kelamin" required>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label for="NoHP">No.Hp</label>
                                <input type="text" name="NoHP" id="NoHP" required>
                            </div>
                            <div class="input-field">
                                <label for="IPK_Terakhir">IPK Terakhir</label>
                                <input type="text" name="IPK_Terakhir" id="IPK_Terakhir" required>
                            </div>
                        </div>
                    </div>
                    <div class="details personal">
                    <span class="title">Dokumen</span>
                    <div class="fields">
                        <div class="input-field">
                            <label for="cv_filename">CV</label>
                            <input type="file" name="cv_filename" id="cv_filename" accept=".pdf, .doc, .docx" required>
                        </div>
                        <div class="input-field">
                            <label for="krs_filename">KRS</label>
                            <input type="file" name="krs_filename" id="krs_filename" accept=".pdf, .doc, .docx" required>
                        </div>
                        <div class="input-field">
                            <label for="pas_foto_filename">Pas Foto</label>
                            <input type="file" name="pas_foto_filename" id="pas_foto_filename" accept="image/*" required>
                        </div>
                        <div class="input-field">
                            <label for="ktm_filename">KTM</label>
                            <input type="file" name="pas_foto_filename" id="pas_foto_filename" accept="image/*" required>
                        </div>
                        <div class="input-field">
                            <label for="ktp_filename">KTP</label>
                            <input type="file" name="ktp_filename" id="ktp_filename" accept=".pdf, .jpg, .jpeg, .png" required>
                        </div>
                        <div class="input-field">
                            <label for="rangkuman_nilai_filename">Rangkuman Nilai</label>
                            <input type="file" name="rangkuman_nilai_filename" id="rangkuman_nilai_filename" accept=".pdf, .doc, .docx" required>
                        </div>
                        <div class="input-field">
                            <label for="certificate_filename">Certificate (Optional)</label>
                            <input type="file" name="certificate_filename" id="certificate_filename" accept=".pdf, .doc, .docx">
                        </div>
                    </div>
                </div>
                <button type="submit" class="nextBtn" formaction="create.php">
                            <span class="btnText">Submit</span>
                    </button>
                </div>
            </form>
        </div>
</body>
</html>
