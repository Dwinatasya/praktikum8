<html>
<head>
    <title>Website awal</title>
    <!--membuat pengunaan bootstrapc-->
    <link 
    rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
    <!--membuat pengaturan css internal-->
    <style>
    /*untuk teks heading di tag <body>*/
    h2
    {
        color: crimson;
        font-family: sans-serif;
        text-align: center;
        width: 35%;
        margin:auto;
        padding: 20px;
    }
    h3{
        background-color: white;
        color: crimson;
        font-family: sans-serif;
        text-align: center;
        width: 45%;
        margin:auto;
        padding: 10px;
    }
    body
    {
        background-image: url('img/gambar1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>
<body>
    <!--membuat pembukaan-->
    <h2>SELAMAT DATANG</h2>
    <br><br>
    <h3>Terimakasih telah mengunjungi website ini untuk mengisi formulir perserta didik 
    silahkan klik di bawah ini
    <br> <!--membuat tombol menuju formulir peserta didik-->
    <a href="validasi_peserta_didik.php" class="btn btn-primary">FORMULIR PESERTA DIDIK</a>
    </h3>
</body>
</html>