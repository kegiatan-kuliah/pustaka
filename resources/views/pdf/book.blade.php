<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok Buku</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    @php
        use Carbon\Carbon;

        Carbon::setLocale('id');
    @endphp
</head>

<body>
    <div>
        <img src="{{ public_path('img/logo-provinsi-sumbar.png') }}" alt="" width="50px" height="50px" style="position: absolute; top: 25px;">
        <h3 style="margin-bottom: 0px; text-align: center;">PEMERINTAH PROVINSI SUMATERA BARAT</h3>
        <h1 style="margin-top: 0px; text-align: center;">SMP NEGERI 3 TANJUNG RAYA</h1>
        <hr>
    </div>
    <h2 style="text-align: center;">Laporan Persediaan Buku</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kondisi</th>
                <th>Stok Awal</th>
                <th>Stok Keluar</th>
                <th>Stok Akhir</th>
            </tr>
        </thead>
        <tbody>
          @forelse($books as $index => $book)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $book->title }}</td>
              <td>{{ $book->condition }}</td>
              <td>{{ $book->quantity }}</td>
              <td>{{ $book->borrow_quantity }}</td>
              <td>{{ $book->end_quantity }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="6" style="text-align: center;">Tidak Ada Data</td>
            </tr>
          @endforelse
        </tbody>
    </table>

    <div style="display: inline-block; width: 100%; margin-top: 40px;">
        <div style="width: 30%; float: left;">
            <br>
            <br>
            <br>
            <p style="margin-top:0px; margin-bottom: 0px;">Mengetahui</p>
            <p style="margin-top:0px; margin-bottom: 0px;">Kepala Sekolah</p>
            <br>
            <br>
            <br>
            <p style="margin-top:0px; margin-bottom: 0px;">Sisri Rusydi, S.Pd</p>
            <p style="margin-top:0px; margin-bottom: 0px;">NIP. 198006232008012005</p>
        </div>
        <div style="width: 50%; float: right; text-align: right;">
            <p>Tanjung Raya, {{ Carbon::now()->translatedFormat('d F Y')}} </p>
            <p style="margin-top:0px; margin-bottom: 0px;">Kepala Perpustakaan</p>
            <p style="margin-top:0px; margin-bottom: 0px;">Sekolah</p>
            <br>
            <br>
            <br>
            <p style="margin-top:0px; margin-bottom: 0px;">Dhiawr Rahmi, S.Pd I</p>
            <p style="margin-top:0px; margin-bottom: 0px;">NIP. 198511232022212011</p>
        </div>
    </div>
</body>

</html>
