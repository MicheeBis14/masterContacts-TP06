<?php 

require_once "../../data/models/datas.php";

if(isset($_GET['id'])){

    $id = htmlspecialchars($_GET['id']);
    $transtipage = (int) $id;

    $datas = getContactById($transtipage);

    // echo  $data['nom'];
}
















?>