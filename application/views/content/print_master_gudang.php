<style type="text/css">
	.bod td, th
	{
		border:1px solid black;
	}
	thead{
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
			<h3 >DAFTAR GUDANG</h3>
			<h4 >PERIODE : <?php echo $tanggal; ?></h4>
			<br/>
		</td>
	</tr>

</table>

<hr/>
<table class="table bod" width="100%" style="font-size: 11px">
	<thead>
		<tr style="background: #C5C5C5;">
			<th>No</th>
			<th>Kode Gudang</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Kota</th>
			<th>Telepon</th>
			<th>Fax</th>
			
			
		</tr>
	</thead>
	<tbody>
		<?php $i=1;
		foreach($hasil2 as $row){
        
            echo
            "<tr>
				<td>$i</td>
                <td>$row->Kode</td>
                
				<td>$row->Nama</td>
				<td>$row->Alamat</td>
				<td>$row->Kota</td>
				<td>$row->Telp</td>
				<td>$row->Fax</td>
				
            </tr>";$i++;
        }  ?>
	</tbody>
</table>