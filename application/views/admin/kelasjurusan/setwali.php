
<!-- Modal -->
<form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo site_url('kelasjurusan/proses_setwali'); ?>">
<div id="wali" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color:#87bb33">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
         <!-- BEGIN FORM-->
         <div class="row-fluid">
         	<div class="span12">
	            <table class="table table-striped">
	                <tr>
	                    <th width="35%">Kelas</th>
	                    <td><?php echo $row['tingkatan_kelas'].' '.$row['nama_jurusan'].' '.$row['urutan_kelasjurusan']; ?></td>
	                    <input type="hidden" name="id_" value="<?php echo $row['id_kelasjurusan']; ?>">
	                </tr>
	                <tr>
	                    <th width="35%">Pilih Wali Kelas</th>
	                    <?php 
	                    	$guru = $this->M_main->get_where('guru','status_guru','1')->result();
	                    ?>
	                    <td>
	                    	<select required data-placeholder="- Pilih Kategori - " class="chzn-select-deselect span12" tabindex="-1" id="selCSI" name="idguru">
                        		<option value="">- Pilih Wali Kelas - </option>
		                        <?php foreach ($guru as $row) { ?>
		                          <option value="<?php echo $row->id_guru; ?>"><?php echo $row->nama_guru; ?></option>
		                        <?php } ?>
                    </select>
	                    </td>
	                </tr>
	            </table>
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