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
                </div>

                </div>