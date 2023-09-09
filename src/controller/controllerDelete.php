<?php

require_once "../../data/models/datas.php";

if (isset($_GET['id'])) {
    if (!empty($_GET['id'])) {
        // var_dump($_GET);


        $id = htmlspecialchars($_GET['id']);
        // var_dump($id);

        deleteContact($id);


    }
}
