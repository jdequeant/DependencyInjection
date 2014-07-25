<?php
namespace DAO;

/*
  L'interface iDAOUser expose le comportement que toutes les classes de DAO
  d'utilisateur devront implémenter.
  */
interface iDAOUser {
  // register(...) permet d'enregistrer l'utilisateur dans l'espace de stockage
  public function register($nom, $prenom, $age);
  // getUser() permet de récupérer l'utilisateur depuis l'espace de stockage
  public function getUser();
  // get(...) permet de récupérer la valeur pour une clef donnée
  public function get($key);
  // set(...) permet d'enregistrer la valeur donnée pour la clef correpondante
  public function set($key, $value);
}
