## Digilib

Digital Library merupakan aplikasi  yang dibuat dengan tujuan untuk mempermudah proses pemonitoran perpustakaan untuk sekolah-sekolah di Indonesia.

## Instalasi

1.	Pindahkan folder `digilib` ke dalam folder htdocs anda

		C:\xampp\htdocs\digilib

2.	Buka command prompt dan arahkan ke direktori `digilib`

		cd c:\xampp\htdocs\digilib

3.	Install library yang dibutuhkan menggunakan `Composer`

		composer install

4.	Buat database `digilib` pada MySQL menggunakan PHPMyAdmin atau Query

		CREATE DATABASE digilib;

5.	Import tabel beserta data awal

	1.	Menggunakan menu `Import` PHPMyAdmin
			
			Klik menu Import kemudian pilih file digilib.sql lalu klik Go

	2.	Menggunakan `perintah` artisan berikut pada console

			php artisan migrate --seed

6.	Login menggunakan akun admin dengan username `admin` dan password `admins`
		
		http://localhost/digilib/public/login

7.	Agar URL aplikasi lebih mudah dibaca anda dapat membuat virtual hosts

## Fitur

*	Modul buku

*	Modul siswa

*	Modul peminjaman

*	Modul pengembalian

*	Grafik peminjaman

*	Multi users

*	Backup & restore database

*	Data sekolah dinamis

*	Laporan berbentuk PDF & Microsoft Excel

*	AJAX backend process

## Credits

*	[Composer](http://getcomposer.org/)

*	[Laravel Framework](http://laravel.com)

*	[Twitter Bootstrap](http://twitter.github.io/bootstrap)

*	[Jasny Bootstrap](http://jasny.github.io/bootstrap)

*	[Bootstrap Datepicker](http://www.eyecon.ro/bootstrap-datepicker)

*	[jQuery](http://jquery.com)

*	[jQuery Form](https://github.com/malsup/form)

*	[Messenger](https://github.com/HubSpot/messenger)

*	[Laravel DOMPDF](https://github.com/barryvdh/laravel-dompdf)

*	[PHPExcel](http://phpexcel.codeplex.com)

*	[Highcharts](http://www.highcharts.com)

*	[Danpu](https://github.com/gocom/danpu)

*	[Glyphish](http://www.glyphish.com/)