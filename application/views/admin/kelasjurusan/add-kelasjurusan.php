<?php 
  
?>

<!-- Modal -->
<form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo site_url('Kelasjurusan/add'); ?>">
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color:#87bb33">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
         <!-- BEGIN FORM-->
            <div class="control-group ">
                <label for="firstname" class="control-label">Tingkatan Kelas</label>
                <div class="controls">
                    <select required data-placeholder="- Pilih Kategori - " class="chzn-select-deselect span12" tabindex="-1" id="selCSI" name="idkelas">
                        <option value="">- Pilih Tingkatan -</option>
                        <?php foreach ($kelas as $row) { ?>
                          <option value="<?php echo $row->id_kelas; ?>">
                            <?php echo $row->tingkatan_kelas.' - '.$row->nama_kelas; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">Jurusan Kelas</label>
                <div class="controls">
                    <select required data-placeholder="- Pilih Kategori - " class="chzn-select-deselect span12" tabindex="-1" id="selCSI" name="idjurusan">
                        <option value="">- Pilih Jurusan -</option>
                        <?php foreach ($jurusan as $row) { ?>
                          <option value="<?php echo $row->id_jurusan; ?>">
                            <?php echo $row->nama_jurusan; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">Urutan</label>
                <div class="controls">
                    <input class="span12 " name="urutan" placeholder="ex : A" type="text" autocomplete="off" required />
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">Daya Tampung</label>
                <div class="controls">
                    <input class="span12 " name="dayatampung" placeholder="ex : 32" type="number" autocomplete="off" required />
                </div>
            </div>
            <input type="hidden" name="nama" value="ada">
        <!-- END FORM-->
      </div>
      <div class="modal-footer">
      	<button class="btn btn-success" type="submit"><i class="icon-save"></i> Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</form>
<script>
	$(document).ready(function(){
		// $("#commentForm").validate();
	});
</script>