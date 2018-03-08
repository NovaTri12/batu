$('#btnLogin').on('click',function(a){
    //alert("btn clicked");
    a.preventDefault();
    $.ajax({
        type    : "POST",
        url     : $(this).attr('attr-submit'),
        data    : {
            'username'  : $('#UserName').val(),
            'password'  : $('#Passwd').val()
        },
        cache   : false,
        success : function(result){
            var obj = jQuery.parseJSON(result);
            //alert(obj.pesan);

            if(obj.status == "success"){
                //alert(obj.pesan);
                $.notify(obj.pesan,'success');
               // alert($('#btnLogin').attr('attr-dashboard'));
               $("body").fadeOut(4500,window.location.href = $(btnLogin).attr('attr-dashboard'));
                
            }else if(obj.status == "failed"){
                $.notify(obj.pesan,'warn');
            }
        }

    });
});
$(document).ready(function() {
    $('#table').DataTable();
} );

$('#jnsBatuTambah').on('click',function(a){
    a.preventDefault();
    //alert('tombol ditekan');
    $.ajax({
        type    : "POST",
        url     : $(this).attr('attr-submit'),
        data    : {
            'tipe_batu' : $('#nmJenisBatu').val()
        },
        cache   : false,
        success : function(result){
            var obj = jQuery.parseJSON(result);
            //alert(obj.pesan);
            //console.log();
            if(obj.status == "success"){
                //alert(obj.pesan);
                $.notify(obj.pesan,'success');
               // alert($('#btnLogin').attr('attr-dashboard'));
               $("body").fadeOut(4500,window.location.href = $('#jnsBatuTambah').attr('attr-redirect'));
                
            }else if(obj.status == "failed"){
               $.notify(obj.pesan,'warn');
            }else if(obj.status == "empty"){
                $.notify(obj.pesan,'warn');
            }
        }

    });
});

//Autocomplete form tambah batu
$(function(){
    $("#tpBatu").autocomplete({
        //source: "../api/get_supplier", // path to the get_birds method
         source: $('#tpBatu').attr('data-link'),
         select: function (event, ui) {
          // Set autocomplete element to display the label
          this.value = ui.item.label;
          //$('.brgInput').val(ui.item.Label);
          // Store value in hidden field
          $('#tpBatuVal').val(ui.item.value);
          //console.log(ui.item.value);
          // Prevent default behaviour
          return false;
       }
      });
});


//=============================
$("#formTambahBatu").on('submit', function(e){
    e.preventDefault();
    var form_data = new FormData($(this)[0]);
    $.ajax({
        url: 'simpanbatu', // point to server-side PHP script
        dataType: 'json',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(result){
            //alert(php_script_response); // display response from the PHP script, if any
            var obj = jQuery.parseJSON(JSON.stringify(result));

            if(obj.status == "success"){
                //alert(obj.pesan);
                $.notify(obj.pesan,'success');
               // alert($('#btnLogin').attr('attr-dashboard'));
               $("body").fadeOut(4500,window.location.href = 'batu');
                
            }else if(obj.status == "failed"){
               $.notify(obj.pesan,'warn');
            }else if(obj.status == "empty"){
                $.notify(obj.pesan,'warn');
            }
        }
    });


});

$("#fotoUpload").change(function() {
    var file = this.files[0];
    var imagefile = file.type;
    var match= ["image/jpeg","image/png","image/jpg"];
    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
        alert('Please select a valid image file (JPEG/JPG/PNG).');
        $("#fotoUpload").val('');
        return false;
    }
});

//preview Gambar
$(document).ready(function () {
    $(".gambarBatu").hover(function(){
    $(this).find('img').fadeIn();
    }, function(){
    $(this).find('img').fadeOut();
  });
});


//============hapus batu

function fnOpenNormalDialog() {
    $("#dialog-confirm").html("Yakin hapus data ini?");

    // Define the Dialog and its properties.
    $("#dialog-confirm").dialog({
        resizable: false,
        modal: true,
        title: "Konfirmasi Hapus",
        height: 250,
        width: 400,
        buttons: {
            "Yes": function () {
                $(this).dialog('close');
                //callback(true);
                $.ajax({
                    url     : $('#hpsBatu').attr('attr-link'),
                    type    : "POST",
                    dataType: 'json',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    success     : function(result){
                        var obj = jQuery.parseJSON(JSON.stringify(result));

                        if(obj.status == "success"){
                            //alert(obj.pesan);
                            $.notify(obj.pesan,'success');
                           // alert($('#btnLogin').attr('attr-dashboard'));
                          // $("body").fadeOut(4500,window.location.href = 'batu');
                          $("body").fadeOut(4500,window.location.href = 'batu');
                        }else if(obj.status == "failed"){
                           $.notify(obj.pesan,'warn');
                        }else if(obj.status == "empty"){
                            $.notify(obj.pesan,'warn');
                        }
                    }

                });
            },
                "No": function () {
                $(this).dialog('close');
                //callback(false);
            }
        }
    });
}

//$('#hpsBatu').click(fnOpenNormalDialog);
$('body').delegate('#hpsBatu','click',function(){
    //alert("success");
    fnOpenNormalDialog();
});
function callback(value) {
    if (value) {
        alert("Confirmed");
    } else {
        alert("Rejected");
    }
}