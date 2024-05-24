<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "labpsi";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM registrations WHERE Nama LIKE '%$search%' OR NPM LIKE '%$search%' OR Kelas LIKE '%$search%' OR Jurusan LIKE '%$search%'";

    $result = $conn->query($sql);

    if ($result === false) {
        die("Invalid query: " . $conn->error);
    }
} else {
    $result = null;
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="search-results">
            <h1>Search Results</h1> 
            <div class="search-container">
                <form action="search.php" method="GET">
                    <label for="search">Search:</label>
                    <input type="text" name="search" id="search" placeholder="Enter keyword" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit">Search</button>
                </form>
            </div>
            <br>
            <div class="results-container">
                <?php
                if ($result && $result->num_rows > 0) {
                    echo "<table>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>No</th>";
                    echo "<th>Nama</th>";
                    echo "<th>NPM</th>";
                    echo "<th>Kelas</th>";
                    echo "<th>Jurusan</th>";
                    echo "<th>Lokasi Kampus</th>";
                    echo "<th>TTL</th>";
                    echo "<th>Jenis Kelamin</th>";
                    echo "<th>Alamat</th>";
                    echo "<th>No.Hp</th>";
                    echo "<th>Email</th>";
                    echo "<th>Posisi</th>";
                    echo "<th>IPK Terakhir</th>";
                    echo "<th></th>";
                    echo "<th></th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    $count = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $count . "</td>";
                        echo "<td>" . $row['Nama'] . "</td>";
                        echo "<td>" . $row['NPM'] . "</td>";
                        echo "<td>" . $row['Kelas'] . "</td>";
                        echo "<td>" . $row['Jurusan'] . "</td>";
                        echo "<td>" . $row['Lokasi_Kampus'] . "</td>";
                        echo "<td>" . $row['Tanggal_Lahir'] . "</td>";
                        echo "<td>" . $row['Jenis_Kelamin'] . "</td>";
                        echo "<td>" . $row['Alamat'] . "</td>";
                        echo "<td>" . $row['NoHP'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['Posisi'] . "</td>";
                        echo "<td>" . $row['IPK_Terakhir'] . "</td>";
                        echo "<td><a class='btn btn-primary btn-sm' href='update.php?id=" . $row["id"] . "'>Update</a></td>";
                        echo "<td><a class='btn btn-danger btn-sm' href='delete.php?id=" . $row["id"] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a></td>";
                        echo "</tr>";
                        $count++;
                    }

                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p>No results found.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
