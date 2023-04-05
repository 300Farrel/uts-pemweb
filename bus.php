<?php
include "koneksi.php";

$sql = "SELECT * FROM bus";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Nomor Bus: " . $row["id_bus"]. " - Status: " . $row["status"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_bus = $_POST["id_bus"];
    $status = $_POST["status"];

    $sql = "INSERT INTO bus (id_bus, status) VALUES ('$id_bus', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nomor Bus: <input type="text" name="id_bus"><br>
    Status:
    <select name="status">
        <option value="0">Rusak</option>
        <option value="1">Aktif</option>
        <option value="2">Cadangan</option>
    </select><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_bus = $_POST["id_bus"];
    $status = $_POST["status"];

    $sql = "UPDATE bus SET status='$status' WHERE id_bus='$id_bus'";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nomor Bus: <input type="text" name="id_bus"><br>
    Status:
    <select name="status">
        <option value="0">Rusak</option>
        <option value="1">Aktif</option>
        <option value="2">Cadangan</option>
    </select><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_bus = $_POST["id_bus"];

    $sql = "DELETE FROM bus WHERE id_bus='$id_bus'";

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nomor Bus: <input type="text" name="id_bus"><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
include "koneksi.php";

$status = isset($_GET["status"]) ? $_GET["status"] : "";

$sql = "SELECT * FROM bus";
if ($status != "") {
    $sql .= " WHERE status='$status'";
}
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Nomor Bus</th><th>Jenis Bus</th><th>Tahun Produksi</th><th>Status</th><th>KM Total</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $status_text = "";
        $status_color = "";
        switch ($row["status"]) {
            case 0:
                $status_text = "Rusak";
                $status_color = "red";
                break;
            case 1:
                $status_text = "Aktif";
                $status_color = "green";
                break;
            case 2:
                $status_text = "Cadangan";
                $status_color = "yellow";
                break;
        }
        echo "<tr style='background-color: ".$status_color."'><td>".$row["id_bus"]."</td><td>".$row["jenis_bus"]."</td><td>".$row["tahun_produksi"]."</td><td>".$status_text."</td><td>".$row["jumlah_km"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Filter:
    <select name="status">
        <option value="">Semua</option>
        <option value="0">Rusak</option>
        <option value="1">Aktif</option>
        <option value="2">Cadangan</option>
    </select><br>
    <input type="submit" name="submit" value="Submit">
</form>
