<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<h2>Tambah Siswa</h2>

<form method="POST" action="/siswa/store">
@csrf

<input class="form-control mb-2" name="nama" placeholder="Nama">
<input class="form-control mb-2" name="no_hp" placeholder="No HP">

<button class="btn btn-success">Simpan</button>

</form>

</body>
</html>