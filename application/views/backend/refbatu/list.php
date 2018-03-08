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
                        <h2>Data Referensi Jenis <?php echo $this->config->item('naon');?></h2>
                    </div>
                    
                </nav>
                <div class="row">
                    <div class="col-xl-12">
                         <a href="<?php echo base_url();?>index.php/app/refbatu/tambah"><btn class="btn btn-primary">Tambah</btn></a>
                        <div class="line"></div>
                        
                    <table id="table" class="table dataTable table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Jenis <?php echo $this->config->item('naon');?> </th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php

                    if(!empty($isi)){
                        $no = 1;
                        foreach ($isi as $d){
                            
                            ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $d->tipe_batu;?></td>
                            <td></td>
                        </tr>

                        <?php
                            }
                        }
                    ?>
                    </tbody>
                    </table>
                    
                    </div>  
                </div>
               

                </div>
                