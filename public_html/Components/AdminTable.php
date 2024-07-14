<?php
include '../Models/api/Fctors.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .onling {
            height: 15px;
            width: 15px;
            border: 2px solid white;
            background-color: green;
            outline: 2px solid green;
            border-radius: 50%;
            padding: 6px;
            margin: 6px;
        }

        .offling {
            height: 15px;
            width: 15px;
            border: 2px solid white;
            background-color: var(--bs-red);
            outline: 2px solid var(--bs-red);
            border-radius: 50%;
            padding: 6px;
            margin: 6px;
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
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Nom et prénom</th>
                                        <th>Username</th>
                                        <th>email</th>
                                        <th>company name</th>
                                        <th>activation code</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nom et prénom</th>
                                        <th>Username</th>
                                        <th>email</th>
                                        <th>company name</th>
                                        <th>activation code</th>
                                        <th>Status</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if (!empty($adminData)) {
                                        foreach ($adminData as $all) {
                                            echo "<tr>";
                                            echo "<td>" . $all['fullname'] . " </td>";
                                            echo "<td>" . $all['username'] . " </td>";
                                            echo "<td>" . $all['email'] . " </td>";
                                            echo "<td>" . $all['company_name'] . " </td>";
                                            echo "<td>" . $all['activation_code'] . " </td>";
                                            if ($all['status'] === 1) {
                                                echo "<td> <div class='onling'></div> </td>";
                                            }
                                            if ($all['status'] === 0) {
                                                echo "<td> <div class='offling'></div></td>";
                                            }
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
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>