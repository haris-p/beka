<script src="<?php echo base_url('') ?>UI/code/highcharts.js"></script>
<script src="<?php echo base_url('') ?>UI/code/modules/exporting.js"></script>
<?= alert()?>
<?php
    $pelanggaran = $this->db->query("
select kategori_pelanggaran.nama_kategori_kategori_pelanggaran, 
pelanggaran_siswa.id_pelanggaran_pelanggaran_siswa, 
count(pelanggaran_siswa.id_pelanggaran_pelanggaran_siswa) as jml 
from pelanggaran_siswa, pelanggaran, kategori_pelanggaran
where (
(pelanggaran_siswa.id_pelanggaran_pelanggaran_siswa = pelanggaran.id_pelanggaran) 
and (kategori_pelanggaran.id_kategori_pelanggaran=pelanggaran.id_kategori_pelanggaran)
)
group by pelanggaran_siswa.id_pelanggaran_pelanggaran_siswa
order by jml desc
limit 5")->result();

?>

<!--  -->
 <div class="row-fluid">
    <!--BEGIN METRO STATES-->
    <div class="metro-nav">
        <div class="metro-nav-block nav-block-blue">
        	<?php 
        		$siswa = $this->db->query("select count(*) as jmlsiswa from siswa where status_siswa='1'")->row_array();
        	?>
            <a data-original-title="" href="#">
                <i class="icon-user"></i>
                <div class="info"><?=$siswa['jmlsiswa']?></div>
                <div class="status">Siswa</div>
            </a>
        </div>
        <?php 
                $guru = $this->db->query("select count(*) as jmlguru from guru where status_guru='1'")->row_array();
        ?>
         <div class="metro-nav-block nav-block-blue">
            <a data-original-title="" href="#">
                <i class="icon-male"></i>
                <div class="info"><?=$guru['jmlguru']?></div>
                <div class="status">Guru</div>
            </a>
        </div>
        <?php 
                $ps = $this->db->query("select count(*) as jmlpelanggaran from pelanggaran_siswa where status_pelanggaran_siswa='1'")->row_array();
        ?>
        <div class="metro-nav-block nav-block-blue double ">
            <a data-original-title="" href="#">
                <i class="icon-exclamation"></i>
                <div class="info"><?=$ps['jmlpelanggaran']?></div>
                <div class="status">Jumlah Pelanggaran Siswa</div>
            </a>
        </div>
        <?php 
            $kls = $this->db->query("select count(*) as jmlkelas from kelasjurusan where status_kelasjurusan='1'")->row_array();
        ?>
         <div class="metro-nav-block nav-block-blue">
            <a data-original-title="" href="#">
                <i class="icon-home"></i>
                <div class="info"><?=$kls['jmlkelas']?></div>
                <div class="status">Kelas</div>
            </a>
        </div>
          <?php 
            $jrs = $this->db->query("select count(*) as jmljurusan from jurusan where status_jurusan='1'")->row_array();
        ?>
         <div class="metro-nav-block nav-block-blue">
            <a data-original-title="" href="#">
                <i class="icon-windows"></i>
                <div class="info"><?=$jrs['jmljurusan']?></div>
                <div class="status">Jurusan</div>
            </a>
        </div>
    </div>
    <!--END METRO STATES-->
</div>

<div class="row-fluid">
    <div class="span7">
        <!-- BEGIN GRID SAMPLE PORTLET-->
        <div class="widget blue">
            <div class="widget-title">
                <h4><i class="icon-exclamation"></i> Grafik Pelanggaran</h4>
                        <span class="tools">
                        <a class="icon-chevron-down" href="javascript:;"></a>
                        <a class="icon-remove" href="javascript:;"></a>
                        </span>
            </div>
            <div class="widget-body">
                <div id="XXX" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                    <script type="text/javascript">
                        Highcharts.chart('XXX', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: '5 Pelanggaran Yang Sering Dilakukan'
                            },
                            // subtitle: {
                            //     text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
                            // },
                            xAxis: {
                                type: 'category',
                                labels: {
                                    rotation: -45,
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Jumlah Kejadian'
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            tooltip: {
                                pointFormat: 'Pelanggaran terjadi sebanyak: <b>{point.y} kali</b>'
                            },
                            series: [{
                                name: 'Kejadian',
                                data: [
                                        <?php foreach ($pelanggaran as $row) { ?>
                                           
                                            <?= "['".$row->nama_kategori_kategori_pelanggaran."', ".$row->jml."]," ?>
                                        
                                        <?php } ?>

                                        
                                        
                                ],

                                dataLabels: {
                                    enabled: true,
                                    rotation: -90,
                                    color: '#FFFFFF',
                                    align: 'right',
                                    format: '{point.y}', // one decimal
                                    y: 10, // 10 pixels down from the top
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }
                                }
                            }]
                        });
                </script>
            </div>
        </div>
        <!-- END GRID PORTLET-->
    </div>
    <div class="span5">
        <!-- BEGIN GRID SAMPLE PORTLET-->
        <div class="widget blue">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> 5 SISWA YANG SERING MELANGGAR</h4>
                        <span class="tools">
                        <a class="icon-chevron-down" href="javascript:;"></a>
                        <a class="icon-remove" href="javascript:;"></a>
                        </span>
            </div>
            <?php 
                $siswa = $this->db->query("select pelanggaran_siswa.nis_pelanggaran_siswa, 
                                count(pelanggaran_siswa.nis_pelanggaran_siswa) 
                                as jml from pelanggaran_siswa group by
                                pelanggaran_siswa.nis_pelanggaran_siswa
                                order by jml desc limit 5")->result();
            ?>
            <div class="widget-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="5%">
                            No
                        </th>
                        <th>
                            Nama Siswa
                        </th>
                    </tr>
                    <?php $no=0;foreach ($siswa as $row):$no++ ?>
                    <?php 
                        $nis = $row->nis_pelanggaran_siswa;
                        $datasiswa = $this->db->get_where('siswa',array('nis_siswa' => $nis))->row_array();
                        $idkelassiswa = $datasiswa['id_kelas_siswa'];
                        $kelas = $this->db->get_where('kelastetap',array('id_kelasjurusan' => $idkelassiswa))->row_array();
                        $q = $this->db->query("
                                            select sum(pelanggaran_siswa.id_pelanggaran_pelanggaran_siswa) as jmlpoint, count(*) as jmlpelanggaran
                                            from pelanggaran_siswa where ((pelanggaran_siswa.nis_pelanggaran_siswa = $nis) and (pelanggaran_siswa.status_pelanggaran_siswa='1'))")->row_array();
                    ?>
                    <tr>
                        <td><?=$no?></td>
                        <td>
                            <?php 
                                echo "<b>".$datasiswa['nama_siswa']."</b>";
                                echo "<br>";
                                echo "NIS : <b>".$row->nis_pelanggaran_siswa."</b>";
                                echo "<br>";
                                echo "Kelas :<b>".$kelas['tingkatan_kelas'].' '.$kelas['nama_jurusan'].' '.$kelas['urutan_kelasjurusan']."</b>";
                            ?>
                            <a href="javascript:void(0)" class="btn btn-primary tooltips pull-right" data-trigger="hover" data-original-title="<?= 'Detail '.$q['jmlpelanggaran'].' pelanggaran yang dilakukan oleh '.$datasiswa['nama_siswa']?>" onclick="detail('<?= $nis ?>')"><i class="icon-search"></i></a>
                        </td>
                    </tr>
                        
                    <?php endforeach ?>
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