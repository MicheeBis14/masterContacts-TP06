<?php 
    require_once "../../data/models/datas.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['btnAdd'])){

        if(array_key_exists("nom", $_POST) && array_key_exists("prenom",$_POST) && array_key_exists("phone",$_POST)
        && array_key_exists("email",  $_POST)){
            if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['phone']) && !empty($_POST['email'])){

                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $phone = htmlspecialchars($_POST['phone']);
                $email = htmlspecialchars($_POST['email']);

                if(strlen($phone) >= 10 && strlen($phone) <= 13){
                    
                    addContacts($nom,$prenom,$phone,$email);

                }else{
                    header("location:../../index.php");
                }

            }else{
                echo "<script> alert('Veuillez remplir tous les champs');window.location.href='../../index.php'</script>";

            }
        }



    }


}

?>