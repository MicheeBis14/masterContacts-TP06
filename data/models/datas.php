<?php 
// include_once "../constants.php";
       /***
    * @param {string} $host le nom du host
    * @param {string} $dbname le nom de la base de donnée
    * @param {string} $root le nom user pour acceder la bd phpmy Admin
    * @param {string} $pass le mot de passe pour acceder à la bd phpmyAdmin

    ***/

    function Connexion( $dbname ="",$host ="127.0.0.1",$root = "root", $pass=""){

        try {
            $pdo = new PDO("mysql:host={$host}; dbname={$dbname}; charset=UTF8","{$root}", "{$pass}");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(Exception $e){

            die("Erreur".$e->getMessage());
        }
        
        return $pdo;
    }

    function getContacts(){

        $db = Connexion("master_contacts");

        $query = "SELECT * FROM contacts";

        $stmnt = $db->query($query);
        $rows = $stmnt->fetchAll();

        return $rows;
    }

    function getContactById($id){
        $db = Connexion("master_contacts");

        $query = "SELECT * FROM contacts WHERE id = ?";
        $stmnt = $db->prepare($query);
        $stmnt->execute([$id]);

        // $data = $stmnt->fetch();

        return $stmnt;
    }

    /**
     * @param {string} $nom : nom du contact
     * @param {string} $prenom : prenom du contact
     * @param {string} $phone : numero de télephone
     * @param {string} $email ; adresse email
     */

    function addContacts($nom,$prenom,$phone,$email){

        $db = Connexion("master_contacts");

        $query = "INSERT INTO contacts (nom,prenom,phone,email) Values (?,?,?,?)";
        $stmnt = $db->prepare($query);
        $stmnt->execute([$nom,$prenom,$phone,$email]);

        if($stmnt){
            echo "Contact ajouté avec succès";
            header("location:../../index.php");
        }

    }
      /**
       * @param {int} $id clé primaire :AUTO_INCREMENT
     * @param {string} $nom : nom du contact
     * @param {string} $prenom : prenom du contact
     * @param {string} $phone : numero de télephone
     * @param {string} $email ; adresse email
     */

    function setContact($nom,$prenom,$phone,$email,$id){
        
        $db = Connexion("master_contacts");
        
        $queryVerifyId = "SELECT id FROM contacts WHERE id = ?";
        $stmnt = $db->prepare($queryVerifyId);
        $stmnt->execute([$id]);

        if($stmnt->rowCount() > 0){

            $queryMofifyContact = "UPDATE contacts SET nom  = ?, prenom =  ?, phone= ?, email=? WHERE id = ?";
            $stmntExec = $db->prepare($queryMofifyContact);
            $stmntExec->execute([$nom, $prenom, $phone, $email, $id]);

            if($stmntExec){

                // header("location:../../index.php");
            echo" <script> alert('Modfification Reussie');window.location.href='../../index.php'</script>";

            }else{
                // echo"Echec modification";
            echo" <script> alert('Suppresion echec');window.location.href='../../index.php'</script>";

            }
        }
    }
    function deleteContact($id){
        
        $db = Connexion("master_contacts");

        $query = "DELETE FROM contacts WHERE id = ?";
        $stmnt = $db->prepare($query);
        $stmnt->execute(array($id));

        if($stmnt){
            echo" <script> alert('Suppresion Reussie');window.location.href='../../index.php'</script>";

            // header("location:../index.php");

        }else{
            echo" <script> alert(' Echec Suppresion');window.location.href='../../index.php'</script>";

        }
        
    }
