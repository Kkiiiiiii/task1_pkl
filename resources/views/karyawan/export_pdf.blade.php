<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Data Pendidikan</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        h3 {
            text-align: center;
        }
    </style>
</head>
<body>

<h3>Data Pendidikan</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Jenjang</th>
            <th>Nama Sekolah</th>
            <th>Tahun Masuk</th>
            <th>Tahun Lulus</th>
            <th>Pilihan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($educates as $i => $e)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $e->jenjang_pendidikan }}</td>
                <td>{{ $e->nama_sekolah }}</td>
                <td>{{ $e->tahun_masuk }}</td>
                <td>{{ $e->tahun_lulus }}</td>
                <td>{{ $e->pilihan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
