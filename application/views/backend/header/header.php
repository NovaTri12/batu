
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?php echo $this->config->item('site_name');?></title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="<?php echo base_url();?>bower_components/datatables/media/css/dataTables.bootstrap4.min.css">
        <link href="<?php echo base_url();?>bower_components/jquery-ui/themes/base/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>bower_components/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url();?>bower_components/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
        
        
        <!-- Our Custom CSS -->

        <link rel="stylesheet" href="<?php echo base_url();?>bower_components/assets/css/backend/style.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <?php if($this->session->userdata('level')== 1){?>
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3><?php echo $this->config->item('site_name');?></h3>
                </div>

                <ul class="list-unstyled components">
                    <p><?php echo $this->config->item('company_name');?></p>
                    <li>
                        <a href="#">Beranda</a>
                    </li>
                    <li>
                        <a href="#refSubmenu" data-toggle="collapse" aria-expanded="false">Menu Referensi</a>
                        <ul class="collapse list-unstyled" id="refSubmenu">
                            <li><a href="<?php echo base_url();?>index.php/app/refbatu">Jenis <?php echo $this->config->item('naon');?></a></li>
                            <li><a href="<?php echo base_url();?>index.php/app/batu"><?php echo $this->config->item('naon');?></a></li>
                            <li><a href="#">Pengguna</a></li>
                        </ul>
                    </li>
                    <li>
                        
                        <a href="#opsSubmenu" data-toggle="collapse" aria-expanded="false">Operator Menu</a>
                        <ul class="collapse list-unstyled" id="opsSubmenu">
                            <li><a href="#">Batu</a></li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/auth/logout">logout</a>
                    </li>
                    
                </ul>

                <ul class="list-unstyled CTAs">
                    <!--<li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>-->
                </ul>
            </nav>
            <?php } elseif($this->session->userdata('level')== 2){?>
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Aplikasi Penggunaan Batu</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>PT. Surya Selindo</p>
                    <li>
                        <a href="#">Beranda</a>
                    </li>
                   
                    <li>
                        
                        <a href="#opsSubmenu" data-toggle="collapse" aria-expanded="false">Operator Menu</a>
                        <ul class="collapse list-unstyled" id="opsSubmenu">
                            <li><a href="#">Batu</a></li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>index.php/auth/logout">Logout</a>
                    </li>
                    
                </ul>

                <ul class="list-unstyled CTAs">
                    <!--<li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>-->
                </ul>
            </nav>
            <?php }?>
