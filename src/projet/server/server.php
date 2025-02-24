<?php
include_once('workers/Connexion.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Connexion
    if($_POST['action'] == "connect" && isset($_POST['nom']) && isset($_POST['pwd'])) {

    // Récupérer les valeurs envoyées par le formulaire
    $username = $_POST['nom'];
    $password = $_POST['pwd'];
    
    $connexion = Connexion::getInstance();

    // Vérifier si l'utilisateur existe dans la base de données
    $query = "SELECT * FROM mydb.t_utilisateur WHERE nom = :nom";
    $params = array(':nom' => $username);
    $user = $connexion->selectSingleQuery($query, $params);

    if ($user) {
        // Si l'utilisateur existe vérifier si le mot de passe est correct
        if (password_verify($password, $user['pwd'])) {
            // Mot de passe correct
            $_SESSION['logged'] = ($user['nom']);
            echo '<response>';
            echo '<result>true</result>';
            echo '<username>' . $user['nom'] . '</username>';
            echo '</response>';
        } else {
            echo '<result>false</result>';
        }
    } else {
        // L'utilisateur n'existe pas
        echo '<result>false</result>';
    }
} 

// Vérifier si l'utilisateur est connecté
if ($_POST['action'] == "checkSession") {

    //Controlle si Admin
    if($_SESSION['logged'] == "Admin"){
        echo '<response>';
        echo '<result>trueAdmin</result>';
        echo '<username>' . $_SESSION['logged'] . '</username>';
        echo '</response>';
    } else if (isset($_SESSION['logged'])){
        echo '<response>';
        echo '<result>true</result>';
        echo '<username>' . $_SESSION['logged'] . '</username>';
        echo '</response>';
    } else {
        echo '<response>';
        echo '<result>false</result>';
        echo '</response>';
    }
}


//Deconnexion
if($_POST['action'] == "disconnect") {
    // effacer la variable de session
    unset($_SESSION['logged']);
    session_destroy();
    echo '<result>true</result>';
}

//Inscription
if ($_POST['action'] == 'inscription' && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['pwd'])) {
    // Récupérer les données envoyées
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    // Hachage du mot de passe avant de l'enregistrer
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Connexion à la base de données via la classe Connexion
    $connexion = Connexion::getInstance();

    // Vérifier si l'utilisateur existe déjà
    $query = "SELECT * FROM mydb.t_utilisateur WHERE nom = :nom";
    $params = array(':nom' => $nom);
    $user = $connexion->selectSingleQuery($query, $params);

    if ($user) {
        // Si l'utilisateur existe déjà, renvoyer une réponse échouée
        echo '<result>false</result>';
    } else {
        // Si l'utilisateur n'existe pas, créer l'utilisateur
        $query = "INSERT INTO mydb.t_utilisateur (nom, email, pwd) VALUES (:nom, :email, :pwd)";
        $params = array(':nom' => $nom, ':email' => $email, ':pwd' => $hashedPassword);

        $result = $connexion->executeQuery($query, $params);

        //Verifie si bien ajouté
        if ($result > 0) {
            // Utilisateur créé avec succès
            echo '<result>true</result>';
        } else {
            // Erreur lors de la création
            echo '<result>false</result>';
        }
    }
} 
} else {
    // En cas de mauvaise méthode de requête ou données manquantes
    echo '<result>false</result>';
}
?>
