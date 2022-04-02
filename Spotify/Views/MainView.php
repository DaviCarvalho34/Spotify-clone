<?php
  namespace Spotify\Views;
  class MainView
  {
    public static function render($filename)
    {
      include('pages/'.$filename.'.html');
    }
  }

?>