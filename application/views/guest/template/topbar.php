<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-lg">Guest Tigahari</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="<?php echo site_url('guest/login') ?>">
              <span class="hidden-xs ">Login</span>
              <span class="glyphicon glyphicon-log-in"> </span>
            </a>
            <!-- <ul class="dropdown-menu">
              <li class="user-header">
                <form action="<?php echo base_url();?>Login/auth" method="post"/>
                  <p></p>
                  <?php echo "Silakan masukkan NIS dan Password Anda." ?>
                  <p></p>
                    <?php
                        if (isset($_SESSION['psn'])) {
                            echo '<div><font color="#FF0000" > 
                                    Maaf, NIS dan atau Password yang Anda masukkan tidak terdaftar.
                                </div>';
                            unset($_SESSION['psn']);}
                    ?>
                    <div class="form-group has-feedback">
                        <input type="text" id="nis" name="nis" class="form-control" placeholder="NIS" required="required" />
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required" />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span> 
                    </div>
                
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>guest/register" class="btn btn-default btn-flat">Daftar</a>
                </div>
                <div class="pull-right">
                  <button type="submit" class="btn btn-default btn-flat">Masuk</a>
                </div>
              </li>
              </form>
            </ul> -->
          </li>
        </ul>
      </div>
    </nav>
  </header>