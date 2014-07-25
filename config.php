<?php

/*
  La fonction conf() retourne la configuration.
  La valeur à l'index 'service.user.dao.class' peut varier entre
  'DAOUserCookie' et 'DAOUserSession'
  */
function conf() {
  return array(
    'service.user.class' => 'ServiceUser',
    'service.user.dao.class' => 'DAOUserCookie'
  );
}
