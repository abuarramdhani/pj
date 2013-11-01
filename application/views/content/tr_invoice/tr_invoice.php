<!--Main Form-->
<div class="bar">
    <p>Form Inovice <i id="icon" class='icon-chevron-down icon-white'></i></p>
</div>

<div id="konten" class="hide-con master-border">
<form id="formID">
    <table width="100%">
        <tr>
            <td style="width: 120px;">No Invoice</td>
            <td>
                <input  type='text' 
                        class="validate[required,maxSize[20], minSize[5]],custom[onlyLetterNumber]" maxlength="20" 
                        id='no_invo' name='no_invo' 
                        style="width: 120px;text-transform: uppercase;">
            </td>

            <td>Pelanggan</td>
            <td>
                <input type="hidden" id="kd_plg" />
                <div class="input-append" style="margin-bottom:0;">
                 <input type='text' class="span2" 
                    maxlength="20" id="pn" id='appendedInputButton' name='pn' style="width: 148px;" readonly="true">
                <a href="#modalPelanggan" role="button" class="btn" id="f_plg" title="Filter Pelanggan" data-toggle="modal" style="padding: 2px 3px;" onclick="listPelanggan()"><i class="icon-search"></i></a>
                </div>
            </td>
       </tr>
       
       <tr>
            <td>Tanggal</td>
            <td>
                <input  type='text' placeholder='dd-mm-yyyy'
                        class="validate[required,custom[date]]" id='_tgl1' name='_tgl1' value="<?php echo date('d-m-Y');?>" 
                        style="width: 80px; margin-right: 20px;">
            </td>
            <td>Nomor SJ</td>
            <td>
                <div id="no_sj">
                </div>
            </td>
       </tr>
       <tr>
            <td>Term</td>
            <td>
                <input  type='text' 
                        class="validate[required,custom[onlyNumberSp]]" maxlength="4" id='term' name='term' 
                        style="width: 30px;"> Hari
            </td>
            <td>Alamat</td>
            <td>
                <textarea rows="2" class="validate[required]" id='al' name='al' 
                    style="resize:none; width:170px; height: 60px;" disabled="disabled">
                </textarea>
            </td>
       </tr>
    </table>
</form>
<div id="hasil2"></div>
<div id="totalBox" style="float: right; margin-right: 0px; visibility:hidden;">
        <table>
        <tr>
            <td><label style="float: left; margin-right: 10px;"><b>Total</b> </label>
            </td>
            <td><input type="hidden" id="total2" />
            <input style="float: right; width:120px; margin-right: 145px;text-align:right;" id="total" name="total" type="text" readonly="true"></td>
        </tr>
        <tr>
            <td><label style="float: left; margin-right: 10px;"><b>Discount</b> </label>
            </td>
            <td><input type="hidden" id="disc2" />
            <input style="width:20px; " maxlength="2" id="disc" name="disc" type="text" onkeypress="hitung()">%
            <input style="width:66px;text-align:right;" onkeypress="hitung()" id="discT" name="discT" type="text"/>
            </td>
        </tr>
        <tr>
            <td><label style="float: left; margin-right: 10px;"><b>DPP</b> </label>
            </td>
            <td><input type="hidden" id="dpp2" />
            <input style="width:120px; margin-right: 145px;text-align:right;" id="dpp" name="dpp" type="text" readonly="true"></td>
        </tr>
         <tr>
                <td>
                    <label style="float: left; margin-right: 10px;"><b>PPN</b> </label>
                </td>
                <td>
                    <input style="width:20px;" class="" maxlength="2" id="ppn" name="ppn" type="text" onkeypress="hitungPPN()">% 
                    <input style="width:66px;text-align:right;" id="ppnT" name="ppnT" type="text" onkeypress="hitungPPN()">
                </td>
        </tr> 
        <tr>
            <td><label style="float: left; margin-right: 10px;"><b>Grand Total</b> </label>
            </td>
            <td><input type="hidden" id="granT2" />
            <input style="width:120px; text-align:right;" id="granT" name="granT" type="text" readonly="true"></td>
        </tr>      
        </table>
    </div>
<div>
    <button id="save" mode="add" class="btn btn-primary" type="submit">Save</button>
    <button id="delete" class="btn">Delete</button>
    <button id="cancel" class="btn">Cancel</button>
    <button id="print" class="btn"  data-toggle="tooltip" title="Print Invoice"><i class="icon-print"></i></button>
</div>
<div id="konfirmasi" class="sukses"></div>
</div>
<!--@Load table List via AJAX-->
<div id="list_invoice"></div>

<div id="modalSO" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">List Sales Order</h3>
  </div>
  <div class="modal-body">
    <div id="list_so"></div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary" onclick="getSO()" data-dismiss="modal" aria-hidden="true">Done</button>
  </div>
</div>

<div id="modalPelanggan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">List Pelanggan <input type="text" id="SearchPelanggan" placeholder="Search"></h3>
  </div>
  <div class="modal-body">
    <div id="list_pelanggan"></div>
  </div>
</div>

