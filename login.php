<?php
/*connect to data base*/
$connect = mysqli_connect("127.0.0.1","root","","staj");
if(mysqli_connect_errno()){/*eger hata varsa*/
   die("veri tabanina baglanamadi ".mysqli_connect_error());
}

if (isset($_POST['Giris'])){
    $TcKimlik = $_POST['TC'];
    $PassWord = $_POST['Parola'];
    /*burda bir oturum basladik baska sayfada bu oturumun kullanabiliriz yada devami edebiliriz*/
      session_start();
      $_SESSION['TcKimlik'] = $TcKimlik;
      $_SESSION['PassWord'] = $PassWord;

    /*tc ve parola dogru mu degil mi sorgulama*/
    $query = "select OgrenciNo from okayit where  TcKimlik ='".$TcKimlik."' and Parola='".$PassWord."'";
    $result = mysqli_query($connect,$query);

    if($result->num_rows == 0){
      echo '<div class="alert alert-danger text-center" role="alert">
               <a href="#" class="alert-link">Kayit Bulunmadi</a>
            </div>';
    }else{
      header('Location: ogrenciSayfasi.php');
      exit();
    }
}

?>

<html>
    <head>
	      <title>Login</title>
        <link rel='stylesheet' href='css/bootstrap.css'/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel='stylesheet' href='css/style.css'/>

	</head>
	<body>
      <section class="login text-center">
       		<div class="container">
       				<i class="fas fa-university fa-5x ogrenciSayfaIcon"></i>
       				<h1 class="baslik">Login Sayfasi</h1>
       				<div class="row">
       					  <form role="form text-center"  method="POST">
       						    <div class="col-lg-4  col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-3 col-xs-8x  ">

                        <div class="input-group">
                          <span class="input-group-addon input-lg" ><i class="fas fa-user"></i></span>
                          <input required="true" type="text" class="form-control input-lg" placeholder="TC Kimlik Or Passaport" maxlength="11" name="TC">
                        </div>

                        <div class="input-group ">
                          <span class="input-group-addon input-lg" ><i class="fas fa-unlock"></i></span>
                          <input required="true" type="text" class="form-control input-lg" placeholder="Parola" maxlength="8" name="Parola">
                        </div>

       						    </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-4  col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-3 col-xs-8x  ">
                          <button><a href="ogrenciKaydi.php" class="btn btn-success  btn-lg kayitButton" role="button">Kayit OL</a></button>
                          <button type="submit" class="btn btn-primary  btn-lg" name="Giris" ><i class="fas fa-sign-in-alt"></i> GİRİŞ</button>
                      </div>
                   </div>
          			</div>
       						</form>


       		</section>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <script src="js/jquery-3.2.1.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>

<?php
    mysqli_close($connect);
?>
