<!DOCTYPE html>
<html lang="en">

<head>


	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 100%;
		}



		table thead th {
			border: 1px solid black;
			text-align: left;
		}

		table tbody tr td {
			border: 1px solid black;
			text-align: left;
		}
	</style>
</head>

<body>
	<center>
		<h1>LAPORAN PDF TRANSAKSI</h1>
		<h1 style="color: red;">CANVAS ART LEYANGAN</h1>
	</center>

	<br>
	<table>
		<thead>
			<th>No</th>
			<th>Code</th>
			<th>Nama</th>
			<th>Total</th>
			<th>Pembayaran</th>
			<th>Kota</th>
			<th>Tanggal</th>
		</thead>

		<tbody>
			<?php
			$no  = 1;
			foreach ($transactions as $trans) : ?>

				<tr>
					<td><?= $no++; ?></td>
					<td><?= $trans->code; ?></td>
					<td><?= $trans->name; ?></td>
					<td><?= $trans->total_price; ?></td>
					<td><?= $trans->bank_name; ?></td>
					<td><?= $trans->city; ?></td>
					<td><?= $trans->created_at; ?></td>
				</tr>

			<?php endforeach; ?>

		</tbody>
	</table>



</body>

</html>