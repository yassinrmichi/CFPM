<?php
include("../db.php"); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $email = htmlspecialchars(trim($_POST['email']));
    $cin = htmlspecialchars(trim($_POST['cin']));
    $genre = htmlspecialchars(trim($_POST['genre']));
    $region = isset($_POST['region']) ? htmlspecialchars(trim($_POST['region'])) : null;
    $ville = isset($_POST['ville']) ? htmlspecialchars(trim($_POST['ville'])) : null;
    $telephone = isset($_POST['telephone']) ? htmlspecialchars(trim($_POST['telephone'])) : null;
    $date_naissance = htmlspecialchars(trim($_POST['date_naissance'])) ;
    $mot_de_passe = htmlspecialchars(trim($_POST['pass']));
    $confirm_mot_de_passe = htmlspecialchars(trim($_POST['confirm_pass']));


    $query = "SELECT email FROM utilisateurs";
    $result = $connexion->query($query);

    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if ($row['email'] === $email) {
                $email_exists = true;
                header('Location: ../../pages/signup.php?error=existing_mail');
                break;
            }
        }
    }

    if (empty($nom) || empty($prenom) || empty($email) || empty($cin) || empty($genre) || empty($mot_de_passe) || empty($confirm_mot_de_passe)) {
        header('Location: ../../pages/signup.php?error=missing_fields');
        exit();
    }

    //verify that the tele start with 0 and contains 10 caracters 
    if ($telephone!=="" && !preg_match('/^0\d{9}$/', $telephone)) {
        header('Location: ../../pages/signup.php?error=tele_invalid');
        exit();    
    } ;


    if ($mot_de_passe !== $confirm_mot_de_passe) {
        header('Location: ../../pages/signup.php?error=password_mismatch');
        exit();
    }else if(strlen($mot_de_passe)<8){
        header('Location: ../../pages/signup.php?error=pass_len');
        exit();
    }

    // Hash the password
    // $mot_de_pass = password_hash($mot_de_passe, PASSWORD_BCRYPT);
    
    $query = "INSERT INTO utilisateurs (nom, prenom, email, cin, genre, region, ville, tele, date_naissance, mot_de_passe) 
    VALUES (:nom, :prenom, :email, :cin, :genre, :region, :ville, :telephone, :date_naissance, :mot_de_passe)";
    
        
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cin', $cin);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':region', $region);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':date_naissance', $date_naissance);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe); 
        $stmt->execute();
        header('Location: ../../pages/login.php');
    }else{
        header('Location: ../../pages/signup.php');
    }

 
?>
