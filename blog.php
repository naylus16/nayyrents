<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
    if($_GET['cari'])
    {
        $cari = strip_tags($_GET['cari']);
        $query =  $koneksi -> query('SELECT * FROM mobil WHERE merk LIKE "%'.$cari.'%" ORDER BY id_mobil DESC')->fetchAll();
    }else{
        $query =  $koneksi -> query('SELECT * FROM mobil ORDER BY id_mobil DESC')->fetchAll();
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <style>
        body {
            background: url('assets/image/bg1.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: arial;
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
            margin-bottom: 20px; /* Added margin for spacing between cards */
        }
        .card-body {
            padding: 20px;
        }
        .img {
            border-radius: 50%;
        }
        h2 {
            font-weight: bold;
        }
        .title-text {
            font-weight: bold;
            color: white;
            text-align: center;
            margin-bottom: 20px; /* Added margin for spacing between title and content */
        }
        .row {
            margin-bottom: 20px; /* Added margin for spacing between rows */
        }
        .col-sm-4 {
            margin-bottom: 20px; /* Added margin for spacing between columns */
        }
    </style>
</head>
<br>
<br>
<div class="container">
<div class="row">
    <div class="col-sm-12">
        <?php 
            if($_GET['cari'])
            {
                echo '<h4 class="title-text">Keyword Pencarian : '.$cari.'</h4>';
            }else{
                echo '<h4 class="title-text">Semua Mobil</h4>';
            }
        ?>
        <div class="row mt-3">
        <?php 
            $no =1;
            foreach($query as $isi)
            {
        ?>
            <div class="col-sm-4">
                <div class="card">
                <img src="assets/image/<?php echo $isi['gambar'];?>" class="card-img-top" style="height:200px;object-fit:cover;">
                    <div class="card-body" style="background:#ddd">
                        <h5 class="card-title"><?php echo $isi['merk'];?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if($isi['status'] == 'Tersedia'){?>
                            <li class="list-group-item bg-primary text-white">
                                <i class="fa fa-check"></i> Available
                            </li>
                        <?php }else{?>
                            <li class="list-group-item bg-danger text-white">
                                <i class="fa fa-close"></i> Not Available
                            </li>
                        <?php }?>
                        <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> Free E-toll 50k</li>
                        <li class="list-group-item bg-dark text-white">
                            <i class="fa fa-money"></i> Rp. <?php echo number_format($isi['harga']);?>/ day
                        </li>
                    </ul>
                    <div class="card-body">
                        <center>
                            <a href="booking.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-success">Booking now!</a>
                            <a href="detail.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-info">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            <?php $no++;}?>
        </div>
    </div>
</div>
</div>

<br>

<br>

<br>

<?php include 'footer.php';?>
