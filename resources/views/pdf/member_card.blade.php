<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name Card</title>
    <style>
        @page {
            size: A4;
            margin: 20px;
        }

        .name-card {
            width: 250px;
            height: 150px;
            border: 2px solid #000;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 20px;
            padding-right: 20px;
            font-family: Arial, sans-serif;
            display: inline-block;
            margin: 10px;
        }

        .nis,
        .nama,
        .kelas {
            font-size: 14px;
            font-weight: bold;
            margin: 5px 0;
        }

        .logo-img {
            width: 50px;
            height: auto;
        }

        p {
            margin: 0;
        }

        .label {
            margin-left: 20px
        }

        hr {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        strong {
            margin-bottom: 5px
        }
    </style>
</head>

<body>
    <div class="name-card">
        <table class="head">
            <tbody>
                <tr>
                    <td>
                        <img src="{{ public_path('assets/img/logo.png') }}" alt="logo" class="logo-img" />
                    </td>
                    <td>
                        <div class="label">
                            <strong>Kartu Anggota</strong>
                            <p>Pustaka Digital</p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <div class="nis">NIS: {{ $data->identity_no }}</div>
        <div class="nama">Nama: {{ $data->name }}</div>
        <div class="kelas">Kelas: {{ $data->room->name }}</div>
    </div>
</body>

</html>