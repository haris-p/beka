<!-- Modal -->
<form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo site_url('Ortu/update'); ?>">
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
                <label for="firstname" class="control-label">ID Orangtua</label>
                <div class="controls">
                    <input class="span12 " name="idortu" type="text" value="<?php echo $row['id_ortu']; ?>" autocomplete="off" required />
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">Nama Orangtua</label>
                <div class="controls">
                    <input class="span12 " name="nama" type="text" value="<?php echo $row['nama_ortu']; ?>" autocomplete="off" required />
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">Alamat</label>
                <div class="controls">
                    <input class="span12 " value="<?php echo $row['alamat_ortu']; ?>" name="alamat" type="text" autocomplete="off" required />
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">NO Handphone</label>
                <div class="controls">
                    <input class="span12 " name="hp" value="<?php echo $row['hp_ortu']; ?>" type="text" autocomplete="off" required />
                </div>
            </div>
			 <div class="control-group ">
                <label for="firstname" class="control-label">Pekerjaan</label>
                <div class="controls">
                    <input class="span12 " name="pekerjaan" value="<?php echo $row['pekerjaan_ortu']; ?>" type="text" autocomplete="off" required />
                </div>
            </div>
            <input type="hidden" value="<?php echo $row['id_ortu']; ?>" name="id_">
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