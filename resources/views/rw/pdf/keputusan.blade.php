<!DOCTYPE html>
<html>
<head>
    <title>Hasil Keputusan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Hasil Keputusan Laporan</h1>
    <table>
        <thead>
            <tr>
                <th>Alternatif</th>
                <th>Lokasi Kerusakan</th>
                <th>Total Nilai Utility</th>
                <th>Rangking</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($totalUtilities as $data)
                <tr>
                    <td>{{ $data['alternatif'] }}</td>
                    <td>{{ $data['lokasi'] }}</td>
                    <td>{{ $data['totalUtility'] }}</td>
                    <td>{{ $data['ranking'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
