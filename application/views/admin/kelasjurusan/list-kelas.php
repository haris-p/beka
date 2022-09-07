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
                        <th width="5%">No</th>
                        <th class="hidden-phone" width="40%" >Nama Kelas</th>
                        <th class="hidden-phone" width="15%" >Daya Tampung</th>
                        <th class="hidden-phone" width="25%" >Wali Kelas</th>
                        <th class="hidden-phone">
                            <center>
                               <a href="javascript:void(0)" class="btn btn-success" onclick="add()">
                                    <i class="icon-plus"></i> Tambah </a>
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=0;foreach ($kelas as $row) {$no++ ?>
                    <tr class="odd gradeX">
                        <td class="hidden-phone"><?php echo $no; ?></td>
                        <td class="center hidden-phone">
                            <?php echo $row->tingkatan_kelas.' '.$row->nama_jurusan.' '.$row->urutan_kelasjurusan; ?>        
                        </td>
                        <td class="center hidden-phone" style="text-align: right;"><?php echo $row->daya_tampung_kelasjurusan.' Siswa'; ?></td>
                        <td class="center hidden-phone">
                            <?php 
                                $idwali = $row->id_walikelas_kelasjurusan;
                                if ($idwali==NULL) {?>
                                    <label class="label label-important">belum ditentukan</label>
                            <?php }else{?>
                                <?php
                                    $idwali = $row->id_walikelas_kelasjurusan;
                                    $guru = $this->M_main->get_where('guru','id_guru',$idwali)->row_array();
                                    echo $guru['nama_guru'];
                                ?>
                            <?php } ?> 

                            <?php 
                                    $idwali = $row->id_walikelas_kelasjurusan;
                                    if ($idwali==NULL) {?>
                                        <a href="javascript:void(0)" onclick="setwali('<?php echo $row->id_kelasjurusan; ?>')" class="btn btn-sm tooltips pull-right btn-success" data-trigger="hover" data-original-title="<?php echo "Set Wali Kelas : ".$row->tingkatan_kelas.' '.$row->nama_jurusan.' '.$row->urutan_kelasjurusan; ?>"><i class="icon-user"></i></a>
                                    <?php }else{ ?>
                                        <a href="javascript:void(0)" onclick="remove('<?php echo $row->id_kelasjurusan; ?>')" class="btn btn-sm tooltips pull-right btn-danger" data-trigger="hover" data-original-title="<?php echo "Remove Wali Kelas : ".$row->tingkatan_kelas.' '.$row->nama_jurusan.' '.$row->urutan_kelasjurusan; ?>"><i class="icon-refresh"></i></a>
                                    <?php } ?>
                        </td>
                        <td class="hidden-phone">
                            <center>                                
                                <a href="javascript:void(0)" onclick="detail('<?php echo $row->id_kelasjurusan; ?>')" class="btn btn-sm btn-primary tooltips" data-trigger="hover" data-original-title="<?php echo "Detail Kelas : ".$row->tingkatan_kelas.' '.$row->nama_jurusan.' '.$row->urutan_kelasjurusan; ?>"><i class="icon-search"></i></a>
                                
                                <a href="javascript:void(0)" onclick="update('<?php echo $row->id_kelasjurusan; ?>')" class="btn btn-sm btn-warning tooltips" data-trigger="hover" data-original-title="<?php echo "Edit Kelas : ".$row->tingkatan_kelas.' '.$row->nama_jurusan.' '.$row->urutan_kelasjurusan; ?>"><i class="icon-edit"></i></a>
                                
                                <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id_kelasjurusan; ?>')" class="btn btn-sm btn-danger tooltips" data-trigger="hover" data-original-title="<?php echo "Hapus Kelas : ".$row->tingkatan_kelas.' '.$row->nama_jurusan.' '.$row->urutan_kelasjurusan; ?>"><i class="icon-trash"></i></a>
                            </center>  
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END EXAMPLE TABLE widget-->
    </div>
</div>

<script>
     function add(){
      $("#loading").fadeIn();
      $.ajax({
         url:"<?=site_url('kelasjurusan/add')?>",
         type:"POST",
         data:'',
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#add").modal("show");
            $(".modal-title").text("Buat Kelas Jurusan");
         }
      });
   }
  function update(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('kelasjurusan/update')?>",
         type:"POST",
         data:'id='+id,
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#update").modal("show");
            $(".modal-title").text("Edit Kelas Jurusan");
         }
      });
   }
   function detail(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('kelasjurusan/detail')?>",
         type:"POST",
         data:'id='+id,
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#detail").modal("show");
            $(".modal-title").text("Detail Data Kelas dan Jurusan");
         }
      });
   }
   function setwali(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('kelasjurusan/setwali')?>",
         type:"POST",
         data:'id='+id,
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#wali").modal("show");
            $(".modal-title").text("Set Wali Kelas");
         }
      });
   }
  function hapus(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('kelasjurusan/delete')?>",
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
   function remove(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('kelasjurusan/remove')?>",
         type:"POST",
         data:'id='+id,
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#delete").modal("show");
            $(".modal-title").text("Yakin untuk meremove wali kelas?");
         }
      });
   }


</script>
