
 <?php echo alert(); ?>
 <?php if ($this->session->userdata('key_search')!=NULL) {
 	$key = $this->session->userdata('key_search');
 }else{
 	$key = "";
 } ?>
 <?php 
	$query = $this->db->Query("	select * from siswa
								where 
								((siswa.nis_siswa like '%$key%') 
								or (siswa.nama_siswa like '%$key%') 
								and (siswa.status_siswa = '1'))");
	$jml_search = $query->num_rows();
	$data_search = $query->result();
 ?>
<div class="row-fluid">
	<div class="span12">
	    <!-- BEGIN widget widget-->
	    <div class="widget white-full">
	        <div class="widget-title">
	            <h4><i class="icon-search"></i> Searh Siswa <span class="badge tooltips" data-trigger="hover" data-placement="right" data-original-title="Pencarian data siswa berdasarkan NIS atau Nama Siswa" style="background-color: #4a8bc2;cursor: pointer;">?</span></h4>
	        </div>
	        <div class="widget-body">
	        	<form action="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('pelanggaransiswa','search')); ?>" method="post" class="form-horizontal" >
		            <div class="row-fluid">
		            	<div class="span11">
		            		<label for="" class="control-label">
		            			<span style="font-size: 21pt;color: #3399ff;font-weight: bold">
		            				S
		            			</span>
		            			<span style="font-size: 21pt;color: #ff3333;font-weight: bold">
		            				e
		            			</span>
		            			<span style="font-size: 21pt;color: #ffcc00;font-weight: bold">
		            				a
								</span>
								<span style="font-size: 21pt;color: #3399ff;font-weight: bold">
		            				r
								</span>
								<span style="font-size: 21pt;color: #339966;font-weight: bold">
		            				c
								</span>
								<span style="font-size: 21pt;color: #ff3333;font-weight: bold">
		            				h
								</span>
		            		</label>
				            <div class="control-group">
			                    <div class="controls">
			                        <input type="text" class="input-block-level" placeholder="Telusuri nis atau nama siswa" required name="search" autocomplete="off" value="<?php echo $key; ?>">
			                    </div>
			                </div>
		            	</div>
		            	<div class="span1">
		            		<button class="btn btn-primary"><i class="icon-search"></i> Cari </button>
		            	</div>
		            </div>
	        	</form>
	    <hr>
		<?php if ($jml_search!=Null):
			echo "Ditemukan ".$jml_search.' hasil ('.$waktu_search.' detik)';	   
		endif ?>	        
		<br>
		<br>
		<br>

		<?php foreach ($data_search as $row): ?>
			<?php 
				$nis = $row->nis_siswa;
				$idkelas = $row->id_kelas_siswa;
				$kelasjurusan = $this->M_main->get_where('kelastetap','id_kelasjurusan',$idkelas)->row_array();
			?>

			<div class="row-fluid">
				<div class="span12">
					<a href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('pelanggaransiswa','detail_siswa',array($nis))); ?>" class="control-label" style="font-size: 18pt;color: #406CC7"><?php echo $row->nama_siswa; ?></a>
					<label for="">
						<?php 
							echo 'Siswa kelas <b><i>'.$kelasjurusan['tingkatan_kelas'].' '.$kelasjurusan['nama_jurusan'].' '.$kelasjurusan['urutan_kelasjurusan'].'</b></i> <br>  NIS : <b>'.$row->nis_siswa.'</b>';
						?>
					</label>
				</div>
			</div>
			<br>
		<?php endforeach ?>



	        </div>
	    </div>
	    <!-- END widget widget-->
	</div>
</div>