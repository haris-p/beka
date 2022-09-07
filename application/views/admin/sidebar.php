<!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <li class="sub-menu <?php if ($menu1=='dashboard'){echo 'active';} ?>">
                  <a  href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('Dashboard','index')); ?>">
                      <i class="icon-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <?php if ($this->session->userdata('sess_akses')=="AD") { ?>
                <li class="sub-menu <?php if ($menu1=='masterdata'){echo 'active open';} ?>">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>Master Data</span>
                          <span class="arrow <?php if ($menu1=='masterdata'){echo 'active open';} ?>"></span>
                      </a>
                      <ul class="sub">
						  <li class="<?php if ($menu2=='guru'){echo 'active';} ?>">
                            <a class="" href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('Guru','index')); ?>">Guru</a>
                          </li>
						  <li class="<?php if ($menu2=='ortu'){echo 'active';} ?>">
                            <a class="" href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('Ortu','index')); ?>">Orangtua</a>
                          </li>
						  <li class="<?php if ($menu2=='siswa'){echo 'active';} ?>">
                            <a class="" href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('Siswa','index')); ?>">Siswa</a>
                          </li>
                          <li class="<?php if ($menu2=='kelas'){echo 'active';} ?>">
                            <a class="" href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('Kelas','index')); ?>">Kelas</a>
                          </li>
						  <li class="<?php if ($menu2=='jurusan'){echo 'active';} ?>">
                            <a class="" href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('Jurusan','index')); ?>">Jurusan</a>
                          </li>
						  <li class="<?php if ($menu2=='kelasjurusan'){echo 'active';} ?>">
                            <a class="" href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('Kelasjurusan','index')); ?>">Kelas Jurusan</a>
                          </li>
                          
                          <li class="<?php if ($menu2=='kategoripelanggaran'){echo 'active';} ?>">
                            <a class="" href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('kategoripelanggaran','index')); ?>">Kategori Pelanggaran</a>
                          </li>
                          <li class="<?php if ($menu2=='pelanggaran'){echo 'active';} ?>">
                            <a class="" href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('Pelanggaran','index')); ?>">Pelanggaran</a>
                         </li>
                      </ul>
                  </li>
                  <li class="sub-menu <?php if ($menu1=='laporan'){echo 'active';} ?>">
                    <a  href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('Laporan','index')); ?>">
                      <i class="icon-user"></i>
                      <span>Laporan</span>
                    </a>
                  </li>
                <?php } ?>
                  <?php if ($this->session->userdata('sess_akses')=="GR") { ?>
                    <li class="sub-menu <?php if ($menu1=='pelanggaransiswa'){echo 'active';} ?>">
                      <a  href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('pelanggaransiswa','index')); ?>">
                        <i class="icon-exclamation"></i>
                        <span>Pelanggaran Siswa</span>
                      </a>
                    </li>
                  <?php } ?>
                  <?php if ($this->session->userdata('sess_akses')=="OT") { ?>
                    <li class="sub-menu <?php if ($menu1=='anakku'){echo 'active';} ?>">
                      <a  href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('Anakku','index')); ?>">
                        <i class="icon-user-md"></i>
                        <span>Anak Saya</span>
                      </a>
                    </li>
                  <?php } ?>
                  <?php if ($this->session->userdata('sess_siswa')=="1") { ?>
                    <li class="sub-menu <?php if ($menu1=='pelanggaranku'){echo 'active';} ?>">
                      <a onclick="detail('<?= $this->session->userdata('sess_user'); ?>')" href="javascript:void(0)">
                        <i class="icon-exclamation"></i>
                        <span>Pelanggaranku</span>
                      </a>
                    </li>
                  <?php } ?>
          </ul>
         <!-- END SIDEBAR MENU -->
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
      <!-- END SIDEBAR -->