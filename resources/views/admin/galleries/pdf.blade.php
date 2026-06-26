<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Galeri</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h1 { text-align: center; color: #198754; margin-bottom: 5px; }
        h4 { text-align: center; color: #666; margin-top: 0; font-weight: normal; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th { background-color: #198754; color: white; padding: 8px; text-align: left; }
        td { padding: 8px; border-bottom: 1px solid #ddd; }
        .footer { text-align: center; margin-top: 30px; color: #999; font-size: 10px; }
    </style>
</head>
<body>
    <h1>Local Juice</h1>
    <h4>Laporan Galeri</h4>
    <hr>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($galleries as $gallery)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $gallery->title }}</td>
                <td>{{ $gallery->description ?? '-' }}</td>
                <td>{{ $gallery->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada {{ now()->format('d M Y H:i') }}
    </div>
</body>
</html>
