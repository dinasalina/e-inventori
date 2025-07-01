<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Senarai Barang</h2>
    <table>
        <thead>
            <tr>
                <th>Kod</th>
                <th>Nama</th>
                <th>Kuantiti</th>
                <th>Paras Minimum</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->kod_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kuantiti }}</td>
                    <td>{{ $item->paras_minimum }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
