/**
 * Bean Bosses
 */
var Bosses = function () {
  /**
   * Setter pour le nom du boss.
   *
   * @param nom - Le nom du boss.
   */
  Bosses.prototype.setNom = function (nom) {
    this.nom = nom;
  };

  /**
   * Getter pour le nom du boss.
   *
   * @returns - Le nom du boss.
   */
  Bosses.prototype.getNom = function () {
    return this.nom;
  };

  /**
   * Setter pour l'identifiant unique du boss (pk).
   *
   * @param pk - L'identifiant unique du boss.
   */
  Bosses.prototype.setPk = function (pk) {
    this.pk = pk;
  };

  /**
   * Getter pour l'identifiant unique du boss (pk).
   *
   * @returns - L'identifiant unique du boss.
   */
  Bosses.prototype.getPk = function () {
    return this.pk;
  };

  /**
   * Setter pour les points de vie (HP) du boss.
   *
   * @param hp - Les points de vie du boss.
   */
  Bosses.prototype.setHp = function (hp) {
    this.hp = hp;
  };

  /**
   * Getter pour les points de vie (HP) du boss.
   *
   * @returns - Les points de vie du boss.
   */
  Bosses.prototype.getHp = function () {
    return this.hp;
  };

  /**
   * Setter pour la défense (DEF) du boss.
   *
   * @param def - La défense du boss.
   */
  Bosses.prototype.setDef = function (def) {
    this.def = def;
  };

  /**
   * Getter pour la défense (DEF) du boss.
   *
   * @returns - La défense du boss.
   */
  Bosses.prototype.getDef = function () {
    return this.def;
  };

  /**
   * Setter pour la clé étrangère de la localisation du boss.
   *
   * @param fk_localisation - L'identifiant de la localisation du boss.
   */
  Bosses.prototype.setFkLocalisation = function (fk_localisation) {
    this.fk_localisation = fk_localisation;
  };

  /**
   * Getter pour la fk de la localisation du boss.
   *
   * @returns - L'identifiant de la localisation du boss.
   */
  Bosses.prototype.getFkLocalisation = function () {
    return this.fk_localisation;
  };

  /**
   * Méthode qui retourne une représentation sous forme de chaîne du boss.
   * Cette méthode permet de récupérer une chaîne qui décrit le boss, incluant son nom, ses points de vie et sa défense.
   *
   * @returns - La représentation sous forme de chaîne du boss (nom, HP et DEF).
   */
  Bosses.prototype.toString = function () {
    return this.nom + " HP : " + this.hp + " DEF : " + this.def;
  };
};
