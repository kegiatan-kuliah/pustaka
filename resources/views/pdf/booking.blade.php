<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengembalian Buku</title>
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
        <h1 style="margin-top: 0px; text-align: center;">SD NEGERI 25 KINALI</h1>
        <hr>
    </div>
    <h2 style="text-align: center;">Tanda Peminjaman Buku</h2>
  
    <div>
      <div style="width: 50%; float: left">
        <div>
          <p style="font-weight: bold">Nomor Anggota:</p>
          <p>{{ $data->member->member_no }}</p>
        </div>

        <div>
          <p style="font-weight: bold">Nama:</p>
          <p>{{ $data->member->name }}</p>
        </div>

        <div>
          <p style="font-weight: bold">Kelas:</p>
          <p>{{ $data->member->room->name }}</p>
        </div>
      </div>

      <div width="width: 50%; float: right">
        <div>
          <p style="font-weight: bold">Kode Pinjam:</p>
          <p>{{ $data->application_no }}</p>
        </div>

        <div>
          <p style="font-weight: bold">Tanggal Pinjam:</p>
          <p>{{ Carbon::parse($data->date)->translatedFormat('d F Y') }}</p>
        </div>

        <div>
          <p style="font-weight: bold">Jumlah Pinjam:</p>
          <p>{{ $data->total_quantity }}</p>
        </div>
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data->items as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->quantity }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    
    <div style="display: inline-block; width: 100%; margin-top: 40px;">
        <div style="width: 30%; float: left;">
            <br>
            <br>
            <br>
            <p style="margin-top:0px; margin-bottom: 0px;">Kepala Perpustakaan</p>
            <p style="margin-top:0px; margin-bottom: 0px;">Sekolah</p>
            <br>
            <br>
            <br>
            <p style="margin-top:0px; margin-bottom: 0px;">Dhiawr Rahmi, S.Pd I</p>
            <p style="margin-top:0px; margin-bottom: 0px;">NIP. 198511232022212011</p>
        </div>
        <div style="width: 50%; float: right; text-align: right;">
            <p>Tanjung Raya, {{ Carbon::now()->translatedFormat('d F Y')}} </p>
            <p style="margin-top:0px; margin-bottom: 0px;">Yang Meminjam</p>
            <br>
            <br>
            <br>
            <br>
            <p style="margin-top:0px; margin-bottom: 0px;">{{ $data->member->name }}</p>
            <p style="margin-top:0px; margin-bottom: 0px;">NISN. {{ $data->member->identity_no }}</p>
        </div>
    </div>
</body>

</html>
