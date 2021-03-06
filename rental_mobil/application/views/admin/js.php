    <!-- jQuery -->

    <script src="<?php echo base_url(); ?>admin_assets/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>admin_assets/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>admin_assets/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>admin_assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>admin_assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url(); ?>admin_assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>admin_assets/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url(); ?>admin_assets/js/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/js/datepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url(); ?>admin_assets/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>

    <script src="<?php echo base_url(); ?>admin_assets/jquery.hotkeys/jquery.hotkeys.js"></script>
    
    <script src="<?php echo base_url(); ?>admin_assets/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url(); ?>admin_assets/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="<?php echo base_url(); ?>admin_assets/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>admin_assets/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="<?php echo base_url(); ?>admin_assets/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url(); ?>admin_assets/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url(); ?>admin_assets/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="<?php echo base_url(); ?>admin_assets/starrr/dist/starrr.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/pdfmake/build/vfs_fonts.js"></script>
  <script src="<?php echo base_url().'admin_assets/js/jquery-ui.js'?>" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>admin_aseets/js/jquery.timepicker.min.css"></script>



    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>

    <!-- /Datatables -->
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>admin_assets/js/custom.min.js"></script>
    
    <!-- slide up flash data session -->
    <script type="text/javascript"> 
		$('.alert-message').alert().delay(4000).slideUp('slow');
    </script>

    <!-- tanggal pesan tidak boleh kurang dari tanggal sekarang -->
    <script type="text/javascript">
     document.getElementById('dt').min = new Date(new Date().getTime() - new Date().getTimezoneOffset() * 60000).toISOString().split("T")[0];

    </script>

<!-- ajax dropdown  -->
    <script type="text/javascript">
  

      $(document).ready(function(){

        $(document).on('change', '#merek_mobil', function(){

          var tb_mobil =$(this).val();

          $.ajax({

            url: 'http://localhost/project_rental/rental_mobil/transaksi/tipe_mobil',
            method: 'post',
            data: {
                tb_mobil: tb_mobil
            },
            dataType: 'json',
            success: function(response){
              console.log(response);

              $("#tipe_mobil").empty();

              var list = $("#tipe_mobil");
              $.each(response, function(index, item){

                // list.append(new Option(item.nama_mobil, item.id_mobil));
                list.append('<Option value="'+item.id_mobil+'">'+item.nama_mobil+'</Option>');

                if(item.length >= 1){

                   $('#tipe_mobil').change(function(){

                   var idnya = $('#tipe_mobil').val();

                   $.ajax({
                    url: 'http://localhost/project_rental/rental_mobil/transaksi/getharga',
                    method: 'post',
                    data: {id_mobil:idnya},
                    success: function(data){
                      var halo = JSON.parse(data);
                      // console.log(halo[0].harga_sewa);
                      $('#harga_sewa').val(halo[0].harga_sewa);
                    }
                   });

                })
                } else {
                  $('#tipe_mobil').change(function(){

                   var idnya = $('#tipe_mobil').val();

                   $.ajax({
                    url: 'http://localhost/project_rental/rental_mobil/transaksi/getharga',
                    method: 'post',
                    data: {id_mobil:idnya},
                    success: function(data){
                      var halo = JSON.parse(data);

                      // console.log(halo[0].harga_sewa);
                      $('#harga_sewa').val(halo[0].harga_sewa);
                    }
                   });

                })
                }

              });
            }

          })

        });


      });
    </script>

    <!-- hitung Total harga -->
    <script type="text/javascript">
      

    document.getElementById("tipe_mobil").onchange = notEmpty;


   function gettotal_harga(){
      var tot1=document.getElementById('harga_sewa').value;
      var tot2=document.getElementById('lama').value;
      var tot3=parseFloat(tot1)* parseFloat(tot2);
      
      document.getElementById('total_harga').value=tot3;
  
   }
</script>   

<!-- ajax java script timer invoice -->

<script type="text/javascript">


function timer()
{
    $('#timer').load('http://localhost/project_rental/rental_mobil/transaksi/timer/<?php echo $id_transaksi;?>');
}

setInterval(timer, 1000 );




</script>
<!-- auto check transaksi yg batal -->
<script type="text/javascript">


    function check()
    {
        $('#check').load('http://localhost/project_rental/rental_mobil/transaksi/checkinv');
    }

    setInterval(check, 1000);


</script>

<!-- penampilan gambar seetelah upload -->
<script type="text/javascript">
  
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#Preview').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>

<!-- auto complete search di inputan supir -->
  <script type="text/javascript">
    $(document).ready(function(){

        $('#nama_supir').autocomplete({
                source: "<?php echo base_url('transaksi/get_autocomplete_supir');?>",
     
                select: function (event, ui) {
                    $('[name="nama_supir"]').val(ui.item.label); 
                    $('[name="id_supir"]').val(ui.item.id); 
                    $('[name="hp_supir"]').val(ui.item.hp_supir); 
                    $('[name="umur"]').val(ui.item.umur); 
                    $('[name="alamat_supir"]').val(ui.item.alamat_supir); 

                }
            });

    });
  </script>
<!-- auto complete search di inputan pelanggan -->

  <script type="text/javascript">
    $(document).ready(function(){

      $('#nama_pelanggan').autocomplete({

        source: "<?php echo base_url('transaksi/get_autocomplete_pelanggan');?>",

                        select: function (event, ui) {
                    $('[name="nama_pelanggan"]').val(ui.item.label); 
                    $('[name="id_pelanggan"]').val(ui.item.id); 
                    $('[name="no_pelanggan"]').val(ui.item.hp_pelanggan); 
                    $('[name="email_pelanggan"]').val(ui.item.email_pelanggan); 

                }

      });


    });
    

  </script>

  <!-- notifikasi -->
  <script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"http://localhost/project_rental/rental_mobil/transaksi/notif",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 // $('#comment_form').on('submit', function(event){
 //  event.preventDefault();
 //  if($('#subject').val() != '' && $('#comment').val() != '')
 //  {
 //   var form_data = $(this).serialize();
 //   $.ajax({
 //    url:"insert.php",
 //    method:"POST",
 //    data:form_data,
 //    success:function(data)
 //    {
 //     $('#comment_form')[0].reset();
 //     load_unseen_notification();
 //    }
 //   });
 //  }
 //  else
 //  {
 //   alert("Both Fields are Required");
 //  }
 // });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 4000);
 
});
</script>
<!-- $(document).on('click', '.conf', function(){

    $('#jqContent').load(bu+'public/invoice/conf_invoice/<?php echo $ivd->code_inv;?>');
    $('#jqContent').slideDown('400');

});

$(document).on('submit', '#confForm', function(){

    $.ajax({

        url:bu+'public/invoice/process_invoice',
        type:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            alert(data);
            window.location.href=window.location.href;
        }

    });

    return false;

}); -->
