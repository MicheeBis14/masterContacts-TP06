<?php

require_once "../../data/models/datas.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['btnModify'])) {

        if (
            array_key_exists("nom", $_POST) && array_key_exists("prenom", $_POST) && array_key_exists("phone", $_POST)
            && array_key_exists("email",  $_POST) && array_key_exists("id", $_POST)
        ) {
            if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['id'])) {

                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $phone = htmlspecialchars($_POST['phone']);
                $email = htmlspecialchars($_POST['email']);
                $id = htmlspecialchars($_POST['id']);

                if (strlen($phone) >= 10 && strlen($phone) <= 13) {

                   setContact($nom, $prenom, $phone, $email, $id);

                } else {
                    header("location:../../index.php");
                }
            }
        }
    }
}
