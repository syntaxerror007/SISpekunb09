<!-- NAVIGATION -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        
    </div>
    <!-- /.navbar-header -->
	
    <ul class="nav navbar-top-links navbar-left">
        <li>
			
			<a class="navbar-brand"  href="<?php echo site_url('home'); ?>"><img src="http://mahasiswa.cs.ui.ac.id/~rika.amalia/SISpekun_Logo.png" alt="SISpekun_Logo" style="height:35px"/>SI Spekun</a>
       </li>
   </ul>
    <ul class="nav navbar-top-links navbar-right">
        <li>
           <a href="<?php echo site_url('auth/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
       </li>
   </ul>

   <!-- /.navbar-top-links -->
   <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo site_url('home'); ?>" class="<?php if ($page_loc == 'Dashboard') echo 'active'; ?>" ><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Laporan <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('laporan/peminjaman'); ?>" class="<?php if ($page_loc == 'Laporan Peminjaman') echo 'active'; ?>">Peminjaman</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('laporan/kerusakan'); ?>" class="<?php if ($page_loc == 'Laporan Kerusakan') echo 'active'; ?>">Kerusakan</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('laporan/kehilangan'); ?>" class="<?php if ($page_loc == 'Laporan Kehilangan') echo 'active'; ?>">Kehilangan</a>
                    </li>
                </ul>

                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Statistik<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('statistik/peminjaman'); ?>">Peminjaman</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('statistik/kerusakan'); ?>">Kerusakan</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o fa-fw"></i> Penugasan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo site_url('penugasan/shelter'); ?>" class="<?php if ($page_loc == 'Shelter') echo 'active'; ?>">Shelter</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('penugasan/penjaga'); ?>" class="<?php if ($page_loc == 'Daftar Penjaga') echo 'active'; ?>" >Daftar Penjaga Shelter</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('penugasan/tambah'); ?>" class="<?php if ($page_loc == 'Tambah Penjaga') echo 'active'; ?>" >Tambah Penjaga Shelter</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
			<li>
                <a href="#"><i class="fa fa-table fa-fw"></i> Peminjaman Khusus<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
						<a href="<?php echo site_url('peminjamanKhusus/formulir'); ?>" class="<?php if ($page_loc == 'formulir peminjaman') echo 'active'; ?>">Formulir Peminjaman</a>
					</li>
                    <li>
						<a href="<?php echo site_url('peminjamanKhusus/list'); ?>" class="<?php if ($page_loc == 'List Peminjaman Khusus') echo 'active'; ?>">List Peminjaman Khusus</a>
					</li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

		<!--END OF NAVIGATION---->
