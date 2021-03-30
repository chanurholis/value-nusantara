<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('stisla/assets/css/bootstrap.min.css') }}">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Lelang</h4>
	</center>

    <br>

	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th style="text-align:center">No</th>
                <th>Pengguna</th>
				<th>Nama Barang</th>
				<th>Harga Akhir</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Berakhir</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($auctions as $auction)
			<tr>
				<td style="text-align:center">{{ $loop->iteration }}</td>
				<td>{{ $auction->user->name }}</td>
				<td>{{ $auction->goods->goods }}</td>
				<td>Rp. {{ $auction->final_price }}</td>
				<td>{{ $auction->start_date }}</td>
				<td>{{ $auction->end_date }}</td>
				<td>{{ auction_status($auction->status) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>