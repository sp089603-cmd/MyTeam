<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>HOME REGISTRASI CLUB CODING</h2>
    <form action="daftar" method="post">
        @csrf
        <input type="text" name="nim" placeholder="masukan NIM">
        <input type="text" name="nama" placeholder="masukan Nama">
        <input type="password" name="pw" id="pw" placeholder="password">
        <input type="submit" value="Daftar">
    </form>
</body>
</html>