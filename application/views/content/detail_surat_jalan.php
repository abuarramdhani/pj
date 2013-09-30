<div class="table CSSTabel table-list2" style="top: -22px; margin-top: 5px;">
<table id="tbdsj">
    <thead>
        <th>Kode</th><th>Barang & Ukuran</th><th>Nama Barang SJ</th><th>Qty</th><th>Keterangan</th><th>Action</th>
    </thead>
    <tbody>
    <?php
    $i=1;
    foreach($hasil as $row)
    {
       echo "<tr>
        <td id='1' style='width:100px;' >
            <div class='input-append'>
                <input type='text' class='validate[required] span2' id='kode_brg$i' id='appendedInputButton' name='kode_brgd' style='width:100px' value='$row->Kode_Brg' disabled='true'/>
                <a href='#myModal' onclick='getDetail($i)' id='f_brg$i' role='button' class='btn' data-toggle='modal' style='padding: 2px 3px; visibility: hidden;'><i class='icon-filter'></i></a>
            </div>
        </td>
        <td style='width:120px;'><input type='text' class='validate[required]' id='brg_ukur$i' name='brg_ukur$i' style='width:120px' value='$row->Nama $row->Ukuran' disabled='true'/></td>
        <td style='width:120px;'><label id='nbu$i'>$row->Nama</label></td>
        <td style='width:50px;'><input type='text' class='validate[required]' id='qty$i' name='qty$i' style='width:20px' value='$row->Qty' disabled='true'/></td>
        <td style='width:120px;'><input type='text' class='validate[required]' id='ket$i' name='ket$i' style='width:120px' value='$row->Keterangan' disabled='true'/></td>
        <td style='width:50px;'>
            <div class='btn-group'>
		        <a class='btn' href='#' name='pencil' onclick='editRow($i)'><i id='icon$i' class='icon-pencil'></i></a>
                <a class='btn' href='#' name='trash' onclick='deleteRow(this)'><i class='icon-trash'></i></a>
            </div>
        </td>
        </tr>
        ";
        $i++;
    } $tottx=$i-1;
    echo  "<label id='jmltx' style='visibility:hidden; font-size:1px;'> $tottx </label>";?>
    </tbody>
</table>
</div>

<script>

var oTable = $('#tbdsj').dataTable( {
    "sScrollY": 180,
    "sScrollX": "100%",
    //"sScrollXInner": "110%",
    "bPaginate": false,
    "bFilter": false,
    "bInfo": false //Showing 1 to 1 of 1 entries (filtered from 7 total entries)
} );

function getDetail(row){
    filter = row;
}

function deleteRow(row) {
    try {
        var i=row.parentNode.parentNode.rowIndex;
        var table = document.getElementById('tbdsj');
        alert(i);
        var rowCount = table.rows.length;

            if(rowCount <= 1) {
                alert("Detail Surat Jalan Tidak Boleh Kosong");
            }else{
               table.deleteRow(i);
               rowCount--;
               i--;
            }
    }catch(e) {
        alert(e);
    }
}

function editRow(row){
    //$(this).parent().next().find('input[type="text"]').attr('disabled');
    var i = document.getElementById('kode_brg'+row);
    if (i.disabled == true){
        document.getElementById('kode_brg'+row).disabled=false;
        document.getElementById('f_brg'+row).style.visibility = 'visible';
        document.getElementById('icon'+row).className='icon-ok';
        document.getElementById('brg_ukur'+row).disabled=false;
        document.getElementById('qty'+row).disabled=false;
        document.getElementById('ket'+row).disabled=false;
        return false;
    }
    else{
        document.getElementById('kode_brg'+row).disabled=true;
        document.getElementById('f_brg'+row).style.visibility = 'hidden';
        document.getElementById('icon'+row).className='icon-pencil';
        document.getElementById('brg_ukur'+row).disabled=true;
        document.getElementById('qty'+row).disabled=true;
        document.getElementById('ket'+row).disabled=true;
        return true;
    }
}
</script>
