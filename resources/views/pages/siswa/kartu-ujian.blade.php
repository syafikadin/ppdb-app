<!DOCTYPE html>
<html>

<head>
    <title>Kartu Ujian</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .card {
            border: 2px solid #000;
            padding: 10px
        }

        .text-center {
            text-align: center
        }
    </style>
</head>

<body>
    <div class="card text-center">
        <div class="text-center">

            <h2>
                KARTU PESERTA UJIAN <br>
                SMPTM LUBABUL FATTAH
            </h2>
            <hr>

            <table>
                <tr>
                    <td rowspan="6">
                        <img src="{{ $siswa->foto }}" style="height: 150px" alt="">
                    </td>
                    <td>
                        Nama
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        {{ $siswa->nama_siswa }}
                    </td>
                </tr>

                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td> {{ $siswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>:</td>
                    <td>{{ $siswa->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $siswa->alamat }}</td>
                </tr>
                <tr>
                    <td>Nomor WA</td>
                    <td>:</td>
                    <td>{{ $siswa->nomor_wa }}</td>
                </tr>
            </table>
        </div>



    </div>

</body>

</html>
