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
						<th class="hidden-phone" width="15%" >ID Orangtua</th>
                        <th class="hidden-phone" width="20%" >Nama Orangtua</th>
                        <th class="hidden-phone" width="25%" >Alamat</th>
                        <th class="hidden-phone" width="15%" >No Handphone</th>
						<th class="hidden-phone" width="20%" >Pekerjaan</th>
                        <th class="hidden-phone">
                            <center>
                                <a href="javascript:void(0)" class="btn btn-success" onclick="add()">
                                    <i class="icon-plus"></i> Tambah </a>
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=0;foreach ($ortu as $row) {$no++ ?>
                    <tr class="odd gradeX">
                        <td class="hidden-phone"><?php echo $no; ?></td>
						<td class="center hidden-phone"><?php echo $row->id_ortu; ?></td>
                        <td class="center hidden-phone"><?php echo $row->nama_ortu; ?></td>
                        <td class="center hidden-phone"><?php echo $row->alamat_ortu; ?></td>
                        <td class="center hidden-phone"><?php echo $row->hp_ortu; ?></td>
						<td class="center hidden-phone"><?php echo $row->pekerjaan_ortu; ?></td>
                        <td class="hidden-phone">
                            <center>
                                <a href="javascript:void(0)" onclick="update('<?php echo $row->id_ortu; ?>')" class="btn btn-sm btn-warning tooltips" data-trigger="hover" data-original-title="<?php echo "Edit Data Orangtua : ".$row->nama_ortu; ?>"><i class="icon-edit"></i></a>
                                
                                <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id_ortu; ?>')" class="btn btn-sm btn-danger tooltips" data-trigger="hover" data-original-title="<?php echo "Hapus Data Orangtua : ".$row->nama_ortu; ?>"><i class="icon-trash"></i></a>

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
         url:"<?=site_url('ortu/add')?>",
         type:"POST",
         data:'',
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#add").modal("show");
            $(".modal-title").text("Orangtua");
         }
      });
   }
    function update(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('ortu/update')?>",
         type:"POST",
         data:'id='+id,
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#update").modal("show");
            $(".modal-title").text("Orangtua");
         }
      });
   }
   function hapus(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('ortu/delete')?>",
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
