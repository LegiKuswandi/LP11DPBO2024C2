<?php

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");


$tp = new TampilPasien();

if (isset($_POST['submit']) && empty($_GET['id'])) {

    $tp->create($_POST);

} else if (isset($_POST['submit']) && !empty($_GET['id'])) {

    $id = $_GET['id'];
    $tp->update($id, $_POST);

}

if (!empty($_GET['id'])) {

    $id = $_GET['id'];
    $tp->form($id);

} else {

    $tp->form(null);
}