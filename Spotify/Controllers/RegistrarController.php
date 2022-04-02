<?php
 
  namespace Spotify\Controllers;
  require 'C:\xampp\htdocs\js_projects\spotfy_flexbox'.'/vendor/autoload.php';
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

      if(isset($_POST['registrar'])){
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

        $data = $date->format('Y-m-d H:i:s');
        
        

        $usuario = $_POST['nome_perfil'];

        $pdo = \Spotify\MySql::connect();
        $registro = $pdo->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?)");
        $registro->execute(array($email,$senha,$usuario,$data,$sexo));
        var_dump($str);

        
      }
       /*
        var_dump($_POST);
        var_dump($str);
       */ 
      }

  }

?>