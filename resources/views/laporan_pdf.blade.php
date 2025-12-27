<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Laporan Keuntungan</title>
  <style>
    body{font-family: sans-serif; font-size:12px}
    table{width:100%; border-collapse: collapse}
    th, td{border:1px solid #000; padding:6px; text-align:left}
    th{text-align:center}
  </style>
</head>
<body>
  <h3>Laporan Keuntungan - Warung Sate Mang Ipin</h3>
  <table>
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Nama Menu</th>
        <th>Pendapatan (Rp)</th>
        <th>Modal (Rp)</th>
        <th>Keuntungan (Rp)</th>
      </tr>
    </thead>
    <tbody>
      @foreach($laporans as $lap)
      <tr>
        <td>{{ $lap->tanggal->format('Y-m-d') }}</td>
        <td>{{ $lap->nama_menu }}</td>
        <td style="text-align:right">{{ number_format($lap->pendapatan,0,',','.') }}</td>
        <td style="text-align:right">{{ number_format($lap->modal,0,',','.') }}</td>
        <td style="text-align:right">{{ number_format($lap->keuntungan,0,',','.') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
