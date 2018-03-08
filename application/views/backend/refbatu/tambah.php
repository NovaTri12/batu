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
                        <h2>Form Tambah Referensi <?php echo $this->config->item('naon');?></h2>
                    
                    </div>
                </nav>
                <div class="row">
                    <div class="col-xl-12">
                    
                    <table class="table">
			            <tr>
                            <td>Jenis <?php echo $this->config->item('naon');?></td>
                            <td>:</td>
                            <td><input type="text" class="form-control" id="nmJenisBatu" /></td>
                        </tr>
		            </table>
		<!--<input type="submit" class="btn btn-primary" value="Simpan"/>-->
		<button class="btn btn-secondary" id="jnsBatuTambah" attr-submit="<?php echo base_url();?>index.php/app/refbatutambah" attr-redirect="<?php echo base_url();?>index.php/app/refbatu">Simpan</button> 
                    <div>
                </div>


</div>