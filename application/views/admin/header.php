 <style>
   #headjudul{
      color: white;
      font-family: sans-serif;
      font-size: 16pt;
   }
 </style>
  <?php 
    $iduser = $this->session->userdata('sess_user');
    $idakses = $this->session->userdata('sess_akses');
    
    if (substr($iduser,0,2)=="AD") {
        $table = "admin";
        $kolom = "id_admin";
    }elseif(substr($iduser,0,2)=="GR"){
        $table = "guru";
        $kolom = "id_guru";
    }elseif(substr($iduser,0,2)=="OT"){
        $table = "ortu";
        $kolom = "id_ortu";
    }else{
        $table = "siswa";
        $kolom = "nis_siswa";
    }

    $datauser = $this->db->get_where($table,array($kolom => $iduser));
    $user = $datauser->row_array();
    $dataakses = $this->db->get_where('hak_akses',array(
                            'id_hak_akses' => $idakses));
    $akses = $dataakses->row_array()
  ?>
  <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!--BEGIN SIDEBAR TOGGLE-->
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand" href="#">
                   <span id="headjudul"><?php echo get_apl('nama_sistem'); ?></span>
               </a>
               <!-- END LOGO -->
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="<?php echo base_url(''); ?>UI/#" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="<?php echo base_url('') ?>" alt="">
                               <span class="username"><?= $user['nama_'.$table].' sebagai '.$akses['nama_hak_akses'] ?></span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="<?php echo site_url($this->mza_secureurl->setSecureUrl_encode('C_login','logout')); ?>""><i class="icon-key"></i> Log Out</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->