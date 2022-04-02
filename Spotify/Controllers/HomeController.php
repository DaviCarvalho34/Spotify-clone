<?php
  namespace Spotify\Controllers;
  
  class HomeController
  {
    
    public function index()
    {
      if(isset($_SESSION['login'])){
        //Renderiza a home do usuário
        $loader = new \Twig\Loader\FilesystemLoader('Spotify/Views/pages');
				$twig = new \Twig\Environment($loader);
				$template = $twig->load('home.html');

				$parametros = array();
				$parametros['nome'] = 'davi';

				$conteudo = $template->render($parametros);
				echo $conteudo;
      }else{
        //Rendeerizar para criar conta
        \Spotify\Controllers\LoginController::index();
      }
    }

  }

?>