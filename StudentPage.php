<?php
    /*connect to data base*/
    $connect = mysqli_connect("127.0.0.1","root","","staj");
    if(mysqli_connect_errno()){/*eger hata varsa*/
       die("veri tabanina baglanamadi ".mysqli_connect_error());
    }

    session_start(); /*basladigimiz oturumun burda kullanacaz*/
    $TcKimlik = $_SESSION['TcKimlik'];
    $PassWord = $_SESSION['PassWord'];

    /*veri tabanindan okumak*/
    $query = "select * from okayit where TcKimlik ='".$TcKimlik."' and Parola='".$PassWord."'";
    $result = mysqli_query($connect,$query);
    if(!$result){
      die("hata olustu");
    }
    /*veri tabanindan deger okumak*/
    while($row=mysqli_fetch_assoc($result)){
        $adi=$row['Ad'];
        $soyadi=$row['Soyad'];
        $babaAdi=$row['BabaAdi'];
        $anneAdi=$row['AnneAdi'];
        $cinsiyet=$row['Cinsiyet'];
        $dogumTarihi=$row['DogumTarihi'];
        $dogumYeri=$row['DogumYeri'];
        $tcKimlik=$row['TcKimlik'];
        $parola=$row['Parola'];
        $ogrenciNo =$row['OgrenciNo'];
    }
    /*cikis button*/
    if (isset($_POST['cikisTus'])){
      header("Location: login.php");
      exit();
    }
    /*guncell button*/
    if (isset($_POST['guncell'])){

       $adi = $_POST['Ad'];
       $soyadi = $_POST['Soyad'];
       $babaAdi = $_POST['BabaAd'];
       $anneAdi = $_POST['AnneAd'];
       $cinsiyet=$_POST['Cinsiyet'];
       $dogumTarihi = $_POST['date'];
       $dogumYeri = $_POST['DogumYer'];
       $tcKimlik = $_POST['Tc'];
       $parola = $_POST['Parola'];

       $query = "update okayit SET Ad='$adi',Soyad='$soyadi',BabaAdi='$babaAdi',AnneAdi='$anneAdi',Cinsiyet='$cinsiyet',DogumTarihi='$dogumTarihi',DogumYeri='$dogumYeri',TcKimlik='$tcKimlik',Parola='$parola' WHERE OgrenciNo='$ogrenciNo'";
       $result = mysqli_query($connect,$query);

       echo '<div class="alert alert-danger text-center" role="alert">
                <a href="#" class="alert-link">Kayit Basariyla Guncellemis</a>
             </div>';

    }
?>

<html>
    <head>
	      <title>Ogrenci Sayfasi</title>
        <link rel='stylesheet' href='css/bootstrap.css'/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel='stylesheet' href='css/style.css'/>

	</head>
	<body>

      <section class="ogrencikaydi ">
       		<div class="container">
              <div class="text-center">
           				<i class="fas fa-user-graduate fa-5x"></i>
           				<h2 class="baslik ">Ogrenci Sayfasi</h2>
            </div>
       				<div class="row">
                  <form role="form" method= "POST">
                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-4">
                           <button type="submit" name="guncell" class="btn btn-success  btn-lg guncell"><i class="fas fa-sync-alt fa-spin"></i></i> Guncell</button>
                        </div>
                    </div>
       						    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
       							      <div class="form-group">
                             <label class="input-lg">Adı:</label>
       								       <input required="true" type="text" class="oinput form-control input-lg" value="<?php echo $adi; ?>" placeholder="Adi" name="Ad">
       							      </div>

       								    <div class="form-group">
                             <label class="input-lg">Anne Adı:</label>
       								       <input required="true" type="text" class="oinput form-control input-lg" value="<?php echo $anneAdi; ?>" placeholder="Anne Adi"  name="AnneAd"/>
       							     	</div>

       							    	<div class="form-group">
                             <label class="input-lg">Doğum Yeri:</label>
       								       <input required="true" type="text" class="oinput form-control input-lg" value="<?php echo $dogumYeri; ?>" placeholder="Dogum Yeri"  name="DogumYer"/>
       								    </div>
       						    </div>

       							  <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                         <div class="form-group">
                            <label class="input-lg">Soyadı:</label>
                            <input required="true" type="text" class="oinput form-control input-lg" value="<?php echo $soyadi; ?>" placeholder="Soyadi" name="Soyad"/>
                         </div>

                         <div class="form-group">
                            <label class="input-lg">Cinsiyet:</label>
                            <input required="true" type="text" class="oinput form-control input-lg" value="<?php echo $cinsiyet; ?>" placeholder="Cinsiyet" name="Cinsiyet">
                         </div>

                         <div class="form-group">
                            <label class="input-lg">TC NO:</label>
                            <input required="true" type="text" class="oinput form-control input-lg" value="<?php echo $tcKimlik; ?>" placeholder="TC kimlik" maxlength="11" name="Tc">
                         </div>
                      </div>

                      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                         <div class="form-group">
                            <label class="input-lg">Baba Adı:</label>
                            <input required="true" type="text" class="oinput form-control input-lg" value="<?php echo $babaAdi; ?>" placeholder="Baba Adi"  name="BabaAd">
                         </div>

                         <div class="form-group">
                            <label class="input-lg">Doğum Tarihi:</label>
                            <input required="true" type="text" class="oinput form-control input-lg" value="<?php echo $dogumTarihi; ?>" placeholder="Dogum Tarihi" name="date">
                         </div>

                         <div class="form-group">
                            <label class="input-lg">Parola:</label>
                            <input required="true" type="text" class="oinput form-control input-lg" value="<?php echo $parola; ?>" placeholder="Password" maxlength="8"  name="Parola">
                         </div>
                      </div>

                     <button type="submit" class="btn btn-danger  btn-lg" name="cikisTus"><i class="fas fa-sign-out-alt"></i> Cikis</button>

                    </div>
       						</form>
       			</div>
       		</section>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <script src="js/jquery-3.2.1.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>

<?php
   mysqli_close($connect);
?>
