<!-- BEGIN ADVANCED TABLE widget-->
<div id="alert">
    <?=alert()?>
</div>

<div class="row-fluid">
    <div class="span12">
    <!-- BEGIN EXAMPLE TABLE widget-->
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-random"></i> <?php echo $cumb_up; ?></h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
        </div>
        <div class="widget-body">
            <table class="table table-striped table-bordered myTable" id="myTable">
                <thead>
                    <tr>
					        <th width="2%">No</th>
					        <th class="hidden-phone" width="5%" >NIS</th>
					        <th class="hidden-phone" width="15%" >Nama</th>
							<th class="hidden-phone" width="10%" >Kelas</th>
					        <th class="hidden-phone" width="20%" >Pelanggaran</th>
					        <th class="hidden-phone" width="10%" >Point</th>
							<th class="hidden-phone" width="15%" >Keterangan</th>
							<th class="hidden-phone" width="5%" >Opsi</th>
							
					<center>
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=0;foreach ($laporan as $row) {$no++ ?>
                    <tr class="odd gradeX">
                        <td class="hidden-phone"><?php echo $no; ?></td>
						<td class="center hidden-phone"><?php echo $row->nis_pelanggaran_siswa; ?></td>
						<td>
						<?php
							$id = $row->nis_pelanggaran_siswa;
							$siswa = $this->M_main->get_where('siswa','nis_siswa',$id)->row_array();
							echo $siswa['nama_siswa'];
						?>    
						</td>
						<td>
						<?php 
                        $nis = $row->nis_pelanggaran_siswa;
                        $datasiswa = $this->db->get_where('siswa',array('nis_siswa' => $nis))->row_array();
                        $idkelassiswa = $datasiswa['id_kelas_siswa'];
                        $kelas = $this->db->get_where('kelastetap',array('id_kelasjurusan' => $idkelassiswa))->row_array();	
						echo $kelas['tingkatan_kelas'].' '.$kelas['akronim_jurusan'].' '.$kelas['urutan_kelasjurusan'];
								?>   
						</td>
						</td>
						<td class="center hidden-phone">
						<?php
							$idjenispelanggaran = $row->id_pelanggaran_pelanggaran_siswa;
							$jenispelanggaran = $this->M_main->get_where('pelanggaran','id_pelanggaran',$idjenispelanggaran)->row_array();
							$idkategori = $jenispelanggaran['id_kategori_pelanggaran'];
							$kategori = $this->M_main->get_where('kategori_pelanggaran','id_kategori_pelanggaran',$idkategori)->row_array();
							echo $jenispelanggaran['nama_pelanggaran'];
							echo "<br>";
							echo "Kategori : ".$kategori['nama_kategori_kategori_pelanggaran'];
						?>
						</td>
						<td class="center hidden-phone"style="text-align: center"><?php echo $row->point_pelanggaran; ?></td>
						<td class="center hidden-phone"><?php echo $row->keterangan_pelanggaran_siswa; ?></td>
						</td>
						<td class="hidden-phone"</th>
						<a href="javascript:void(0)" onclick="hapus('<?php echo $row->id_pelanggaran_siswa; ?>')" class="btn btn-sm btn-danger tooltips" data-trigger="hover" data-original-title="<?php echo "Hapus Data siswa : ".$row->nis_pelanggaran_siswa; ?>"><i class="icon-trash"></i></a>
                     </center>  
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script>
   function hapus(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('laporan/delete')?>",
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