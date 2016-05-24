<?php 
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']))
{
   if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message']))
   {
      echo "Lütfen formu tam doldurunuz";
   }
   else
   {
      $ad    = strip_tags($_POST['name']);
      $email   = strip_tags($_POST['email']);
      $konu = strip_tags($_POST['subject']);
      $mesaj = strip_tags($_POST['message']);
      $icerik  = 'İsim: ' .$ad. '<br/>E-Mail: ' .$email. '<br/>'. $mesaj;
      $kime='aahmet.272@gmail.com';
      //$mail =mail($kime, $konu, $mesaj, $icerik);// smtp port bulunan bir sunucuda çalıştırılması gerekli
      echo "Mesajınız başarı ile gönderildi.";
   }
}
else
{
   echo 'Lütfen Formu Doldurun';
} ?>