<?php

    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
    if(empty($_SESSION['USER']))
    {
        echo '<script>alert("Harap Login");window.location="index.php"</script>';
    }
    $kode_booking = $_GET['id'];
    $hasil = $koneksi->query("SELECT * FROM booking WHERE kode_booking = '$kode_booking'")->fetch();

    $id = $hasil['id_mobil'];
    $isi = $koneksi->query("SELECT * FROM mobil WHERE id_mobil = '$id'")->fetch();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <style>
        body {
            background: url('assets/image/bg1.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #3a3b39;
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .container {
            padding: 20px;
        }
        .card {
            background: rgba(255, 255, 255, 0.8); /* Slightly transparent background for readability */
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card-body {
            padding: 30px; /* Increased padding for card body */
        }
        .img {
            border-radius: 50%;
        }
        h2 {
            font-weight: bold;
        }
        .btn-primary a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<br>
<br>
<div class="container">
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body text-center">
                <h5 style="font-weight: bold;">Pembayaran Dapat Melalui :</h5>
                <hr/>
                <p><?= $info_web->no_rek;?></p>
                <button class="btn btn-primary">
                    <a href="https://link.dana.id/minta/2u3nfv2qvv3">Atau Klik Disini</a>
                </button>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
         <div class="card">
           <div class="card-body">
               <form method="post" action="koneksi/proses.php?id=konfirmasi">
                    <table class="table">
                        <tr>
                            <td>Kode Booking  </td>
                            <td> :</td>
                            <td><?php echo $hasil['kode_booking'];?></td>
                        </tr>
                        <tr>
                            <td>No Rekening   </td>
                            <td> :</td>
                            <td><input type="text" name="no_rekening" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Atas Nama </td>
                            <td> :</td>
                            <td><input type="text" name="nama" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Nominal  </td>
                            <td> :</td>
                            <td><input type="text" name="nominal" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tanggal  Transfer</td>
                            <td> :</td>
                            <td><input type="date" name="tgl" required class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Total yg Harus di Bayar </td>
                            <td> :</td>
                            <td>Rp. <?php echo number_format($hasil['total_harga']);?></td>
                        </tr>
                    </table>
                    <input type="hidden" name="id_booking" value="<?php echo $hasil['id_booking'];?>">
                    <button type="submit" class="btn btn-primary float-right">Kirim</button>
               <a href="https://wa.me/0895703015370" class="btn btn-primary">Kirim Bukti Pembayaran Disini</a>
               </form>
           </div>
         </div> 
    </div>
</div>
</div>
<br>
<br>
<br>

<?php include 'footer.php';?>