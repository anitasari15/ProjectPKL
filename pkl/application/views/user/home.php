<?php
    $this->load->view('template/header_user');
?>

    <!-- Page Content -->
    <section>
      <div class="container">
      <table border="0" align="center">
            <tr>
              <td>
                <h1>Daftar Reservasi Ruang Meeting</h1>
                <?php if($this->session->flashdata('notif_reservasi')): ?>
                <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('notif_reservasi').'</div>'; ?>
                <?php endif; ?>
              </td>
            </tr>
      </table>
      <table>
        <tr>
          <td>
            <?php echo form_open('home/hasil'); ?>
                                  <table>
                                    <tr>
                                      <td>
                                          <select class="form-control" name="cari">
                                          <option>Daftar Ruangan!</option>
                                          <?php foreach($ruangan as $ruang): ?>
                                          <option value="<?php echo $ruang->id_ruangan; ?>"><?php echo $ruang->nama_ruangan; ?></option>
                                          <?php endforeach; ?>
                                          </select>
                                      </td>
                                      <td>
                                          <input type="submit" value="Cari!" name="submit" class="btn btn-primary">
                                      </td>
                                    </tr>
                                  </table>
            <?php echo form_close(); ?>
          </td>
        </tr>
      </table>
        <div class="row">
          <div class="col-lg-6">
            <table id="customers">
              <tr>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Ruangan</th>
                <th>PIC</th>
                <th>Jumlah Tamu</th>
                <th>Info</th>
              </tr>
              <?php foreach ($results as $i): ?>
              <tr>
                        <td><?php echo $i->tanggal;?> </td>
                        <td><?php echo $i->waktu_mulai;?> </td>
                        <td><?php echo $i->waktu_selesai;?> </td>
                        <td><?php echo $i->nama_ruangan;?></td>
                        <td><?php echo $i->nama;?></td>
                        <td><?php echo $i->tamu;?></td>
                        <th>
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $date = date('H:i:s', time()); 
                        if($date <= $i->waktu_selesai && $date >= $i->waktu_mulai){
                          echo '<p class="warna2"><u>'.'Sedang Digunakan'.'</u></p>';
                        } else if ($date >= $i->waktu_selesai) {
                          echo '<p class="warna1"><u>'.'Selesai Digunakan'.'</u></p>';
                        } else {
                          echo '<p class="warna3"><u>'.'Belum Digunakan'.'</u></p>';
                        }
                        ?>
                        </th>
              </tr>
              <?php endforeach;?>
            </table>
          </div>
        </div>
        <p align="center">
        <?php if (isset($links)) { ?>
                <?php echo $links ?>
        <?php } ?>
        </p>
      </div>
    </section>


<?php
    $this->load->view('template/footer_user');
?>

<!-- Politeknik Negeri Malang 2019 -->
<!-- Teknologi Informasi, Manajemen Informatika -->