<style type="text/css">
	.bod td, th
	{
		border:1px solid black;
	}
	table{
		border-collapse:collapse;
	}
</style>
<table>
	<tr>
		<td colspan=4>
			<h1 style="margin: 0">PD. PELITA JAYA</h1>
			<h4 >LAPORAN SALES ORDER</h4><br/>
			
		</td>
		
	</tr>
	<tr>
		<td width="30%">Nomor SO : </td>
		<td width="25%"><?php echo $so; ?></td>
		<td width="30%">Nomor PO : </td>
		<td><?php echo $po; ?></td>
	</tr>
	<tr>
		<td>Tanggal SO : </td>
		<td><?php echo $tglSo; ?></td>
		<td>Tanggal PO : </td>
		<td><?php echo $tglPo; ?></td>
	</tr>
	<tr>
		<td>Pelanggan </td>
		<td><?php echo $pl; ?></td>
		<td>Sales </td>
		<td><?php echo $sl; ?></td>
	</tr>
	
</table>

<hr/>
<table class="table bod" width="100%" style="font-size: 11px; border: 1px solid #000;">
	<thead>
		<tr style="background: #C5C5C5;">
			<th>Kode Barang</th>
			<th>Qty</th>
			<th>Satuan</th>
			
			<th>Harga Satuan</th>
			<th>Jumlah</th>
			<th>Keterangan</th>
			
		</tr>
	</thead>
	<tbody >
		<?php for($i=0;$i<$totalRow;$i++){
        
            echo
            "<tr>
                <td>$arrKode[$i]</td>
                <td>$arrQty[$i]</td>
                <td>$arrSatuan[$i]</td>
				<td>$arrHarga[$i]</td>
				<td>$arrJumlah[$i]</td>
				<td>$arrKet[$i]</td>
				
            </tr>";
        }  ?>
	</tbody>
</table>
<table>
	<tr>
			<td>Total : <?php echo $to; ?></td>
		</tr>
</table>