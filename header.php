<!doctype html>
<html lang="en">
<head>
    <title>NayRents | Rental Mobil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <style>
        .header-logo {
            font-weight: bold;
            font-size: 24px;
            text-transform: uppercase;
        }
        .nav-link {
            font-weight: 600; /* Semi-bold */
            transition: background-color 0.3s;
        }
        .nav-link:hover,
        .nav-link:focus {
            background-color: #f0f0f0; /* Light gray background color */
            color: #000; /* Black text color */
        }
    </style>
</head>
<body>
    <div class="jumbotron pt-3 pb-3">
        <div class="row">
            <div class="col-sm-8">
                <h2>
                    <img src="assets/image/logo.png" alt="" style="height: 50px; width: 130px">
                    <span class="header-logo"><?= $info_web->nama_rental; ?></span>
                </h2>
            </div>
            <div class="col-sm-4">
                <form class="form-inline" method="get" action="blog.php">
                    <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari Nama Paket" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div style="margin-top:-2pc"></div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="blog.php">Daftar Paket</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="kontak.php">Kontak Kami</a>
                </li>
                <?php if (!empty($_SESSION['USER'])) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="history.php">History Pembayaran</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="profil.php">Profil</a>
                    </li>
                <?php } ?>
            </ul>
            <?php if (!empty($_SESSION['USER'])) { ?>
                <ul class="navbar-nav my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-user"> </i> Hallo, <?php echo $_SESSION['USER']['nama_pengguna']; ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="return confirm('Apakah anda ingin logout ?');"
                            href="<?php echo $url; ?>admin/logout.php">Logout</a>
                    </li>
                </ul>
            <?php } else { ?>
                <a class="nav-link" href="#login-section">
                    Login
                </a>
            <?php } ?>
        </div>
    </nav>
    <!-- Your other content goes here -->
</body>
</html>
