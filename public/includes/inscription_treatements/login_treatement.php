<?php
include_once("../db.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification de la longueur du mot de passe
    if (strlen(trim($password)) < 8) {
        header('location:../../pages/login.php?pass_len=1');
        exit();
    }

    // Préparation de la requête
    $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = :email AND mot_de_passe = :password");
    $requete->bindParam(':email', $email);
    $requete->bindParam(':password', $password);
    $requete->execute();
    $users = $requete->fetch(PDO::FETCH_ASSOC);

    // Vérification des informations d'identification
    if ($users) {
        $_SESSION['email'] = $email;
        $_SESSION['nom'] = $users['nom'];
        $_SESSION['prenom'] = $users['prenom'];
        $_SESSION['id'] = $users['id'];
        $_SESSION['role'] = $users['role'];
        $_SESSION['islogin'] = true;
        if ($_SESSION['role'] == 'admin') {
            header('location:../../pages/EspaceAdminstration.php');
            exit();
        } elseif ($_SESSION['role'] == 'formateur') {
            header('location:../../pages/espaceFormateur.php');
            exit();
        } elseif ($_SESSION['role'] == 'stagiaire') {
            header('location:../../pages/espaceStagaire.php');
            exit();
        } else {
            header('location:../../pages/index.php');
            exit();
        }
    } else {
        header('location:../../pages/login.php?error=1');
        exit();
    }
} else {
    header('location:../../pages/login.php');
    exit();
}
?>
