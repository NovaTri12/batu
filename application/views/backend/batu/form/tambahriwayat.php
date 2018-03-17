
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Riwayat Penggunaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
        <div class="form-group">
          <label for="Tanggal">Tanggal</label>
          
          <input type="text" class="form-control" id="Tanggal" placeholder="Tanggal Penggunaan" />
       </div>
      <div class="form-group">
          <label for="Mesin">Mesin</label>
         <!-- <input type="text" class="form-control" id="Mesin" placeholder="Digunakan pada mesin"> -->
         <?php echo form_dropdown('id_mesin', $mesin,'','class="form-control" id="id_mesin"');?>
      </div>
      <div class="form-group">
          <label for="jamMulai">Jam Mulai</label>
          <input type="text" class="form-control datetimepicker-input" id="jamMulai" placeholder="Waktu Mulai" data-toggle="datetimepicker" data-target="#jamMulai">
       </div>
      <div class="form-group">
          <label for="jamSelesai">Jam Selesai</label>
          
          <input type="text" class="form-control datetimepicker-input" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5"/>
      </div>
      </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" attr-link="<?php echo base_url();?>index.php/riwayat/aksitambah">Save changes</button>
      </div>
    </div>
  </div>
