<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="?page=utama">SISTEM <span>PERIZINAN</span> MENDIRIKAN BANGUNAN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="?page=utama">Home</a></li>

                <?php if (isset($_SESSION['username'])) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Master Data <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?page=bangunan&actions=tampil">Data Bangunan</a></li>
                        <li><a href="?page=jenis&actions=tampil">Jenis Bangunan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!-- <li><a href="?page=penjualan&actions=report">Laporan Arsip</a></li> -->
						<li><a href="?page=permintaan&actions=report">Laporan Permintaan</a></li>
                    </ul>
                </li>
                
                <li><a href="?page=user&actions=tampil">User</a></li>
                <!-- <li><a href="?page=diary&actions=tampil">My Diary</a></li> -->
                <?php } ?>

                


                <li><a href="?page=about&actions=tampil">About</a></li>
                <li><a href="?page=kontak&actions=tampil">Contact</a></li>
                 <?php if (!isset($_SESSION['username'])) { ?>
                <li><a href="?page=ajukan">Ajukan Permohonan</a></li>
                <!-- <li><a href="checkout.php">Checkout</a></li> -->
               <?php }?>
                
                
                
                <?php if (isset($_SESSION['username'])) { ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php } else { ?>
                <li><a href="?page=login&actions=admin">Login Admin</a></li>
                <?php } ?>

                

            </ul>
        </div>
    </div>
</nav>
