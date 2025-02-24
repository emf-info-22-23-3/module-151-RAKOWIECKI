var session = false;
var sessionAdmin = false;

/**
 * Fonction appelée lors de la connexion réussie.
 * Si la connexion est réussie, le nom d'utilisateur est stocké dans le localStorage et l'utilisateur est redirigé vers la page "boss.html".
 * Si la connexion échoue, un message d'erreur est affiché.
 *
 * @param {Object} data - Les données de réponse du serveur (format XML).
 */
function connectSuccess(data) {
  if ($(data).find("result").text() == "true") {
    var username = $(data).find("username").text();
    localStorage.setItem("user", JSON.stringify(username));
    console.log(username);
    alert("Login ok");
    window.location.href = "boss.html";
  } else {
    alert("Erreur lors du login");
  }
}

/**
 * Fonction appelée lors de la déconnexion réussie.
 * Affiche un message de déconnexion et redirige l'utilisateur vers la page "index.html".
 */
function disconnectSuccess() {
  alert("Utilisateur déconnecté");
  window.location.href = "index.html";
}

/**
 * Fonction appelée lors de l'inscription réussie.
 * Affiche un message de succès ou d'échec en fonction du résultat de l'inscription.
 *
 * @param {Object} data - Les données de réponse du serveur (format XML).
 */
function inscriptionSucces(data) {
  if ($(data).find("result").text() == "true") {
    alert("Inscription ok");
  } else {
    alert("Inscription NOK");
  }
}

/**
 * Fonction qui vérifie si l'utilisateur est connecté en fonction du résultat de la session.
 * Si la session est valide, le nom d'utilisateur est affiché et les données de localisation sont chargées.
 * Si la session est invalide, l'utilisateur est redirigé vers la page "index.html".
 *
 * @param {Object} data - Les données de réponse du serveur (format XML).
 */
function sessionOK(data) {
  if ($(data).find("result").text() === "true") {
    session = true;
    var u = localStorage.getItem("user");
    var usr = document.getElementById("usrr");
    usr.innerText = "Salut " + u.slice(1, u.length - 1) + " !";
    if (u.slice(1, u.length - 1) === "Admin") {
      sessionAdmin = true;
    }
    lireLocation(chargerLocationSuccess, callBackError);
    lireDB(
      document.getElementById("nomBoss").value,
      "Limgrave",
      lireSuccess,
      callBackError
    );
  } else {
    session = false;
    window.location.href = "index.html";
  }
}

/**
 * Fonction qui traite les données des boss et les affiche dans un tableau.
 * Parcourt la réponse XML et pour chaque boss, crée des lignes de tableau pour afficher le nom, les points de vie (HP) et la défense (DEF).
 *
 * @param {Object} data - Les données de réponse du serveur (format XML).
 */
function lireSuccess(data) {
  $("#tab").empty();
  var txt = "";
  $(data)
    .find("bosses")
    .each(function () {
      var boss = new Bosses();
      boss.setNom($(this).find("nom").text());
      boss.setPk($(this).find("pk_boss").text());
      boss.setHp($(this).find("hp").text());
      boss.setDef($(this).find("def").text());

      if (sessionAdmin) {
        console.log("sessionAdminLire");
        var row =
          "<tr>" +
          "<td> <strong>NOM</strong><br></br> <input type='text' id='bossNom_" +
          boss.getPk() +
          "' value='" +
          boss.getNom() +
          "' /></td>" +
          "<td> <strong>HP</strong><br></br> <input type='text' id='bossHp_" +
          boss.getPk() +
          "' value='" +
          boss.getHp() +
          "' /></td>" +
          "<td> <strong>DEF</strong><br></br> <input type='text' id='bossDef_" +
          boss.getPk() +
          "' value='" +
          boss.getDef() +
          "' /></td>" +
          "</tr>";

        $("#tab").append(row);

        // A chaque modif de la textBox fait modifierNom
        $("#bossNom_" + boss.getPk()).on("input", function () {
            modifierNom(
              boss.getPk(),
              $(this).val(),
              modifierNomSuccess,
              callBackError
            );
        });

        // A chaque modif de la textBox fait modiferHP
        $("#bossHp_" + boss.getPk()).on("input", function () {
            modifierHP(
              boss.getPk(),
              $(this).val(),
              modifierHPSuccess,
              callBackError
            );
        });

        // A chaque modif de la textBox fait modifierDef
        $("#bossDef_" + boss.getPk()).on("input", function () {
            modifierDef(
              boss.getPk(),
              $(this).val(),
              modifierDefSuccess,
              callBackError
            );
        });
      } else if (session) {
        var row =
          "<tr>" +
          "<td> <strong>NOM : </strong>" +
          boss.getNom() +
          "</td>" +
          "<td> <strong>HP : </strong>" +
          boss.getHp() +
          "</td>" +
          "<td> <strong>DEF : </strong>" +
          boss.getDef() +
          "</td>" +
          "</tr>";
        $("#tab").append(row);
      }
    });
}

