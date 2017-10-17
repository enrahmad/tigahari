<?php 
$this->load->view('student/template/head');
$this->load->view('student/template/topbar');
$this->load->view('student/template/sidebar');
?>

<!--tambahkan custom css disini-->

<section class="content-header">
  <h1>Daftar Perintah Linux</h1>
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
                <!-- <th><h4><b><center>FORMAT</center></b></h4></th> -->
                <th><h4><b><center>FUNGSI</center></b></h4></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($result_array as $row) {   ?>
                <tr>
                  <td> <a href data-toggle="modal" title="Detail" onclick="showModalDetailCommand(this)"
                    data-id="<?php echo $row->id?>"
                    data-use="<?php echo $row->use?>"
                    data-example="<?php echo $row->example?>"
                    data-opt="<?php echo $row->opt?>">
                    <b><?php echo $row->name;?></b> </a>
                  </td>
                  <!-- <td>
                    <?php echo $row->use;?>
                  </td> -->
                  <td> 
                    <?php echo $row->desc;?>
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


<?php 
$this->load->view('student/template/js');
?>

<!-- DataTable -->
<script>
 $(function () {
   $('#table_command').DataTable({
     "paging": true,
     "lengthChange": false,
     "lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "All"]],
     "searching": true,
     "ordering": false,
     "info": true,
     "autoWidth": false,
     "columns": [
        { "width": "10%" },
        // { "width": "30%" },
        { "width": "90%" },
      ],
     "language": {
            "lengthMenu": "Tampilkan _MENU_ perintah per halaman",
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

<?php
$this->load->view('student/template/foot');
?>