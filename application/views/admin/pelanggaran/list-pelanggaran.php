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
                        <th class="hidden-phone" width="50%" >Nama Pelanggaran</th>
                        <th class="hidden-phone" width="20%" >Kategori Pelanggaran</th>
                        <th class="hidden-phone" width="6%" >Point</th>
                        <th class="hidden-phone">
                            <center>
                                <a href="javascript:void(0)" class="btn btn-success" onclick="add()">
                                    <i class="icon-plus"></i> Tambah </a>
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=0;foreach ($pelanggaran as $row) {$no++ ?>
                    <tr class="odd gradeX">
                        <td class="hidden-phone"><?php echo $no; ?></td>
                        <td class="center hidden-phone"><?php echo $row->nama_pelanggaran; ?></td>
                        <td class="center hidden-phone">
                            <?php 
                                $idkategori = $row->id_kategori_pelanggaran;
                                $kategori = $this->db->get_where('kategori_pelanggaran',array('id_kategori_pelanggaran' => $idkategori ))->row_array();
                                echo $kategori['nama_kategori_kategori_pelanggaran'];
                            ?>
                        </td>
                        <td class="center hidden-phone" style="text-align: center"><?php echo $row->point_pelanggaran; ?></td>
                        <td class="hidden-phone">
                            <center>
                                <a href="javascript:void(0)" onclick="update('<?php echo $row->id_pelanggaran; ?>')" class="btn btn-sm btn-warning tooltips" data-trigger="hover" data-original-title="<?php echo "Edit Kategori Pelanggaran : ".$row->nama_pelanggaran; ?>"><i class="icon-edit"></i></a>
                                
                                <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id_pelanggaran; ?>')" class="btn btn-sm btn-danger tooltips" data-trigger="hover" data-original-title="<?php echo "Hapus Kategori Pelanggaran : ".$row->nama_pelanggaran; ?>"><i class="icon-trash"></i></a>
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
         url:"<?=site_url('pelanggaran/add')?>",
         type:"POST",
         data:'',
         success:function(data){
            $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#add").modal("show");
            $(".modal-title").text("Tambah Data Pelanggaran");
         }
      });
   }
   function hapus(id) {
    $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('pelanggaran/delete')?>",
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
    // $("#loading").fadeIn();
    $.ajax({
         url:"<?=site_url('pelanggaran/update')?>",
         type:"POST",
         data:'id='+id,
         success:function(data){
            // $("#loading").fadeOut('slow');
            $("#modal_crud").html(data);
            $("#update").modal("show");
            $(".modal-title").text("Edit data pelanggaran");
         }
      });
   }

</script>
