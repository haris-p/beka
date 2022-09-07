<!-- Modal -->
<form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo site_url('siswa/update'); ?>">
<div id="update" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color:#fb9800">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
         <!-- BEGIN FORM-->
             <div class="control-group ">
                <label for="firstname" class="control-label">NIS</label>
                <div class="controls">
                    <input class="span12 " onKeyPress="return isNumberKey(this)" name="nis" type="text" autocomplete="off" value="<?php echo $row['nis_siswa']; ?>"  />
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">Nama siswa</label>
                <div class="controls">
                    <input class="span12 " name="nama" type="text" value="<?php echo $row['nama_siswa']; ?>" autocomplete="off" required />
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">Alamat</label>
                <div class="controls">
                    <input class="span12 " value="<?php echo $row['alamat_siswa']; ?>" name="alamat" type="text" autocomplete="off" required />
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">Jenis Kelamin</label>
                <div class="controls">
                    <select required class="chzn-select-deselect span12" tabindex="-1" id="selCSI" name="jenkel">
                        <option value="">- Pilih Jenis Kelamin -</option>
                        <option value="L" <?php if ($row['jenkel_siswa']=='L'): ?>
                          <?php echo "selected"; ?>
                        <?php endif ?>>Laki - Laki</option>
                        <option value="P" <?php if ($row['jenkel_siswa']=='P'): ?>
                          <?php echo "selected"; ?>
                        <?php endif ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">NO HP</label>
                <div class="controls">
                    <input class="span12 " name="hp" value="<?php echo $row['hp_siswa']; ?>" type="text" autocomplete="off" required />
                </div>
            </div>
            <input type="hidden" value="<?php echo $row['nis_siswa']; ?>" name="id_">
			
			<div class="control-group ">
                <label for="firstname" class="control-label">Orangtua</label>
                <div class="controls">
                    <select required data-placeholder="- Pilih Kategori - " class="chzn-select-deselect span12" tabindex="-1" id="selCSI" name="wali">
                        <option value="">- Pilih Orangtua -</option>
                        <?php foreach ($ortu as $ort) { ?>
                          <option value="<?php echo $ort->id_ortu; ?>"
                          <?php if($ort->id_ortu==$row['id_wali_siswa']){echo 'selected';} ?>
                          >
                            <?php echo $ort->nama_ortu; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        <!-- END FORM-->
      </div>
      <div class="modal-footer">
      	<button class="btn btn-warning" type="submit"><i class="icon-edit"></i> Update</button>
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
      