<div class="table table-hover CSSTabel table-list">
<table id="tb1" style="width: 100%;">
    <thead>
        <th width="20%">No Account</th>
        <th width="40%">Nama</th>
        <th width="15%">Type</th>
        <th width="15%">Level</th>
        <th width="10%">Action</th>
    </thead>
    
    <tbody id="tb_detail">
    <?php foreach($hasil as $row)
    {
        echo "<tr>
            <td>$row->nomoraccount</td>
            <td>$row->namaaccount</td>
            <td>$row->type</td>
            <td>$row->level</td>
            <td>
            <div class='btn-group'>
                <a class='btn popup' style='padding: 0px 3px;'kode='$row->nomoraccount'><i class='icon-pencil'></i></a>
                <a class='btn delete' name='$row->nomoraccount' nama='$row->namaaccount' style='padding: 0px 3px;'><i class='icon-trash'></i></a></div>
            </td>
        </tr>";
    } ?>

    </tbody>    
</table>
</div>

<script>
$('.popup').click(function(){
    $("#kd").attr('disabled',true);
        
    var kd = $(this).attr("kode");
    $('#NoAccount').val(kd);

    
    $('#save').attr('mode','edit');  
    retrieveForm(kd);
    jQuery(".hide-con").show(); 
});

$(".delete").click(function(){
    PlaySound('beep');
    var id = $(this).attr("name");
    var pr = $(this).attr("nama");
    bootbox.dialog({
        message: "Nomor Akun: <b>"+id+"</b><br/>Nama Perkiraan: <b>"+pr+"</b>",
        title: "<img src='<?php echo base_url();?>/assets/img/warning-icon.svg' class='warning-icon'/> Yakin ingin menghapus Data Berikut?",
        buttons: {
            main: {
                label: "Batal",
                className: "pull-left"
            },
            danger: {
                label: "Hapus",
                className: "btn-danger",
                callback: function() {
                    $.ajax({
                        type:'POST',
                        url: "<?php echo base_url();?>index.php/ms_perkiraan/delete",
                        data :{id:id},
                        success: function(msg){
                            if(msg=="gagal"){
                                bootstrap_alert.warning('<b>Gagal Menghapus</b> terjadi kesalahan');
                            }else{
                                bootstrap_alert.success('Data <b>'+pr+'</b> berhasil dihapus');
                                $('#formID').each(function(){
                                    this.reset();
                                });
                                load_list();
                            }
                        }
                    });
                }
            }
        }
    });
});

var oTable = $('#tb1').dataTable( {
    "sScrollY": "380px",
    "sScrollYInner": "110%",
    "sScrollX": "100%", //panjang width
    "sScrollXInner": "100%", //overflow dalem
    "bPaginate": true,
    "bLengthChange": true,
    "aaSorting": [[ 4, "desc" ]],
    "oLanguage": {
         "sSearch": "Search",
         "sLengthMenu": " _MENU_ ",
         "sEmptyTable": "Tidak ada data tersedia",
         "sZeroRecords": "Data tidak ditemukan"
       },
       "sPaginationType": "full_numbers",
    "bInfo": false //Showing 1 to 1 of 1 entries (filtered from 7 total entries)
} );
</script>
