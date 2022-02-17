<?php
session_start();
require_once 'baglanti.php';

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

if(isset($_POST['logokaydet']))
{
    $uploads_dir='../resimler/logo';
    @$tmp_name=$_FILES['logo'] ["tmp_name"];
    @$name=$_FILES['logo'] ["name"];

    $sayi=rand(1,1000000);
    $sayi2=rand(1,1000000);
    $sayi3=rand(10000,200000);

    $sayilar=$sayi.$sayi2.$sayi3;
    $resimyolu=$sayilar.$name;

    @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");

$duzenle=$baglanti->prepare("UPDATE ayarlar SET 

logo=:logo

WHERE id=1


");

$update=$duzenle->execute(array (
'logo'=>$resimyolu


));
if($update)
{
    $resimsil=$_POST['eskilogo'];
    unlink("../resimler/logo/$resimsil");
    header("Location:../siteayarları.php?yuklenme=basarili");
}
else
{
    header("Location:../siteayarları.php?yuklenme=basarisiz");
}
}






if(isset($_POST['hakkimizdakaydet']))
{
        $duzenle=$baglanti->prepare("UPDATE hakkimizda SET 

        hakkimizda_baslik=:hakkimizda_baslik,
        hakkimizda_detay=:hakkimizda_detay,
        hakkimizda_misyon=:hakkimizda_misyon,
        hakkimizda_vizyon=:hakkimizda_vizyon

        WHERE hakkimizda_id=1
        
        
        ");
        
        $update=$duzenle->execute(array (
        'hakkimizda_baslik'=>$_POST['hbaslik'],
        'hakkimizda_detay'=>$_POST['detay'],
        'hakkimizda_misyon'=>$_POST['misyon'],
        'hakkimizda_vizyon'=>$_POST['vizyon']

        
        ));
        if($update)
        {
            header("Location:../hakkimizda.php?yuklenme=basarili");
        }
        else
        {
            header("Location:../hakkimizda.php?yuklenme=basarisiz");
        }
}



if(isset($_POST['girisyap']))
{
    $kadi=htmlspecialchars($_POST['kadi']);
    $sifre=htmlspecialchars($_POST['sifre']);
    $sifreguclu=md5($sifre);

    $kullanicisor=$baglanti->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kullanici_ad and
     kullanici_sifre=:kullanici_sifre and kullanici_yetki=:kullanici_yetki");
     $kullanicisor->execute(array(

        'kullanici_ad'=>$kadi,
        'kullanici_sifre'=>$sifreguclu,
        'kullanici_yetki'=>2
     ));

     $var=$kullanicisor->rowCount();
     if($var>0)
     {
        $_SESSION['girisbelgesi']=$kadi;    
        header("Location:../index.php");
    }
     else
     {
        header("Location:../login.php?durum=hata");
     }

}




if(isset($_POST['uyelerkaydet']))
{
    $kullanicisor=$baglanti->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kullanici_ad and kullanici_yetki=:kullanici_yetki");
    $kullanicisor->execute(array(

       'kullanici_ad'=>$kadi,
       'kullanici_yetki'=>2
    ));

    $var=$kullanicisor->rowCount();
    if($var>0)
    {
        header("Location:../uyeler-ekle.php?yuklenme=kullanicivar");
    }
    else
    {
            echo "Kullanıcı Yok";
    }
    $kadi=htmlspecialchars($_POST['kadi']);
    $sifre=htmlspecialchars($_POST['sifre']);
    $adsoyad=htmlspecialchars($_POST['adsoyad']);
    $sifreguclu=md5($sifre);

    $kullanicikaydet=$baglanti->prepare("INSERT INTO kullanici SET 

    kullanici_ad=:kullanici_ad,
    kullanici_sifre=:kullanici_sifre,
    kullanici_adsoyad=:kullanici_adsoyad,
    kullanici_yetki=:kullanici_yetki
    ");
    
    $insert=$kullanicikaydet->execute(array (
    'kullanici_ad'=>$kadi,
    'kullanici_sifre'=>$sifreguclu,
    'kullanici_adsoyad'=>$adsoyad,
    'kullanici_yetki'=>2 //2 olursa admin 1 olursa kullanıcı

    ));
    if($insert)
    {
        header("Location:../uyeler.php?yuklenme=basarili");
    }
    else
    {
        header("Location:../uyeler.php?yuklenme=basarisiz");
    }
}


if(isset($_GET['kullanicisil']))
{
    $kullanicisil=$baglanti->prepare("DELETE from kullanici where kullanici_id=:kullanici_id");

       $kullanicisil->execute(array(
        'kullanici_id'=>$_GET['id']
       ));

       if($kullanicisil)
       {
            header("Location:../uyeler.php?durum=basarili");
       }
       else
       {
        header("Location:../uyeler.php?durum=hata");
       }

        
}

if(isset($_POST['kategorikaydet']))
{
    $kategorikaydet=$baglanti->prepare("INSERT INTO kategori SET 

    kategori_adi=:kategori_adi,
    kategori_sira=:kategori_sira,
    kategori_durum=:kategori_durum

    ");
    
    $insert=$kategorikaydet->execute(array (
    'kategori_adi'=>$_POST['kategoriadi'],
    'kategori_sira'=>$_POST['kategorisira'],
    'kategori_durum'=>$_POST['kategoridurum']
    ));
    if($insert)
    {
        header("Location:../kategori.php?yuklenme=basarili");
    }
    else
    {
        header("Location:../kategori.php?yuklenme=basarisiz");
    }
}

if(isset($_POST['kategoriduzenle']))
{
    $kat=$_POST['katid'];

    $duzenle=$baglanti->prepare("UPDATE kategori SET 

kategori_adi=:kategori_adi,
    kategori_sira=:kategori_sira,
    kategori_durum=:kategori_durum


WHERE kategori_id=$kat


");

$update=$duzenle->execute(array (
    'kategori_adi'=>$_POST['kategoriadi'],
    'kategori_sira'=>$_POST['kategorisira'],
    'kategori_durum'=>$_POST['kategoridurum']

));
if($update)
{
    header("Location:../kategori.php?yuklenme=basarili");
}
else
{
    header("Location:../kategori.php?yuklenme=basarisiz");
}
}

if(isset($_GET['kategorisil']))
{
    $kategorisil=$baglanti->prepare("DELETE from kategori where kategori_id=:kategori_id");

       $kategorisil->execute(array(
        'kategori_id'=>$_GET['id']
       ));

       if($kategorisil)
       {
            header("Location:../kategori.php?yuklenme=basarili");
       }
       else
       {
        header("Location:../kategori.php?yuklenme=hata");
       }
}








if(isset($_POST['sliderkaydet']))
{
    $uploads_dir='../resimler/slider';
    @$tmp_name=$_FILES['sliderresim'] ["tmp_name"];
    @$name=$_FILES['sliderresim'] ["name"];

    $sayi=rand(1,1000000);
    $sayi2=rand(1,1000000);
    $sayi3=rand(10000,200000);

    $sayilar=$sayi.$sayi2.$sayi3;
    $resimyolu=$sayilar.$name;

    @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");


    $sliderkaydet=$baglanti->prepare("INSERT INTO slider SET 

    slider_baslik=:slider_baslik,
    slider_aciklama=:slider_aciklama,
    slider_link=:slider_link,
    slider_button=:slider_button,
    slider_sira=:slider_sira,
    slider_durum=:slider_durum,
    slider_banner=:slider_banner,
    slider_resim=:slider_resim


    ");
    
    $insert=$sliderkaydet->execute(array (
    'slider_baslik'=>$_POST['sliderbaslik'],
    'slider_aciklama'=>$_POST['slideraciklama'],
    'slider_link'=>$_POST['sliderlink'],
    'slider_button'=>$_POST['sliderbutton'],
    'slider_sira'=>$_POST['slidersira'],
    'slider_durum'=>$_POST['sliderdurum'],
    'slider_banner'=>$_POST['sliderbanner'],
    'slider_resim'=>$resimyolu

    ));
    if($insert)
    {
        header("Location:../slider.php?yuklenme=basarili");
    }
    else
    {
        header("Location:../slider.php?yuklenme=basarisiz");
    }
}

if(isset($_POST['sliderduzenle']))
{
    $slideid=$_POST['id'];
    if($_FILES['sliderresim'] ["size">0]){
    $uploads_dir='../resimler/slider/';
    @$tmp_name=$_FILES['sliderresim'] ["tmp_name"];
    @$name=$_FILES['sliderresim'] ["name"];

    $sayi=rand(1,1000000);
    $sayi2=rand(1,1000000);
    $sayi3=rand(10000,200000);

    $sayilar=$sayi.$sayi2.$sayi3;
    $resimyolu=$sayilar.$name;

    @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");

    $slideid=$_POST['id'];

    $duzenle=$baglanti->prepare("UPDATE slider SET 

slider_baslik=:slider_baslik,
    slider_aciklama=:slider_aciklama,
    slider_link=:slider_link,
    slider_button=:slider_button,
    slider_sira=:slider_sira,
    slider_durum=:slider_durum,
    slider_banner=:slider_banner,
 slider_resim=:slider_resim

WHERE slider_id=$slideid 


");

$update=$duzenle->execute(array (
    'slider_baslik'=>$_POST['sliderbaslik'],
    'slider_aciklama'=>$_POST['slideraciklama'],
    'slider_link'=>$_POST['sliderlink'],
    'slider_button'=>$_POST['sliderbutton'],
    'slider_sira'=>$_POST['slidersira'],
    'slider_durum'=>$_POST['sliderdurum'],
    'slider_banner'=>$_POST['sliderbanner'],
    'slider_resim'=>$resimyolu  
));
if($update)
{
    $resimsil=$_POST['eskiresim'];
    unlink("../resimler/slider/$resimsil");
    header("Location:../slider.php?yuklenme=basarili");
}
else
{
    header("Location:../slider.php?yuklenme=basarisiz");
}
    }
    else {
        $duzenle=$baglanti->prepare("UPDATE slider SET 

        slider_baslik=:slider_baslik,
            slider_aciklama=:slider_aciklama,
            slider_link=:slider_link,
            slider_button=:slider_button,
            slider_sira=:slider_sira,
            slider_durum=:slider_durum,
            slider_banner=:slider_banner
        
        
        WHERE slider_id=$slideid  
        
        
        ");
        
        $update=$duzenle->execute(array (
            'slider_baslik'=>$_POST['sliderbaslik'],
            'slider_aciklama'=>$_POST['slideraciklama'],
            'slider_link'=>$_POST['sliderlink'],
            'slider_button'=>$_POST['sliderbutton'],
            'slider_sira'=>$_POST['slidersira'],
            'slider_durum'=>$_POST['sliderdurum'],
            'slider_banner'=>$_POST['sliderbanner']
        
        ));

        if($update)
        {
            header("Location:../slider.php?yuklenme=basarili");
        }
        else
        {
            header("Location:../slider.php?yuklenme=basarisiz");
        }

    }
}

if(isset($_POST['slidersil']))
{
    $slidersil=$baglanti->prepare("DELETE from slider where slider_id=:slider_id");

       $slidersil->execute(array(
        'slider_id'=>$_POST['id']
       ));

       if($slidersil)
       {
        $resimsil=$_POST['resim'];
        unlink("../resimler/slider/$resimsil");
            header("Location:../slider.php?yuklenme=basarili");
       }
       else
       {
        header("Location:../slider.php?yuklenme=hata");
       }

        
}

















if(isset($_POST['urunresimkaydet']))
{
    $uploads_dir='../resimler/urunler';
    @$tmp_name=$_FILES['urunlerresim'] ["tmp_name"];
    @$name=$_FILES['urunlerresim'] ["name"];

    $sayi=rand(1,1000000);
    $sayi2=rand(1,1000000);
    $sayi3=rand(10000,200000);

    $sayilar=$sayi.$sayi2.$sayi3;
    $resimyolu=$sayilar.$name;

    @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");

$duzenle=$baglanti->prepare("UPDATE urunler SET 

urun_resim=:urun_resim



");

$update=$duzenle->execute(array (
'urun_resim'=>$resimyolu


));
if($update)
{
    $resimsil=$_POST['eskiresim'];
    unlink("../resimler/urunler/$resimsil");
    header("Location:../urunler.php?yuklenme=basarili");
}
else
{
    header("Location:../urunler.php?yuklenme=basarisiz");
}
}



if(isset($_POST['urunlerkaydet']))
{
    $yonlendir=$_POST['katsid'];
    $uploads_dir='../resimler/urunler';
    @$tmp_name=$_FILES['urunlerresim'] ["tmp_name"];
    @$name=$_FILES['urunlerresim'] ["name"];

    $sayi4=rand(1,1000000);
    $sayi5=rand(1,1000000);
    $sayi6=rand(10000,200000);

    $sayilar2=$sayi4.$sayi5.$sayi6;
    $resimyolu=$sayilar2.$name;

    @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar2$name");


    $urunlerkaydet=$baglanti->prepare("INSERT INTO urunler SET 

    kategori_id=:kategori_id,
    urun_baslik=:urun_baslik,
    urun_aciklama=:urun_aciklama,
    urun_sira=:urun_sira,
    urun_model=:urun_model,
    urun_renk=:urun_renk,
    urun_adet=:urun_adet,
    urun_fiyat=:urun_fiyat,
    onecikan=:onecikan,
    urun_durum=:urun_durum,
    urun_etiket=:urun_etiket,
    urun_resim=:urun_resim


    ");
    
    $insert=$urunlerkaydet->execute(array (
    'kategori_id'=>$_POST['urunkategori'],
    'urun_baslik'=>$_POST['urunlerbaslik'],
    'urun_aciklama'=>$_POST['urunleraciklama'],
    'urun_sira'=>$_POST['urunlersira'],
    'urun_model'=>$_POST['urunlermodel'],
    'urun_renk'=>$_POST['urunlerrenk'],
    'urun_adet'=>$_POST['urunleradet'],
    'urun_fiyat'=>$_POST['urunlerfiyat'],
    'onecikan'=>$_POST['urunleronecikar'],
    'urun_durum'=>$_POST['urunlerdurum'],
    'urun_etiket'=>$_POST['urunleranahtar'],
    'urun_resim'=>$resimyolu




    

    ));
    if($insert)
    {
        header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarili");
    }
    else
    {
        header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarisiz");
    }
}

if(isset($_POST['urunduzenle']))
{
    $yonlendir=$_POST['katsid'];
    $urunid=$_POST['id'];
    if(@$_FILES['urunlerresim'] ["size">0]){
    $uploads_dir='../resimler/urunler';
    @$tmp_name=$_FILES['urunlerresim'] ["tmp_name"];
    @$name=$_FILES['urunlerresim'] ["name"];

    $sayi=rand(1,1000000);
    $sayi2=rand(1,1000000);
    $sayi3=rand(10000,200000);

    $sayilar=$sayi.$sayi2.$sayi3;
    $resimyolu=$sayilar.$name;

    @move_uploaded_file($tmp_name,"$uploads_dir/$sayilar$name");
    $duzenle=$baglanti->prepare("UPDATE urunler SET 

    kategori_id=:kategori_id,
    urun_baslik=:urun_baslik,
    urun_aciklama=:urun_aciklama,
    urun_sira=:urun_sira,
    urun_model=:urun_model,
    urun_renk=:urun_renk,
    urun_adet=:urun_adet,
    urun_fiyat=:urun_fiyat,
    onecikan=:onecikan,
    urun_durum=:urun_durum,
    urun_etiket=:urun_etiket,
    urun_resim=:urun_resim

WHERE urun_id=$urunid 


");

$update=$duzenle->execute(array (
    'kategori_id'=>$_POST['urunkategori'],
    'urun_baslik'=>$_POST['urunlerbaslik'],
    'urun_aciklama'=>$_POST['urunleraciklama'],
    'urun_sira'=>$_POST['urunlersira'],
    'urun_model'=>$_POST['urunlermodel'],
    'urun_renk'=>$_POST['urunlerrenk'],
    'urun_adet'=>$_POST['urunleradet'],
    'urun_fiyat'=>$_POST['urunlerfiyat'],
    'onecikan'=>$_POST['urunleronecikar'],
    'urun_durum'=>$_POST['urunlerdurum'],
    'urun_etiket'=>$_POST['urunleranahtar'],
    'urun_resim'=>$resimyolu

));

if($update)
{
    $resimsil=$_POST['eskiresim'];
    unlink("../resimler/urunler/$resimsil");
    header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarili");}
else
{
    header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarisiz");
}
    }
    else {
        $duzenle=$baglanti->prepare("UPDATE urunler SET 

    kategori_id=:kategori_id,
    urun_baslik=:urun_baslik,
    urun_aciklama=:urun_aciklama,
    urun_sira=:urun_sira,
    urun_model=:urun_model,
    urun_renk=:urun_renk,
    urun_adet=:urun_adet,
    urun_fiyat=:urun_fiyat,
    onecikan=:onecikan,
    urun_durum=:urun_durum,
    urun_etiket=:urun_etiket
        
        
        WHERE urun_id=$urunid
        
        
        ");
        
        $update=$duzenle->execute(array (
            'kategori_id'=>$_POST['urunkategori'],
    'urun_baslik'=>$_POST['urunlerbaslik'],
    'urun_aciklama'=>$_POST['urunleraciklama'],
    'urun_sira'=>$_POST['urunlersira'],
    'urun_model'=>$_POST['urunlermodel'],
    'urun_renk'=>$_POST['urunlerrenk'],
    'urun_adet'=>$_POST['urunleradet'],
    'urun_fiyat'=>$_POST['urunlerfiyat'],
    'onecikan'=>$_POST['urunleronecikar'],
    'urun_durum'=>$_POST['urunlerdurum'],
    'urun_etiket'=>$_POST['urunleranahtar']
        
        ));

        if($update)
        {
            header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarili");        
        }
        else
        {
            header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarisiz");
        }

    }
}

if(isset($_POST['urunlersil']))
{
    $yonlendir=$_POST['katsid'];
    $urunlersil=$baglanti->prepare("DELETE from urunler where urun_id=:urun_id");

       $urunlersil->execute(array(
        'urun_id'=>$_POST['id']
       ));

       if($urunlersil)
       {
        $resimsil=$_POST['resim'];
        unlink("../resimler/urunler/$resimsil");
            header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarili");
       }
       else
       {
        header("Location:../urunler.php?katid=$yonlendir&yuklenme=basarisiz");
       }
}



if (isset($_POST['kullaniciduzenle'])) {
	$id=$_POST['kullaniciid'];

	$duzenle=$baglanti->prepare("UPDATE kullanici SET 

		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_mail=:kullanici_mail,
		kullanici_adres=:kullanici_adres,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce,
		kullanici_tel=:kullanici_tel

		WHERE kullanici_id=$id

		");

	$update=$duzenle->execute(array(

		'kullanici_adsoyad'=>$_POST['adsoyad'],
		'kullanici_mail'=>$_POST['email'],
		'kullanici_adres'=>$_POST['adres'],
		'kullanici_il'=>$_POST['sehir'],
		'kullanici_ilce'=>$_POST['ilce'],
		'kullanici_tel'=>$_POST['telefon']


	));
	if ($update) {

		header("Location:../../../site tema/kullanici.php?yuklenme=basarili");
	}
	else{
		header("Location:../../../site tema/kullanici.php?yuklenme=basarisiz");
	}
}



if(isset($_POST['yorumkaydet']))
{
    $gelenurl=$_SERVER['HTTP_REFERER'];
    $yorumkaydet=$baglanti->prepare("INSERT INTO yorumlar SET 

   yorum_detay=:yorum_detay,
    urun_id=:urun_id,
    kullanici_id=:kullanici_id,
    yorum_onay=:yorum_onay

    ");
    
    $insert=$yorumkaydet->execute(array (
    'yorum_detay'=>$_POST['yorum'],
    'urun_id'=>$_POST['urunid'],
    'kullanici_id'=>$_POST['kullaniciid'],

    'yorum_onay'=>0
    ));
    if($insert)
    {
        header("Location:$gelenurl?yuklenme=basarili");    }
    else
    {
		header("Location:$gelenurl?yuklenme=basarisiz");
    }
}


if(isset($_POST['yorumonayla']))
{

    $yorumid=$_POST['yorumid'];
$duzenle=$baglanti->prepare("UPDATE yorumlar SET 

yorum_onay=:yorum_onay


WHERE yorum_id=$yorumid


");

$update=$duzenle->execute(array (

    'yorum_onay'=>1


));
if($update)
{
    header("Location:../yorumlar.php?yuklenme=basarili");
}
else
{
    header("Location:../yorumlar.php?yuklenme=basarisiz");
}


}


if(isset($_GET['yorumlarsil']))
{
    $yorumlarsil=$baglanti->prepare("DELETE from yorumlar where yorum_id=:yorum_id");

       $yorumlarsil->execute(array(
        'yorum_id'=>$_GET['id']
       ));

       if($yorumlarsil)
       {
            header("Location:../yorumlar.php?durum=basarili");
       }
       else
       {
        header("Location:../yorumlar.php?durum=hata");
       }

        
}






if (isset($_GET['siparisonayla'])) {

    $siparisid=$_GET['id'];
    
        $duzenle=$baglanti->prepare("UPDATE siparisler SET 
    
    
    
            siparis_onay=:siparis_onay
        
    
            WHERE siparis_id=$siparisid
    
            ");
    
    
        $update=$duzenle->execute(array(
    
            'siparis_onay'=>1
    
    
    
        ));
        if ($update) {
    
            header("Location:../siparisler.php?yuklenme=basarili");
        }
        else{
            header("Location:../siparisler.php?yuklenme=basarisiz");
        }
    
    
    
    }

    if (isset($_GET['siparisreddet'])) {

        $siparisid=$_GET['id'];
        
            $duzenle=$baglanti->prepare("UPDATE siparisler SET 
        
        
        
                siparis_onay=:siparis_onay
            
        
                WHERE siparis_id=$siparisid
        
                ");
        
        
            $update=$duzenle->execute(array(
        
                'siparis_onay'=>2
        
        
        
            ));
            if ($update) {
        
                header("Location:../siparisler.php?yuklenme=basarili");
            }
            else{
                header("Location:../siparisler.php?yuklenme=basarisiz");
            }
        
        
        
        }


 


 
?>