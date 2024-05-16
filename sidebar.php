

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-text mx-3"><img class = "img-dashbord" src="img/favicon-alvina.png">OS Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <?php
        if($_SESSION['perfil']== 1){
           ?>           
           <!-- Divider -->
           <hr class="sidebar-divider my-0">
           <!-- Nav Item - Dashboard -->
           <li class="nav-item active">
            <a class="nav-link" href="usuario.php">
                <i class="fa fa-user-circle"></i>
                <span>Usuários</span></a>
            </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="to_do_list.php">
                            <i class="fas fa-fw fa-clipboard-list"></i>
                            <span>Tarefas</span></a>
                        </li>

                        
                        <?php
                    }
                    ?>
                    
                    <hr class="sidebar-divider my-0">
                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <!-- Divider -->
                        <hr class="sidebar-divider d-none d-md-block">

                    </ul>
                    <!-- End of Sidebar -->
                    <!-- Content Wrapper -->
                    <div id="content-wrapper" class="d-flex flex-column">