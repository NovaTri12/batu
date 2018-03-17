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
                        <h2>Tambah Data <?php echo $this->config->item('naon');?> Baru</h2>
                    </div>
                    
                </nav>
                <div class="row">
                    <div class="col-xl-12 container">
                    <form enctype="multipart/form-data" id="formTambahBatu" >
                    <table class="table table-striped">
                        <tr>
                            <td>Nama <?php echo $this->config->item('naon');?></td>
                            <td>:</td>
                            <td><input type="text" class="form-control" name="nmBatu" id="nmBatu"/>
                            
                            </td>
                        </tr>
                        <tr>
                            <td>Tipe <?php echo $this->config->item('naon');?></td>
                            <td>:</td>
                            <td><input type="text" class="form-control" id="tpBatu" data-link="<?php echo base_url();?>index.php/app/get_batu/" />
                            <input type="hidden" id="tpBatuVal" name="tpBatuVal" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td>:</td>
                            <td>

                       
                                    <input type="file"  id="fotoUpload" name="file" required />
                       
                                </div>

                            </td>
                        </tr>
                    </table>
                    <input type="submit" name="submit" class="btn btn-primary" id="btnSimpanBatu" value="SIMPAN" attr-redirect="<?php echo base_url();?>index.php/app/batu"/>
                    </form>
                </div>
                    
                </div>


</div>