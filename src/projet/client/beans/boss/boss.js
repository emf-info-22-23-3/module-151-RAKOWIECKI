var Bosses = function() {
};

/**
 * Setter pour le nom
 * @param String nom
 * @returns {undefined}
 */
Bosses.prototype.setNom = function(nom) {
  this.nom = nom;
};

/**
 * Getter pour le nom
 * @returns {String}
 */
Bosses.prototype.getNom = function() {
  return this.nom;
};

/**
 * Setter pour le pk du boss
 * @param String pk
 * @returns {undefined}
 */
Bosses.prototype.setPk = function(pk) {
  this.pk = pk;
};

/**
 * Getter pour le pk
 * @returns {String}
 */
Bosses.prototype.getPk = function() {
  return this.pk;
};

/**
 * Setter pour les points de vie (hp)
 * @param String hp
 * @returns {undefined}
 */
Bosses.prototype.setHp = function(hp) {
  this.hp = hp;
};

/**
 * Getter pour les points de vie (hp)
 * @returns {String}
 */
Bosses.prototype.getHp = function() {
  return this.hp;
};

/**
 * Setter pour la défense
 * @param String def
 * @returns {undefined}
 */
Bosses.prototype.setDef = function(def) {
  this.def = def;
};

/**
 * Getter pour la défense
 * @returns {String}
 */
Bosses.prototype.getDef = function() {
  return this.def;
};

/**
 * Setter pour la localisation
 * @param String fk_localisation
 * @returns {undefined}
 */
Bosses.prototype.setFkLocalisation = function(fk_localisation) {
  this.fk_localisation = fk_localisation;
};

/**
 * Getter pour la localisation
 * @returns {String}
 */
Bosses.prototype.getFkLocalisation = function() {
  return this.fk_localisation;
};

/**
 * Retourne le nom du boss en format texte
 * @returns {String} Le nom du boss
 */
Bosses.prototype.toString = function () {
  return this.nom + " HP : "+ this.hp + " DEF : " + this.def;
};
