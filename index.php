<?php
require_once('src/NetGSM.php');

use ZquaRe\NetGSM\SMS;
//Kullanıcı Adı, şifre, Başlık Alanlarını Doldurun.
$Net = new NetGSM('Username', 'Password', 'Header');
//Mesajınız, İletilecek Numara.
echo $Net->sendSMS('Message', 'PhoneNumber');
?>