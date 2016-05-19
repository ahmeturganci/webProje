<?php 
if(isset($_POST['name') && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']))
{
   if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message']))
   {
      echo "Lütfen formu tam doldurunuz";
   }
   else
   {
      $name    = strip_tags($_POST['name']);
      $email   = strip_tags($_POST['email']);
      $subject = strip_tags($_POST['subject']);
      $message = strip_tags($_POST['message']);
      $icerik  = 'İsim: ' .$name. '<br/>E-Mail: ' .$email. '<br/>'. $mesaj;
      mail('aahmet.272@gmail.com', $subject, $icerik);
      echo "Mesajınız başarı ile gönderildi.";
   }
}
else
{
   echo 'Lütfen Formu Doldurun';
} ?>