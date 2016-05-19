<!DOCTYPE html>
<html lang="tr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Yazılımdan Bi Haber </title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/plugins/morris.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>



  <div class="container" style="color:white;   max-width: 500px;">

    <form class="form" method="post">
     <center><h2 class="form-signin-heading">Yazılımdan Bi Haber Admin Panel Giriş</h2></center>

     <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Kullanıcı Adı" required autofocus>
     <br>
     <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Parola" required>
     <br>
     <button class="btn btn-lg btn-primary btn-block"  type="submit" name="giris">Giriş Yap</button>
   </form>

 </div>
 <?php
 require_once("baglan.php");
 session_start();
 if(isset($_SESSION['nick'])){
  header("location: admin.php");
}
if($_POST){
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $pass =md5($pass);
    $sql ="SELECT * FROM yazar WHERE Nick='{$email}'AND Parola='{$pass}'";//mail ve şifre kontrolü
    $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
      $_SESSION['nick']=$email;
        header ("Location:admin.php"); // alert
      }
      else
        echo '<script type="text/javascript">alert("Hatalı Giriş Tekrar Deneyimiz");</script>'; // alert
    }
    ?>


    <footer>
      <center>

        <div style="color:white; align:center;  position: relative;margin: auto;">  
          <p >Hazırlayan: megau</p>
          <p style="color:white;">İletişim İçin: <a href="mailto:megau@gmail.com">
            megau@gmail.com</a>.</p>
          </div>
        </center>
      </footer>

    </body>

    </html>
