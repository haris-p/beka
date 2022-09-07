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
                        <th class="hidden-phone" width="15%" >NIS</th>
                        <th class="hidden-phone" width="25%" >Nama siswa</th>
                        <th class="hidden-phone" width="25%" >Alamat</th>
                        <th class="hidden-phone" width="10%" >Jenis Kelamin</th>
                        <th class="hidden-phone" width="10%" >No Handphone</th>
                        <th class="hidden-phone">
                            <center>
                              Opsi
                            </center>
                        </th>
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
                        </td>
                        <td class="center hidden-phone"><?php echo $row->hp_siswa; ?></td>
                        <td class="hidden-phone">
                            <center>
                              <a href="javascript:void(0)" class="btn btn-primary tooltips" data-trigger="hover" data-original-title="<?= 'Detail pelanggaran yang dilakukan oleh '.$row->nama_siswa?>" onclick="detail('<?= $row->nis_siswa ?>')"><i class="icon-search"></i></a>
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