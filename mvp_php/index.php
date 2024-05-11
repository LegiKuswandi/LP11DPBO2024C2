<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

 include_once("model/Template.class.php");
 include_once("model/DB.class.php");
 include_once("model/Pasien.class.php");
 include_once("model/TabelPasien.class.php");
 include_once("view/TampilPasien.php");
 
 
 $tp = new TampilPasien();
 
 if (!empty($_GET['id_hapus'])) {
 
     $id = $_GET['id_hapus'];
 
     $tp->delete($id);
 
 } else {
     $tp->tampil();
 }
