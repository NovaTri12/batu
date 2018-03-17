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
                        <h2>Edit Pengguna  <?php echo $detil->nama_pengguna;?></h2>
                    </div>
                    
                </nav>

                <div class="container">
                    <table class="table table-striped">
                        <tr>
                            <td>Nama Pengguna</td>
                            <td>:</td>
                            <td><input class="form-control"  type="text" name="nama_pengguna" id="nama_pengguna" value="<?php echo $detil->nama_pengguna;?>"/></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input class="form-control" value="<?php echo $detil->username;?>" disabled type="text" name="username" /></td>
                        
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>:</td>
                            <td> <?php echo form_dropdown('id_level', $level,$detil->id_level,'class="form-control" id="id_level"');?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><input class="form-control"  type="text" name="password" id="password"/></td>
                        </tr>
                        <tr>
                            <td>Konfirmasi Password</td>
                            <td>:</td>
                            <td><input class="form-control"  type="text" name="password-confirm" id="password-confirm"/></td>
                        </tr>
                    </table>
                </div>


</div>