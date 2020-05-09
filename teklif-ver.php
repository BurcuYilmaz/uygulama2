<?php require "admin/include/database.php";
date_default_timezone_set('Europe/Istanbul');?>


<?php

if(!empty($_POST)){
       
    $urun_id=$_POST["urun_id"];
    $deger=$_POST["deger"];
    $aciklama=$_POST["aciklama"];
    $bugün=date('Y-m-d');
   
                                        
										
									
    $ekle =$db->prepare("INSERT INTO offers SET 
   
   productId =:urun_id,
   offerHead =:aciklama,
   offerValue =:deger,
   offerCreateTime =:tarih
    ");
$ekle->execute([
    "urun_id"=>$urun_id,
    "aciklama"=>$aciklama,
    "deger"=>$deger,
    "tarih"=>$bugün
    ]);
    
   
}?>