<!--Le Script-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/myscript.js"></script>
<script src="<?php echo base_url(); ?>assets/js/accounting.min.js" type="text/javascript"></script>

<script type="text/javascript">
    //load function here
$(document).ready(function(){
    $( "#_tgl1" ).datepicker( "setDate", new Date());
    list_invoice();
    autogen();
    validation();
    barAnimation();
    displayResult();
    get_sj_list();
});

function show_sj(mode){
    var modes = mode;
    var _div = document.getElementById('no_sj');
    var _text = document.getElementById('_sj');

    if(mode=="view"){
        _div.removeChild(_text);
        var s= "<input type='text' name='_sj' id='_sj' style='width:120px' readonly='true'>";
        _div.innerHTML=s;
    }
    else
    {
        _div.removeChild(_text);
        get_sj_list();
    }
}

function displayResult(selTag)
{
    tampilDetailInvoice();
    tampilTotalDo();
    document.getElementById('totalBox').style.visibility = 'visible';
}

//Table Detail yang dibawah
function tampilDetailInvoice(){
    var sj = $('#_sj').val();
    $.ajax({ //utk tabel detail
        type:'POST',
        url: "<?php echo base_url();?>index.php/tr_invoice/Detail_SJ",
        data :{sj:sj},
        success:
        function(hh){
           $('#hasil2').html(hh);
        }
    });
}

function tampilTotalDo(){
    var id = $('#_sj').val();
    $.ajax({
        type:'POST',
        url: "<?php echo base_url();?>index.php/tr_invoice/retrieveTotal",
        data :{id:id},
        dataType: 'json',
        success:
        function(msg){
            $('#total').val(accounting.formatMoney(msg.Total, "",0,"."));
            var total_disc = msg.Total*msg.Disc/100;
            $('#disc').val(msg.Disc);
            $('#discT').val(accounting.formatMoney(total_disc, "",0,"."));
            var total_ppn = msg.Dpp*msg.Ppn/100;
            $('#ppn').val(msg.Ppn);
            $('#ppnT').val(accounting.formatMoney(total_ppn, "",0,"."));
            $('#dpp').val(accounting.formatMoney(msg.Dpp, "",0,"."));
            $('#granT').val(accounting.formatMoney(msg.Grand, "",0,"."));
        }
    }); 
}

//GET PopUp Pelanggan
function getPelanggan(){
    var x = $('input:radio[name=optionsRadios]:checked').val();
    var y = $('input:radio[name=optionsRadios]:checked').attr('kd');
    var z = $('input:radio[name=optionsRadios]:checked').attr('term');
    var w = $('input:radio[name=optionsRadios]:checked').attr('alamat');
    $('#pn').val(x);
    $('#kd_plg').val(y);
    $('#al').val(w);
    $('#term').val(z);
    get_sj_list(y);
}

//PopUp Pelanggan
function listPelanggan(){
    $.ajax({
    type:'POST',
    url: "<?php echo base_url();?>index.php/tr_surat_jalan/view_sj_pelanggan",
    data :{},
    success:
    function(hh){
        $('#list_pelanggan').html(hh);
    }
    });   
}

$(function() {
    $( "#_tgl1").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd-mm-yy",
        showAnim: "blind",
    });
});

function list_invoice(){
    $.ajax({
    type:'POST',
    url: "<?php echo base_url();?>index.php/tr_invoice/index",
    data :{},
    success:
    function(hh){
        $('#list_invoice').html(hh);
    }
    });
}

//Tampilkan SO sesuai pelanggan
function get_sj_list($user_id){
    var id = $user_id;
    console.log(id);

    $.ajax({
        type:'POST',
        async: false,
        url: "<?php echo base_url();?>tr_surat_jalan/sj_call",
        data:{id:id},
        dataType: "html",

        success: function(data){
            $('#no_sj').html(data);
        }
    });
}

function autogen(){
    $('#delete').attr('disabled', true);
    $.ajax({
    type:'POST',
    url: "<?php echo base_url();?>index.php/tr_invoice/auto_gen",
    data :{},
    success:
        function(hh){
            $('#no_invo').val(hh);
        }
    });
}

function getFormInvoice(IDsj){
    var id = IDsj;
    $.ajax({
        type:'POST',
        url: "<?php echo base_url();?>index.php/tr_invoice/getSJ",
        data :{id:id},
        dataType: 'json',
        success:
        function(msg){
            $('#_tgl1').val(msg.Tanggal);
            $('#pn').val(msg.Perusahaan);
            $('#term').val(msg.Term);
            $('#al').val(msg.Alamat);
            $('#_sj').val(msg.Kode_Sj);

            displayResult();
        }
    });
}


