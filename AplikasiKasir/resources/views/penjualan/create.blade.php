<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penjualan</title>
</head>
<body>
    <h1>Tambah Penjualan</h1>
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <label for="produk_id">Pilih Produk:</label>
        <select name="produk_id" id="produk_id" required>
            @foreach ($produk as $prod)
                <option value="{{ $prod->id }}">{{ $prod->nama_produk }}</option>
            @endforeach
        </select><br><br>

        <label for="member_id">Pilih Member (opsional):</label>
        <select name="member_id" id="member_id">
            <option value="">Tidak ada</option>
            @foreach ($members as $member)
                <option value="{{ $member->id }}">{{ $member->nama }}</option>
            @endforeach
        </select><br><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah" required min="1"><br><br>

        <button type="submit">Tambah Penjualan</button>
    </form>
</body>
</html>
