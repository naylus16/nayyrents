<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
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
            width: 100%; /* Ensures card body takes full width of the container */
        }
        .card-header {
            font-weight: bold;
            text-align: center;
            padding: 10px; /* Additional padding for header */
        }
        .contact-row {
            margin-top: 10px;
        }
        .contact-row img {
            margin-right: 10px;
            vertical-align: middle;
        }
        .contact-link {
            color: #000;
            text-decoration: none;
        }
        .contact-link:hover {
            text-decoration: underline;
        }
        h2{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-7 mx-auto"> <!-- Changed col size to 8 for a wider card -->
                <div class="card">
                    <div class="card-header">
                        Kontak Kami
                    </div>
                    <div class="card-body">
                        <center>
                        <p>Ada pertanyaan atau butuh bantuan? Tim kami siap membantu Anda. <br> Hubungi kami dengan meng-klik kontak di bawah ini.</p>
                        </center>
                        <div class="row contact-row">
                            <div class="col-sm-4">
                                <img src="assets/image/gmail.png" alt="Email" style="width: 30px; height: 25px;"> Email 
                            </div>
                            <div class="col-sm-8">
                                <a href="mailto:onesolution309@gmail.com" class="contact-link">: Nayrents309@gmail.com</a>
                            </div>
                        </div>
                        <div class="row contact-row">
                            <div class="col-sm-4">
                                <img src="assets/image/wa.png" alt="Telepon" style="width: 25px; height: 25px;"> Telepon
                            </div>
                            <div class="col-sm-8">
                                <a href="https://wa.me/0895703015370" class="contact-link">: 0895703015370</a>
                            </div>
                        </div>
                        <div class="row contact-row">
                            <div class="col-sm-4">
                                <img src="assets/image/ig.png" alt="Instagram" style="width: 25px; height: 25px;"> Instagram
                            </div>
                            <div class="col-sm-8">
                                <a href="https://www.instagram.com/NayRents/?authuser=0" class="contact-link">: @NayRents</a>
                            </div>
                        </div>
                        <div class="row contact-row">
                            <div class="col-sm-4">
                                <img src="assets/image/fb.png" alt="Facebook" style="width: 25px; height: 25px;"> Facebook
                            </div>
                            <div class="col-sm-8">
                                <a href="https://www.facebook.com/NayRentsauthuser=0" class="contact-link">: NayRents</a>
                            </div>
                        </div>
                        <div class="row contact-row">
                            <div class="col-sm-4">
                                <img src="assets/image/dana.jpg" alt="No Rekening" style="width: 25px; height: 25px;"> No Rekening
                            </div>
                            <div class="col-sm-8"><a href="https://link.dana.id/minta/2u3nfv2qvv3" class="contact-link">: <?= $info_web->no_rek; ?></a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>
</html>
