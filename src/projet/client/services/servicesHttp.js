var BASE_URL = "http://localhost:8080/projet/server/server.php";

/**
 * Fonction permettant de se connecter.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
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
 * Fonction permettant de se déconnecter.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
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
 * Fonction permettant de créer un user.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
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
 * Fonction permettant lire la DB.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function lireDB(nom, location, successCallback, errorCallback) {
    $.ajax({
      type: "GET",
      dataType: "xml",
      url: "http://localhost:8080/projet/server/workers/bossManager.php",
      data: "action=lireDB&nom=" + nom + "&location=" + location,
      success: successCallback,
      error: errorCallback,
    });
  }

  /**
 * Fonction permettant lire la DB.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function lireLocation(successCallback, errorCallback) {
    $.ajax({
      type: "GET",
      dataType: "xml",
      url: "http://localhost:8080/projet/server/workers/locationManager.php",
      success: successCallback,
      error: errorCallback,
    });
  }
