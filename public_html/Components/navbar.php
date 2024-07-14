<?php

require_once '..//Models/Config/Config.php';
include_once '../Models/api/Fctors.php';

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
<style>
    .img-admin {
        height: 35px;
        width: 35px;
        border-radius: 50%;
    }
</style>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <div id="loading" class="">
        <div class="loader m-3"></div>
    </div>
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-1 m-0 text-danger text-center" href="index.php"><b>
            <?php echo $result_info_admin_row['company_name'] ?>
        </b></a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" id="" type="text" placeholder="Search for..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" />
            <button class="btn btn-danger" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><img class="img-admin"
                    src="assets/img/img_admin/<?php echo $result_info_admin_row['img'] ?>" alt=""></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item " href="">
                        <?php echo $result_info_admin_row['username'] ?><i class="fas fa-user"
                            style="height:15px; width: 15px;  padding-left:30px;  padding-bottom:1px;"></i>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="Setting.php">Settings</a>
                </li>
                <li>

                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="../Models/api/logout.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>