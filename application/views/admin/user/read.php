<?php 
$this->load->view('admin/template/head');
?>
<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/template/topbar');
$this->load->view('admin/template/sidebar');
?>

<?php
echo form_open('user/do_update_user');
?>

<?php
$isdelete="false";
?>


<!-- Read Form -->
<section class="content-header">
    <h1> Daftar Pengguna &nbsp &nbsp
      <a style="margin-right:5px" class="btn btn-success btn-sm" title="Tambah Pengguna" data-toggle="modal" data-target="#modalcreateuser">
        <i class="fa fa-user-plus"></i>  Tambah pengguna
      </a>
    <?php
    if ($register){ ?> 
    <a href="<?php echo base_url('Admin/setregister/false'); ?>" style="margin-right:5px" class="btn btn-danger btn-sm " title="Tambah Pengguna">
        <i class="glyphicon glyphicon-eye-close"></i>  Sembunyikan register
      </a>
    <?php } else { ?>
      <a href="<?php echo base_url('Admin/setregister/true'); ?>" style="margin-right:5px" class="btn btn-info btn-sm " title="Tambah Pengguna">
        <i class="glyphicon glyphicon-eye-open"></i>  Tampilkan Register
      </a>
    <?php } ?>
    </h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <table id="table_user" class="table table-striped table-hover">
            <thead>
              <tr>
                <th><h4><b><center>NIS</center></b></h4></th>
                <th><h4><b><center>NAMA</center></b></h4></th>
                <th><h4><b><center>KELAS</center></b></h4></th>
                <th><h4><b><center>EMAIL</center></b></h4></th>
                <th><h4><b><center>LEVEL</center></b></h4></th>
                <th><h4><b><center>PASSWORD</center></b></h4></th>
                <th><h4><b><center>PENGATURAN</center></b></h4></th>
              </tr>
            </thead>
              <tbody>
                <?php foreach($result_array as $row) {   ?>
                  <tr>
                    <td> 
                      <?php echo $row->nis;?>
                    </td>
                    <td>
                      <?php echo $row->name;?>
                    </td>
                    <td>
                      <center><?php echo $row->class;?></center>
                    </td>
                    <td>
                      <?php echo $row->email;?>
                    </td>
                    <td>
                      <center><?php echo $row->level;?></center>
                    </td>
                    <td><center>
                      <a class="btn btn-warning btn-sm" title="Update password" onclick="showModalUpdatePassword(this)" 
                      data-id="<?php echo $row->id?>"
                      data-password="">
                      <span>Update</span></a>
                    </center></td>
                    <td><center>
                      <a class="btn btn-warning btn-flat btn-sm" title="Update data" onclick="showModalUpdateUser(this)" 
                      data-id="<?php echo $row->id?>"
                      data-nis="<?php echo $row->nis?>"
                      data-name="<?php echo $row->name?>"
                      data-class="<?php echo $row->class?>"
                      data-email="<?php echo $row->email?>"
                      data-level="<?php echo $row->level?>">
                      <span class="glyphicon glyphicon-edit"></span></a>&nbsp;
                      <?php if ($row->remove =='true'){ ?> 
                          <a data-href="<?php echo base_url('user/delete/'.$row->nis); ?>"  data-toggle="modal" 
                          data-target="#confirm-delete" class="btn btn-danger btn-flat btn-sm" title="Hapus">
                          <span class="glyphicon glyphicon-trash"></span></a></center></td>
                        <?php } ?>
                        </tr>
                      <?php }?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Read Form -->


<!-- Delete Modal -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="form-horizontal" id="formdeletecommand" action="<?php echo base_url();?>user/delete" method="post">
      <div class="modal-body">
        <center><b>Konfirmasi Hapus Pengguna </b><br><br>
          Anda yakin akan menghapus pengguna dari database?<br>
        </center>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger btn-ok btn-flat pull-left ">Hapus</a>
        <button type="button" class="btn btn-success btn-flat " data-dismiss="modal">Batal</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Delete Modal -->


<!-- Create Modal -->
<div class="modal fade" id="modalcreateuser" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Pengguna</h4>
      </div>
      <form class="form-horizontal" id="formcreateuser" action="<?php echo base_url();?>user/create" method="post">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="col-sm-2 control-label">N I S</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nis">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kelas</label>
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
              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Level</label>
                <div class="col-sm-10">
                  <select class="form-control" value="<?php echo $row->level?>" name="level">
                    <option value="siswa"> siswa</option>                     
                    <option value="admin"> admin</option>  
                  </select>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-success btn-flat pull-right">Tambah</button>
              </div>
            </div>
          </div>
        </section>
      </form>
    </div>      
  </div>
</div>
<!-- Create Modal -->


