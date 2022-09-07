 <?php 
 	alert();
 	$xyz = $this->session->userdata('idkelas_dimenu_siswa');
 ?>
 <div class="row-fluid">
    <div class="span3">
        <!-- BEGIN GRID SAMPLE PORTLET-->
        <div class="widget blue">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Panel</h4>
                        <span class="tools">
                        <a class="icon-chevron-down" href="javascript:;"></a>
                        <a class="icon-remove" href="javascript:;"></a>
                        </span>
            </div>
            <div class="widget-body">
            	<form action="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('siswa','index')); ?>" method="post">
                <div class="control-group">
                    <label class="control-label">Pilih Kelas</label>
                    <div class="controls">
                        <select required data-placeholder="- Pilih Kategori - " class="chzn-select-deselect span12" tabindex="-1" id="selCSI" name="idkelas">
	                        <option value="">- Pilih Kelas -</option>
	                        <?php foreach ($kelastetap as $row) { ?>
	                          <option value="<?php echo $row->id_kelasjurusan; ?>"
								<?php 
									if ($xyz!=NULL) {
										if ($row->id_kelasjurusan==$xyz) {
											echo "selected";
										}
									}
								?>
	                          >
	                            <?php echo $row->tingkatan_kelas.' '.$row->nama_jurusan.' '.$row->urutan_kelasjurusan; ?></option>
	                        <?php } ?>
	                    </select>
                    </div>
                </div>
	                <center>
		            	<?php if ($xyz!=NULL): ?>
		            		<a href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('siswa','refreshsearch')); ?>" class="btn btn-danger"><i class="icon-refresh"></i> Refresh</a>
		            	<?php endif ?>
		            		<button type="submit" class="btn btn-primary"><i class="icon-search"></i> &nbsp;Cari</button>
	                </center>	
                </form>
            </div>
        </div>
        <!-- END GRID PORTLET-->
    </div>
    <div class="span9">
        <!-- BEGIN GRID SAMPLE PORTLET-->
        <div class="widget blue">
            <div class="widget-title">
                <h4>
                	<i class="icon-user"></i> Siswa
                	<?php if ($xyz!=NULL): ?>
                		<?php 
                			$kelasjurusan = $this->M_main->get_where('kelastetap','id_kelasjurusan',$xyz)->row_array();
                			echo $kelasjurusan['tingkatan_kelas'].' '.$kelasjurusan['nama_jurusan'].' '.$kelasjurusan['urutan_kelasjurusan'];
                		?>
                	<?php endif ?>
                </h4>
                        <span class="tools">
                        <a class="icon-chevron-down" href="javascript:;"></a>
                        <a class="icon-remove" href="javascript:;"></a>
                        </span>
            </div>
            <div class="widget-body">
				<table class="table table-striped table-bordered myTable" id="myTable">
					<thead>
					    <tr>
					        <th width="5%">No</th>
					        <th class="hidden-phone" width="15%" >NIS</th>
					        <th class="hidden-phone" width="20%" >Nama Siswa</th>
					        <th class="hidden-phone" width="20%" >Alamat</th>
					        <th class="hidden-phone" width="15%" >Jenis Kelamin</th>
							<th class="hidden-phone" width="15%" >No Handphone</th>
			        	<?php 
			        		if ($xyz!=NULL) {?>
						        <th class="hidden-phone">
						            <center>
						                <a href="javascript:void(0)" class="btn btn-success" onclick="add('<?php echo $xyz; ?>')">
						                    <i class="icon-plus"></i> Tambah </a>
						            </center>
						        </th>
		        		<?php } ?>
					    </tr>
					</thead>
					<tbody>
					<?php $no=0;foreach ($siswa as $row) {$no++ ?>
					    <tr class="odd gradeX">
					        <td class="hidden-phone"><?php echo $no; ?></td>
					        <td class="center hidden-phone"><?php echo $row->nis_siswa; ?></td>
					        <td class="center hidden-phone"><?php echo $row->nama_siswa; ?></td>
					        <td class="center hidden-phone"><?php echo $row->alamat_siswa; ?></td>
					        <td class="center hidden-phone">
					            <?php 
					                $jenkel =  $row->jenkel_siswa; 
					                kelamin($jenkel);
					            ?>
							<td class="center hidden-phone"><?php echo $row->hp_siswa; ?></td>
					        </td>
					        <?php 
			        			if ($xyz!=NULL) {?>
							        <td class="hidden-phone">
							            <center>
							                <a href="javascript:void(0)" onclick="update('<?php echo $row->nis_siswa; ?>')" class="btn btn-sm btn-warning tooltips" data-trigger="hover" data-original-title="<?php echo "Edit Data siswa : ".$row->nama_siswa; ?>"><i class="icon-edit"></i></a>
							                
							                <a href="javascript:void(0)" onclick="hapus('<?php echo $row->nis_siswa; ?>')" class="btn btn-sm btn-danger tooltips" data-trigger="hover" data-original-title="<?php echo "Hapus Data siswa : ".$row->nama_siswa; ?>"><i class="icon-trash"></i></a>
							            </center>  
							        </td>
							<?php } ?>
					    </tr>
					<?php } ?>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>
<script>
    function add(id){
      $("#loading").fadeIn();
      $.ajax({
         url:"<?=site_url('siswa/add')?>",
         type:"POST",
         data:'id='+id,
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#add").modal("show");
         }
      });
   }
    function update(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('siswa/update')?>",
         type:"POST",
         data:'id='+id,
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#update").modal("show");
            $(".modal-title").text("Edit siswa");
         }
      });
   }
   function hapus(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('siswa/delete')?>",
         type:"POST",
         data:'id='+id,
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#delete").modal("show");
            $(".modal-title").text("Yakin menghapus data ini?");
         }
      });
   }
</script>