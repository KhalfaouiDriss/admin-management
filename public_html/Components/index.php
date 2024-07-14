<?php

require_once '../Models/Config/Config.php';
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
$result_info_admin_row = mysqli_fetch_array($result_info_admin)



    ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
        <?php echo $result_info_admin_row['company_name'] ?> - DASH Admin
    </title>
    <link href="assets/links/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- <link href="css/AjeuterEmp.css" rel="stylesheet" /> -->
    <script src="assets/links/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .img-admin {
            height: 35px;
            width: 35px;
            border-radius: 50%;
        }

       

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="sb-nav-fixed">

    <?php include ("navbar.php"); ?>
    <div id="layoutSidenav">
        <?php include ("sidebar.php"); ?>
        <!-- ----model new section------- -->
        <div class="modal fade" id="New_Cat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Titre Modal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../Models/insert/newSection.php" method="post" id="New_Cat_form">
                            <div class="row">
                                <div class="col-12 mb-3 text-start">
                                    <div class="mb-3"><b>Nom de la Catégorie:</b></div>
                                    <input type="text" name="section" required class="form-control"
                                        placeholder="Nom de la Catégorie">
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" onclick="newSection();" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ----model suprim section------- -->

        <div class="modal fade" id="Sup_Cat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post" id="Sup_Cat_form">
                            <div class="col-6 mb-3 text-start">
                                <label for="post">Poste:</label>
                                <select id="post" class="isEmpty form-control m-2" name="section_P_S" required>
                                    <option value="">Sélectionner</option>
                                    <?php
                                    $sql1 = "SELECT * FROM categories WHERE cat_from_admin = '$id_admin'";

                                    $sel = $conn->query($sql1);
                                    while ($rowSel = mysqli_fetch_assoc($sel)) {
                                        echo '<option value="' . $rowSel['id_cat'] . '">' . $rowSel['name_cat'] . '</option>';
                                    } ?>
                                </select>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" onclick="SupSection();" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tableau de bord</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Tableau de bord</li>
                    </ol>
                    <div class="row">

                        <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                            if ($row['nb'] > 0) {
                                ?>
                                <div class="col-xl-3 col-md-6 col-sm-12 ">
                                    <div class="card bg-dark text-white mb-3 align-items-center" style="height:100px;">
                                        <div class="card-body ml-6 mt-4"><b><u>
                                                    <?php echo $row["name_cat"] ?>
                                                </u> Total :
                                                <?php echo $row["nb"] ?>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12 text-end">
                            <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>


                            <!-- Modal Ajouter-->
                            <div class="modal fade w-100" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content p-3 col-xl-12 col-sm-4">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <!-- on loading page -->

                                        <div id="loadingAjouter" class="">
                                            <div class="loader m-3"></div>
                                        </div>

                                        <form action="#" method="post" id="employeeForm">
                                            <div class="modal-body">

                                                <div class="row">

                                                    <div class="col-6 mb-3 text-start">
                                                        <label for="nom">Nom :</label>
                                                        <input type="text" id="nom"
                                                            class=" isEmpty  form-control m-2 m-2" name="nom" required>
                                                    </div>

                                                    <div class="col-6 mb-3 text-start">
                                                        <label for="prenom">Prénom :</label>
                                                        <input type="text" id="prenom" class="isEmpty form-control m-2"
                                                            name="prenom" required>
                                                    </div>

                                                    <div class="col-6 mb-3 text-start">
                                                        <label for="post">Catégorie :</label>
                                                        <select id="post" class="isEmpty form-control m-2" name="post"
                                                            required>
                                                            <option value="">Sélectionner</option>

                                                            <!--<option value="">Sélectionner</option>-->
                                                            <?php
                                                            // $sql1 = "SELECT * FROM categories WHERE cat_from_admin = '$id_admin'";
                                                            
                                                            $sel = $conn->query($sql1);
                                                            while ($rowSel = mysqli_fetch_assoc($sel)) {
                                                                echo '<option value="' . $rowSel['id_cat'] . '">' . $rowSel['name_cat'] . '</option>';
                                                            } ?>
                                                        </select>

                                                    </div>


                                                    <div class="col-6 mb-3 text-start">
                                                        <label for="telephone">Téléphone :</label>
                                                        <input type="text" id="telephone"
                                                            class="isEmpty form-control m-2" name="telephone" required>
                                                    </div>


                                                    <div class="col-6 mb-3 text-start">
                                                        <label for="location">Localisation :</label>
                                                        <input type="text" id="location"
                                                            class="isEmpty form-control m-2" name="location" required>
                                                    </div>

                                                    <div class="col-6 mb-3 text-start">
                                                        <label for="naissance">Date de naissance :</label>
                                                        <input type="date" id="naissance"
                                                            class="isEmpty form-control m-2" name="naissance" required>
                                                    </div>

                                                    <div class="col-6 mb-3 text-start">
                                                        <label for="gender">Genre :</label>
                                                        <select id="gender" class="isEmpty form-control m-2"
                                                            name="gender" required>
                                                            <option value="Homme">Homme</option>
                                                            <option value="Femme">Femme</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-6 mb-3 text-start">
                                                        <label for="etat">État civil :</label>
                                                        <select id="etat" class="isEmpty form-control m-2" name="etat"
                                                            required>
                                                            <option value="">Sélectionner</option>
                                                            <option value="Célibataire">Célibataire</option>
                                                            <option value="En Couple">Marie</option>
                                                            <option value="Autre">Autre</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-6 mb-3 text-start">

                                                        <label for="niveau">Niveau d'etude:</label>
                                                        <select id="niveau" class="isEmpty form-control m-2"
                                                            name="niveau" required>
                                                            <option value="">Sélectionner</option>
                                                            <option value="4ème">Sans</option>
                                                            <option value="Niveau 4ème">Niveau 4<sup>ème</sup>
                                                            </option>
                                                            <option value="4ème">4<sup>ème</sup></option>
                                                            <option value="Niveau Bac">Niveau Bac</option>
                                                            <option value="Bac">Bac</option>
                                                            <option value="Bac +2">Bac +2</option>
                                                            <option value="4ème">Autre</option>

                                                        </select>

                                                    </div>



                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fermer</button>
                                                <button type="button" class="submitForms btn btn-primary"
                                                    onclick="submitForms()">Enregistrer</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Table des Members
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>CIN</th>
                                        <th>Nom et prénom</th>
                                        <th>Catégories</th>
                                        <th>Téléphone</th>
                                        <th>Niveau</th>
                                        <th>Etat</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>CIN</th>
                                        <th>Nom et prénom</th>
                                        <th>Catégories</th>
                                        <th>Téléphone</th>
                                        <th>Niveau</th>
                                        <th>Etat</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if (!empty($Data)) {
                                        foreach ($Data as $e) {
                                            $sel = $conn->query($sql);
                                            echo "<tr>";
                                            echo "<td>". $e['N_CN'] . "</td>";
                                            echo "<td>" . $e['nom'] . " " . $e['prenom'] . "</td>";
                                            $epost = "SELECT name_cat FROM categories WHERE id_cat = " . $e['post'] . "";
                                            $res = $conn->query($epost);
                                            while ($row_res = mysqli_fetch_assoc($res)) {
                                                echo "<td>" . $row_res['name_cat'] . "</td>";
                                            }
                                            echo "<td>" . $e['telephone'] . "</td>";
                                            echo "<td>" . $e['Neveau'] . "</td>";
                                            echo "<td>" . $e['Etat'] . "</td>";
                                            // echo "<td class='btn-group'> <a href='SupEmo.php?id_emp=".$e['id']."' class='btn btn-danger me-4'><i class='fas fa-trash'></i>  Delete </a> <a href='Edit.php?id_emp=".$e['id']."' class='btn btn-info'><i class='fas fa-pen'></i>  Edit </a></td>";
                                            echo "<td><div class='btn-group'>
                                            <a href='../Models/Delet/SupEmp.php?id_emp=" . $e['id'] . "' class='btn btn-danger me-2'><i class='fas fa-trash'></i></a>
                                            <a href='Edit.php?id_emp=" . $e['id'] . "' class='btn btn-secondary'><i class='fas fa-pen'></i></a>
                                          </div></td>";

                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>


                            </table>
                        </div>
                    </div>



                </div>
            </main>
            <?php include ("footer.php"); ?>
        </div>
    </div>
    <!-- <script>
        $('#exampleModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus');
        });


        window.onload = function () {
            // Show the loading screen when the window is fully loaded
            document.getElementById("loading").style.display = "block";
            document.getElementById("layoutSidenav_content").style.display = "none";
        };

        // Check for a delay in loading the main content
        setTimeout(function () {
            // Display the loading screen if the main content is not loaded after a certain delay
            document.getElementById("loading").style.display = "none";
            document.getElementById("layoutSidenav_content").style.display = "block";
        }, 1000);

        document.querySelector(".submitForms").addEventListener("click", function () {
            // Show the loading spinner when the button is clicked
            document.getElementById("loadingAjouter").style.display = "flex";

            // Optionally, you can disable the button to prevent multiple submissions
            // this.disabled = true;

            // Hide the loading spinner after two seconds
            setTimeout(function () {
                document.getElementById("loadingAjouter").style.display = "none";
            }, 2000);
        });




    </script> -->
    <!-- <script src="../Controllers/CreatTable.js"></script> -->
    <script src="assets/links/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../Controllers/send.js" crossorigin="anonymous"></script>
    <!-- <script src="../Controllers/hide_id.js" crossorigin="anonymous"></script> -->
    <script src="../Controllers/newSection.js" crossorigin="anonymous"></script>
    <script src="../Controllers/SupSection.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="assets/links/jquery.js"></script>
    <script src="assets/links/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>