<?php
namespace Entity;
/*
  La classe User implémente l'interface Serializable, ce qui permettra de
  bénéficier des méthodes de sérialisation et dé-sérialisation: on pourra
  convertir l'objet en chaine de charactères où créer un objet de type User
  depuis une chaine de charactère contenant les attributs de la classe.
  */
class User implements \Serializable {
  private $nom;
  private $prenom;
  private $age;

  // Le constructeur de User prend en paramètre un nom, prénom, age.
  function __construct($nom, $prenom, $age) {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->age = $age;
  }

  /*
    Les méthodes serialize et unserialize sont des méthodes abstraites de
    l'interface Serializable. Elles doivent être implémenter afin d'asurer le
    bon fonctionnement de la (dé/)sérialisation
    */

  // On indique quels attributs de la classes seront à sérialiser.
  public function serialize() {
    return serialize(array($this->nom, $this->prenom, $this->age));
  }

  // On indique de quelle manière la classe sera désérilisable.
  public function unserialize($data) {
    $attr = unserialize($data);
    $this->nom = $attr[0];
    $this->prenom = $attr[1];
    $this->age = $attr[2];
  }

  // Ci dessous, les différents accesseurs pour les attributs de la classe.
  public function getNom() {
    return $this->nom;
  }

  public function getPrenom() {
    return $this->prenom;
  }

  public function getAge() {
    return $this->age;
  }

  public function setNom($nom) {
    $this->nom = $nom;
  }

  public function setPrenom($prenom) {
    $this->prenom = $prenom;
  }

  public function setAge($age) {
    $this->age = $age;
  }
}
