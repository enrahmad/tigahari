<?php 
$this->load->view('admin/template/head');
$this->load->view('admin/template/topbar');
$this->load->view('admin/template/sidebar');
?>

<!--tambahkan custom css disini-->

<section class="content-header">
  <h1> Profil dan Virtual </h1>
</section>

<section class="content">
  <div class="row">

    <!-- Box Spesifikasi Server -->
    <div class="col-md-4"> 
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-server"></i>
          <?php 
            $data = []; 
             $data['servercpu'] = '-';
             $data['serverram'] = '-';
             $data['serverswap'] = '-';
             $data['serveros'] = '-';
             $data['serverip'] = '-';
             $data['dockerver'] = '-';
             $data['dockeros'] = '-';
             $data['wettydir'] = '-';
             $data['wettyport'] = '-';
             $data['vcpackage'] = '-';
             $data['username'] = '-';
             $data['password'] = '-';
            foreach ($server as $key => $value) {
              $data[$value->name] = $value->value;
            }
          ?>
         <h3 class="box-title">Spesifikasi Server dan Virtual &nbsp&nbsp</h3>
         
          <a href data-toggle="modal" onclick="showModalUpdateServer(this)" 
              data-servercpu  ="<?= $data['servercpu'] ?>"
              data-serverram  ="<?= $data['serverram'] ?>"
              data-serverswap ="<?= $data['serverswap'] ?>"
              data-serveros   ="<?= $data['serveros'] ?>"
              data-serverip   ="<?= $data['serverip'] ?>"
              data-dockerver  ="<?= $data['dockerver'] ?>"
              data-dockeros   ="<?= $data['dockeros'] ?>"
              data-wettydir   ="<?= $data['wettydir'] ?>"
              data-wettyport  ="<?= $data['wettyport'] ?>"
              data-vcpackage  ="<?= $data['vcpackage'] ?>"
              data-username   ="<?= $data['username'] ?>"
              data-password   ="<?= $data['password'] ?>">
          Edit </a>
          
        </div>
        <div class="box-body">
          
          <h4><b>Server</b></h4>
            <li>Hardware
              <ul style="list-style-type:circle">
                <li>CPU <?= $data['servercpu'] ?></li>
                <li>RAM <?= $data['serverram'] ?></li>
                <li>Swap <?= $data['serverswap'] ?></li>
              </ul>
            </li>
            <li>Sistem Operasi <?= $data['serveros'] ?></li>
            <li>IP address <?= $data['serverip'] ?></li>
          <br>

          <h4><b>Virtual</b></h4>
          
            <li>Docker <?= $data['dockerver'] ?></li>
            <li>Sistem Operasi <?= $data['dockeros'] ?></li>
            <li><b>Shared</b> Hardware
            </li>
             <li>Remote menggunakan Wetty :
              <ul style="list-style-type:circle">
                <li>Direktori wetty berada di <?= $data['wettydir'] ?></li>
                <li>Menggunakan port <?= $data['wettyport'] ?></li>
                <li>Diakses melalui port yang sama dengan Nomor Induk</li>
              </ul>
            </li>
            <li>Paket yang sudah terinstall : <?= $data['vcpackage'] ?></li>
            <li> Username default : <?= $data['username'] ?></li>
            <li> Password default : <?= $data['password'] ?></li>
        </div>
      </div>
    </div>
    <!-- Box Spesifikasi Server -->


    <!-- Update Server Modal -->
    <div class="modal fade" id="modalupdateserver" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title"><b>Update Spesifikasi Server dan Virtual</b></h3>
          </div>
          <form class="form-horizontal" id="formupdateserver" action="<?php echo base_url();?>admin/update_server" method="post">
            <section class="content">
              <div class="row">
                <div class="col-md-12">

                  <div class="form-group">
                    <label class="col-sm-3 control-label">CPU Server</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="servercpu">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">RAM Server</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="serverram">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Swap Server</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="serverswap">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">OS Server</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="serveros">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">IP Server</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="serverip">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Docker ver.</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="dockerver">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">OS Docker</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="dockeros">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Dir. Wetty</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="wettydir">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Port Wetty</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="wettyport">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Installed Pack.</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="vcpackage">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="password">
                    </div>
                  </div>
                  <br>
                  <div>
                    <button type="submit" class="btn btn-warning pull-right">Simpan</button>
                  </div>
                </div>
              </div>
            </section>
          </form>
        </div>      
      </div>
    </div>
    <!-- Update Server Modal -->


    <!-- Box Virtual Console -->
    <div class="col-md-8"> 
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="glyphicon glyphicon-console"></i>

          <h3 class="box-title">Virtual Console</h3>
        </div>
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt>
                <!-- Start -->
                <?php
                    if (isset($_POST['start']))
                    {
                        exec("docker start $port");
                    }
                ?>
                <body>
                    <form method="post">
                    <p>
                        <a href onClick=openNewWindow() style="margin-right:5px" title="Mulai VC" >
                            <button class="fa fa-play btn-sm" name="start"> Power On&nbsp </button> 
                        </a>
                    </p>
                    </form>
                </body>
                <!-- Start -->
            </dt>
                <dd> Memulai virtual console</dd>
            <dt>
                <!-- Stop -->
                <?php
                    if (isset($_POST['stop']))
                    {
                        exec("docker stop $port");
                    }
                ?>
                <body>
                    <form method="post">
                    <p>
                        <a href type="submit" style="margin-right:5px" title="Stop VC" name="stop">
                            <button class="fa fa-stop btn-sm" name="stop"> Shutdown</button>
                        </a>
                    </p>
                    </form>
                </body>
                <!-- Stop -->
            </dt>
                <dd>Menghentikan virtual console</dd>
            <dt>
                <!-- Reset -->
                <?php
                    if (isset($_POST['reset']))
                    {
                        exec("docker stop $port");
                        exec("docker rm $port");
                        exec("docker create --name $port -p $port:3000 xtime");
                    }
                ?>
                <body>
                    <form method="post">
                    <p>
                        <a href type="submit" style="margin-right:5px" title="Reset VC" name="reset">
                            <button class="fa fa-repeat btn-sm" name="reset"> Reset VC&nbsp</button>
                        </a>
                    </p>
                    </form>
                </body>
                <!-- Reset -->
            </dt>
                <dd>Kembali ke pengaturan awal (reset) virtual console</dd>
          </dl>
        </div>
      </div>
    </div>
    <!-- Box Virtual Console -->


    <!-- Box Profile -->
    <div class="col-md-8"> 
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="glyphicon glyphicon-user"></i>
          <h3 class="box-title">Profil</h3> &nbsp 
          <?php foreach($result_array as $row) { ?>
          <a href data-toggle="modal" onclick="showModalUpdateUser(this)" 
              data-id="<?php echo $row->id;?>"
              data-nis="<?php echo $row->nis;?>"
              data-name="<?php echo $row->name;?>"
              data-class="<?php echo $row->class;?>"
              data-email="<?php echo $row->email;?>"
              data-level="<?php echo $row->level;?>">
          Edit </a>
          <?php } ?>
        </div>
        <div class="box-body">
        <?php foreach($result_array as $row) { ?>
          <label class="col-sm-3">N I S</label>
          <div class="form-group">
            <div class="col-sm-7">
              <label>:</label>
              <?php echo $row->nis; ?>
            </div>
          </div>
        </div>
        <div class="box-body">
          <label class="col-sm-3">Nama</label>
          <div class="form-group">
            <div class="col-sm-7">
              <label>:</label>
              <?php echo $row->name; ?>
            </div>  
          </div>
        </div>
        <div class="box-body">
          <label class="col-sm-3">Password</label>
          <div class="form-group">
            <div class="col-sm-7">
              <label>:</label> 
              <a class="btn btn-warning btn-xs" title="Update Password" onclick="showModalUpdatePassword(this)" 
              data-id="<?php echo $row->id;?>"
            <span> Update</span></a>
            </div>  
          </div>
        </div>
        <div class="box-body">
          <label class="col-sm-3">Email</label>
          <div class="form-group">
            <div class="col-sm-7">
              <label>:</label>
              <?php echo $row->email; ?>
            </div>  
          </div>
        </div>
        <?php } ?>
        <div class="box-body">
        </div>
      </div>
    </div>
    <!-- Box Profile -->

  </div>
