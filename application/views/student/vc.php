<?php 
$this->load->view('student/template/head');
$this->load->view('student/template/topbar');
$this->load->view('student/template/sidebar');
?>

<!--tambahkan custom css disini-->

<section class="content-header">
  <h1> Profil dan Virtual </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-4"> <!-- BEGIN box spesifikasi server dan virtual -->
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-server"></i>
          <?php 
            $data = []; 
             $data['servercpu'] = '-';
             $data['serverram'] = '-';
             $data['serverswap'] = '-';
             $data['serveros'] = '-';
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
    </div> <!-- END Box spesifikasi server dan virtual -->

    <div class="col-md-8"> <!-- BEGIN Box Virtual Console -->
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="glyphicon glyphicon-console"></i>

          <h3 class="box-title">Virtual Console</h3>
        </div>
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt>
                <!-- BEGIN start button -->
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
                <!-- END start button -->
            </dt>
                <dd> Memulai virtual console</dd>
            <dt>
                <!-- BEGIN stop button -->
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
                <!-- END stop button-->
            </dt>
                <dd>Menghentikan virtual console</dd>
            <dt>
                <!-- BEGIN reset button-->
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
                <!-- END reset button-->
            </dt>
                <dd>Kembali ke pengaturan awal (reset) virtual console</dd>
          </dl>
        </div>
      </div>
    </div> <!-- END Box Virtual Console -->


    <div class="col-md-8"> <!-- BEGIN Box Profile -->
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="glyphicon glyphicon-user"></i>
          <h3 class="box-title">Profil</h3>
          <?php foreach($result_array as $row) { ?>
          <a href data-toggle="modal" onclick="showModalUpdateUser(this)" 
              data-id="<?php echo $row->id;?>"
              data-nis="<?php echo $row->nis;?>"
              data-name="<?php echo $row->name;?>"
              data-class="<?php echo $row->class;?>"
              data-email="<?php echo $row->email;?>"
              data-level="<?php echo $row->level;?>">
          &nbsp Edit </a>
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
          <label class="col-sm-3">Kelas</label>
          <div class="form-group">
            <div class="col-sm-7">
              <label>:</label>
              <?php echo $row->class; ?>
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
    </div> <!-- END Box Profile -->
  </div>
</section>


<!-- Update Password Modal -->
<div class="modal fade" id="modalupdatepassword" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Silakan Update Password</b></h4>
      </div>
      <form class="form-horizontal" id="formupdatepassword" action="<?php echo base_url();?>user/do_update_password" method="post">
        <section class="content">
          <!-- <div class="row"> -->
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
<!-- Update Password Modal -->


<!-- Update Modal -->
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
                <label  class="col-sm-2 control-label">Kelas</label>
                <div class="col-sm-10">
                  <select class="form-control" value="<?php echo $row->class?>" name="class">
                    <option value="X TKJ"> X TKJ</option>
                    <option value="XI TKJ"> XI TKJ</option>
                    <option value="XII TKJ"> XII TKJ</option>  
                  </select>
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
<!-- Update Modal -->


<?php 
$this->load->view('student/template/js');
?>

<script type="text/javascript">
function openNewWindow () {
    window.open('http://192.168.47.128:'+<?php echo $port ?>+'','winname','directories=no,titlebar=no,toolbar=no,location=yes,status=no,menubar=no,scrollbars=no,resizable=no,width=1000,height=450');
}
</script>

<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#formupdateuser').bootstrapValidator({
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
      email: {
        validators: {
          notEmpty: {
            message: "field ini tidak boleh kosong"
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
            message: "field ini tidak boleh kosong"
          },
          stringLength: {
            min: 8,
            message: "password minimal 8 karakter"
          },
        }
      },
    }
  });
});
</script>
<!-- Update Password Validator -->

<?php
$this->load->view('student/template/foot');
?>