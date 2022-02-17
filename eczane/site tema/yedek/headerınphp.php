<?php
try {
    $baglanti=new PDO("mysql:host=localhost;dbname=eticaret", 'root','');
    }catch(Exception $e) {
        echo $e->getMessage();
    }

 if(isset($_POST['ayarkaydet']))
 {
 
 $duzenle=$baglanti->prepare("UPDATE ayarlar SET 
 
 baslik=:baslik,
 aciklama=:aciklama,
 anahtarkelime=:anahtarkelime
 
 WHERE id=1
 
 
 ");
 
 $update=$duzenle->execute(array (
 'baslik'=>$_POST['baslik'],
 'aciklama'=>$_POST['aciklama'],
 'anahtarkelime'=>$_POST['anahtarkelime']
 
 ));
 if($update)
 {
     header("Location:../siteayarları.php?yuklenme=basarili");
 }
 else
 {
     header("Location:../siteayarları.php?yuklenme=basarisiz");
 }
 
 
 }
 
 
 if(isset($_POST['iletişimkaydet']))
 {
 
 $duzenle=$baglanti->prepare("UPDATE ayarlar SET 
 
 telefon=:telefon,
 email=:email,
 adres=:adres,
 mesai=:mesai
 
 WHERE id=1
 
 
 ");
 
 $update=$duzenle->execute(array (
 'telefon'=>$_POST['telefon'],
 'email'=>$_POST['email'],
 'adres'=>$_POST['adres'],
 'mesai'=>$_POST['mesai']
 
 ));
 if($update)
 {
     header("Location:../iletisimayarlari.php?yuklenme=basarili");
 }
 else
 {
     header("Location:../iletisimayarlari.php?yuklenme=basarisiz");
 }
 }
 
 if(isset($_POST['sosyalmedyakaydet']))
 {
 
 $duzenle=$baglanti->prepare("UPDATE ayarlar SET 
 
 facebook=:facebook,
 instagram=:instagram,
 youtube=:youtube,
 twitter=:twitter
 
 WHERE id=1
 
 
 ");
 
 $update=$duzenle->execute(array (
 'facebook'=>$_POST['facebook'],
 'instagram'=>$_POST['instagram'],
 'youtube'=>$_POST['youtube'],
 'twitter'=>$_POST['twitter']
 
 ));
 if($update)
 {
     header("Location:../sosyalmedyailetisim.php?yuklenme=basarili");
 }
 else
 {
     header("Location:../sosyalmedyailetisim.php?yuklenme=basarisiz");
 }
 }

$ayar=$baglanti->prepare("SELECT * FROM ayarlar where id=? ");
$ayar->execute(array(1));
$ayarcek=$ayar->fetch(PDO::FETCH_ASSOC);
?>