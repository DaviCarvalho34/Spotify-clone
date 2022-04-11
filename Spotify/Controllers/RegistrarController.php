<?php
  namespace Spotify\Controllers;

  ob_start();
  session_start();
 
  
  require 'C:\xampp\htdocs\js_projects\spotfy_flexbox'.'/vendor/autoload.php';
  use League\OAuth2\Client\Provider\Google;
  class RegistrarController
  {

    public function index()
    {
      $loader = new \Twig\Loader\FilesystemLoader('Spotify/Views/pages');
      $twig = new \Twig\Environment($loader);
      $template = $twig->load('cadastro.html');
  
      $parametros = array();
      $parametros['nome'] = 'davi';
  
      $conteudo = $template->render($parametros);
      echo $conteudo;

      if(isset($_POST['sign-up'])){
        $email = $_POST['email'];
        $email_confirm = $_POST['email_confirm'];
        $senha = $_POST['senha'];
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];

        switch($mes){
          case $mes='Janeiro':
            $mes=01;
        }

        $ano = $_POST['ano'];
        $sexo = $_POST['sexo'];

        $nascimento = array('dia'=>$dia,'mes'=>$mes,'ano'=>$ano);

        $date = new \DateTime(sprintf("%04d-%02d-%02d",$nascimento['ano'], $nascimento['mes'], 
        $nascimento['dia']));

        $data = $date->format('Y-m-d');
        var_dump($data);
        
        

        $usuario = $_POST['nome_perfil'];

        $pdo = \Spotify\MySql::connect();
        $registro = $pdo->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?)");
        $registro->execute(array($email,$senha,$usuario,$data,$sexo));
       

        
      }

      if(isset($_POST['botao-google'])){
        
        /**
        * AUTH GOOGLE
        */

        if (empty($_SESSION['userLogin'])){

        $google = new Google(
          [
            'clientId'     => '255810494098-c3cc65osq3b8btc8a9t96b04rp1p49o9.apps.googleusercontent.com',
            'clientSecret' => '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',
            'redirectUri'  => 'http://localhost/js_projects/spotfy_flexbox/registrar',
            
          ]
        );
        $authUrl = $google->getAuthorizationUrl();
        $error = filter_input(INPUT_GET,"error",FILTER_SANITIZE_STRING);
        $code = filter_input(INPUT_GET,"code",FILTER_SANITIZE_STRING); 

        

        if($code){
          
          $token = $google->getAccessToken("authorization_code", [
            "code" => $code
          ]);

          $_SESSION['userLogin'] = serialize($google->getResourceOwner($token));
          header("Location: ". $google["redirectUri"]);
               
          exit;
        }
          
        \Spotify\Utilidades::redirect($authUrl);
        header("Location: ". $google["redirectUri"]);

        }else{
          
          /**
           * @var Google $user
           */
          try{
             
            $user = unserialize($_SESSION['userLogin']);
            $senha = 'dsakldjlas';
            $data = '';
            $sexo = 'aaaa';
            //echo "<img width='120' src='{$user->getAvatar()}' alt='{$user->getFirstName()}' title='{$user->getFirstName()}'/><h1>bem-vindo(a) {$user->getFirstName()}</h1>";

          
            var_dump($user->getFirstName());
            
            $pdo = \Spotify\MySql::connect();
            $registro = $pdo->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?)");
            $registro->execute(array($user->getEmail(),$senha,$user->getFirstName(),$data,$sexo));
            \Spotify\Utilidades::redirect('finalizar');
            unset($_SESSION["userLogin"]);
          }catch(Exception $e){
            echo 'erro ao logar';
					  error_log($e->getMessage());
          }
          
          
         
          
          
        
        }
      }
    }

       /*
        var_dump($_POST);
        var_dump($str);
       */ 
      }

  

  ob_end_flush();
 

?>