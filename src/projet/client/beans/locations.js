/*
 * Bean "Pays".
 *
 */

var Locations = function() {
};

/**
 * Setter pour le nom
 * @param String nom
 * @returns {undefined}
 */
Locations.prototype.setLocation = function(location) {
  this.location = location;
};

/**
 * Setter pour le pk du pays
 * @param String nom
 * @returns {undefined}
 */
Locations.prototype.setPk = function(pk) {
  this.pk = pk;
};

/**
 * Retourne le pays en format texte
 * @returns Le pays en format texte
 */
Locations.prototype.toString = function () {
  return this.location;
};

