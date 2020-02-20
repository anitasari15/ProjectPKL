<?php
    if (!$this->session->userdata('logged_in')) {
        redirect('login');
    }

    $this->load->view('template/header_user');
?>

    <!-- Page Content -->
    <section>
      <div class="container">
      <table border="0" align="center">
            <tr>
              <td>
                <h1 class="">Reservasi Tempat Meeting</h1>
              </td>
            </tr>
      </table>
            <?php    
              $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
            ?>
            <?php echo validation_errors(); ?>
            <?php echo form_open('pesan/masukan', array('class' => 'needs-validation', 'novalidate' => '')); ?>
      <table>
        <div class="form-group">
        <tr>
          <td>
              <label class="control-label">Tanggal Reservasi</label>
          </td>
          <td>
              <div class="col-sm-10">
              <input type="date" class="form-control" name="tanggal" value="<?php echo set_value('tanggal'); ?>" required>
              </div>            
          </td>
        </tr>
        </div>
        <tr><td><br></td></tr>
        <div class="form-group">
          <tr>
            <td>
              <label class="control-label">Waktu Mulai Meeting*</label>
            </td>
            <td>
              <div class="col-sm-10">
                <input type="time" class="form-control" name="waktu_mulai" value="<?php echo set_value('waktu_mulai'); ?>" required>
              </div>
            </td>
            <td>
              <p id="text2"><b>*Format waktu 24 jam (Contoh: 00:01 - 23:59)</b></p>
            </td>
          </tr>
        </div>
        <tr><td><br></td></tr>
        <div class="form-group">
        <tr>
          <td>
            <label class="control-label">Waktu Selesai Meeting*</label>
          </td>
          <td>
            <div class="col-sm-10">
            <input type="time" class="form-control" name="waktu_selesai" value="<?php echo set_value('waktu_selesai'); ?>" required>
            </div>
          </td>
        </tr>
        </div>
        <tr><td><br></td></tr>
        <div class="form-group">
        <tr>
          <td>
            <label class="  control-label">Keterangan*</label>
          </td>
          <td>
            <div class="col-sm-10">
            <textarea class="form-control" name="keterangan" value="<?php echo set_value('keterangan'); ?>"></textarea>
            </div>
          </td>
          <td>
              <p id="text2"><b>*Diisi jika membutuhkan tambahan fasilitas / lainnya</b></p>
            </td>
        </tr>
        </div>
        <tr><td><br></td></tr>
        <div class="form-group">
        <tr>
          <td>
            <label class="  control-label">Ruangan Meeting</label>
          </td>
          <td>
            <div class="col-sm-10">
                <select name="id_ruangan" class="form-control" required>
                  <?php foreach($data as $ruang): ?>
                  <option value="<?php echo $ruang->id_ruangan; ?>"><?php echo $ruang->nama_ruangan; ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
          </td>
          <td>
          <button name="cek" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Cek Fasilitas Ruangan</button>
          <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-body">
                    <table id="dt-basic" class="table table-striped table-bordered">
                    <thead class="text-primary">
                    <th>Fasilitas</th>
                    </thead>

                <tbody>
                  <?php foreach($data as $i): ?>
                  <tr>
                        <td><?php echo $i->fasilitas;?></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
                </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                
              </div>
            </div>
          </td>
        </tr>
        </div>
        <tr><td><br></td></tr>
        <div class="form-group">
        <tr>
          <td>
            <label class="control-label">PIC</label>
          </td>
          <td>
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="pic" value="<?php echo $this->session->userdata('id') ;?>" required>
                <input type="text" class="form-control" value="<?php echo $this->session->userdata('nama') ;?>" required>
              </div>
          </td>
        </tr>
        </div>
        <tr><td><br></td></tr>
        <div class="form-group">
        <tr>
          <td>
            <label class="  control-label">Tamu</label>
          </td>
          <td>
            <div class="col-sm-10">
                <select name="tamu" class="form-control" required>
                  <option value="">Jumlah Tamu!</option>
                  <?php foreach($data as $ruang): ?>
                  <?php for($i = 1; $i <= $ruang->kapasitas; $i++) {
                      echo "<option value='$i'>$i</option>";
                  } ?>
                <?php endforeach; ?>
                </select>
            </div>
          </td>
        </tr>
        </div>
        <tr><td><br></td></tr>
              <tr>
                <td>
                  <input id="submitBtn" type="submit" name="simpan" value="Reservasi!" class="btn btn-primary">
                  <?php echo anchor('home','Batal', array('class' => 'btn btn-primary btn-danger')); ?>
                </td>
              </tr>
        <?php echo form_close(); ?>
      </table>
    </section>

<?php
    $this->load->view('template/footer_user');
?>