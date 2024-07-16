<?php
session_start();
require 'koneksi/koneksi.php';
include 'header.php';

if (empty($_SESSION['USER'])) {
    echo '<script>alert("Harap Login");window.location="index.php"</script>';
    exit;
}

if (!empty($_POST['nama_pengguna'])) {
    try {
        $data[] = htmlspecialchars($_POST["nama_pengguna"]);
        $data[] = htmlspecialchars($_POST["username"]);
        $data[] = md5($_POST["password"]);
        $data[] = $_SESSION['USER']['id_login'];
        $sql = "UPDATE login SET nama_pengguna = ?, username = ?, password = ? WHERE id_login = ?";
        $row = $koneksi->prepare($sql);
        $row->execute($data);

        // Handle profile picture upload
        if (!empty($_FILES['profile_picture']['name'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo '<script>alert("File is not an image.");</script>';
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["profile_picture"]["size"] > 500000) {
                echo '<script>alert("Sorry, your file is too large.");</script>';
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>';
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo '<script>alert("Sorry, your file was not uploaded.");</script>';
            } else {
                if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE login SET profile_picture = ? WHERE id_login = ?";
                    $row = $koneksi->prepare($sql);
                    $row->execute([$target_file, $_SESSION['USER']['id_login']]);
                    echo '<script>alert("The file '. htmlspecialchars(basename($_FILES["profile_picture"]["name"])). ' has been uploaded.");</script>';
                } else {
                    echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
                }
            }
        }

        echo '<script>alert("Update Data Profil Berhasil !");window.location="profil.php"</script>';
    } catch (Exception $e) {
        echo '<script>alert("Error: '. $e->getMessage() .'");</script>';
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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
            background: rgba(255, 255, 255, 0.9);
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .card-body {
            padding: 20px;
        }
        .profile-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-container img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 3px solid #007bff;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-container">
                            <?php
                                $id = $_SESSION["USER"]["id_login"];
                                $sql = "SELECT * FROM login WHERE id_login = ?";
                                $row = $koneksi->prepare($sql);
                                $row->execute(array($id));
                                $edit_profil = $row->fetch(PDO::FETCH_OBJ);
                                $profile_picture = $edit_profil->profile_picture ? $edit_profil->profile_picture : 'assets/image/Cincin Perkawinan.jpg';
                            ?>
                            <img src="<?= $profile_picture ?>" alt="Profile Picture">
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="profile_picture">Profile Picture</label>
                                <input type="file" class="form-control" name="profile_picture" id="profile_picture">
                            </div>
                            <div class="form-group">
                                <label for="nama_pengguna">Nama Pengguna</label>
                                <input type="text" class="form-control" value="<?= $edit_profil->nama_pengguna;?>" name="nama_pengguna" id="nama_pengguna" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" required class="form-control" value="<?= $edit_profil->username;?>" name="username" id="username" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" required class="form-control" value="" name="password" id="password" placeholder=""/>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
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
</body>
</html>
