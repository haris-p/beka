
<!-- Modal -->
<form class="cmxform form-horizontal" id="commentForm" method="post" action="<?php echo site_url('Kelas/delete'); ?>">
<div id="detail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="color: white;background-color:#4a8bc2">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
         <!-- BEGIN FORM-->
         <div class="row-fluid">
         	<div class="span12">
	            <table class="table table-striped">
	                <tr>
	                    <th width="35%">Tingkatan</th>
	                    <td><?php echo $row['tingkatan_kelas']; ?></td>
	                </tr>
	                <tr>
	                    <th width="35%">Nama Kelas</th>
	                    <td><?php echo $row['nama_kelas']; ?></td>
	                </tr>
	                <tr>
	                    <th width="35%">Jurusan/Akronim Jurusan</th>
	                    <td><?php echo $row['nama_jurusan'].'/'.$row['akronim_jurusan']; ?></td>
	                </tr>
	                <tr>
	                    <th width="35%">Urutan Kelas</th>
	                    <td><?php echo $row['urutan_kelasjurusan']; ?></td>
	                </tr>
					<tr>
	                    <th width="35%">Daya Tampung</th>
	                    <td><?php echo $row['daya_tampung_kelasjurusan']; ?></td>
	                </tr>
	            </table>
	        </div>
         </div>
        <!-- END FORM-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</form>