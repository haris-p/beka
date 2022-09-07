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
                        <th class="hidden-phone" width="20%" >Akronim Jurusan</th>
                        <th class="hidden-phone" width="60%" >Nama Jurusan</th>
                        <th class="hidden-phone">
                            <center>
                                <a href="javascript:void(0)" class="btn btn-success" onclick="add()">
                                    <i class="icon-plus"></i> Tambah </a>
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=0;foreach ($jurusan as $row) {$no++ ?>
                    <tr class="odd gradeX">
                        <td class="hidden-phone"><?php echo $no; ?></td>
                        <td class="center hidden-phone"><?php echo $row->akronim_jurusan; ?></td>
                        <td class="center hidden-phone"><?php echo $row->nama_jurusan; ?></td>
                        <td class="hidden-phone">
                            <center>
                                <a href="javascript:void(0)" onclick="update('<?php echo $row->id_jurusan; ?>')" class="btn btn-sm btn-warning tooltips" data-trigger="hover" data-original-title="<?php echo "Edit Kategori jurusan : ".$row->nama_jurusan; ?>"><i class="icon-edit"></i></a>
                                
                                <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id_jurusan; ?>')" class="btn btn-sm btn-danger tooltips" data-trigger="hover" data-original-title="<?php echo "Hapus Kategori jurusan : ".$row->nama_jurusan; ?>"><i class="icon-trash"></i></a>

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
         url:"<?=site_url('jurusan/add')?>",
         type:"POST",
         data:'',
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#add").modal("show");
            $(".modal-title").text("Tambah jurusan");
         }
      });
   }
   function hapus(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('jurusan/delete')?>",
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

   function update(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('jurusan/update')?>",
         type:"POST",
         data:'id='+id,
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#update").modal("show");
            $(".modal-title").text("Edit jurusan");
         }
      });
   }

</script>
