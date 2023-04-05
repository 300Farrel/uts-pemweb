<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bulan = $_POST["bulan"];

    $sql = "SELECT * FROM perjalanan WHERE MONTH(tanggal)='$bulan'";
    $result = mysqli_query($conn, $sql);

    $jumlah_km = 0;
    $pendapatan = 0;

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $jumlah_km += $row["jarak"];
            if ($row["id_driver"] != NULL) {
                $pendapatan += $row["jarak"] * 3000;
            }
            if ($row["id_kondektur"] != NULL) {
                $pendapatan += $row["jarak"] * 1500;
            }
        }
        echo "Total KM: " . $jumlah_km . "<br>";
        echo "Pendapatan: " . $pendapatan . "<br>";
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Bulan:
    <select name="bulan">
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select><br>
    <input type="submit" name="submit" value="Submit">

</form>