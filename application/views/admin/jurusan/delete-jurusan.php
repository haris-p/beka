<!-- Modal -->
<form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo site_url('jurusan/delete'); ?>">
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
                <label for="firstname" class="control-label">Nama Jurusan</label>
                <div class="controls">
                    <label class="control-label" style="font-weight: bold;">: <?php echo $row['nama_jurusan']; ?></label>
                </div>
            </div>
            <div class="control-group ">
                <label for="firstname" class="control-label">Akronim Jurusan</label>
                <div class="controls">
                    <label class="control-label" style="font-weight: bold;">: <?php echo $row['akronim_jurusan']; ?></label>

                    <input type="hidden" value="<?php echo $row['id_jurusan']; ?>" name="id_">
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