<?php 
// class Connexion{

//     public $connexion;

//     function __construct(){

//         include __DIR__.'/constants.php';
//         try {
//             //code...
//             $this -> connexion = new PDO('mysql:host='.DB_HOST .';dbname=' .DB_NAME , DB_USER , DB_PASSWORD);
//         } catch (Exception $e) {

//             die (" Erreur".$e -> getMessage());
//         }

//     }
// }

/***
 * @param {string} $host le nom du host
 * @param {string} $dbname le nom de la base de donnée
 * @param {string} $root le nom user pour acceder la bd phpmy Admin
 * @param {string} $pass le mot de passe pour acceder à la bd phpmyAdmin
 */

function Connexion( $dbname = "master_contacts",$host ="127.0.0.1",$root = "root", $pass=""){

    $pdo = new PDO("mysql:host={$host}; dbname={$dbname}; charset=UTF8","{$root}", "{$pass}");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}

?>