//Les URL differents
const BASE_URL = "http://localhost:8080/projet/server/server.php";
const BOSS_URL = "http://localhost:8080/projet/server/bossManager.php";

/**
 * Fonction pour se connecter.
 * Envoie une requête POST pour se connecter avec un nom d'utilisateur et un mot de passe.
 *
 * @param {String} username - Le nom d'utilisateur pour la connexion.
 * @param {String} passwd - Le mot de passe pour la connexion.
 * @param {Function} successCallback - La fonction à appeler si la connexion est réussie.
 * @param {Function} errorCallback - La fonction à appeler si une erreur survient.
 */
function connect(username, passwd, successCallback, errorCallback) {
  $.ajax({
    type: "POST",
    dataType: "xml",
    url: BASE_URL,
    data: "action=connect&nom=" + username + "&pwd=" + passwd,
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * Fonction pour se déconnecter.
 * Envoie une requête POST pour déconnecter l'utilisateur.
 *
 * @param {Function} successCallback - La fonction à appeler si la déconnexion est réussie.
 * @param {Function} errorCallback - La fonction à appeler si une erreur survient.
 */
function disconnect(successCallback, errorCallback) {
  $.ajax({
    type: "POST",
    dataType: "xml",
    url: BASE_URL,
    data: "action=disconnect",
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * Fonction pour inscrire un nouvel utilisateur.
 * Envoie une requête POST pour inscrire un utilisateur avec un nom, un email et un mot de passe.
 *
 * @param {String} nom - Le nom de l'utilisateur à inscrire.
 * @param {String} email - L'email de l'utilisateur à inscrire.
 * @param {String} pwd - Le mot de passe de l'utilisateur à inscrire.
 * @param {Function} successCallback - La fonction à appeler si l'inscription est réussie.
 * @param {Function} errorCallback - La fonction à appeler si une erreur survient.
 */
function inscription(nom, email, pwd, successCallback, errorCallback) {
  $.ajax({
    type: "POST",
    dataType: "xml",
    url: BASE_URL,
    data: "action=inscription&nom=" + nom + "&email=" + email + "&pwd=" + pwd,
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * Fonction pour lire les données de la base de données concernant un boss.
 * Envoie une requête GET pour récupérer les données d'un boss spécifique en fonction du nom et de la localisation.
 *
 * @param {String} nom - Le nom du boss à rechercher.
 * @param {String} location - La localisation du boss à rechercher.
 * @param {Function} successCallback - La fonction à appeler si la lecture est réussie.
 * @param {Function} errorCallback - La fonction à appeler si une erreur survient.
 */
function lireDB(nom, location, successCallback, errorCallback) {
  $.ajax({
    type: "GET",
    dataType: "xml",
    url: BOSS_URL,
    data: "action=lireDB&nom=" + nom + "&location=" + location,
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * Fonction pour lire les données de localisation.
 * Envoie une requête GET pour récupérer les données de localisation.
 *
 * @param {Function} successCallback - La fonction à appeler si la lecture des localisations est réussie.
 * @param {Function} errorCallback - La fonction à appeler si une erreur survient.
 */
function lireLocation(successCallback, errorCallback) {
  $.ajax({
    type: "GET",
    dataType: "xml",
    url: "http://localhost:8080/projet/server/locationManager.php",
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * Fonction pour vérifier la session utilisateur.
 * Envoie une requête POST pour vérifier si une session utilisateur est active.
 *
 * @param {Function} successCallback - La fonction à appeler si la vérification de la session est réussie.
 * @param {Function} errorCallback - La fonction à appeler si une erreur survient lors de la vérification de la session.
 */
function checkSession(successCallback, errorCallback) {
  $.ajax({
    type: "POST",
    dataType: "xml",
    url: BASE_URL,
    data: { action: "checkSession" },
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * Modifie le nom du boss dans la base de données.
 * 
 * @param {number} pkBoss - Identifiant unique du boss à modifier.
 * @param {string} modif - Nouveau nom à attribuer au boss.
 * @param {Function} successCallback - Fonction à appeler si la requête réussit.
 * @param {Function} errorCallback - Fonction à appeler si la requête échoue.
 */
function modifierNom(pkBoss, modif, successCallback, errorCallback) {
  $.ajax({
    type: "POST",
    dataType: "xml",
    url: BOSS_URL,
    data: "action=modifNom&pkBoss=" + pkBoss + "&modif=" + modif,
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * Modifie les points de vie du boss dans la base de données.
 * 
 * @param {number} pkBoss - Identifiant unique du boss à modifier.
 * @param {number} modif - Nouvelle valeur des points de vie du boss.
 * @param {Function} successCallback - Fonction à appeler si la requête réussit.
 * @param {Function} errorCallback - Fonction à appeler si la requête échoue.
 */
function modifierHP(pkBoss, modif, successCallback, errorCallback) {
  $.ajax({
    type: "POST",
    dataType: "xml",
    url: BOSS_URL,
    data: "action=modifHP&pkBoss=" + pkBoss + "&modif=" + modif,
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * Modifie la défense du boss dans la base de données.
 * 
 * @param {number} pkBoss - Identifiant unique du boss à modifier.
 * @param {number} modif - Nouvelle valeur de la défense du boss.
 * @param {Function} successCallback - Fonction à appeler si la requête réussit.
 * @param {Function} errorCallback - Fonction à appeler si la requête échoue.
 */
function modifierDef(pkBoss, modif, successCallback, errorCallback) {
  $.ajax({
    type: "POST",
    dataType: "xml",
    url: BOSS_URL,
    data: "action=modifDef&pkBoss=" + pkBoss + "&modif=" + modif,
    success: successCallback,
    error: errorCallback,
  });
}

