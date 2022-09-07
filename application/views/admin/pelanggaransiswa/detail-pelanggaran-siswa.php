<!-- Modal -->
<form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo site_url('siswa/delete'); ?>">
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header " style="color: white;background-color:#4a8bc2">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo "Detail Pelanggaran ".$siswa['nama_siswa'].' ['.$siswa['nis_siswa'].']'; ?></h4>
      </div>
      <div class="modal-body">
         <table class="table">
            <tr>
              <th>#No</th>
              <th>#Jenis Pelanggaran</th>
              <th>#Waktu</th>
              <th>#Tempat</th>
              <th>#Keterangan</th>
              <th>#Diinput oleh</th>
            </tr>
          <?php $no=0;foreach ($datapelanggaransiswa as $row):$no++ ?>
            <tr>
              <td><?=$no?></td>
              <td>
                <?php
                  $idjenispelanggaran = $row->id_pelanggaran_pelanggaran_siswa;
                  $jenispelanggaran = $this->M_main->get_where('pelanggaran','id_pelanggaran',$idjenispelanggaran)->row_array();
                  $idkategori = $jenispelanggaran['id_kategori_pelanggaran'];
                  $kategori = $this->M_main->get_where('kategori_pelanggaran','id_kategori_pelanggaran',$idkategori)->row_array();
                  echo $jenispelanggaran['nama_pelanggaran'];
                  echo "<br>";
                  echo "Kategori : <b>".$kategori['nama_kategori_kategori_pelanggaran'].'</b>';
                ?>
              </td>
              <td>
                <?php echo $row->waktu_melanggar_pelanggaran_siswa; ?>
              </td>
              <td><?=$row->tempat_pelanggaran_siswa?></td>
              <td><?= $row->keterangan_pelanggaran_siswa ?></td>
              <td>
                <?php
                  $idguru = $row->id_guru_pelanggaran_siswa;
                  $guru = $this->M_main->get_where('guru','id_guru',$idguru)->row_array();
                  echo $guru['nama_guru'];
                ?>    
              </td>
            </tr>
          <?php endforeach ?>
         </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</form>