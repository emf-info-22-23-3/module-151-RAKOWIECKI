/*
 * Bean "Locations".
 *
 */
var Locations = function () {
  /**
   * Setter pour la localisation.
   * Permet d'assigner une valeur à la propriété `location`.
   *
   * @param location - Le nom de la localisation à attribuer à l'objet.
   */
  Locations.prototype.setLocation = function (location) {
    this.location = location;
  };

  /**
   * Setter pour l'identifiant de la localisation (pk).
   * Permet d'assigner un identifiant à la localisation.
   *
   * @param pk - L'identifiant unique de la localisation.
   */
  Locations.prototype.setPk = function (pk) {
    this.pk = pk;
  };

  /**
   * Méthode qui retourne le nom de la localisation.
   * Cette méthode permet de retourner la localisation sous forme de chaîne de caractères.
   *
   * @returns - Le nom de la localisation.
   */
  Locations.prototype.toString = function () {
    return this.location;
  };
};
