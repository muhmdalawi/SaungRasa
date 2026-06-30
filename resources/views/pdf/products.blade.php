<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Product Saung Rasa</title>
    <style>
        body {
            font-family: "DejaVu Sans", sans-serif;
            color: #2B2B2B;
            font-size: 11px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .header-table td {
            vertical-align: middle;
        }

        .logo {
            width: 60px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            color: #2F5D3A;
            margin: 0;
        }

        .subtitle {
            font-size: 11px;
            color: #555;
            margin: 4px 0 0;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
        }

        table.data th {
            background-color: #2F5D3A;
            color: #ffffff;
            padding: 6px 8px;
            text-align: left;
            font-size: 11px;
        }

        table.data td {
            padding: 6px 8px;
            border-bottom: 1px solid #e0ddd3;
            font-size: 10.5px;
        }

        table.data tr:nth-child(even) td {
            background-color: #f8f5ef;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .footer-note {
            margin-top: 20px;
            font-size: 9px;
            color: #777;
        }
    </style>
</head>

<body>
    <table class="header-table">
        <tr>
            <td style="width:70px;">
                <img src="{{ public_path('assets/logo.png') }}" class="logo" alt="Saung Rasa">
            </td>
            <td>
                <p class="title">Laporan Product Saung Rasa</p>
                <p class="subtitle">Tanggal Cetak: {{ $tanggal->translatedFormat('d F Y') }}</p>
            </td>
        </tr>
    </table>

    <table class="data">
        <thead>
            <tr>
                <th class="text-center" style="width:25px;">No</th>
                <th>Nama Product</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $index => $product)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $product->nama_product }}</td>
                    <td>{{ $product->kategori }}</td>
                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td>{{ $product->stok }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data product.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p class="footer-note">Laporan ini dibuat secara otomatis oleh sistem manajemen produk Saung Rasa.</p>
</body>

</html>
