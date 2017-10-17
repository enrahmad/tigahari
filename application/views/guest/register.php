<?php 
$this->load->view('guest/template/head');
$this->load->view('guest/template/topbar');
$this->load->view('guest/template/sidebar');
?>

<!--tambahkan custom css disini-->

<section class="content">
<div class="login-logo">
                <b>Daftar Anggota Baru</b>
            </div>
        <div class="login-box">
            
            <div class="login-box-body">
                <p class="login-box-msg">Masukkan data dengan lengkap</p>
                <form action="<?php echo base_url();?>guest/register" method="post" id="formregister">
                    <div class="form-group has-feedback">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="nis" placeholder="NIS"/>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap"/>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="text" class="form-control" name="email" placeholder="Email"/>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password"/>
                        </div>
                    </div>
                    <br></br>
                    <div class="row">
                        <div class="col-xs-4 pull-right">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>
</section>

<?php 
$this->load->view('guest/template/js');
?>

<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#formregister').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      name: {
        validators: {
          notEmpty: {
            message: "field ini tidak boleh kosong"
          },
          regexp: {
            regexp: /^[a-zA-Z ]+$/,
            message : "hanya dapat diisi dengan huruf"
          },
        }
      },

      nis: {
        validators: {
          notEmpty: {
            message: "field ini tidak boleh kosong"
          },
          integer: {
            message: 'hanya bisa diisi dengan angka'
          },
          stringLength: {
            min: 4,
            message: "NIS minimal 4 karakter"
          },
          remote: {
            url: '<?php echo base_url();?>user/check_nis',
            type:'POST',
            message: 'Nomor Induk sudah ada',
            data: function(validator) {
              return {
                nis: $('[name="nis"]').val(),
              };
            }
          }
        }
      },

      email: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
        regexp: {
              regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
              message: 'Isi dengan format yang benar'
            }
      }
    },

      password: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
          stringLength: {
            min: 8,
            message: "Password minimal 8 karakter"
          }
        }
      },

    }
  });
});

</script>
<?php
$this->load->view('guest/template/foot');
?>