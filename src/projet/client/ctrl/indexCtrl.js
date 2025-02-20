/**
 * Méthode appelée lors du retour avec succès du résultat des équipes
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 */

function connectSuccess(data, text, jqXHR) {
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

function disconnectSuccess(data, text, jqXHR) {
  alert("Utilisateur déconnecté");
  window.location.href = "index.html";
}

function inscriptionSucces(data, text, jqXHR) {
  if ($(data).find("result").text() == "true") {
    alert("Inscription ok");
  } else {
    alert("Inscription NOK");
  }
}

function lireSuccess(data, text, jqXHR) {
  var txt = '';
  $(data).find("bosses").each(function() {
      var boss = new Bosses();
      boss.setNom($(this).find("nom").text());
      boss.setPk($(this).find("pk_boss").text());
      boss.setHp($(this).find("hp").text());
      boss.setDef($(this).find("def").text());

      // Créer une ligne pour le nom du boss
      txt += "<tr>" +
        "<td><strong>Nom</strong></td>" + 
        "<td>" + boss.getNom() + "</td>" +
      "</tr>";
      
      // Créer une ligne pour afficher HP
      txt += "<tr>" +
        "<td><strong>HP</strong></td>" +
        "<td>" + boss.getHp() + "</td>" +
      "</tr>";
      
      // Créer une ligne pour afficher DEF
      txt += "<tr>" +
        "<td><strong>DEF</strong></td>" +
        "<td>" + boss.getDef() + "</td>" +
      "</tr>";
      
      // Ajouter une ligne vide pour l'espacement
      txt += "<tr class='empty-row'><td colspan='2'>&nbsp;</td></tr>";
    });
  document.getElementById("tab").innerHTML = txt;
}

function chargerLocationSuccess(data, text, jqXHR) {
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
 */
$(document).ready(function () {
  var butConnect = $("#login");
  var butDisconnect = $("#logout");
  var butInscription = $("#inscription");
  var nomBoss = $("#nomBoss");
  var location = $("#location");

  $.getScript("services/servicesHttp.js", function () {
    console.log("servicesHttp.js chargé !");
    if (window.location.pathname.endsWith("boss.html")) {
      var usr = document.getElementById("usrr");
      var u = localStorage.getItem("user");
      usr.innerText = "Salut " + u.slice(1, u.length - 1);
      lireLocation(chargerLocationSuccess, callBackError);
    }
  });
  $.getScript("beans/locations.js", function () {
    console.log("locations.js chargé !");
  });
  $.getScript("beans/boss/boss.js", function () {
    console.log("locations.js chargé !");
  });

  nomBoss.on("input", function () {
    const locationString = document.getElementById("location").value;
    const parsedLocation = JSON.parse(locationString);
    lireDB(
      document.getElementById("nomBoss").value,
      parsedLocation.location,
      lireSuccess,
      callBackError
    );
  });

  location.on("input", function () {
    const locationString = document.getElementById("location").value;
    const parsedLocation = JSON.parse(locationString);
    lireDB(
      document.getElementById("nomBoss").value,
      parsedLocation.location,
      lireSuccess,
      callBackError
    );
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
    disconnect(disconnectSuccess, callBackError);
    console.log("BUTTON DISCONNECT!");
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
