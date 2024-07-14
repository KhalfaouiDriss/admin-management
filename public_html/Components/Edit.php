<?php


require_once '..//Models/Config/Config.php';
include '../Models/api/Fctors.php';

if (!isset($_SESSION["id_admin"])) {
    header("Location: ../index.php");
}
$id_admin = $_SESSION["id_admin"];
// include '../Models/api/admin.php';

$sql = "SELECT COUNT(*) AS nb , categories.name_cat AS name_cat , categories.cat_from_admin AS cat_from_admin FROM `travailleur`, categories WHERE
        travailleur.post = categories.id_cat AND cat_from_admin = '$id_admin'
        GROUP by categories.id_cat";
$res = $conn->query($sql);

$info_admin = "SELECT * FROM `admin` WHERE id_admin = '$id_admin'";
$result_info_admin = mysqli_query($conn, $info_admin);
$result_info_admin_row = mysqli_fetch_array($result_info_admin);

$id_Emp = $_GET['id_emp'];

$sql_emp = "SELECT * FROM `categories` ,travailleur WHERE categories.id_cat = travailleur.post AND travailleur.id = '$id_Emp' ";
$rst_emp = mysqli_query($conn, $sql_emp) or die(mysqli_error());
$data_emp = mysqli_fetch_assoc($rst_emp);



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Modifie des Employees - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
                    <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Modifie des Employees
                        </div>
                        <div class="card-body">
                            <form action="#" method="post" id="UpdateEmp">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" value="<?php echo $data_emp['id'] ?> " name="id_emp">
                                        </div>

                                        <div class="col-6 mb-3 text-start">
                                            <label for="CIN">CIN:</label>
                                            <input type="text" id="CIN" value="<?php echo $data_emp['N_CN'] ?>"
                                                class=" isEmpty  form-control m-2 m-2" name="CIN" required>
                                        </div>

                                        <div class="col-6 mb-3 text-start">
                                            <label for="nom">Nom:</label>
                                            <input type="text" id="nom" value="<?php echo $data_emp['nom'] ?>"
                                                class=" isEmpty  form-control m-2 m-2" name="nom" required>
                                        </div>

                                        <div class="col-6 mb-3 text-start">
                                            <label for="prenom">Prénom:</label>
                                            <input type="text" id="prenom" value="<?php echo $data_emp['prenom'] ?>"
                                                class="isEmpty form-control m-2" name="prenom" required>
                                        </div>

                                        <div class="col-6 mb-3 text-start">
                                            <label for="post">Poste:</label>
                                            <select id="post" class="isEmpty form-control m-2" name="post" required>
                                                <option value="<?php echo $data_emp['post']; ?>" selected>
                                                    <?php echo $data_emp['name_cat'] ?>
                                                </option>

                                                <!-- <option value="">Sélectionner</option> -->
                                                <?php
                                                $sql1 = "SELECT * FROM categories WHERE cat_from_admin = '$id_admin'";

                                                $sel = $conn->query($sql1);
                                                while ($rowSel = mysqli_fetch_assoc($sel)) {
                                                    echo '<option value="' . $rowSel['id_cat'] . '">' . $rowSel['name_cat'] . '</option>';
                                                } ?>
                                            </select>

                                        </div>

                                        <div class="col-6 mb-3 text-start">
                                            <label for="telephone">Téléphone:</label>
                                            <input type="text" id="telephone"
                                                value="<?php echo $data_emp['telephone'] ?>"
                                                class="isEmpty form-control m-2" name="telephone" required>
                                        </div>

                                        <!-- <div class="col-6 mb-3 text-start">
                                            <label for="contract">contract:</label>
                                            <select id="contract" class="isEmpty form-control m-2" name="contract"
                                                required>
                                                <option value="<?php //echo $data_emp['contract']; ?>" selected>
                                                    <?php //echo $data_emp['contract'] ?>
                                                </option>
                                                <option value="">Sélectionner</option>
                                                <option value="JOB+">JOB+</option>
                                                <option value="Atlanta">Atlanta</option>
                                                <option value="assestent">assestent</option>
                                            </select>
                                        </div> -->

                                        <div class="col-6 mb-3 text-start">
                                            <label for="location">Localisation:</label>
                                            <input type="text" id="location" value="<?php echo $data_emp['Location'] ?>"
                                                class="isEmpty form-control m-2" name="location" required>
                                        </div>

                                        <div class="col-6 mb-3 text-start">
                                            <label for="naissance">Date de naissance:</label>
                                            <input type="date" id="naissance" min="1960-01-01" max="2006-12-31"
                                                value="<?php echo $data_emp['naissance'] ?>"
                                                class="isEmpty form-control m-2" name="naissance" required>
                                        </div>

                                        <div class="col-6 mb-3 text-start">
                                            <label for="gender">Genre:</label>
                                            <select id="gender" class="isEmpty form-control m-2" name="gender" required>
                                                <option value="<?php echo $data_emp['gender']; ?>" selected>
                                                    <?php echo $data_emp['gender'] ?>
                                                </option>
                                                <option value="">Sélectionner</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                        <div class="col-6 mb-3 text-start">
                                            <label for="etat">État civil:</label>
                                            <select id="etat" class="isEmpty form-control m-2" name="etat" required>
                                                <!-- <option value="">Sélectionner</option> -->
                                                <option value="<?php echo $data_emp['Etat']; ?>" selected>
                                                    <?php echo $data_emp['Etat'] ?>
                                                </option>
                                                <option value="Celebataire">Celebataire</option>
                                                <option value="en Couple">en Couple</option>
                                                <option value="Other">Outher</option>
                                            </select>
                                        </div>

                                        <div class="col-6 mb-3 text-start">

                                            <label for="niveau">Niveau:</label>
                                            <select id="niveau" class="isEmpty form-control m-2" name="niveau" required>

                                                <option value="<?php echo $data_emp['Neveau']; ?>" selected>
                                                    <?php echo $data_emp['Neveau'] ?>
                                                </option>
                                                <!-- <option value="">Sélectionner</option> -->
                                                <option value="neveau 4 ème">neveau 4<sup>ème</sup></option>
                                                <option value="4 ème">4 <sup>ème</sup></option>
                                                <option value="neveau Bac">neveau Bac</option>
                                                <option value="Bac">Bac</option>
                                                <option value="Bac+">Bac+</option>
                                                <option value="autre">autre</option>

                                            </select>

                                        </div>



                                    </div>
                                </div>
                                <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-primary" onclick="EditEmp()">Save
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
    <!-- <script src="../Controllers/CreatTable.js"></script> -->
    <script src="../Controllers/EditEmp.js"></script>
    <script src="assets/links/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="assets/links/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
<script>
    

</script>

</html>