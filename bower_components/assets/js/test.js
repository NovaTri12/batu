$(document).on('focusin', function(e) {
    if ($(e.target).closest(".modal-body").length) {
        e.stopImmediatePropagation();
    }
});

//CRUD data pendaftar
       jQuery(function(){
                var tablePendaftar = $('#tablePendaftar').DataTable({
                    "processing":true,
                    "serverSida":true,
                    "responsive":true,
                    "order" : [],
                    "ajax" :{
                            "url"   : $('#tablePendaftar').attr('attr-list'),
                            "type"  : "GET"
                    },  
                    "columnDefs": [
                        { 
                            "targets": [ 0 ], //first column / numbering column
                            "orderable": false, //set not orderable
                        },
                    ],

 
                });
                $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
                
                 tablePendaftar.buttons().container().appendTo( $('.tableTools-container') );
                //style the message box
                var defaultCopyAction = tablePendaftar.button(1).action();
                tablePendaftar.button(1).action(function (e, dt, button, config) {
                    defaultCopyAction(e, dt, button, config);
                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                });
                
                
                var defaultColvisAction = tablePendaftar.button(0).action();
                tablePendaftar.button(0).action(function (e, dt, button, config) {
                    
                    defaultColvisAction(e, dt, button, config);
                    
                    
                    if($('.dt-button-collection > .dropdown-menu').length == 0) {
                        $('.dt-button-collection')
                        .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                        .find('a').attr('href', '#').wrap("<li />")
                    }
                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                });

                setTimeout(function() {
                    $($('.tableTools-container')).find('a.dt-button').each(function() {
                        var div = $(this).find(' > div').first();
                        if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                        else $(this).tooltip({container: 'body', title: $(this).text()});
                    });
                }, 500);
                
                
                
                
                
                tablePendaftar.on( 'select', function ( e, dt, type, index ) {
                    if ( type === 'row' ) {
                        $(tablePendaftar.row( index ).node() ).find('input:checkbox').prop('checked', true);
                    }
                } );
                tablePendaftar.on( 'deselect', function ( e, dt, type, index ) {
                    if ( type === 'row' ) {
                        $( tablePendaftar.row( index ).node() ).find('input:checkbox').prop('checked', false);
                    }
                } );
            
            
            
            
                /////////////////////////////////
                //table checkboxes
                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
                
                //select/deselect all rows according to table header checkbox
                $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
                    var th_checked = this.checked;//checkbox inside "TH" table header
                    
                    $('#tablePendaftar').find('tbody > tr').each(function(){
                        var row = this;
                        if(th_checked) tablePendaftar.row(row).select();
                        else  tablePendaftar.row(row).deselect();
                    });
                });
                
                //select/deselect a row when the checkbox is checked/unchecked
                $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
                    var row = $(this).closest('tr').get(0);
                    if(this.checked) myTable.row(row).deselect();
                    else myTable.row(row).select();
                });
                //hapus lowongan Pekerjaan
               $('#tablePendaftar').on('click','tr td #hapusData',function(){
                        var row = $(this).closest('tr').get(0);
                        //alert($(this).attr('data-href'));
                       // var linkx   : $(this).attr('data-href');
                       $.ajax({
                            type    : "POST",
                            url     : $(this).attr('data-href'),
                            cache   : false,
                            success : function(result){
                                if(result = 'success'){
                                     $(function(){
                                                //$('#modal').modal('hide');
                                                $('#modalPesan').modal('show');
                                                $('.modal-body').html('<p>Data Berhasil di Hapus.</p>');
                                            });
                                        
                                            //location.reload()
                                            $('#table2').DataTable().ajax.reload();
                                }else{
                                    alert('gagal');
                                }
                            }
                       });

               });
               //detilBtn
               $('#tablePendaftar').on('click','#detilBtn',function(w){
                    w.preventDefault();
                    var modal = $('#modal').modal();
                    modal.find('.modal-body')
                    .load($(this).attr('href'),function (responseText1,textStatus1){

                    });
               });
               //==========================
                //====================================
                //aksi edit tables pelamar

                $('#tablePendaftar').on('click','#editBtnPelamar',function(e){
                    e.preventDefault();
                    var modal = $('#modal').modal();
                    modal.find('.modal-body')
                    .load($(this).attr('href'), function (responseText, textStatus) {
                                $txt = '#txtArea';
                                $dtl = $('#dtl').val();
                            //$('#txt').Editor();
                            //$('#txt').Editor('setText',$($txt).append());
                            //$('#txtArea').Editor();
                             tinyMCE.init({
                            relative_urls: false,
			    remove_script_host : false,
				theme : "modern",
                            mode : "textareas", 
                            theme_advanced_toolbar_location : "top",
                            plugins: [
                                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                                "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
                            ],
                            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                            image_advtab: true ,
                            theme_advanced_buttons1 : "|responsivefilemanager|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
                            convert_urls : false,
                            relative_urls : false,
                            remove_script_host : false,
                            //height: 300,
                            //width:700,
                            external_filemanager_path:"bower_components/filemanager/",
                            filemanager_title:"Responsive Filemanager" ,
                            external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
                    });
                            //$('#txtArea').Editor('setText',$('#txtArea').text());
                            $(function(){
                                $('#datepicker').datepicker({
                                    format: 'yyyy-mm-dd',
                                    startDate: '-3d'
                                });
                            });
                            

                            //Hapus Data Pelamar pada detil Mapel
                            $('#hpsBtnLamaran').click(function(a){
                              //a.preventDefault();
                              $('#modalPesan').modal('show')
                              .find('.modal-body').append('<p>test</p>');


                            });                            

                            //

                            //Edit data Pelamar pada detil mapel
                            $('#btnEditLamaran').on('click',function(a){
                                a.preventDefault();
                                $.ajax({
                                    type    : "POST",
                                    url     : $(this).attr('attr-submit'),
                                    data    : {
                                        'no_ktp'            : $('#no_ktp').val(),
                                        'id_lamaran'       : $('#id_lamaran').val(),
                                        'nama_lengkap'      : $('#namaLengkap').val(),  
                                        'tempat_lahir'      : $('#tempatLahir').val(),
                                        'tanggal_lahir'     : $('#datepicker').val(),
                                        'jns_kelamin'       : $('#JnsKelamin').val(),
                                        'no_hp'             : $('#noHp').val(),
                                        'tinggi_bdn'        : $('#tinggiBdn').val(),
                                        'sudah_bayar'       : $('#status_bayar').val()

                                    } ,
                                    cache   : false,
                                    success : function(result){
                                        if(result ='success'){
                                                // $('.modal-body').modal('hide');
                                            $(function(){
                                                $('#modal').modal('hide');
                                                $('#modalPesan').modal('show');
                                                $('.modal-body').html('<p>Data Berhasil di Ubah.</p>');
                                            });
                                        
                                            //location.reload();
                                            $('#tablePendaftar').DataTable().ajax.reload();
                                        }else if(result = 'error'){
                                             $('#modal').modal('hide');
                                                $('#modalPesan').modal('show');
                                                $('.modal-body').html('<p>Error, update data gagal.</p>');
                                        }else{
                                             $('#modal').modal('hide');
                                                $('#modalPesan').modal('show');
                                                $('.modal-body').html('<p>ERROR!!! . Error tidak dikenal.</p>');
                                        }
                                    }
                                });
                            });


                    });
                });
            //==========================================================
            
                $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();
                });
                
            });



 //====================================================================================
 $('#applyBtn').on('click',function(e){
        e.preventDefault();
        var modal = $('#modal').modal();
        modal.find('.modal-body')
        .load($(this).attr('href'),function (responseText,textStatus){
           //FRONTEND DAFTAR
           $(function(){
                        $('#datepicker1').datepicker({
                                format: 'yyyy-mm-dd',
                                startDate: '-20y'
                            });
                   });

          


           //]========================================
           $('#btnCheck').on('click',function(e){
                e.preventDefault();
                //$('#modal').modal('hide');

                //
                if($('#no_ktp').val().length == 0 || $('#namaLengkap').val().length == 0){
                                        $('#modal').modal('hide');
                                        $('#modalPesan').modal('show');
                                        $('.modal-body').html('<p> Mohon Isi Formulir dengan lengkap</p><p>No KTP harus di isi</p><p>Nama lengkap harus di isi</p><p>no hp diisi dengan angka</p><p>Tinggi Badan diisi dengan angka. Contoh : 160</p>');
                }else{
               $.ajax({
                                type    : "POST",
                                url     : $(this).attr('attr-submit'),
                                data    : {
                                        'no_ktp'            : $('#no_ktp').val(),
                                        'id_lowongan'       : $('#id_lowongan').val(),
                                        'nama_lengkap'      : $('#namaLengkap').val(),  
                                        'tempat_lahir'      : $('#tempatLahir').val(),
                                        'tanggal_lahir'     : $('#datepicker1').val(),
                                        'jns_kelamin'       : $('#JnsKelamin').val(),
                                        'no_hp'             : $('#noHp').val(),
                                        'tinggi_bdn'        : $('#tinggiBdn').val()

                                },
                                cache   : false,
                                success : function(result){
                                //alert(result);
                                    $(function(){
                                        //var msg = JSON.parse(result);
                                        $('#modal').modal('hide');
                                        $('#modalPesan').modal('show');
                                        $('.modal-body').html(result);
                                        $('body').on('click','#btnLamar',function(){
                                            //alert("success");
                                            //console.log($('#no_ktp').text());
                                            $.ajax({
                                                type    : "POST",
                                                url     : $(this).attr('attr-submit'),
                                                data    : {
                                                    'no_ktp'            : $('#no_ktp').text(),
                                                    'id_lowongan'       : $('#id_lowongan').text(),
                                                    'nama_lengkap'      : $('#namaLengkap').text(),  
                                                    'tempat_lahir'      : $('#tempatLahir').text(),
                                                    'tanggal_lahir'     : $('#tanggalLahir').text(),
                                                    'jns_kelamin'       : $('#JnsKelamin').text(),
                                                    'no_hp'             : $('#noHp').text(),
                                                    'tinggi_bdn'        : $('#tinggiBdn').text()
                                                },
                                                cache   : false,
                                                success : function(bx){
                                                    //bx.preventDefault();
                                                    $(function(){
                                                        var msg = JSON.parse(bx);
                                                        var url = msg.base_url+'index.php/apply/cetak/'+msg.id_lowongan+'/'+msg.no_ktp;
                                                        $('#modalPesan').modal('hide');
                                                        $('#modal').modal('show');
                                                        $('.modal-body').html('<p>'+msg.message+'</p>')
                                                        //console.log(url);
                                                       // window.print(url);
                                                       var oHiddFrame = document.createElement("iframe");
                                                       oHiddFrame.onload = setPrint;
                                                       oHiddFrame.style.visibility = "hidden";
                                                       oHiddFrame.style.position = "fixed";
                                                       oHiddFrame.style.right = "0";
                                                       oHiddFrame.style.bottom = "0";
                                                       oHiddFrame.src = url;
                                                       document.body.appendChild(oHiddFrame);
                                                    });
                                                }
                                            });
                                             
                                        });
                                        
                                        //console.log(msg.result);
                                  });
                                         //$('#tablePendaftar').DataTable().ajax.reload();
                                }
                        });
                }
                
           }); 

           //====================================================       

           
           //====================================================
        });
 });

