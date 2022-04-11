<?php
  namespace Spotify\Controllers;
  use League\OAuth2\Client\Provider\Google;

  class FinalizarController extends RegistrarController
  {
    
    public function index()
    {
      
      //Renderiza a home do usuário
      $loader = new \Twig\Loader\FilesystemLoader('Spotify/Views/pages');
			$twig = new \Twig\Environment($loader);
			$template = $twig->load('finalizar.html');

			$parametros = array();
			$parametros['nome'] = 'davi';

			$conteudo = $template->render($parametros);
			echo $conteudo;

     
      
      if(isset($_POST['sair'])){
        unset($_SESSION["userLogin"]);
        \Spotify\Utilidades::redirect('registrar');
      }

      
    }

  }

?>