<?php 
$this->load->view('admin/template/head');
$this->load->view('admin/template/topbar');
$this->load->view('admin/template/sidebar');
?>

<!--tambahkan custom css disini-->

<section class="content-header">
  <h1>Frequently Ask-Question</h1>
  <br>
  	<h4><b>Bagaimana cara mendaftarkan diri sebagai anggota?</b></h4>
	Silakan masuk ke halaman login kemudian memilih register. Isi dengan lengkap data yang diperlukan, kemudian pilih tombol Daftar.
	<br>Jika tombol register tidak ada, silakan hubungi admin.
	
	<br>
	<h4><b>Bagaimana cara menghapus akun / data?</b></h4>
	Untuk menghapus akun atau data, hanya admin yang dapat melakukannya.

	<br>
	<h4><b>Bagaimana cara mengaktifkan atau me-non-aktifkan tombol hapus pengguna?</b></h4>
	Masuk ke database secara langsung, pada tabel setting, kolom remove, set nilai menjadi false untuk menonaktifkan tombol hapus atau true untuk mengaktifkan tombol hapus.

	
</section>

<?php 
$this->load->view('admin/template/js');
?>

<!--tambahkan custom js disini-->

<?php
$this->load->view('admin/template/foot');
?>