/*
function lookup_so(){
$("#so").autocomplete({
    minLength: 1,
    source:
    function(req, add){
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/autocomplete/lookup",
            dataType: 'json',
            type: 'POST',
            data: req,
            success:
            function(data){
                if(data.response =="true"){
                    add(data.message);
                }
            },
        });
    },

    //tampilkan table detail
    select:
    function(event, ui) {
        $('#so').val(ui.item.value);
        get_so();
        detail_SO();
    },
});
}
/*
function get_so() {
    var _do = $('#_do').val();
    $.ajax({
        type:'POST',
        url: "<?php echo base_url();?>index.php/tr_invoice/get_so",
        data :{_do:_do},
        success:
        function(msg){
            data=msg.split("|");
            $('#plg').val(data[0]);
            $('#so').val(data[3]);
            $('#kd_plg').val(data[1]);
            $('#al').val(data[2]);
        }
    });
}

function detail_SO(){
    var so = $('#so').val();
    $.ajax({
        type:'POST',
        url: "<?php echo base_url();?>index.php/tr_invoice/Detail_SO",
        data :{so:so},
        success:
        function(hh){
           $('#hasil2').html(hh);
        }
    });
}

//Table Gudang
function list_SO(){
    $.ajax({
    type:'POST',
    url: "<?php echo base_url();?>index.php/tr_do/viewSO",
    data :{},
    success:
    function(hh){
        $('#list_so').html(hh);
    }
    });   
}

//GET POPUP SO
function getSO(){
    var a = $('input:radio[name=optionsRadios]:checked').val();
    var b = $('input:radio[name=optionsRadios]:checked').attr('pelanggan');
    var c = $('input:radio[name=optionsRadios]:checked').attr('kode_plg');
    var d = $('input:radio[name=optionsRadios]:checked').attr('alamat');
    var e = $('input:radio[name=optionsRadios]:checked').attr('total');

    $('#so').val(a);
    $('#kd_plg').val(c);
    $('#plg').val(b);
    $('#al').val(d);  
    $('#total1').val(e);
    $('#total').val(accounting.formatMoney(e, "Rp ",2,".",","));
    detail_SO();
}*/

function reset_form(){
    $('#formID').each(function(){
        this.reset();
    });
    autogen();
    tampilDetailInvoice();
    show_sj('reset');
    $('#total1').val('');
    $('#total').val('');
    $('#save').attr('mode','add');
    document.getElementById('totalBox').style.visibility = 'hidden';
    document.getElementById('f_plg').style.visibility = 'visible';
}

//Cancel
$("#cancel").click(function(){
    reset_form();
});

//Save Click
$("#save").click(function(){
    
    var mode = $('#save').attr("mode");
    
    //deklarasi variable
    var id = $('#no_invo').val();
    var _tgl = $('#_tgl1').val();
    var so = $('#_sj').val();
    var term = $('#term').val();
    if(mode == "add"){ //add mode
        if($("#formID").validationEngine('validate'))
        {
            $.ajax({
            type:'POST',
            url: "<?php echo base_url();?>index.php/tr_invoice/save/add",
            data :{id:id,_tgl:_tgl,so:so,term:term},

            success:
            function(msg)
            {
                if(msg == "ok")
                {
                    bootstrap_alert.success('<b>Sukses!</b> Data berhasil ditambahkan');
                    reset_form();
                    list_invoice();
                }
                else{
                    bootstrap_alert.warning('<b>Gagal!</b> Data sudah ada');
                }
            }
            });
        }
        else
        {
            bootstrap_alert.warning('<b>Gagal!</b> Pilih Nomor SO & Pastikan Semua Field Terisi');
        }             
    }else if(mode == "edit"){ //Edit mode
        if($("#formID").validationEngine('validate'))
        {
            $.ajax({
            type:'POST',
            url: "<?php echo base_url();?>index.php/tr_invoice/save/edit",
            data :{id:id,_tgl:_tgl,so:so,term:term},

            success:
            function(msg)
            {
                if(msg == "ok")
                {
                    bootstrap_alert.success('<b>Sukses!</b> Update berhasil dilakukan');
                    reset_form();
                    list_invoice();
                }
                else
                {
                    bootstrap_alert.warning('<b>Gagal!</b> Terjadi Kesalahan');
                }
            }
            });
        }
    }
});

$("#delete").click(function(){
    var id = $('#no_invo').val();

    PlaySound('beep');
    var pr = $('#_tgl1').val();
    //var r=confirm("Anda yakin ingin menghapus data "+id+" ?");
    bootbox.dialog({
        message: "Kode Invoice: <b>"+id+"</b><br/>Tanggal Invoice : <b>"+pr+"</b>",
        title: "<img src='<?php echo base_url();?>/assets/img/warning-icon.svg' class='warning-icon'/> Yakin ingin menghapus Data Berikut?",
        buttons: {
            main: {
                label: "Batal",
            },
            danger: {
                label: "Hapus",
                className: "btn-danger",
                callback: function() {
                    $.ajax({
                    type:'POST',
                    url: "<?php echo base_url();?>index.php/tr_invoice/delete",
                    data :{id:id},
                    success:
                    function(msg)
                    {
                        if(msg == "ok")
                        {
                            bootstrap_alert.success('Data <b>'+id+'</b> berhasil dihapus');
                            reset_form();
                            list_invoice();
                        }
                    }
                    });
                }
            }
        }
    });
});
</script>