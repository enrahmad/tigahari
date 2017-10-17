<?php 
$this->load->view('admin/template/head');
?>
<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/template/topbar');
$this->load->view('admin/template/sidebar');
?>

<?php
echo form_open('command/do_update_command');
?>


<!-- Read Modal -->
<section class="content-header">
  <h1>Daftar Perintah  &nbsp &nbsp
    <a style="margin-right:5px" class="btn btn-success btn-sm" title="Tambah perintah" data-toggle="modal" data-target="#modalcreatecommand">
      <i class="fa fa-file-text"></i> Tambah perintah
    </a>
</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body">
          <table id="table_command" class="table table-striped table-hover">
            <thead>
              <tr>          
                <th><h4><b><center>NAMA</center></b></h4></th>
                <th><h4><b><center>FUNGSI</center></b></h4></th>
                <th><h4><b><center>PENGATURAN</center></b></h4></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($result_array as $row) { ?>
                <tr>
                  <td> 
                    <b>
                      <a href data-toggle="modal" title="Detail" onclick="showModalDetailCommand(this)" 
                      data-id="<?php echo $row->id?>"
                      data-use="<?php echo $row->use?>"
                      data-example="<?php echo $row->example?>"
                      data-opt="<?php echo $row->opt?>">
                      <?php echo $row->name;?></a></b>
                  </td>
                  <!-- <td>
                    <?php echo $row->use;?>
                  </td> -->
                  <td>
                    <?php echo $row->desc;?>
                  </td>
                  <td><center>
                    <a class="btn btn-warning btn-sm btn-flat" title="Update" title="Ubah" onclick="showModalUpdateCommand(this)" 
                      data-id="<?php echo $row->id?>"
                      data-name="<?php echo $row->name?>"
                      data-use="<?php echo $row->use?>"
                      data-desc="<?php echo $row->desc?>"
                      data-opt="<?php echo $row->opt?>"
                      data-example="<?php echo $row->example?>">
                    <span class="glyphicon glyphicon-edit"></span></a>
                    &nbsp; &nbsp;
                    <a data-href="<?php echo base_url('command/delete/'.$row->id);?>" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-sm btn-flat" title="Hapus">
                    <span class="glyphicon glyphicon-trash"></span></a></center>
                  </td>
                </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Read Modal -->


<!-- Detail Modal -->
<div class="modal fade" id="modaldetailcommand" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><b>Detail perintah</b></h3>
      </div>
      <form class="form-horizontal" id="formdetailcommand">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" class="form-control" name="id"></input>
              <h5><b>Format :</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                   <label for="use" style="font-weight:normal;"></label>
                </div>
              </div>
              <h5><b>Contoh :</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                   <label for="example" style="font-weight:normal;"></label>
                </div>
              </div>
              <h5><b>Option :</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                  <label for="opt" style="font-weight:normal;">: </label>
                </div>
              </div>
          </div>
        </div>
      </section>
      </form>
    </div>      
  </div>
</div>
<!-- Detail Modal -->


<!-- Delete Modal -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form class="form-horizontal" id="formdeletecommand" action="<?php echo base_url();?>command/delete" method="post">
      <div class="modal-body">
        <center><b>Konfirmasi Hapus Perintah </b><br><br>
          Anda yakin akan menghapus perintah ini?<br>
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
<div class="modal fade" id="modalcreatecommand" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><b>Tambah Perintah</b></h3>
      </div>
      <form class="form-horizontal" id="formcreatecommand" action="<?php echo base_url();?>command/create" method="post">
      <div class="modal-body">
        <section class="content">
          <div class="row">
            <h5><b>Nama perintah</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="text" class="form-control" name="name" placeholder="cp"></input>
                </div>
              </div>
            <h5><b>Fungsi</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="text"  class="form-control" name="desc" placeholder="Copy SOURCE to DEST, or multiple SOURCE(s) to DIRECTORY. Mandatory arguments to long options are mandatory for short options too."></input>
                </div>
              </div>
            <h5><b>Format</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="text" class="form-control" name="use" placeholder="cp [OPTION]... SOURCE DEST"></input>
                </div>
              </div>
              <h5><b>Contoh</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                  <textarea type="text"  class="textarea" name="example" placeholder="cp -Rf /home/enrahmad/folder_piutang_teman /home/enrahmad/piutang/" style="width: 100%; height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </div>
              <h5><b>Option</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                  <textarea type="text"  class="textarea" name="opt" placeholder="Option kombinasi perintah linux" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-success btn-flat pull-right">Tambah</button>
              </div>
          </div>
        </section>
      </div>
      </form>
    </div>      
  </div>
</div>
<!-- Create Modal -->


<!-- Update Modal -->
<div class="modal fade" id="modalupdatecommand" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><b>Update Perintah</b></h3>
      </div>
      <form class="form-horizontal" id="formupdatecommand" action="<?php echo base_url();?>command/do_update_command" method="post">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" class="form-control" name="id"></input>
            <h5><b>Nama perintah</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                   <input type="text" class="form-control" name="name"></input>
                </div>
              </div>
            <h5><b>Fungsi</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                   <input type="text" class="form-control" name="desc"></input>
                </div>
              </div>
            <h5><b>Format</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="text" class="form-control" name="use"></input>
                </div>
              </div>
            <h5><b>Contoh</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="text" class="form-control" name="example"></input>
                  <!-- <textarea type="text"  class="textarea" name="example" style="width: 100%; height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->
                </div>
              </div>
            <h5><b>Opsi</b></h5>
              <div class="form-group">
                <div class="col-xs-12">
                  <input type="text" class="form-control" name="opt"></input>
                  <!-- <textarea type="text"  class="textarea" name="opt" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> -->
                </div>
              </div>
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
$this->load->view('admin/template/js');
?>

<!-- Delete Confirmation  -->
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>
<!-- Delete Confirmation  -->

<!-- DataTable -->
<script>
 $(function () {
   $('#table_command').DataTable({
     "paging": true,
     "lengthChange": true,
     "lengthMenu": [[7, 15, 25, 50, -1], [7, 15, 25, 50, "All"]],
     "searching": true,
     "ordering": false,
     "info": true,
     "autoWidth": false,
     "columns": [
        { "width": "10%" },
        // { "width": "25%" },
        { "width": "75%" },
        { "width": "10%" },
      ],
     "language": {
            "lengthMenu": "Tampilkan _MENU_ perintah per halaman",
            "zeroRecords": "Maaf, hasil untuk kata kunci Anda tidak ditemukan .",
            "info": "Menemukan _TOTAL_ data",
            "infoFiltered": "",
            "search": "Pencarian:",
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
  var validator = $('#formcreatecommand').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      name: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
          remote: {
            url: '<?php echo base_url();?>command/check_command',
            type:'POST',
            message: 'Nama perintah sudah ada',
            data: function(validator) {
              return {
                name: $('[name="name"]').val(),
              };
            }
          }
        }
      },

      use: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          }
        }
      },

      desc: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          }
        }
      },

      example: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          }
        }
      },

      opt: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          }
        }
      },

    }
  });
});
</script>
<!-- Create Validator -->

<!-- Update Validator -->
 <script type="text/javascript">
$(document).ready(function() {
  var validator = $('#formupdatecommand').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      name: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          },
        }
      },

      use: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          }
        }
      },

      desc: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          }
        }
      },

      example: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          }
        }
      },

      opt: {
        validators: {
          notEmpty: {
            message: "Field ini tidak boleh kosong"
          }
        }
      },

    }
  });
});
</script>
<!-- Update Validator -->

<?php
$this->load->view('admin/template/foot');
?>