/**
 * Fonction qui traite les données des locations et les ajoute à un menu déroulant (select).
 * Pour chaque emplacement, crée une nouvelle option dans le menu de sélection de localisation.
 *
 * @param {Object} data - Les données de réponse du serveur (format XML).
 */
function chargerLocationSuccess(data) {
  if(session){
  var cmbLoc = document.getElementById("location");
  $(data)
    .find("locations")
    .each(function () {
      var locations = new Locations();
      locations.setLocation($(this).find("location").text());
      locations.setPk($(this).find("pk_location").text());
      cmbLoc.options[cmbLoc.options.length] = new Option(
        locations,
        JSON.stringify(locations)
      );
    });
  }
}

function modifierNomSuccess(data) {
  if ($(data).find("result").text() == "true") {
    console.log("modif nom ok");
  } else {
    console.log("modif nom nok");
  }
}
function modifierHPSuccess(data) {
  if ($(data).find("result").text() == "true") {
    console.log("modif HP ok");
  } else {
    console.log("modif HP nok");
  }
}
function modifierDefSuccess(data) {
  if ($(data).find("result").text() == "true") {
    console.log("modif Def ok");
  } else {
    console.log("modif Def nok");
  }
}

/**
 * Méthode appelée en cas d'erreur lors de la lecture du webservice
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 */
function callBackError(request, status, error) {
  alert("erreur : " + error + ", request: " + request + ", status: " + status);
}


/**
 * Méthode "start" appelée après le chargement complet de la page
 * Initialise les événements de connexion, déconnexion, inscription, et la gestion des entrées des champs de formulaire.
 * Charge les scripts nécessaires pour le bon fonctionnement de la page (servicesHttp.js, locations.js, et boss.js).
 */
$().ready(function () {
  var butConnect = $("#login");
  var butDisconnect = $("#logout");
  var butInscription = $("#inscription");
  var nomBoss = $("#nomBoss");
  var location = $("#location");

  $.getScript("services/servicesHttp.js", function () {
    console.log("servicesHttp.js chargé !");
    //Si on ouvres la page boss.html on check si le login est OK
    if (window.location.pathname.endsWith("boss.html")) {
      checkSession(sessionOK, callBackError);
    }
  });

  $.getScript("beans/locations.js", function () {
    console.log("locations.js chargé !");
  });
  $.getScript("beans/boss.js", function () {
    console.log("boss.js chargé !");
  });

  nomBoss.on("input", function () {
    if (session) {
      const locationString = document.getElementById("location").value;
      const parsedLocation = JSON.parse(locationString);
      lireDB(
        document.getElementById("nomBoss").value,
        parsedLocation.location,
        lireSuccess,
        callBackError
      );
    }
  });

  location.on("input", function () {
    if (session) {
      const locationString = document.getElementById("location").value;
      const parsedLocation = JSON.parse(locationString);
      lireDB(
        document.getElementById("nomBoss").value,
        parsedLocation.location,
        lireSuccess,
        callBackError
      );
    }
  });

  butConnect.click(function (event) {
    connect(
      document.getElementById("nom").value,
      document.getElementById("pwd").value,
      connectSuccess,
      callBackError
    );
    console.log("BUTTON CONNECT!");
  });
  butDisconnect.click(function (event) {
    if(session || sessionAdmin){
    disconnect(disconnectSuccess, callBackError);
    console.log("BUTTON DISCONNECT!");
    }
  });
  butInscription.click(function (event) {
    inscription(
      document.getElementById("nom").value,
      document.getElementById("email").value,
      document.getElementById("pwd").value,
      inscriptionSucces,
      callBackError
    );
    console.log("BUTTON INSCRIPTION!");
  });
});
