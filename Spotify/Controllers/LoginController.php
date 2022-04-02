<?php
  namespace Spotify\Controllers;
  class LoginController
  {

    public function index()
    {
      $loader = new \Twig\Loader\FilesystemLoader('Spotify/Views/pages');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('login.html');
  
      $parametros = array();
      $parametros['nome'] = 'davi';
  
      $conteudo = $template->render($parametros);
      echo $conteudo;

      if(isset($_POST['inscrever-se'])){
        \Spotify\Utilidades::redirect(INCLUDE_PATH.'registrar');
      }
    }

  }

?>