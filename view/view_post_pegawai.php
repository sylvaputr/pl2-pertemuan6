<?php
session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token']
?>

<h1>Input Pegawai</h1>
<form action="" method="POST">
    <input type="hidden" name="csrf_token" value="<?= $token ?>" />
    <table>
        <tr>
            <td>Nomor Induk pegawai</td>
            <td>
                <Input type="text" name="nip">
            </td>
        </tr>
        <tr>
            <td>Nama Pegawai</td>
            <td>
                <Input type="text" name="nama">
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
                <input type="radio" name="jns_kel" <?php if (isset($jns_kel) && $jns_kel == "Laki-laki") echo "checked"; ?> value="Laki-laki">Laki-laki
                <input type="radio" name="jns_kel" <?php if (isset($jns_kel) && $jns_kel == "Perempuan") echo "checked"; ?> value="Perempuan">Perempuan
            </td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>
                <input type="date" name="tgl_lahir">
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <input type="radio" name="status" <?php if (isset($status) && $status == "0") echo "checked"; ?> value="0">Menikah
                <input type="radio" name="status" <?php if (isset($status) && $status == "1") echo "checked"; ?> value="1">Belum Menikah
            </td>
        </tr>
        <tr>
            <td>Tanggal Masuk</td>
            <td>
                <input type="date" name="mulai_kerja">
            </td>
        </tr>
    </table>
    <input type="submit" name="proses" value="Simpan">
</form>

<?php
if (isset($_POST['proses'])) {
    if ($_POST['csrf_token'] == $_SESSION['token']) {
        //Get class controller
        $main = new controller();

        //Call insert function on controller
        $main->insert();
    }
}
?>