//====================================================

 $('a[rel=modal]').on('click', function(evt) {
            evt.preventDefault();
       
            var modal = $('#modal').modal();
            modal.find('.modal-body')
        
            .load($(this).attr('href'), function (responseText, textStatus) {
              //  if ( textStatus === 'success' || 
                //     textStatus === 'notmodified') 
                  //  {    
                   // }
                   var textArea_id = "txtArea";

                   tinyMCE.init({
                            theme : "modern",
                            mode : "textareas", 
                            theme_advanced_toolbar_location : "top",
                            plugins: [
                                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                                "table contextmenu directionality emoticons paste textcolor"
                            ],
                            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                            image_advtab: true ,
                            theme_advanced_buttons1 : "|responsivefilemanager|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
                            convert_urls : false,
                            relative_urls : false,
                            remove_script_host : false,
                            //height: 300,
                            //width:700,
                            external_filemanager_path:"../../bower_components/filemanager/",
                            filemanager_title:"Responsive Filemanager" ,
                            external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
                    });

                        
                    
                      
                   //$('#txtArea').Editor();
                   $(function(){
                        $('#datepicker').datepicker({
                                format: 'yyyy-mm-dd',
                                startDate: '-3d'
                            });
                   });
                   
           


                   //tambahPelamar
                   $('#btnTambahPelamar').on('click',function(e){
                        e.preventDefault();
                        $.ajax({
                                type    : "POST",
                                url     : $(this).attr('attr-submit'),
                                data    : {
                                        'no_ktp'            : $('#no_ktp').val(),
                                        'id_lowongan'       : $('#id_lowongan').val(),
                                        'nama_lengkap'      : $('#namaLengkap').val(),  
                                        'tempat_lahir'      : $('#tempatLahir').val(),
                                        'tanggal_lahir'     : $('#datepicker').val(),
                                        'jns_kelamin'       : $('#JnsKelamin').val(),
                                        'sudah_bayar'       : $('#status_bayar').val()

                                },
                                cache   : false,
                                success : function(result){
                                //alert(result);
                                    $(function(){
                                        var msg = JSON.parse(result);
                                        $('#modal').modal('hide');
                                        $('#modalPesan').modal('show');
                                        $('.modal-body').html('<p>'+msg.message+'</p>');
                                        
                                        //console.log(msg.result);
                                  });
                                         $('#tablePendaftar').DataTable().ajax.reload();
                                }
                        });
                   });
                    

                   //btnTambah Trigger
                    $('#btnTambah').on('click',function(a){
                      a.preventDefault();
                            tinyMCE.triggerSave();
                        $.ajax({
                                type: "POST",
                                url: $(this).attr('attr-submit'),
                                data: {
                                    'judul'             : $('#judul').val(),
                                    'perusahaan'        : $('#perusahaanName').val(),
                                    'kuota_pendaftar'   : $('#kuotaPendaftar').val(),
                                    'tanggal_seleksi'   : $('#datepicker').val(),
                                    //'detil'             : $('#txtArea').Editor("getText"),
                                    'detil'             : tinyMCE.activeEditor.getContent(),
                                    'jns_kelamin'       : $('#JnsKelamin').val(),
                                    'max_umur'          : $('#maxUmur').val(),
                                    'biaya'             : $('#biayaDftr').val(),
                                    'status'            : $('#status_aktif').val()
                                 },
                                cache: false,
                                success: function(result){
                                //alert(result);
                                    if(result ='success'){
                                     // $('.modal-body').modal('hide');
                                     $(function(){
                                        $('#modal').modal('hide');
                                        $('#modalPesan').modal('show');
                                        $('.modal-body').html('<p>Data Berhasil di Tambah.</p>');
                                        
                                     });
                                        
                                        //location.reload();
                                        $('#table2').DataTable().ajax.reload();
                                    }else if(result = 'error'){
                                      $('#modal').modal('hide');
                                        $('#modalPesan').modal('show');
                                        $('.modal-body').append('<p>Tambah data gagal, error code: 101.Gagal menambahkan data ke dalam table.</p>');
                                    }else{
                                      $('#modal').modal('hide');
                                        $('#modalPesan').modal('show');
                                        $('.modal-body').append('<p>Tambah data gagal, error code: 102. Error tidak diketahui.</p>');
                                    }
                                  }

                        });
                    });
                   //$('#datepicker').datepicker();
                           //$('#txtArea').wysihtml5();
                    });
             modal.onbeforeunload = function (event) {
                event.preventDefault();
                    $('.wysihtml5-sandbox, .wysihtml5-toolbar').remove();
                    $('#txtArea').show();
                 }

                });

//================================== angular way of life==================

var detil = angular.module("detilApp",['ui.bootstrap']);
//Post Pelamar
detil.controller("Pelamar",function($scope){
    $scope.kuota = "300" ;
    $scope.simpan = "SIMPAN YA";
    $scope.tambahPelamar = function(){
        //Aksi tambah Pelamar
    }
});

var tmbh = angular.module("formTambah",['ui.bootstrap']);

tmbh.controller("btnTambah",function($scope){
    $scope.simpan = "SAVE BUTTON";
});

//----------------------------- TINY MCE
$('#modal').on('hidden.bs.modal', function (e) {
        // need to remove the editor to make it work the next time
        tinymce.remove();
});
                 
//----------------------------

function closePrint () {
    document.body.removeChild(this.__container__);
  }

function setPrint () {
    this.contentWindow.__container__ = this;
    this.contentWindow.onbeforeunload = closePrint;
    this.contentWindow.onafterprint = closePrint;
    this.contentWindow.focus(); // Required for IE
    this.contentWindow.print();
  }
