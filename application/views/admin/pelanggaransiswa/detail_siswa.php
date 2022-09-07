 <?=
 	alert();
 ?>
 <?php 
	$idwali = $siswa['id_wali_siswa'];
	$wali = $this->M_main->get_where('ortu','id_ortu',$idwali)->row_array();
?>
<?php $nis = $siswa['nis_siswa']; ?>
 <div class="row-fluid">
    <div class="span4">
        <!-- BEGIN GRID SAMPLE PORTLET-->
        <div class="widget red">
            <div class="widget-title">
                <h4><i class=" icon-asterisk"></i> Point Pelanggaran</h4>
            </div>
            <div class="widget-body">
            	<center>
	            	<h1 style="font-weight: bold;color:#FF3333;font-size: 80pt">
	            		<?php 
	            			$satus = 100;
	            			$q = $this->db->query("
	            							select sum(pelanggaran_siswa.point_pelanggaran) as jmlpoint, count(*) as jmlpelanggaran
											from pelanggaran_siswa where ((pelanggaran_siswa.nis_pelanggaran_siswa = $nis) and (pelanggaran_siswa.status_pelanggaran_siswa='1'))")->row_array();
	            			$point = $satus - $q['jmlpoint'];
	            			echo $point;
	            		?>
            		</h1>
            	</center>

            </div>
        </div>
        <!-- END GRID PORTLET-->
        <center>
        <?php if($point>=0){ ?>
            <a href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('Pelanggaransiswa','addpelanggaran',array($siswa['nis_siswa']))); ?>"" class="btn btn-danger tooltips" data-trigger="hover" data-original-title="<?= 'Tambah pelanggaran '.$siswa['nama_siswa']?>"><i class="icon-plus"></i> Tambah Pelanggaran Baru</a>
        <?php } ?>        	
        <?php if ($point<100): ?>
            <a href="javascript:void(0)" class="btn btn-primary tooltips" data-trigger="hover" data-original-title="<?= 'Detail '.$q['jmlpelanggaran'].' pelanggaran yang dilakukan oleh '.$siswa['nama_siswa']?>" onclick="detail('<?= $nis ?>')"><i class="icon-search"></i></a>
        <?php endif ?>
        </center>
    </div>
    <div class="span8">
        <!-- BEGIN GRID SAMPLE PORTLET-->
        <div class="widget blue">
            <div class="widget-title">
                <h4>
                	<i class="icon-user"></i> Siswa
                </h4>
                        <span class="tools">
                        <a class="icon-chevron-down" href="javascript:;"></a>
                        <a class="icon-remove" href="javascript:;"></a>
                        </span>
            </div>
            <div class="widget-body">
				<table class="table table-bordered">
					<tr>
						<td width="20%">NIS</td>
						<td><?php echo $siswa['nis_siswa']; ?></td>
					</tr>
					<tr>
						<td width="20%">Nama Siswa</td>
						<td><?php echo $siswa['nama_siswa']; ?></td>
					</tr>
					<tr>
						<td width="20%">HP Siswa</td>
						<td><?php echo $siswa['hp_siswa']; ?></td>
					</tr>
					<tr>
						<td width="20%">Alamat Siswa</td>
						<td>
							<?php echo $siswa['alamat_siswa']; ?>		
						</td>
					</tr>
				</table>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span4">
    	
    </div>
    <div class="span8">
        <!-- BEGIN GRID SAMPLE PORTLET-->
        <div class="widget blue">
            <div class="widget-title">
                <h4>
                	<i class="icon-user"></i> Orangtua
                </h4>
                        <span class="tools">
                        <a class="icon-chevron-down" href="javascript:;"></a>
                        <a class="icon-remove" href="javascript:;"></a>
                        </span>
            </div>
            <div class="widget-body">
				<table class="table table-bordered">
					<tr>
						<td width="20%">Orangtua</td>
						<td><?php echo $wali['nama_ortu']; ?></td>
					</tr>
					<tr>
						<td width="20%">Alamat Orangtua</td>
						<td><?php echo $wali['alamat_ortu']; ?></td>
					</tr>
					<tr>
						<td width="20%">HP Orangtua</td>
						<td><?php echo $wali['hp_ortu']; ?></td>
					</tr>
				</table>
            </div>
        </div>
    </div>
</div>
<script>
   function detail(id) {
    // $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('pelanggaransiswa/detailpelanggaran')?>",
         type:"POST",
         data:'id='+id,
         success:function(data){
            // $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#delete").modal("show");
         }
      });
   }
</script>