<!-- Modal -->
<form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo site_url('kelasjurusan/delete'); ?>">
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color:#F13F3F">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
         <!-- BEGIN FORM-->
            <div class="control-group ">
                <label for="firstname" class="control-label">Nama Kelas</label>
                <div class="controls">
                    <label class="control-label span8" style="font-weight: bold;">: <?php echo $row['tingkatan_kelas'].' '.$row['nama_jurusan'].' '.$row['urutan_kelasjurusan']; ?></label>
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">Daya Tampung</label>
                <div class="controls">
                    <label class="control-label" style="font-weight: bold;">: <?php echo $row['daya_tampung_kelasjurusan']; ?></label>

                    <input type="hidden" value="<?php echo $row['id_kelasjurusan']; ?>" name="id_">
                </div>
            </div>
        <!-- END FORM-->
      </div>
      <div class="modal-footer">
      	<button class="btn btn-danger" type="submit"><i class="icon-trash"></i> Hapus</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</form>