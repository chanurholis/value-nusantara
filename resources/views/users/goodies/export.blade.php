<!DOCTYPE html>
<html>
	<head>
		<title>{{ config('app.name') }}</title>
		<link rel="stylesheet" href="{{ asset('stisla/assets/css/bootstrap.min.css') }}">
		<style type="text/css">
			table tr td,
			table tr th{
				font-size: 9pt;
			}
		</style>
	</head>
	<body>
	<center>
		<img src="{{ asset('img/favicon.png') }}" width="50" alt="logo">
		<h5>Laporan Barang</h5>
	</center>

	<br>

	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th style="text-align:center">No</th>
				<th>Barang</th>
				<th>Deskripsi</th>
				<th>Dibuat</th>
				<th>Harga Awal</th>
			</tr>
		</thead>
		<tbody>
			@foreach($goodies as $goods)
			<tr>
				<td style="text-align:center">{{ $loop->iteration }}</td>
				<td>{{ $goods->goods }}</td>
				<td>{{ $goods->description }}</td>
				<td>{{ $goods->created_at }}</td>
				<td>Rp. {{ $goods->initial_price }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	</body>
</html>
