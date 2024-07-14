<?php
require_once '../Models/Config/Config.php';
include '../Models/api/Fctors.php';

if (!isset($_SESSION["id_admin"])) {
  header("Location: ../index.php");
}
$id_admin = $_SESSION["id_admin"];

$info_admin = "SELECT * FROM `admin` WHERE id_admin = '$id_admin'";
$result_info_admin = mysqli_query($conn, $info_admin);
$result_info_admin_row = mysqli_fetch_array($result_info_admin);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Sitting - SB Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    .color-preview {
      height: 20px;
      width: 40px;
      border-radius: 10%;
      display: inline-block;
      margin-left: 10px;
      border: 1px solid #ccc;
    }

    #imgs {
      visibility: hidden;
    }
  </style>

</head>

<body class="sb-nav-fixed">
  <?php include ("navbar.php"); ?>
  <div id="layoutSidenav">
    <?php include ("sidebar.php"); ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">Tables</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Modifie Votre information
            </div>
            <div class="card-body">
              <form action="../Models/update/upload_img.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="imgs" id="imgs">
                <button type="submit" id="add_imgs" name="add_imgs" hidden></button>
              </form>
              <form action="#" method="post" id="UpdateAdmin">
                <div class="modal-body">

                  <div class="row">
                    <div class="col-12">
                      <input type="hidden" value="<?php echo $result_info_admin_row['id_admin'] ?> " name="id_emp">
                    </div>

                    <div class="col-12 row mb-3 justify-content-center">
                      <div class="col-sm-10 col-xl-4 row text-center justify-content-center align-items-center">
                        <label for="imgs">
                          <img class="col-6"  style="border-radius:50%;max-width:100px; min-heigth:100px"
                            src="assets/img/img_admin/<?php echo $result_info_admin_row['img'] ?>" alt="">
                        </label>
                        <label for="add_imgs"><span class="btn btn-secondary m-2">Upload</span></label>
                      </div>
                    </div>


                    <div class="col-6 mb-3 text-start">
                      <label for="nom">Nom et prenom:</label>
                      <input type="text" id="fullname" value="<?php echo $result_info_admin_row['fullname'] ?>"
                        class=" isEmpty  form-control m-2 m-2" name="fullname" required>
                    </div>

                    <div class="col-6 mb-3 text-start">
                      <label for="email">email</label>
                      <input type="email" id="email" value="<?php echo $result_info_admin_row['email'] ?>"
                        class=" isEmpty  form-control m-2 m-2" name="email" disabled>
                    </div>

                    <div class="col-6 mb-3 text-start">
                      <label for="nom">Nom Utilisateur:</label>
                      <input type="text" id="username" value="<?php echo $result_info_admin_row['username'] ?>"
                        class=" isEmpty  form-control m-2 m-2" name="username" required>
                    </div>

                    <!-- <div class="col-6 mb-3 text-start">
                      <label for="nom">Email:</label>
                      <input type="text" id="email" value="<?php echo $result_info_admin_row['email'] ?>"
                        class=" isEmpty  form-control m-2 m-2" name="email" disabled required>
                    </div> -->

                    <div class="col-6 mb-3 text-start">
                      <label for="nom">Password:</label>
                      <input type="text" id="password" value="<?php echo $result_info_admin_row['password'] ?>"
                        class=" isEmpty  form-control m-2 m-2" name="password" required>
                    </div>

                    <div class="col-6 mb-3 text-start">
                      <label>nom de entreprise:</label>
                      <input type="text" id="company_name" value="<?php echo $result_info_admin_row['company_name'] ?>"
                        class=" isEmpty  form-control m-2 m-2" name="company_name" required>
                    </div>

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" id="submitBtn" onclick="EditadminX()" class="btn btn-primary">Save
                    changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
      <?php include ("footer.php"); ?>
    </div>
  </div>
  <script>
  </script>
  <script src="../Controllers/Editadmin.js"></script>
  <script src="assets/links/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="assets/links/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>
<script>


</script>

</html>