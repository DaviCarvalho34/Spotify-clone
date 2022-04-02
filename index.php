<?php
  require('vendor/autoload.php');
  
  //session_start();

  define('INCLUDE_PATH_STATIC','http://localhost/js_projects/spotfy_flexbox/Spotify/Views/Pages/');
  define('INCLUDE_PATH','http://localhost/js_projects/spotfy_flexbox/');

  $app = new Spotify\Application();

  $app->run();
?>