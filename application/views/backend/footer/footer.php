<!-- jQuery CDN -->
<script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>bower_components/jquery-form/dist/jquery.form.min.js"></script>

<script src="<?php echo base_url();?>bower_components/jquery-ui/jquery-ui.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
         <script src="<?php echo base_url();?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
         <script src="<?php echo base_url();?>bower_components/datatables/media/js/dataTables.bootstrap4.min.js"></script>
         <script type="text/javascript" src="<?php echo base_url();?>bower_components/notifyjs/dist/notify.js"></script>
         <script src="<?php echo base_url();?>bower_components/assets/js/app.js"></script>
         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
