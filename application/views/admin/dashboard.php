<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>

<?php 
$this->load->view('admin/template/head');
?>

<!--tambahkan custom css disini-->

<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>

<?php
$this->load->view('admin/template/topbar');
$this->load->view('admin/template/sidebar');
?>

<section class="content-header">
    <h1>Dashboard<small>"Be careful, you're Admin !!!"</small></h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box"><span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Perintah</span>
                    <h3><b><?php echo $this->db->count_all('command');?></b></h3>
                </div>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box"><span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">PENGGUNA</span>
                    <h3><b><?php echo $this->db->count_all('user');?></b></h3>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box"><span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Admin</span>
                    <h3><b></b></h3>
                </div>
            </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box"><span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Siswa</span>
                    <h3><b></b></h3>
                </div>
            </div>
        </div> -->
        <div class="clearfix visible-sm-block"></div>
    </div>
    <div class="row">
        <div class="col-md-12"></div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><a href="http://192.168.47.128/phpsysinfo/index.php?disp=dynamic">Informasi Sistem</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">

                            <iframe src="http://192.168.47.128/phpsysinfo/index.php?disp=dynamic" width="100%" height="360" scrolling="yes" style="overflow" frameborder="0">
                              <p>Your browser does not support iframes.</p>
                            </iframe>

                </div>
            </div>
        </div>
    </div>
</section>

<?php 
$this->load->view('admin/template/js');
?>

<!--tambahkan custom js disini-->

<?php
$this->load->view('admin/template/foot');
?>