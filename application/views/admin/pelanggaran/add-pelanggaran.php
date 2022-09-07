<!-- Modal -->
<form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo site_url('pelanggaran/add'); ?>">
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
                <label for="firstname" class="control-label">Nama Pelanggaran</label>
                <div class="controls">
                    <input class="span12 " required name="nama" type="text" autocomplete="off" required />
                </div>
            </div>

             <div class="control-group">
                <label class="control-label">Kategori</label>
                <div class="controls">
                    <select required data-placeholder="- Pilih Kategori - " class="chzn-select-deselect span12" tabindex="-1" id="selCSI" name="idkategori">
                        <option value="">- Pilih Kategori Pelanggaran -</option>
                        <?php foreach ($kategori as $row) { ?>
                          <option value="<?php echo $row->id_kategori_pelanggaran; ?>"><?php echo $row->nama_kategori_kategori_pelanggaran; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="control-group ">
                <label for="firstname" class="control-label">Point</label>
                <div class="controls">
                    <input required class="span2" style="text-align: right;" name="point" type="text" autocomplete="off" onkeypress="return hanyaAngka(event)" required />
                </div>
            </div>
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