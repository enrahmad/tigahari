<?php 
$this->load->view('student/template/head');
$this->load->view('student/template/topbar');
$this->load->view('student/template/sidebar');
?>

<!--tambahkan custom css disini-->

<?php
echo form_open('user/do_update_user');
?>

<!-- Read Form -->
<section class="content">
  <div class="col-md-4">
      <div class="box box-solid">
        <div class="box-body">
          <?php foreach($result_array as $row) {   ?>
          <tr><td>NIS</td><td>:</td><td ><?php echo $row->nis; ?></td></tr><br></br>
          <tr><td>Nama</td><td>:</td><td ><?php echo $row->name; ?></td></tr><br></br>
          <tr><td>Email</td><td>:</td><td ><?php echo $row->email;?></td></tr><br></br>          
          <a class="btn btn-warning btn-xs btn-flat" title="Update" title="Ubah" onclick="showModalUpdateUser(this)" 
                      data-id="<?php echo $row->id;?>"
                      data-nis="<?php echo $row->nis;?>"
                      data-name="<?php echo $row->name;?>"
                      data-email="<?php echo $row->email;?>"
                      data-level="<?php echo $row->level;?>">
                    <span class="glyphicon glyphicon-edit"></span></a>
          <?php } ?>
        </div>
      </div>
    </div>
</section>
<!-- Read Form -->


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

                  <select  style="display:none;" class="form-control" value="<?php echo $this->session->userdata('level');?>" name="level">
                    <option value="siswa"> siswa</option>                     
                    <option value="admin"> admin</option> 
                  </select>

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

<!--tambahkan custom js disini-->

<?php
$this->load->view('student/template/foot');
?>