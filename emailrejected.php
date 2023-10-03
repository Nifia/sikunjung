<!-- KONFIRMASI EMAIL DITOLAK -->
<?php
include 'koneksi.php';
use PHPMailer\PHPMailer\PHPMailer;

// Include PHPMailer Library
include('asset/PHPMailer/Exception.php');
include('asset/PHPMailer/PHPMailer.php');
include('asset/PHPMailer/SMTP.php');

$id = $_GET['id'];

// Ambil data tamu berdasarkan ID
$ambilDataTamu = mysqli_query($koneksi, "SELECT * FROM ttamu WHERE id = '$id'");
$dataTamu = mysqli_fetch_array($ambilDataTamu);

if ($koneksi) {
    $id_user = $_GET['id_user'];
    $nama = $_GET['nama'];

    // Ambil data user berdasarkan ID User
    $ambilDataUser = mysqli_query($koneksi, "SELECT * FROM tuser WHERE id_user='$id_user'");
    $dataUser = mysqli_fetch_array($ambilDataUser);


    $id = $_GET['id'];
    $keterangan = isset($_POST['keterangan_rejected']) ? $_POST['keterangan_rejected'] : "";
    $updateReject = "UPDATE ttamu SET status_kunjungan='Rejected', keterangan_rejected='$keterangan' WHERE id='$id'";
    $Reject = mysqli_query($koneksi, $updateReject);

    if ($Reject) {
        $email_pengirim = 'syufriananifia@gmail.com';
        $nama_pengirim = 'Nifia Syufriana';
        $email_penerima = $dataUser['email'];
        $subjek = 'Konfirmasi Kunjungan Tamu - Diskominfo KEPRI';

        $pesan = "<p><strong>Dear</strong> " . $dataTamu['nama']  ."</p>";
        $pengaturan_tanggal = date('d-m-Y', strtotime($dataTamu['tanggal']));
        $pesan .= "<p>Kami dengan ini memberitahukan bahwa kunjungan tamu yang diajukan pada tanggal " . $pengaturan_tanggal .  " telah dikonfirmasi.
            Berikut ini adalah rincian terkait konfirmasi kunjungan: </p>";
        $pesan .= "<p><strong>Status : </strong> DITOLAK </p>";
        $pesan .= "<p><strong>Perihal: </strong> " . $keterangan .
            "<p>Kami mohon maaf atas ketidaknyamanan yang mungkin timbul akibat penolakan kunjungan ini. </p>".
            "<p> Terima kasih atas pengertian dan kerjasamanya. </p>" .
            "<br>" .
            "<p>Hormat kami,</p>" .
            "<p><strong>Dinas Komunikasi dan Informatika Provinsi Kepulauan Riau</strong></p> ";

        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $email_pengirim;
        $mail->Password = 'bdwvmqqqbufoffne';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->SMTPDebug = 2;

        $mail->setFrom($email_penerima, $email_pengirim);
        $mail->addAddress($email_penerima);
        $mail->isHTML(true);
        $mail->Subject = $subjek;
        $mail->Body = $pesan;

        $send = $mail->send();

        if ($send) {
            echo "Mengirim Konfirmasi Ditolak Kepada User";
        } else {
            echo "Gagal, mengirim Konfirmasi";
        }
        echo "<script>alert('Konfirmasi Berhasil dikirimkan melalui email user');
                document.location = 'rekapitulasi.php'</script>";
    }
}
?>