 <?php 
 	alert();
 ?>
 <div class="row-fluid">
    <div class="span12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="widget blue">
            <div class="widget-title">
                <h4><i class="icon-plus"></i> Tambah data pelanggaran yang dilakukan oleh : <?=$siswa['nama_siswa']?></h4>
            </div>
            <div class="widget-body form">
                <!-- BEGIN FORM-->
                <form class="cmxform form-horizontal" method="post" action="<?php echo site_url('pelanggaransiswa/prosesadd') ?>">
                    <div class="control-group ">
                        <label for="firstname" class="control-label">NIS</label>
                        <div class="controls">
                            <input class="span12 " name="nisfake" readonly value="<?=$siswa['nis_siswa']?>" type="text"/>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label for="lastname" class="control-label">Nama Siswa</label>
                        <div class="controls">
                            <input class="span12 " readonly name="nama" value="<?=$siswa['nama_siswa']?>" type="text" />
                        </div>
                    </div>
                    <div class="control-group ">
                        <label for="username" class="control-label">Kategori Pelanggaran</label>
                        <div class="controls">
		                    <select required data-placeholder="- Pilih Kategori - " class="chzn-select-deselect span12 " tabindex="-1" id="selCSI" name="idkategori">
		                        <option value="">- Pilih Kategori Pelanggaran -</option>
		                        <?php foreach ($kategori as $row) { ?>
		                          <option value="<?php echo $row->id_kategori_pelanggaran; ?>"><?php echo $row->nama_kategori_kategori_pelanggaran; ?></option>
		                        <?php } ?>
		                    </select>
		                </div>
                    </div>
                    <div class="control-group ">
                        <label for="username" class="control-label">Nama Pelanggaran</label>
                        <div class="controls">
		                    <select required data-placeholder="- Pilih Nama Pelanggaran - " class="chzn-select-deselect span12" tabindex="-1" id="selCSI" name="idkategoripelanggaran">
		                        <option value="">- Pilih Nama Pelanggaran -</option>
		                    </select>
		                </div>
                    </div>
					<div class="control-group">
	                    <label class="control-label">Point Pelanggaran</label>
	                    <div class="controls">
	                        <input type="text" name="pointpelanggaran" class="span12">
	                    </div>
	                </div>
                    <div class="control-group">
	                    <label class="control-label">Tanggal Kejadian</label>
	                    <div class="controls">
	                        <input type="date" name="tglkejadian" class="span12">
	                    </div>
	                </div>
	                <div class="control-group">
	                    <label class="control-label">Tempat Kejadian</label>
	                    <div class="controls">
	                        <input type="text" name="tempatkejadian" class="span12">
	                    </div>
	                </div>
                    <div class="control-group ">
                        <label for="confirm_password" class="control-label">Keterangan</label>
                        <div class="controls">
                           <textarea class="span12 wysihtmleditor5" rows="5" name="keterangan"></textarea> 
                        </div>
                    </div>
                    <div class="form-actions">
                    	<input type="hidden" value="<?= $siswa['nis_siswa']?>" name="nis_tenan">
                        <button class="btn btn-success" type="submit">Save</button>
                        <button class="btn" type="button">Cancel</button>
                    </div>

                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>

<script>
	window.onload= function(){
        $("select[name='idkategori']").change(function (){
            var url = "<?php echo site_url('pelanggaransiswa/loadpelanggaran');?>/"+$(this).val();
            $("select[name='idkategoripelanggaran']").load(url);
            return false;
        });
 	};
    // $(document).ready(function(){
    //     alert('tes');
    // });
</script>
