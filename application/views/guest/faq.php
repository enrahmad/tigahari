<?php 
$this->load->view('guest/template/head');
$this->load->view('guest/template/topbar');
$this->load->view('guest/template/sidebar');
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
</section>

<?php 
$this->load->view('guest/template/js');
?>

<!--tambahkan custom js disini-->

<?php
$this->load->view('guest/template/foot');
?>