<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Tableau de bord
                </a>
                <a class="nav-link" href="table_abs.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-x"></i></div>
                    Ajeuter absences
                </a>
                <?php if (isset($_SESSION['Permissions']) && $_SESSION['Permissions'] === "admin") { ?>
                    <a class="nav-link" href="AdminTable.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Tableau de admins
                    </a>
                <?php } ?>

                <button type="button" class="btn btn-danger col-10 m-2 text-center" data-bs-toggle="modal"
                    data-bs-target="#New_Cat">
                    <i class="fas fa-plus"></i> Nouvelle Catégorie
                </button>

                <!-- Modal -->

                <button type="button" class="btn btn-secondary col-10 m-2 text-center" data-bs-toggle="modal"
                    data-bs-target="#Sup_Cat">
                    <span><i class="fas fa-trash"></i> Supprimer Catégorie</span>
                </button>
            </div>
        </div>
    </nav>
</div>