<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
    <div class="search-results">
            <h1>Data Pendaftaran</h1>
            <div class="search-container">
                <form action="search.php" method="GET">
                    <label for="search">Search:</label>
                    <input type="text" name="search" id="search" placeholder="Enter keyword" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit" class="hero-btn">Search</button>
                </form>
                <br>
                <a href="pdf.php?search=<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" class="button">Export Data</a>
            </div>
            <div class="tbl-container">
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Lokasi Kampus</th>
                            <th>TTL</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>NoHP</th>
                            <th>Email</th>
                            <th>Posisi</th>
                            <th>IPK Terakhir</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $host = "localhost";
                        $user = "root";
                        $password = "";
                        $db = "labpsi";

                        $data = new mysqli($host, $user, $password, $db);
                        if ($data->connect_error) {
                            die("Connection error: " . $data->connect_error);
                        }

                        $sql = "SELECT * FROM registrations";
                        $result = $data->query($sql);

                        if ($result === false) {
                            die("Invalid query: " . $data->error);
                        }

                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?= $row["id"] ?></td>
                                <td><?= htmlspecialchars($row["Nama"]) ?></td>
                                <td><?= htmlspecialchars($row["NPM"]) ?></td>
                                <td><?= htmlspecialchars($row["Kelas"]) ?></td>
                                <td><?= htmlspecialchars($row["Jurusan"]) ?></td>
                                <td><?= htmlspecialchars($row["Lokasi_Kampus"]) ?></td>
                                <td><?= htmlspecialchars($row["Tanggal_Lahir"]) ?></td>
                                <td><?= htmlspecialchars($row["Jenis_Kelamin"]) ?></td>
                                <td><?= htmlspecialchars($row["Alamat"]) ?></td>
                                <td><?= htmlspecialchars($row["NoHP"]) ?></td>
                                <td><?= htmlspecialchars($row["Email"]) ?></td>
                                <td><?= htmlspecialchars($row["Posisi"]) ?></td>
                                <td><?= htmlspecialchars($row["IPK_Terakhir"]) ?></td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='update.php?id=<?= $row["id"] ?>'>Update</a>
                                </td>
                                <td>
                                    <a class='btn btn-danger btn-sm' href='delete.php?id=<?= $row["id"] ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }

                        $data->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
