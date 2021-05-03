<?php
error_reporting(0); //abaikan error pada browser
//panggil file koneksi.php yang sudah anda buat
include "koneksi.php";
?>
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
.container 
{
    width: 800px;
    height: 500px;
}
body 
{  
    background-color: lightblue;
}
</style>
</head>
<body>
<?php

 $jenispendaf= mysqli_real_escape_string($con, $_POST['jenispendaf']); //varibel field jenispendaf
 $tglmasuk= mysqli_real_escape_string($con, $_POST['tglmasuk']);//varibel field tglmasuk
 $nis= mysqli_real_escape_string($con, $_POST['nis']);  //varibel field nis
 $nopeserta= mysqli_real_escape_string($con, $_POST['nopeserta']);  //varibel field nopeserta
 $paud= mysqli_real_escape_string($con, $_POST['paud']); //varibel field paud
 $tk= mysqli_real_escape_string($con, $_POST['tk']);//varibel field tk
 $noskhun= mysqli_real_escape_string($con, $_POST['noskhun']); //varibel field noskhun
 $noijasah= mysqli_real_escape_string($con, $_POST['noijasah']);//varibel field noijasah
 $hobi= mysqli_real_escape_string($con, $_POST['hobi']);//varibel field hobi
 $citacita= mysqli_real_escape_string($con, $_POST['citacita']);//varibel field citacita

 


 if($_SERVER["REQUEST_METHOD"] == "POST"){ //membuat validasi pada inputan
    if(empty($jenispendaf))
    {
        $error_jenispendaf = "Jenis pendaftaran tidak boleh kosong";
    }
    elseif(empty($tglmasuk))
    {
        $error_tglmasuk = "Tgl masuk sekolah tidak boleh kosong";
    }
    elseif(empty($nis))
    {
        $error_nis = "Nis tidak boleh kosong";
    }
    elseif(!is_numeric($nis))
    {
        $error_nis = "Nis hanya boleh angka";
    }
    elseif(empty($nopeserta))
    {
        $error_nopeserta = "No peserta tidak boleh kosong";
    }
    elseif(!is_numeric($nopeserta))
    {
        $error_nopeserta = "No peserta hanya boleh angka";
    }
    elseif(empty($paud))
    {
        $error_paud = "Pilih salah satu";
    }
    elseif(empty($tk))
    {
        $error_tk = "Pilih salah satu";
    }
    elseif(empty($noskhun))
    {
        $error_noskhun = "No skhun tidak boleh kosong";
    }
    elseif(!is_numeric($noskhun))
    {
        $error_noskhun = "No skhun hanya boleh angka";
    }
    elseif(empty($noijasah))
    {
        $error_noijasah = "No ijasah tidak boleh kosong";
    }
    elseif(!is_numeric($noijasah))
    {
        $error_noijasah = "No ijasah hanya boleh angka";
    }
    elseif(empty($hobi))
    {
        $error_hobi = "Pilih salah satu";
    }
    elseif(empty($citacita))
    {
        $error_citacita = "Pilih salah satu";
    }
    else{
        $save=mysqli_query($con, "INSERT INTO peserta_didik (id,jenispendaf, tglmasuk, nis, nopeserta, paud, tk, noskhun, noijasah, hobi, citacita)
        values ('','$jenispendaf','$tglmasuk','$nis','$nopeserta','$paud', '$tk', '$noskhun', '$noijasah', '$hobi', '$citacita')");
        if($save){ //jika simpan berhasil maka dan menuju ke halaman data pribadi
            echo "<script>document.location='validasi_data_pribadi.php'</script>";
        }else{  //jika simpan gagal maka muncul pesan dan kembali ke halaman
            echo "<script>alert('Proses simpan gagal, coba kembali');document.location='validasi_peserta_didik.php'</script>";
        }
    }
}
function cek_input ($data){//menghilangkan spasi yang ada di sebelum dan sesudah isian inputan
    $data = trim($data);//menghilangkan spasi di awal dan akhir dari inputan
    $data = stripslashes($data);//untuk menghapus escape character backslash \ dari string
    $data = htmlspecialchars($data);//untuk mengubah beberapa character entity menjadi nama entity
    return($data);
}
?>



<div class="container">
<div class="card">
    <div class="card-header alert-dark">
    <b>FORMULIR PERSERTA DIDIK</b> 
    </div>
    <div class="card-body">
    <!--membuat form inputan bila saat di validasi terdapat eror akan menampilkan pesan berwana merah-->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class= "alert alert-info alert-link" align="center">
            <h10>Registasi Peserta Didik</h10>
            </div>
            <!--jenispendaf-->
            <div class="form-group row">
                <label for="jenispendaf" class="col-sm-2 col-form-label">Jenis Pendaftaran</label>
                <div class="col-sm-10">
                    <select name="jenispendaf" class="form-control <?php echo($error_jenispendaf !=""?"is-invalid":""); ?>" id="jenispendaf"
                    placeholder="jenispendaf" value="<?php echo $jenispendaf; ?>">
                    <option value="">Pilih Kategori</option>
                    <option value="Siswa Baru">Siswa Baru</option>
                    <option value="Pindahan">Pindahan</option>
                    </select>
                    <span class="warning"><?php echo $error_jenispendaf;?></span>
                </div>
            </div>

            <!--tglmasuk-->
            <div class="form-group row">
                <label for="tglmasuk" class="col-sm-2 col-form-label">Tgl Masuk Sekolah</label>
                <div class="col-sm-10">
                    <input type="date" name="tglmasuk" class="form-control <?php echo($error_tglmasuk !=""?"is-invalid":""); ?>" id="tglmasuk"
                    placeholder="" value="<?php echo $tglmasuk; ?>"><span class="warning"><?php echo $error_tglmasuk;?></span>
                </div>
            </div>

            <!--nis-->
            <!--10 digit-->
            <div class="form-group row">
                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    <input type="text" name="nis" class="form-control <?php echo($error_nis !=""?"is-invalid":""); ?>" id="nis"
                    placeholder="" value="<?php echo $nis; ?>"><span class="warning"><?php echo $error_nis;?></span>
                </div>
            </div>

            <!--nopeserta-->
            <!--20 digit-->
            <div class="form-group row">
                <label for="nopeserta" class="col-sm-2 col-form-label">No. Peserta Ujian</label>
                <div class="col-sm-10">
                    <input type="text" name="nopeserta" class="form-control <?php echo($error_nopeserta !=""?"is-invalid":""); ?>" id="nopeserta"
                    placeholder="" value="<?php echo $nopeserta; ?>"><span class="warning"><?php echo $error_nopeserta;?></span>
                </div>
            </div>

            <!--paud-->
            <div class="form-group row">
                <label for="paud" class="col-sm-2 col-form-label">Pernah Paud?</label>
                <div class="col-sm-10">
                    <td class="form-control <?php echo($error_paud !=""?"is-invalid":""); ?>" id="paud"
                    value="<?php echo $paud; ?>">
                    <input type="radio" name="paud" value="Ya">Ya
                    <input type="radio" name="paud" value="Tidak">Tidak
                    </td> 
                    <span class="warning"><?php echo $error_paud;?></span>
                </div>
            </div>

            <!--tk-->
            <div class="form-group row">
                <label for="tk" class="col-sm-2 col-form-label">Pernah TK?</label>
                <div class="col-sm-10">
                    <td class="form-control <?php echo($error_tk !=""?"is-invalid":""); ?>" id="tk"
                    value="<?php echo $tk; ?>">
                    <input type="radio" name="tk" value="Ya">Ya
                    <input type="radio" name="tk" value="Tidak">Tidak
                    </td> 
                    <span class="warning"><?php echo $error_tk;?></span>
                </div>
            </div>

            <!--noskhun-->
            <!--16 digit-->
            <div class="form-group row">
                <label for="noskhun" class="col-sm-2 col-form-label">No. Seri SKHUN</label>
                <div class="col-sm-10">
                    <input type="text" name="noskhun" class="form-control <?php echo($error_noskhun !=""?"is-invalid":""); ?>" id="noskhun"
                    placeholder="" value="<?php echo $noskhun; ?>"><span class="warning"><?php echo $error_noskhun;?></span>
                </div>
            </div>

            <!--noijasah-->
            <!--16 digit-->
            <div class="form-group row">
                <label for="noijasah" class="col-sm-2 col-form-label">No. Seri IJASAH</label>
                <div class="col-sm-10">
                    <input type="text" name="noijasah" class="form-control <?php echo($error_noijasah !=""?"is-invalid":""); ?>" id="noijasah"
                    placeholder="" value="<?php echo $noijasah; ?>"><span class="warning"><?php echo $error_noijasah;?></span>
                </div>
            </div>

            <!--hobi-->
            <div class="form-group row">
                <label for="hobi" class="col-sm-2 col-form-label">Hobi</label>
                <div class="col-sm-10">
                    <select name="hobi" class="form-control <?php echo($error_hobi !=""?"is-invalid":""); ?>" id="hobi"
                    placeholder="hobi" value="<?php echo $hobi; ?>">
                    <option value="">Pilih Kategori</option>
                    <option value="OlahRaga">OlahRaga</option>
                    <option value="Kesenian">Kesenian</option>
                    <option value="Membaca">Membaca</option>
                    <option value="Menulis">Menulis</option>
                    <option value="Traveling">Traveling</option>
                    <option value="Kesenian">Kesenian</option>
                    <option value="Lainnya">Lainnya</option>
                    </select>
                    <span class="warning"><?php echo $error_hobi;?></span>
                </div>
            </div>
            
            <!--citacita-->
            <div class="form-group row">
                <label for="citacita" class="col-sm-2 col-form-label">Cita-Cita</label>
                <div class="col-sm-10">
                    <select name="citacita" class="form-control <?php echo($error_citacita !=""?"is-invalid":""); ?>" id="citacita"
                    placeholder="citacita" value="<?php echo $citacita; ?>">
                    <option value="">Pilih Kategori</option>
                    <option value="PNS">PNS</option>
                    <option value="TNI/POLRI">TNI/POLRI</option>
                    <option value="Guru/Dosen">Guru/Dosen</option>
                    <option value="Politikus">Politikus</option>
                    <option value="Wirausaha">Wirausaha</option>
                    <option value="Seni/artis">Seni/artis</option>
                    <option value="Lainnya">Lainnya</option>
                    </select>
                    <span class="warning"><?php echo $error_citacita;?></span>
                </div>
            </div>

            <!--membuat booton selanjutnya-->
            <div class="form-group row">
                <div class="col-sm-10">
                    <button name= "simpan" type="submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>


</body>
</html>