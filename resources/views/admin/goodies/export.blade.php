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
		<h5>Laporan Barang</h4>
	</center>

    <br>

	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th style="text-align:center">No</th>
                <th>Pengguna</th>
				<th>Nama Barang</th>
				<th>Dibuat</th>
				<th>Harga Awal</th>
			</tr>
		</thead>
		<tbody>
			@foreach($goodies as $goods)
			<tr>
				<td style="text-align:center">{{ $loop->iteration }}</td>
				<td>{{ $goods->user->name }}</td>
				<td>{{ $goods->goods }}</td>
				<td>{{ $goods->created_at->format('d-m-Y') }}</td>
				<td>Rp. {{ $goods->initial_price }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>