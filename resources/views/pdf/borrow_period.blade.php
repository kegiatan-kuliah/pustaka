<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pinjaman Buku</title>
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
    <h2 style="text-align: center;">Laporan Pinjaman Buku</h2>
    <h2 style="text-align: center;">Periode {{ Carbon::parse($startDate)->translatedFormat('d F Y') }} - {{ Carbon::parse($endDate)->translatedFormat('d F Y') }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor ID</th>
                <th>Tanggal Pinjam</th>
                <th>Jumlah</th>
                <th>Nama</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($applications as $index => $application)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $application->application_no }}</td>
                    <td>{{ Carbon::parse($application->date)->translatedFormat('d F Y') }}</td>
                    <td>{{ $application->total_quantity }}</td>
                    <td>{{ $application->member->name ?? '-'}}</td>
                    <td>{{ $application->member->room->name ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center;">Tidak Ada Data</td>
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