</section>


<!-- MODAL Update Password -->
<div class="modal fade" id="modalupdatepassword" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Update Password</b></h4>
      </div>
      <form class="form-horizontal" id="formupdatepassword" action="<?php echo base_url();?>user/do_update_password" method="post">
        <section class="content">
            <div class="col-md-12">

                  <input type="hidden" class="form-control" name="id" readonly></input>

              <div class="form-group">
                <div class="col-sm-12">
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-success pull-right">Simpan</button>
              </div>
            </div>
        </section>
      </form>
    </div>      
  </div>
</div>
<!-- MODAL Update Password -->


<!-- MODAL Update Profil -->
<div class="modal fade" id="modalupdateuser" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><b>Update Profil</b></h3>
      </div>
      <form class="form-horizontal" id="formupdateuser" action="<?php echo base_url();?>user/do_update_user" method="post">
        <section class="content">
          <div class="row">
            <div class="col-md-12">

                  <input type="hidden" class="form-control" name="id" readonly></input>
                  <input type="hidden" class="form-control" value="<?php echo $row->level?>" name="level" readonly> </input>

              <div class="form-group">
                <label class="col-sm-2 control-label">N I S</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nis" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="form-group">
                <label  class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email">
                </div>
              </div>
              <br><br>
              <div>
                <button type="submit" class="btn btn-warning pull-right">Simpan</button>
              </div>
            </div>
          </div>
        </section>
      </form>
    </div>      
  </div>
</div>
<!-- MODAL Update Profil -->


<?php 
$this->load->view('admin/template/js');
?>

<!-- Update Server Validator -->
<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#formupdateserver').bootstrapValidator({
    fields: {
      servercpu: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
      }
    },
    serverram: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
      }
    },
    serverswap: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
      }
    },
    serveros: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
      }
    },
    serverip: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
          ip: {
            message: 'Please enter a valid IP address'
          },
      }
    },
    dockerver: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
      }
    },
    dockeros: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
      }
    },
    wettydir: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
      }
    },
    wettyport: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
      }
    },
    vcpackage: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
      }
    },
   username: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
      }
    },
    password: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
      }
    },
    }
  });
});
</script>
<!-- Update Server Validator -->

<!-- Run docker -->
<script type="text/javascript">
function openNewWindow () { 
    window.open('http://192.168.47.128:'+<?php echo $port ?>+'','winname','directories=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=1200,height=450');
}
</script>
<!-- Run docker -->

<!-- Update User Validator -->
<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#formupdateuser').bootstrapValidator({
    fields: {
      name: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
          regexp: {
            regexp: /^[a-zA-Z ]+$/,
            message : "hanya dapat diisi dengan huruf"
          },
      }
    },
      email: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
          emailAddress: {
            message: 'format email belum benar'
          },
      }
    },
    }
  });
});
</script>
<!-- Update User Validator -->

<!-- Update Password Validator -->
<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#formupdatepassword').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {

      password: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
          stringLength: {
            min: 8,
            message: "Password minimal 8 karakter"
          },
        }
      },
    }
  });
});
</script>
<!-- Update Password Validator -->

<?php
$this->load->view('admin/template/foot');
?>