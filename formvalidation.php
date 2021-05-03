<html>
<head>
<!--membuat pengunaan bootstrapc-->
<link 
rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
crossorigin="anonymous">
<!--membuat css internal-->
<style>
.warning {color: #FF0000;}
</style>
</head>
<body>
<?php
 $error_nama ="";
 $error_email ="";
 $error_web ="";
 $error_pesan ="";
 $error_telp ="";
 
 $nama ="";
 $email ="";
 $web ="";
 $pesan ="";
 $telp ="";

 //membuat validasi pengecekan pada setip input
 if($_SERVER["REQUEST_METHOD"] == "POST"){ 
     //validasi nama
    if(empty($_POST["nama"]))
    {
        $error_nama = "Nama tidak boleh kosong";
    }
    else
    {
        $nama = cek_input($_POST["nama"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $nama))
        {
            $nameErr = "Inputan hanya boleh huruf dan spasi";
        }
    }

    //validasi email
    if(empty($_POST["email"]))
    {
        $error_email = "Email tidak boleh kosong";
    }
    else
    {
        $email = cek_input($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error_email = "Format email invalid";
        }
    }

    //validasi pesan
    if(empty($_POST["pesan"]))
    {
        $error_pesan = "Pesan tidak boleh kosong";
    }
    else
    {
        $pesan = cek_input($_POST["pesan"]);
    }

    //validasi web
    
    if(empty($_POST["web"]))
    {
        $error_web = "Website tidak boleh kosong";
    }
    else
    {
        $web = cek_input($_POST["web"]);
        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.) [-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $web))
        {
            $error_web = "URL tidak valid";
        }
    }
   
    //validasi telp
    if(empty($_POST["telp"]))
    {
        $error_telp = "telp tidak boleh kosong";
    }
    else
    {
        $telp = cek_input($_POST["telp"]);
        if(!is_numeric($telp))
        {
            $error_telp = "Nomor HP hanya boleh angka";
        }
    }
}
function cek_input ($data){//menghilangkan spasi yang ada di sebelum dan sesudah isian inputan
    $data = trim($data); //menghilangkan spasi di awal dan akhir dari inputan
    $data = stripslashes($data);//untuk menghapus escape character backslash \ dari string
    $data = htmlspecialchars($data);//untuk mengubah beberapa character entity menjadi nama entity
    return($data);
}
?>

<div class="row">
<div class="col-md-6">
<div class="card">
    <div class="card-header">
    Contoh Validasi Form dengan PHP
    </div>
    <div class="card-body">
     <!--membuat form inputan bila saat di validasi terdapat eror akan menampilkan pesan berwana merah-->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!--nama-->
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control <?php echo($error_nama !=""?"is-invalid":""); ?>" id="nama"
                    placeholder="nama" value="<?php echo $nama; ?>"><span class="warning"><?php echo $error_nama;?></span>
                </div>
            </div>

            <!--email-->
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control <?php echo($error_email !=""?"is-invalid":""); ?>" id="email"
                    placeholder="email" value="<?php echo $email; ?>"><span class="warning"><?php echo $error_email;?></span>
                </div>
            </div>

            <!--web-->
            <div class="form-group row">
                <label for="web" class="col-sm-2 col-form-label">Website</label>
                <div class="col-sm-10">
                    <input type="text" name="web" class="form-control <?php echo($error_web !=""?"is-invalid":""); ?>" id="web"
                    placeholder="web" value="<?php echo $web; ?>"><span class="warning"><?php echo $error_web;?></span>
                </div>
            </div>

            <!--telp-->
            <div class="form-group row">
                <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                <div class="col-sm-10">
                    <input type="text" name="telp" class="form-control <?php echo($error_telp !=""?"is-invalid":""); ?>" id="telp"
                    placeholder="telp" value="<?php echo $telp; ?>"><span class="warning"><?php echo $error_telp;?></span>
                </div>
            </div>

            <!--pesan-->
            <div class="form-group row">
                <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
                <div class="col-sm-10">
                    <textarea name="pesan" class="form-control <?php echo($error_pesan !=""?"is-invalid":""); ?>" >
                    <?php echo $pesan; ?></textarea><span class="warning"><?php echo $error_pesan;?></span>
                </div>
            </div>
             <!--membuat botton sign in-->
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<?php
//menampilkan inputan 
echo "<h2>Your Input</h2>";
echo "Nama = ".$nama;
echo "<br>;";
echo "Email = ".$email;
echo "<br>;";
echo "Website = ".$web;
echo "<br>;";
echo "Telp = ".$telp;
echo "<br>;";
echo "Pesan = ".$pesan;
echo "<br>;";
?>

</body>
</html>