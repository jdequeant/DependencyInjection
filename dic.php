<?php
// On inclue le fichier de configuration.
require_once('config.php');

// Dependency Injection Container
class DIC {
  // Le constructeur est private pour interdire l'instanciation de la classe.
  private function __construct() {
  }

  /*
    Si $dao n'est pas instancié, DIC::getDAO() instancie un DAO de la classe
    indiquée dans le fichier de configuration.
    DIC::getDAO() retourne le $dao.
    */
  static protected function getDAO() {
    static $dao;
    if (!isSet($dao)) {
      $className = 'DAO\\'.conf()['service.user.dao.class'];
      $dao = new $className();
    }
    return $dao;
  }

  /*
    Si $srvc n'est pas instancié, DIC::service() instancie un service de la classe
    indiquée dans le fichier de configuration.
    DIC::service() retourne le $srvc.
    */
  static public function service() {
    static $srvc;
    if (!isSet($srvc)) {
      $className = 'Service\\'.conf()['service.user.class'];
      $srvc = new $className(DIC::getDAO());
    }
    return $srvc;
  }
}
