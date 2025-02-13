<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Bebas Pustaka</title>
    <style>
        @page {
            size: A4 portrait;
            /* A4 portrait */
            margin-left: 30px;
            margin-top: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            width: 100%;
            height: 50%;
            /* Half of A4 page height */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 96%;
            height: 90%;
            border: 2px solid #000;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .content {
            font-size: 14px;
            text-align: left;
        }

        .signature {
            text-align: right;
            margin-top: 20px;
        }

        hr {
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>

    @php
        use Carbon\Carbon;

        Carbon::setLocale('id');
    @endphp
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="title">KARTU BEBAS PUSTAKA</div>
            <hr>
            <div class="content">
                <p>Yang bertanda tangan di bawah ini petugas perpustakaan menerangkan bahwa :</p>
                <p>NIS: <strong>{{ $data->identity_no }}</strong></p>
                <p>Nama: <strong>{{ $data->name }}</strong></p>
                <p>Kelas: <strong>{{ $data->room->name }}</strong></p>
                <p>Telah mengembalikan buku-buku pinjaman dengan lengkap <strong>(BEBAS PUSTAKA)</strong>.</p>
            </div>
            <div class="signature">
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
    </div>
</body>

</html>