<!-- Update Password Modal -->
<div class="modal fade" id="modalupdatepassword" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><b>Update Password</b></h3>
      </div>
      <form class="form-horizontal" id="formupdatepassword" action="<?php echo base_url();?>user/do_update_password" method="post">
        <section class="content">
            <div class="col-md-12">

                  <input type="hidden" class="form-control" name="id" readonly></input>

              <div class="form-group">
                <div class="col-sm-16">
                <label  class="control-label">Password baru</label>
              </div>
              <br>
                <div class="col-sm-16">
                  <input type="text" class="form-control" name="password">
                </div>
              </div>
              <br><br>
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


<!-- Update Profile Modal -->
<div class="modal fade" id="modalupdateuser" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><b>Update Data</b></h3>
      </div>
      <form class="form-horizontal" id="formupdateuser" action="<?php echo base_url();?>user/do_update_user" method="post">
        <section class="content">
          <div class="row">
            <div class="col-md-12">

                  <input type="hidden" class="form-control" name="id" readonly></input>

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
                <label class="col-sm-2 control-label">Kelas</label>
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
              <div class="form-group">
                <label class="col-sm-2 control-label">Level</label>
                <div class="col-sm-10">
                  <select class="form-control" value="<?php echo $row->level?>" name="level">
                    <option value="siswa"> siswa</option>                     
                    <option value="admin"> admin</option>  
                  </select>
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
<!-- Update Profile Modal -->


<!-- Profile Modal -->
<div class="modal fade" id="modalprofile" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><b>Data Profil Pengguna</b></h3>
      </div>
      <form class="form-horizontal" id="formprofile">
        <section class="content">
          <div class="row">
            <div class="col-md-12">

                  <input type="hidden" class="form-control" name="id" readonly></input>

              <div class="form-group">
                <label class="col-sm-2 control-label">N I S</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nis" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                  <label class="col-sm-10"></label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kelas</label>
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
              <div class="form-group">
                <label class="col-sm-2 control-label">Level</label>
                <div class="col-sm-10">
                  <select class="form-control" value="<?php echo $row->level?>" name="level">
                    <option value="siswa"> siswa</option>                     
                    <option value="admin"> admin</option>  
                  </select>
                </div>
              </div>
            </div>
          </div>
        </section>
      </form>
    </div>      
  </div>
</div>
<!-- Profile Modal -->


<?php 
$this->load->view('admin/template/js');
?>


<!-- Delete  Confirmation -->
<script type="text/javascript">
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
</script>
<!-- Delete  Confirmation -->

<!-- DataTable -->
<script>
 $(function () {
   $('#table_user').DataTable({
     "paging": true,
     "lengthChange": true,
     "searching": true,
     "lengthMenu": [[7, 15, 25, 50, -1], [7, 15, 25, 50, "All"]],
     "ordering": false,
     "info": true,
     "autoWidth": false,
     "columns": [
        { "width": "5%" },
        { "width": "35%" },
        { "width": "5%" },
        { "width": "30%" },
        { "width": "5%" },
        { "width": "10%" },
        { "width": "10%" },
      ],
     "language": {
            "lengthMenu": "Tampilkan _MENU_ pengguna per halaman",
            "zeroRecords": "Maaf, hasil untuk kata kunci Anda tidak ditemukan .",
            "info": "Total _TOTAL_ data",
            "infoFiltered": "",
            "search": "Pencarian:",
            "sInfoEmpty": " ",
            "paginate": {
                  "first": "Pertama",
                  "last": "Terakhir",
                  "next": "Selanjutnya",
                  "previous": "Sebelumnya"
            },
      }
   });
 });
</script>
<!-- DataTable -->

<!-- Create Validator -->
<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#formcreateuser').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      nis: {
        validators: {
          notEmpty: {
            message: "field ini tidak boleh kosong"
          },
          integer: {
            message: "hanya bisa diisi dengan angka"
          },
          stringLength: {
            min: 4,
            message: "NIS minimal 4 karakter"
          },
          remote: {
            url: '<?php echo base_url();?>user/check_nis',
            type:'POST',
            message: 'Nomor Induk Siswa sudah terdaftar',
            data: function(validator) {
              return {
                   nis: $('[name="nis"]').val(),
              };
            }
          }
        }
      },

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
<!-- Create Validator -->

<!-- Update Profil Validator -->
<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#formupdateuser').bootstrapValidator({
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
            message : "nama hanya dapat diisi dengan huruf"
          },
        }
      },

      password: {
        validators: {
          notEmpty: {
            message: "field ini tidak boleh kosong"
          }
        }
      },

      email: {
        validators: {
          notEmpty: {
            message: "field ini tidak boleh kosong"
          },
        regexp: {
              regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
              message: 'format email belum benar'
            }
      }
    },

    }
  });
});
</script>
<!-- Update Profil Validator -->

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
$this->load->view('admin/template/foot');
?>