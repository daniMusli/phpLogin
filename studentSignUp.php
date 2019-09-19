<?php
   /*connect to data base*/
   $connect = mysqli_connect("127.0.0.1","root","","staj");
   if(mysqli_connect_errno()){/*eger hata varsa*/
      die("veri tabanina baglanamadi ".mysqli_connect_error());
   }
   /*kayit ol tusuna basinca*/
   if (isset($_POST['KayitOl'])){

       $adi = $_POST['Ad'];
       $soyadi = $_POST['Soyad'];
       $babaAdi = $_POST['BabaAd'];
       $anneAdi = $_POST['AnneAd'];
       $cinsiyet=$_POST['Cinsiyet'];
       $dogumTarih = $_POST['date'];
       $DogumYeri = $_POST['DogumYer'];
       $tc = $_POST['Tc'];
       $Parola = $_POST['Parola'];

        /*tc mevcut ya da mevcut degil arama*/
        $query1 = "select OgrenciNo from okayit where  TcKimlik ='".$tc."'";
        $result1 = mysqli_query($connect,$query1);
        if($result1->num_rows != 0){
          echo '<div class="alert alert-danger text-center" role="alert">
                   <a href="#" class="alert-link">Tc kimlk mevcuttur</a>
                </div>';
        }
        else{
       /*ogrenci kaydi insert to data base*/
       $query = "insert into okayit(Ad,Soyad,BabaAdi,AnneAdi,Cinsiyet,DogumTarihi,DogumYeri,TcKimlik,Parola)values('".$adi."','".$soyadi."','".$babaAdi."','".$anneAdi."','".$cinsiyet."','".$dogumTarih."','".$DogumYeri."','".$tc."','".$Parola."')";
       $result = mysqli_query($connect,$query);
       if($result){
         echo '<div class="alert alert-danger" role="alert">
                  <a href="#" class="alert-link">Kayit Basariyla Yapildi</a>
               </div>';
       }else{
         echo "bir hata olustu";
       }
   }
 }
?>



<html>
    <head>
	      <title>Ogrenci Kayidi</title>
        <link rel='stylesheet' href='css/bootstrap.css'/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel='stylesheet' href='css/style.css'/>

	</head>
	<body>
      <section class="ogrencikaydi text-center">
       		<div class="container">
       				<i class="fas fa-user-alt fa-5x icon"></i>
       				<h1 class="baslik">Oğrenci Kayıdı</h1>
       				<div class="row">
       					  <form role="form" method="POST">
       						    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
       							      <div class="form-group">
       								       <input type="text" class="form-control input-lg" required="true" placeholder="Adi" name="Ad">
       							      </div>

       								    <div class="form-group">
       								       <input type="text" class="form-control input-lg" required="true" placeholder="Anne Adi" name="AnneAd"/>
       							     	</div>

       							    	<div class="form-group">
       								       <input type="text" class="form-control input-lg" required="true" placeholder="Dogum Yeri" name="DogumYer"/>
       								    </div>
       						    </div>

       							  <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                         <div class="form-group">
                            <input type="text" class="form-control input-lg" required="true" placeholder="Soyadi" name="Soyad"/>
                         </div>

                         <div class="form-group">
                           <select required="true" name="Cinsiyet" class="input-lg " style="width:100%!important">
                               <option  selected disabled value="">Cinsiyet</option>
                               <option value="Erkek">Erkek</option>
                               <option value="Kadin">Kadin</option>
                            </select>

                          </div>

                         <div class="form-group">
                            <input type="text" class="form-control input-lg" required="true" placeholder="TC Kimlik Or Passport No" name="Tc" maxlength="11"/>
                         </div>
                      </div>

                      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                         <div class="form-group">
                            <input type="text" class="form-control input-lg" required="true" placeholder="Baba Adi" name="BabaAd"/>
                         </div>

                         <div class="form-group">
                           <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
                           <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

                           <!--Font Awesome (added because you use icons in your prepend/append)-->
                           <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

                           <!-- Inline CSS based on choices in "Settings" tab -->
                           <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

                           <!-- HTML Form (wrapped in a .bootstrap-iso div) -->


                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                 <div class="input-group">
                                  <div class="input-group-addon input-lg">
                                   <i class="fa fa-calendar">
                                   </i>
                                  </div>
                                  <input class="form-control input-lg" id="date" required="true" placeholder="YYYY/MM/DD" type="text" name="date"/>
                                 </div>
                                </div>
                                <div class="form-group">
                                 <div>
                                 </div>
                              </div>
                           <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
                           <!-- Include jQuery -->
                           <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

                           <!-- Include Date Range Picker -->
                           <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
                           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

                           <script>
                               $(document).ready(function(){
                                   var date_input=$('input[name="date"]'); //our date input has the name "date"
                                   var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                   date_input.datepicker({
                                       format: 'yyyy/mm/dd',
                                       container: container,
                                       todayHighlight: true,
                                       autoclose: true,
                                   })
                               })
                           </script>
                         </div>

                         <div class="form-group">
                            <input type="text" class="form-control input-lg" required="true" placeholder="Parola" name="Parola" maxlength="8"/>
                         </div>
                      </div>
                    </div>
                    <input type="submit" value="Kayit OL" class="btn btn-success  btn-lg kayit" name="KayitOl">
       						</form>
       			</div>
       		</section>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	</body>
</html>

<?php
/*close the data base*/
    mysqli_close($connect);
?>
