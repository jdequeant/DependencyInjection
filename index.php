<?php
session_start();
spl_autoload_extensions('.php');
spl_autoload_register();

/*
  On regarde si register est présent dans $_GET.
    Si oui, on décompose la chaine de charactère en tableau en utilisant les
    virgules comme séparateur.
    Si non, on regarde si les champs 'nom', 'prenom' et/ou 'age' sont présents.
  Les données récupérées sont ensuite envoyées au service.

  Ex:
    http://localhost:8000/?register=van%20Beethoven,Ludwig,302
    http://localhost:8000/?nom=van%20Beethoven&prenom=Ludwig&age=302
  */
if (isset($_GET['register'])) {
  $data = explode(',', $_GET['register']);
  if (count($data) == 3) {
    DIC::service()->register($data[0], $data[1], intval($data[2]));
  }
} else {
  if (isset($_GET['nom'])) {
    DIC::service()->set('nom', $_GET['nom']);
  }
  if (isset($_GET['prenom'])) {
    DIC::service()->set('prenom', $_GET['prenom']);
  }
  if (isset($_GET['age'])) {
    DIC::service()->set('age', intval($_GET['age']));
  }
}

/*
  On récupère les données à afficher. Elles seront stockées dans le tableau
  $render auquel accedera la view
  */
$render = array(
  'nom' => DIC::service()->get('nom'),
  'prenom' => DIC::service()->get('prenom'),
  'age' => DIC::service()->get('age')
);


// echo DIC::service()->birthyear();
// echo DIC::service()->fullName();
// var_dump($_SESSION);
// var_dump($_COOKIE);

include('web/render.php');
