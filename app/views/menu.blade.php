<div class="navbar navbar-fixed-top menu">
	<div class="navbar-inner">
		<ul class="nav">
			<li class="divider-vertical"></li>
			<li id="link-buku"><a onclick="dataBuku()"><i class="icon-book"></i> Buku</a></li>
			<li class="divider-vertical"></li>			
			<li id="link-siswa"><a onclick="dataSiswa()"><i class="icon-briefcase"></i> Siswa</a></li>
			<li class="divider-vertical"></li>			
			<li id="link-peminjaman"><a onclick="dataPeminjaman()"><i class="icon-shopping-cart"></i> Peminjaman</a></li>
			<li class="divider-vertical"></li>
			<li id="link-pengembalian"><a onclick="dataPengembalian()"><i class="icon-gift"></i> Pengembalian</a></li>
			<li class="divider-vertical"></li>			
			<li id="link-grafik"><a onclick="grafik()"><i class="icon-signal"></i> Grafik</a></li>
			<li class="divider-vertical"></li>			
			<li id="link-pengguna"><a onclick="dataPengguna()"><i class="icon-user"></i> Pengguna</a></li>
			<li class="divider-vertical"></li>			
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-hdd"></i> Database <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a onclick="backup()"><i class="icon-arrow-down"></i> Backup Database</a></li>
					<li><a onclick="modalRestore()"><i class="icon-arrow-up"></i> Restore Database</a></li>
				</ul>
			</li>
			<li class="divider-vertical"></li>
		</ul>

		<ul class="nav pull-right">
			<li class="divider-vertical"></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-wrench"></i> <span class="user">{{{ Auth::user()->nama }}}</span> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a onclick="modalRubahFoto()"><i class="icon-camera"></i> Rubah Foto</a></li>
					<li><a onclick="modalRubahNama()"><i class="icon-tag"></i> Rubah Nama</a></li>
					<li><a onclick="modalRubahSekolah()"><i class="icon-home"></i> Rubah Sekolah</a></li>
					<li><a onclick="modalRubahUsername()"><i class="icon-tint"></i> Rubah Username</a></li>
					<li><a onclick="modalRubahPassword()"><i class="icon-lock"></i> Rubah Password</a></li>
					<li class="divider"></li>
					<li><a onclick="logout()"><i class="icon-off"></i> Logout</a></li>
				</ul>
			</li>
			<li class="divider-vertical"></li>
		</ul>
	</div>
</div>