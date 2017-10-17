<?php 
$this->load->view('guest/template/head');
$this->load->view('guest/template/topbarlogin');
$this->load->view('guest/template/sidebar');
?>

<!--tambahkan custom css disini-->

 <section class="content">
  <div class="login-logo">
    <b>Login</b>
  </div>
    <div class="login-box">
      <div class="login-box-body">
        <p class="login-box-msg">Silakan masukan NIS dan password</p>
        <form action="<?php echo base_url();?>home/cek_login" method="post" id="formlogin" />
          <div class="form-group has-feedback">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" id="nis" name="nis" class="form-control" placeholder="NIS" required="required" />
            </div>
          </div>
          <div class="form-group has-feedback">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required" onkeypress="capLock(event)"/>
            </div>
          </div>
          <div id="divMayus" style="visibility:hidden">CapsLock hidup.</div>
          <br></br>
          <div class="row">
            <div class="col-xs-4 pull-right">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
            </div>
            <div class="col-xs-4">
              <?php if ($register){ ?>
                <a href="<?php echo site_url('guest/register') ?>" class="btn btn-default btn-block btn-flat">Daftar</a>
              <?php } ?>
            </div>
          </div>
        </form>
      </div>
    </div>
</section>

<?php 
$this->load->view('guest/template/js');
?>

<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#formlogin').bootstrapValidator({
    fields: {
      nis: {
        validators: {
          notEmpty: {
            message: "NIS belum diisi"
          },
        }
      },

      password: {
        validators: {
          notEmpty: {
            message: "Password belum diisi"
          }
        }
      }

    }
  });
});
</script>

<script>
$("#password").keypress(function capLock(e){
 kc = e.keyCode?e.keyCode:e.which;
 sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
 if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
  document.getElementById('divMayus').style.visibility = 'visible';
 else
  document.getElementById('divMayus').style.visibility = 'hidden';
});
</script>

<?php
$this->load->view('guest/template/foot');
?>