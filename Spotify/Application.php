<?php

  namespace Spotify;
  
  class Application
  {
    private $controller;
    
    private function setApp()
    {

      
      $loadName = 'Spotify\Controllers\\';
      $url = $this->url() ? $this->url():[0];
      

      if($url[0] == ''){
        $loadName.='Home';
      }else{
        $loadName.=ucfirst(strtolower($url[0]));
      }

      $loadName.='Controller';

      if(file_exists($loadName.'.php')){
        $this->controller = new $loadName();
      }else{
        include('Views/pages/404.html');
        die();
      }    

    }

    public function run()
    {
      $this->setApp();
      $this->controller->index();
    }

    public function url()
  	{
    $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

    if(isset($url)){

      $url = trim(rtrim($url,"/"));
      $url = explode("/",$url);
      return $url;
    	}
  	}		

  }
  

?>
