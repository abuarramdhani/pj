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
	<td width="75%"><h2 style="margin: 0">PD. PELITA JAYA</h2></td>
	<td width="20%">Tanggal : <?php echo $tanggal; ?></td>
	</tr>
	<tr><td><h3 >DAFTAR PELANGGAN</h3></td></tr>
</table>
<table class="table bod" width="100%" style="font-size: 11px">
	<thead>
		<tr style="background: #C5C5C5;">
			<th>No</th>
			<th>Kode Pelanggan</th>
			<th>Perusahaan</th>
			<th>Contact Person</th>
			<th>Alamat</th>
			<th>Kota</th>
			<th>Telepon</th>
			<th>Fax</th>
			<th>NPWP</th>
			
		</tr>
	</thead>
	<tbody>
		<?php $i=1;
		foreach($hasil2 as $row){
        
            echo
            "<tr>
				<td>$i</td>
                <td>$row->Kode</td>
                <td>$row->Perusahaan</td>
				<td>$row->Nama</td>
				<td>$row->Alamat1</td>
				<td>$row->Kota</td>
				<td>$row->Telp</td>
				<td>$row->Fax1</td>
				<td>$row->NPWP</td>
            </tr>";$i++;
        }  ?>
	</tbody>
</table>
