function sendEmail($to, $user = ""){
// php send email 

$msg = '
<html lang="pl">
<head>
<title>Potwierdzenie rejestracji restauracji</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">  

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="format-detection" content="telephone=no" /> <!-- disable auto telephone linking in iOS -->

<link href="//fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css">
<link href="//fonts.googleapis.com/css?family=Roboto:100&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
<style type="text/css">
body{
   padding: 30px;
   background: url(http://miastonews.pl/img/bg9.jpg) #fff;
       background-size: 20%;
        //background-repeat: no-repeat;
        //background-attachment: fixed;
        //background-position: center;
        //background-size: cover;
}
.p{
   font-family: Abel, Roboto, Arial; font-style: italic; font-size: 10px; color: #666;
}
strong{
   color: #000;
   font-style: italic;
}
p{
   max-width: 99%;

}
.div{
   max-width: 80%;
   text-align: left;
   text-align: justify;
}
a{
   text-decoration: none;  
   color: #000;
}
</style>
</head>
<body yahoo>
<!-- center -->
<center>

<div class="main" style="border: 1px solid #cbc; width: 100%; max-width: 600px; background: #fff; padding: 10px; border-radius: 0px;">
<br>
<img src="https://miastonews.pl/img/logo.jpg" style="max-height: 50px;">
<br><br>
<div class="div">
<p style="font-family: Abel, Roboto, Arial; font-size: 17px;"> <strong>'.$user.' Witaj  na miastonews.pl </strong></p>
<p style="font-family: Abel, Roboto, Arial; font-size: 14px;">Twoja restauracja została dodana. Zaloguj sie do panelu i uzupełnij pozostałe informacje. Dodaj pozycje w menu, zdjęcia restauracji, aktualne promocje.</p>
<p style="font-family: Abel, Roboto, Arial; font-size: 14px;">Dodaj pracowników, wybierz formę płatności za zamówienia. Uruchom zamawianie dań online.</p>
</div>
<br>
<p><a target="_blank" href="https://miastonews.pl/admin/login.php" style="background: #569e3d; color: #fff; border-radius: 5px; padding: 5px; font-family: Abel, Roboto, Arial; text-decoration: none; font-size: 14px; min-width: 300px; width: 300px;">Panel adminstracyjny restauracji (Właściciel)</a></p>
<p><a target="_blank" href="https://miastonews.pl/zamowienia/login.php" style="background: #009933; color: #fff; border-radius: 5px; padding: 5px; font-family: Abel, Roboto, Arial; text-decoration: none; font-size: 14px; min-width: 300px; width: 300px;">Panel zamówień restauracji (dla pracowników)</a></p>
<br>
<!-- tables part -->
<table>
<tr>
<hr style="color: #eee; max-width: 70%;">
<th><p class="p" style="font-family: Abel, Roboto, Arial; font-style: italic; font-size: 10px; color: #666;"><a href="https://miastonews.pl/unsubscribe.php?email='.$to.'"> Jeżeli to nie Ty, zignoruj tego emaila. Wypisz się z newslettera</a></p></th>
</tr>
</table>
<br>
<br>
</div>
</center>
</body>
</html>
';
   $subject = "Witaj na miastonews.pl Twój profil jest już aktywny.";
   // Polskie znaki
   $subject= "=?UTF-8?B?".base64_encode($subject)."?=";
      
   $header = "From:pomoc@miastonews.pl \r\n";
   $header .= "Cc:nanomoow@gmail.com \r\n";
   $header .= "X-Sender: Miastonews.pl <pomoc@miastonews.pl>\r\n";
   $header .= "X-Priority: 1\r\n"; // Urgent message!
   $header .= "Return-Path: pomoc@miastonews.pl\r\n"; // Return path for errors
   $header .= "MIME-Version: 1.0\r\n";
   $header .= "Content-type: text/html; charset=UTF-8\r\n";
   
   ini_set("sendmail_from", "pomoc@miastonews.pl");   
   $retval = mail ($to,$subject,$msg,$header);
   
   if( $retval == true ) {
      return true;
   }else {
      return false;
   }
}

?>
