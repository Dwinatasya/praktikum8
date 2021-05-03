<?php
error_reporting(0); //abaikan error pada browser
//panggil file koneksi.php yang sudah anda buat
include "koneksi.php";
?>
<html>
<head>
<link 
rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
crossorigin="anonymous">
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

 $nama= mysqli_real_escape_string($con, $_POST['nama']); //varibel field nama
 $jeniskelamin= mysqli_real_escape_string($con, $_POST['jeniskelamin']);//varibel field jeniskelamin
 $nisn= mysqli_real_escape_string($con, $_POST['nisn']);  //varibel field nisn
 $nik= mysqli_real_escape_string($con, $_POST['nik']);  //varibel field nik
 $tempallahir= mysqli_real_escape_string($con, $_POST['tempallahir']); //varibel field tempallahir
 $tgllahir= mysqli_real_escape_string($con, $_POST['tgllahir']);//varibel field tgllahir
 $agama= mysqli_real_escape_string($con, $_POST['agama']);//varibel field agama
 $kelainan= mysqli_real_escape_string($con, $_POST['kelainan']); //varibel field kelainan

 $jalan= mysqli_real_escape_string($con, $_POST['jalan']);//varibel field jalan
 $rt= mysqli_real_escape_string($con, $_POST['rt']);//varibel field rt
 $rw= mysqli_real_escape_string($con, $_POST['rw']);//varibel field rw
 $dusun= mysqli_real_escape_string($con, $_POST['dusun']);//varibel field dusun
 $desa= mysqli_real_escape_string($con, $_POST['desa']);//varibel field desa
 $kecamatan= mysqli_real_escape_string($con, $_POST['kecamatan']);//varibel field kecamatan
 $kodpos= mysqli_real_escape_string($con, $_POST['kodpos']);//varibel field kodpos
 $tempattinggal= mysqli_real_escape_string($con, $_POST['tempattinggal']);//varibel field tempattinggal
 $transportasi= mysqli_real_escape_string($con, $_POST['transportasi']);//varibel field transportasi
 
 $hp= mysqli_real_escape_string($con, $_POST['hp']);//varibel field hp
 $telp= mysqli_real_escape_string($con, $_POST['telp']);//varibel field telp
 $email= mysqli_real_escape_string($con, $_POST['email']);//varibel field email
 $kps_pkh_kip= mysqli_real_escape_string($con, $_POST['kps_pkh_kip']);//varibel field kps_pkh_kip
 $no_kps_kks_kip= mysqli_real_escape_string($con, $_POST['no_kps_kks_kip']);//varibel field no_kps_kks_kip
 $warga_negara= mysqli_real_escape_string($con, $_POST['warga_negara']);//varibel field warga_negara


 if($_SERVER["REQUEST_METHOD"] == "POST"){ //membuat validasi
    if(empty($nama))//validasi nama
    {
        $error_nama = "Nama tidak boleh kosong";
    }
    elseif(!preg_match("/^[a-zA-Z ]*$/", $nama)) //validasi nama
    {
        $nameErr = "Inputan hanya boleh huruf dan spasi";
    }  
    elseif(empty($jeniskelamin))//validasi jenis kelamin
    {
        $error_jeniskelamin = "Pilih salah satu";
    }
    elseif(empty($nisn)) //validasi nisn
    {
        $error_nisn = "NISN tidak boleh kosong";
    }
    elseif(!is_numeric($nisn)) //validasi nisn
    {
        $error_nisn = "NISN hanya boleh angka";
    }
    elseif(empty($nik))//validasi nik
    {
        $error_nik = "NIK tidak boleh kosong";
    }
    elseif(!is_numeric($nik))//validasi nik
    {
        $error_nik = "NIK hanya boleh angka";
    }
    elseif(empty($tempallahir))//validasi tempat lahir
    {
        $error_tempallahir = "Tempal lahir tidak boleh kosong";
    }
    elseif(empty($tgllahir))//validasi tgllahir
    {
        $error_tgllahir = "Tgl lahir tidak boleh kosong";
    }
    elseif(empty($agama))//validasi agama
    {
        $error_agama = "Pilih salah satu";
    }
    elseif(empty($kelainan))//validasi kelainan
    {
        $error_kelainan = "Pilih salah satu";
    }
    elseif(empty($jalan)) //validasi jalan
    {
        $error_jalan = "Alamat jalan tidak boleh kosong";
    }
    elseif(empty($desa)) //validasi desa
    {
        $error_desa = "Desa tidak boleh kosong";
    }
    elseif(empty($kecamatan)) //validasi Kecamatan
    {
        $error_kecamatan = "Kecamatan tidak boleh kosong";
    }
    elseif(empty($kodpos)) //validasi kode pos
    {
        $error_kodpos = "Kode pos tidak boleh kosong";
    }
    elseif(!is_numeric($kodpos))//validasi kode pos
    {
        $error_kodpos = "Kode pos hanya boleh angka";
    }
    elseif(empty($tempattinggal)) //validasi tempat tinggal
    {
        $error_tempattinggal = "Pilih salah satu";
    }
    elseif(empty($transportasi))//validasi transportasi
    {
        $error_transportasi = "Pilih salah satu";
    }
    elseif(empty($hp)) //validasi no hp
    {
        $error_hp = "Nomor hp tidak boleh kosong";
    }
    elseif(!is_numeric($hp))//validasi no hp
    {
        $error_hp = "Nomor HP hanya boleh angka";
    }
    elseif(empty($email))//validasi email
    {
        $error_email = "Email tidak boleh kosong";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))//validasi email
    {
        $error_email = "Format email invalid";
    }
    elseif(empty($kps_pkh_kip))//validasi kps_pkh_kip
    {
        $error_kps_pkh_kip = "Pilih salah satu";
    }
    elseif(empty($warga_negara))//validasi warga_negara
    {
        $error_warga_negara = "Pilih salah satu";
    }
    else{
        $save1=mysqli_query($con, "INSERT INTO data_pribadi (id, nama, jeniskelamin, nisn, nik, tempallahir, tgllahir, agama, kelainan)
        values ('', '$nama','$jeniskelamin','$nisn','$nik','$tempallahir', '$tgllahir', '$agama', '$kelainan')");
        $save2=mysqli_query($con, "INSERT INTO data_tempattinggal (id, jalan, rt, rw, dusun, desa, kecamatan, kodpos, tempattinggal, transportasi)
        values ('', '$jalan','$rt','$rw','$dusun','$desa', '$kecamatan', '$kodpos', '$tempattinggal', '$transportasi')");
        $save3=mysqli_query($con, "INSERT INTO data_lainnya (id, hp, telp, email, kps_pkh_kip, no_kps_kks_kip, warga_negara)
        values ('', '$hp','$telp','$email','$kps_pkh_kip','$no_kps_kks_kip', '$warga_negara')");
        if($save1 && $save2 && $save3){ //jika simpan berhasil maka muncul pesan dan menuju ke halaman akhir
            echo "<script>alert('Data Berhasil disimpan ke database');document.location='awal.php'</script>";
        }else{  //jika simpan gagal maka muncul pesan
            echo "<script>alert('Proses simpan gagal, coba kembali');document.location='validasi_data_pribadi.php'</script>";
        }
    }
}
function cek_input ($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return($data);
}
?>

<div class="container">
<div class="card">
    <div class="card-header alert-dark">
    <b>FORMULIR PERSERTA DIDIK</b> 
    </div>
    <div class="card-body">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class= "alert alert-info alert-link" align="center">
            <b><h10>Data Pribadi</h10></b>
            </div>
            <!--data_pribadi-->
                <!--nama-->
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" class="form-control <?php echo($error_nama !=""?"is-invalid":""); ?>" id="nama"
                        placeholder="nama" value="<?php echo $nama; ?>"><span class="warning"><?php echo $error_nama;?></span>
                    </div>
                </div>

                <!--jeniskelamin-->
                <div class="form-group row">
                    <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <td class="form-control <?php echo($error_jeniskelamin !=""?"is-invalid":""); ?>" id="jeniskelamin"
                        value="<?php echo $jeniskelamin; ?>">
                        <input type="radio" name="jeniskelamin" value="L">Laki Laki
                        <br>
                        <input type="radio" name="jeniskelamin" value="P">Perempuan
                        </td> 
                        <span class="warning"><?php echo $error_jeniskelamin;?></span>
                    </div>
                </div>

                <!--nisn-->
                <!--10 digit-->
                <div class="form-group row">
                    <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-10">
                        <input type="text" name="nisn" class="form-control <?php echo($error_nisn !=""?"is-invalid":""); ?>" id="nisn"
                        placeholder="" value="<?php echo $nisn; ?>"><span class="warning"><?php echo $error_nisn;?></span>
                    </div>
                </div>

                <!--nik-->
                <!--16 digit-->
                <div class="form-group row">
                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" name="nik" class="form-control <?php echo($error_nik !=""?"is-invalid":""); ?>" id="nik"
                        placeholder="" value="<?php echo $nik; ?>"><span class="warning"><?php echo $error_nik;?></span>
                    </div>
                </div>

                <!--tempallahir-->
                <div class="form-group row">
                    <label for="tempallahir" class="col-sm-2 col-form-label">Tempal Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" name="tempallahir" class="form-control <?php echo($error_tempallahir !=""?"is-invalid":""); ?>" id="tempallahir"
                        placeholder="tempal lahir" value="<?php echo $tempallahir; ?>"><span class="warning"><?php echo $error_tempallahir;?></span>
                    </div>
                </div>

                <!--tgllahir-->
                <div class="form-group row">
                    <label for="tgllahir" class="col-sm-2 col-form-label">Tgl Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" name="tgllahir" class="form-control <?php echo($error_tgllahir !=""?"is-invalid":""); ?>" id="tgllahir"
                        placeholder="" value="<?php echo $tgllahir; ?>"><span class="warning"><?php echo $error_tgllahir;?></span>
                    </div>
                </div>

                <!--agama-->
                <div class="form-group row">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <select name="agama" class="form-control <?php echo($error_agama !=""?"is-invalid":""); ?>" id="agama"
                        placeholder="agama" value="<?php echo $agama; ?>">
                        <option value="">Pilih Kategori</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Kristen/Protestan">Kristen/Protestan</option>
                        <option value="Khong Hu Chu">Khong Hu Chu</option>
                        <option value="Lainnya">Lainnya</option>
                        </select>
                        <span class="warning"><?php echo $error_agama;?></span>
                    </div>
                </div>

                <!--kelainan-->
                <div class="form-group row">
                    <label for="kelainan" class="col-sm-2 col-form-label">Kebutuhan Khusus</label>
                    <div class="col-sm-10">
                        <select name="kelainan" class="form-control <?php echo($error_kelainan !=""?"is-invalid":""); ?>" id="kelainan"
                        placeholder="kelainan" value="<?php echo $kelainan; ?>">
                        <option value="">Pilih Kategori</option>
                        <option value="Tidak">Tidak</option>
                        <option value="Netra">Netra</option>
                        <option value="Rungu">Rungu</option>
                        <option value="Grahita ">Grahita</option>
                        <option value="Daksa">Daksa</option>
                        <option value="Laras">Laras</option>
                        <option value="Wicara">Wicara</option>
                        <option value="Lainnya">Lainnya</option>
                        </select>
                        <span class="warning"><?php echo $error_kelainan;?></span>
                    </div>
                </div>

            <!--data_tempattinggal-->
                <!--jalan-->
                <div class="form-group row">
                    <label for="jalan" class="col-sm-2 col-form-label">Alamat Jalan</label>
                    <div class="col-sm-10">
                        <input type="text" name="jalan" class="form-control <?php echo($error_jalan !=""?"is-invalid":""); ?>" id="jalan"
                        placeholder="alamat jalan" value="<?php echo $jalan; ?>"><span class="warning"><?php echo $error_jalan;?></span>
                    </div>
                </div>

                <!--rt-->
                <div class="form-group row">
                    <label for="rt" class="col-sm-2 col-form-label">RT    *</label>
                    <div class="col-sm-10">
                        <input type="text" name="rt" class="form-control <?php echo($error_rt !=""?"is-invalid":""); ?>" id="rt"
                        placeholder="rt" value="<?php echo $rt; ?>"><span class="warning"><?php echo $error_rt;?></span>
                    </div>
                </div>

                <!--rw-->
                <div class="form-group row">
                    <label for="rw" class="col-sm-2 col-form-label">RW    *</label>
                    <div class="col-sm-10">
                        <input type="text" name="rw" class="form-control <?php echo($error_rw !=""?"is-invalid":""); ?>" id="rw"
                        placeholder="rw" value="<?php echo $rw; ?>"><span class="warning"><?php echo $error_rw;?></span>
                    </div>
                </div>

                <!--dusun-->
                <div class="form-group row">
                    <label for="dusun" class="col-sm-2 col-form-label">Dusun    *</label>
                    <div class="col-sm-10">
                        <input type="text" name="dusun" class="form-control <?php echo($error_dusun !=""?"is-invalid":""); ?>" id="dusun"
                        placeholder="dusun" value="<?php echo $dusun; ?>"><span class="warning"><?php echo $error_dusun;?></span>
                    </div>
                </div>

                <!--desa-->
                <div class="form-group row">
                    <label for="desa" class="col-sm-2 col-form-label">Desa</label>
                    <div class="col-sm-10">
                        <input type="text" name="desa" class="form-control <?php echo($error_desa !=""?"is-invalid":""); ?>" id="desa"
                        placeholder="desa" value="<?php echo $desa; ?>"><span class="warning"><?php echo $error_desa;?></span>
                    </div>
                </div>

                <!--kecamatan-->
                <div class="form-group row">
                    <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" name="kecamatan" class="form-control <?php echo($error_kecamatan !=""?"is-invalid":""); ?>" id="kecamatan"
                        placeholder="kecamatan" value="<?php echo $kecamatan; ?>"><span class="warning"><?php echo $error_kecamatan;?></span>
                    </div>
                </div>

                <!--kodpos-->
                <div class="form-group row">
                    <label for="kodpos" class="col-sm-2 col-form-label">Kode Pos</label>
                    <div class="col-sm-10">
                        <input type="text" name="kodpos" class="form-control <?php echo($error_kodpos !=""?"is-invalid":""); ?>" id="kodpos"
                        placeholder="kodpos" value="<?php echo $kodpos; ?>"><span class="warning"><?php echo $error_kodpos;?></span>
                    </div>
                </div>
                <!--tempattinggal-->
                <div class="form-group row">
                    <label for="tempattinggal" class="col-sm-2 col-form-label">Tempat Tinggal</label>
                    <div class="col-sm-10">
                        <select name="tempattinggal" class="form-control <?php echo($error_tempattinggal !=""?"is-invalid":""); ?>" id="tempattinggal"
                        placeholder="tempattinggal" value="<?php echo $tempattinggal; ?>">
                        <option value="">Pilih Kategori</option>
                        <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                        <option value="Wali">Wali</option>
                        <option value="Kos">Kos</option>
                        <option value="Asrama">Asrama</option>
                        <option value="Panti Asuhan">Panti Asuhan</option>
                        <option value="Lainnya">Lainnya</option>
                        </select>
                        <span class="warning"><?php echo $error_tempattinggal;?></span>
                    </div>
                </div>
                <!--transportasi-->
                <div class="form-group row">
                    <label for="transportasi" class="col-sm-2 col-form-label">Transportasi</label>
                    <div class="col-sm-10">
                        <select name="transportasi" class="form-control <?php echo($error_transportasi !=""?"is-invalid":""); ?>" id="transportasi"
                        placeholder="transportasi" value="<?php echo $transportasi; ?>">
                        <option value="">Pilih Kategori</option>
                        <option value="Jalan kaki">Jalan kaki</option>
                        <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
                        <option value="Kendaraan Umum">Kendaraan Umum</option>
                        <option value="Jemputan Sekolah">Jemputan Sekolah</option>
                        <option value="Lainnya">Lainnya</option>
                        </select>
                        <span class="warning"><?php echo $error_transportasi;?></span>
                    </div>
                </div>

            <!--data_lainnya-->
                <!--hp-->
                <div class="form-group row">
                    <label for="hp" class="col-sm-2 col-form-label">No. HP</label>
                    <div class="col-sm-10">
                        <input type="text" name="hp" class="form-control <?php echo($error_hp !=""?"is-invalid":""); ?>" id="hp"
                        placeholder="handphone" value="<?php echo $hp; ?>"><span class="warning"><?php echo $error_hp;?></span>
                    </div>
                </div>

                <!--telp-->
                <div class="form-group row">
                    <label for="telp" class="col-sm-2 col-form-label">No. Telp *</label>
                    <div class="col-sm-10">
                        <input type="text" name="telp" class="form-control <?php echo($error_telp !=""?"is-invalid":""); ?>" id="telp"
                        placeholder="telepon" value="<?php echo $telp; ?>"><span class="warning"><?php echo $error_telp;?></span>
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

                <!--kps_pkh_kip-->
                <div class="form-group row">
                    <label for="kps_pkh_kip" class="col-sm-2 col-form-label"> Penerima KPS/PKH/KIP</label>
                    <div class="col-sm-10">
                        <td class="form-control <?php echo($error_kps_pkh_kip !=""?"is-invalid":""); ?>" id="kps_pkh_kip"
                        value="<?php echo $kps_pkh_kip; ?>">
                        <input type="radio" name="kps_pkh_kip" value="Ya">Ya
                        <br>
                        <input type="radio" name="kps_pkh_kip" value="Tidak">Tidak
                        </td> 
                        <span class="warning"><?php echo $error_kps_pkh_kip;?></span>
                    </div>
                </div>

                <!--no_kps_kks_kip-->
                <div class="form-group row">
                    <label for="no_kps_kks_kip" class="col-sm-2 col-form-label">No. KPS/KKS/KIP    *</label>
                    <div class="col-sm-10">
                        <input type="text" name="no_kps_kks_kip" class="form-control <?php echo($error_no_kps_kks_kip !=""?"is-invalid":""); ?>" id="no_kps_kks_kip"
                        placeholder="" value="<?php echo $no_kps_kks_kip; ?>"><span class="warning"><?php echo $error_no_kps_kks_kip;?></span>
                    </div>
                </div>
                <!--warga_negara-->
                <div class="form-group row">
                    <label for="warga_negara" class="col-sm-2 col-form-label">Warganegaraan</label>
                    <div class="col-sm-10">
                        <td class="form-control <?php echo($error_warga_negara !=""?"is-invalid":""); ?>" id="warga_negara"
                        value="<?php echo $warga_negara; ?>">
                        <input type="radio" name="warga_negara" value="WNI">WNI
                        <br>
                        <input type="radio" name="warga_negara" value="WNA">WNA
                        </td> 
                        <span class="warning"><?php echo $error_warga_negara;?></span>
                    </div>
                </div>

            <!--membuat booton simpan-->
            <div class="form-group row">
                <div class="col-sm-10">
                    <button name= "simpan" type="submit" class="btn btn-primary">KIRIM</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>


</body>
</html>