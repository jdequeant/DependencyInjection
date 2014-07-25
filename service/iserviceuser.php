<?php
namespace Service;

/*
  L'interface iServiceUser expose le comportement que toutes les classes de
  service d'utilisateur devront implémenter.
  */
interface iServiceUser {
  // on oblige la classe à recevoir un dao en parametre à la construction
  function __construct($userDAO);
  // register(...) permet d'enregistrer l'utilisateur dans l'espace de stockage
  public function register($nom, $prenom, $age);
  // getUser() retourne l'utilisateur
  public function getUser();
  // get(...) permet de récupérer la valeur pour une clef donnée
  public function get($key);
  // set(...) permet d'enregistrer la valeur donnée pour la clef correpondante
  public function set($key, $value);
  // fullName() retourne le nom complet de l'utilisateur
  public function fullName();
  // birthyear() retourne l'année de naissance de l'utilisateur
  public function birthyear();
}
