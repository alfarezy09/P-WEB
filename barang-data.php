<h3> Data barang </h3>

<table border="1">
    <tr>
        <th>No</th>
        <th>Kode makanan</th>
        <th>Nama makanan</th>
        <th>Harga</th>
    </tr>

<?php
include "koneksi.php";

    $no=1;
    $ambildata = mysqli_query($koneksi,"select * from barang");
    /* While untuk mengulang*/
    while($tampil = mysqli_fetch_array($ambildata)){
        echo"
        <tr>
            <td>$no</td>
            <td>$tampil[kode_makanan]</td>
            <td>$tampil[nama_makanan]</td>
            <td>$tampil[harga_makanan]</td>
        </tr>";
        $no++;
    }
?>
</table>
