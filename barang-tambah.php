<?php
include 'koneksi.php';
?>
<link rel="stylesheet" href="style.css">
<h3> Tambah Barang</h3>
<form action="" method="post">
    <table>
        <tr>
            <td width="120"> Kode makanan</td>
            <td> <input type="text" name="kode_makanan"> </td>
        </tr>
        <tr>
            <td> Nama makanan </td>
            <td> <input type="text" name="nama_makanan"> </td>
        </tr>
        <tr>
            <td> Harga </td>
            <td> <input type="text" name="harga_makanan"> </td>
        </tr>
        <tr>
            <td></td>
            <td> <input type="submit" name="proses" value="Simpan"> </td>
        </tr>
    </table>
</form>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi,"insert into barang set
    kode_makanan = '$_POST[kode_makanan]',
    nama_makanan = '$_POST[nama_makanan]',
    harga_makanan = '$_POST[harga_makanan]'");

echo "Data baru telah di tersimpan";
echo "<meta http-equiv=refresh content=2;URL='barang-tambah.php>'";
}
?>
<table border="1">
    <tr>
        <th>No</th>
        <th width="100">Kode makanan</th>
        <th width="200">Nama makanan</th>
        <th width="150">Harga</th>
        <th colspan="2">Aksi</th>
    </tr>

<?php
include "koneksi.php";

    $no=1;
    $ambildata = mysqli_query($koneksi,"select * from barang");
    /* While untuk mengulang*/
    while($tampil = mysqli_fetch_array($ambildata)){
        $warna = ($no%2==1)?"skyblue":"aquamarine";
        echo"
        <tr bgcolor='$warna'>
            <td align=center>$no</td>
            <td align=center>$tampil[kode_makanan]</td>
            <td align=center>$tampil[nama_makanan]</td>
            <td align=center>$tampil[harga_makanan]</td>
            <td><a href='?kode=$tampil[kode_makanan]'><input type='button' class='btn-delete'></a></td>
            <td><a href='barang-ubah.php?kode=$tampil[kode_makanan]'><input type='button' class='btn-update'></a></td>
        </tr>";
        $no++;
    }
?>
    </table>
<?php
if (isset($_GET['kode'])){
    mysqli_query($koneksi,"delete from barang where kode_makanan='$_GET[kode]'");
    echo "data telah dihapus";
    echo "<meta http-equiv=refresh content=2;URL='barang-tambah.php>'";
}
?>
