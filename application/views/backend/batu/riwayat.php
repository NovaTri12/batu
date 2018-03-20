<div id="content" class="container">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="navbar-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                                <li><a href="#">Page</a></li>
                            </ul>
                        </div>
                        <h2>Data Riwayat <?php echo $this->config->item('naon');?></h2>
                    </div>
                    
                </nav>

                <div class="container">
                    <table class="table table-striped">
                        <tr>
                            <td>Nama Alat</td>
                            <td>:</td>
                            <td><?php echo $dtl->nama_batu;?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td><?php echo $dtl->tipe_batu;?></td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td>:</td>
                            <td><img src="<?php echo base_url();?>assets/images/upload/<?php echo $dtl->foto;?>" style="height:200px;"/></td>
                        </tr>
                    </table>
                    <div class="line"></div>
                    <div class="container">
                        <div class="row">
                            <span class="col-sm-8"><h3>Total Waktu Penggunaan : <?php echo secToJam($jumlah->total_waktu);?></h3></span> | 
                            <span class="col-sm-2"><btn class="btn btn-primary" id="btnTambahRiwayat" attr-href="<?php echo base_url();?>index.php/riwayat/tambah/<?php echo $dtl->id_batu;?>">Tambah</btn></span>
                            </div>
                            <br>
                            <table class="table table-striped dataTable" id="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Tanggal</td>
                                        <td>Mesin</td>
                                        <td>Waktu Mulai</td>
                                        <td>Waktu Selesai</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($rwyt)){
                                            $no = 1;
                                            foreach($rwyt as $r){
                                                ?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $r->tgl_penggunaan;?></td>
                                        <td><?php echo $r->nama_mesin;?></td>
                                        <td><?php echo $r->jam_mulai;?></td>
                                        <td><?php echo $r->jam_selesai;?></td>
                                    </tr>  

                                    <?php 
                                            }
                                        }

                                    ?>

                                </tbody>
                            </table>

                    </div>
                </div>

                        <!--  -->
                        <div id="NewsModal" class="modal modal-dialog-lg fade" tabindex="-1" role="dialog" data-
ajaxload="true" aria-labelledby="newsLabel" aria-hidden="true">


    </div>

       <div id="modal" class="modal modal-dialog-lg fade" tabindex="-1" role="dialog" data-
ajaxload="true" aria-labelledby="newsLabel" aria-hidden="true">

        
    </div>

    

                </div>


                