<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/40f6c6ef52.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;1,100&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <header class="sidebar">
    <div class="logo-sidebar"> 
      <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_RGB_White.png">
    </div>

    <div class="sidebar-columns">
      <div class="sidebar-top">
        <ul>
          <li><a href=""><i class="fas fa-home"></i>Home</a></li>
          <li><a href=""><i class="fa-solid fa-magnifying-glass"></i>Buscar</a></li>
          <li><a href=""><i class="fa-brands fa-napster"></i>Suas Músicas</a></li>
        </ul>
      </div><!--Sidebar Top-->
      <div class="sidebar-middle">
        <ul>
          <li><a href="#"><i class="fa-solid fa-plus"></i>Criar playlist</a></li>
          <li><a href="#"><i class="fa-brands fa-gratipay fav"></i>Musicas Curtidas</a></li>
        </ul>
      </div><!--Sidebar middle-->
    </div><!--Sidebar Columns-->
   
  </header><!--Sidebar-->

  <main>
    <section class="album-content">
      <div class="header-content">
        <div class="back-go">
          <a><i class="fas fa-chevron-left"></i></a>
          <a><i class="fas fa-chevron-right"></i></a>
        </div>
        <div class="profile">
          <div class="profile-box">
            <img src="assets/foto_perfil.jpg">
            <span>Davi Carvalho</span>
            <i class="fa-solid fa-chevron-down"></i>
          </div>         
        </div>
      </div><!--header content-->
      <div class="album-container">
          <img src="https://www.tenhomaisdiscosqueamigos.com/wp-content/uploads/2021/09/spiritbox-eternal-blue.jpeg">
          <div class="descricao-album">
            <span class="album">Álbum</span>
            <h3>Eternal Blue</h3>
            <div class="band">
              <img src="https://www.tenhomaisdiscosqueamigos.com/wp-content/uploads/2021/09/spiritbox-banda-foto.jpg">
              <span class="artista">Spiritbox</span>
            </div>           
          </div>        
      </div>
    </section><!--Content-->
    
    <section class="lista">     
      <div class="buttons-top">
        <i class="fas fa-play-circle button-top"></i>
        <i class="fa-solid fa-heart fav"></i>
        <i class="fa-solid fa-ellipsis options"></i>
      </div>
      
      <div class="lista-musicas">
        <div class="cabecalho">
          <div class="sub-div">
            <div class="titulo">
              <ul>
                <li>#</li>
              </ul>
              <ul>
                <li>TÍTULO</li>
              </ul>
            </div>
            <div class="clock">
              <i class="fa-solid fa-clock"></i>
            </div>  
          </div>        
        </div>
      <hr>
            <?php 
              $musicas = array(1=>"Sun Killer" ,2=>"Hurt You" ,"Musica" ,3=>"Yellowjacket (feat. Sam Carter)" ,"The Summit","Secret Garden","Silk in Strings","Holy Roller","Eternal Blue","We Live In A Strange World", "Halcyon", "Circle With Me", "Constance");

              foreach($musicas as $musica=>$value){;
            ?>
            <div class="musica">
              <div class="sub-div">
                <div class="titulo">
                  <ul class="indice">
                    <li><?php echo $musica; ?></li>
                  </ul>
                  <ul>
                    <li class="musica1">
                      <h3><?php echo $value; ?></h3>
                      <span>Spiritbox</span>
                    </li>
                  </ul>
                </div>
                <div class="clock">
                  <span>3:40</span>
                </div>  
              </div>        
            </div>

              <?php }?>
             
            </table>

            

          <div class="clock">
            
          </div>  
        </div>        
      </div>
    </section>
  </main>

  <section class="player">

    <div class="dados-musica">
      <img src="https://www.tenhomaisdiscosqueamigos.com/wp-content/uploads/2021/09/spiritbox-eternal-blue.jpeg">
      <div class="descricao">
        <h4>Sun-Killer</h4>
        <span>Spiritbox</span>
      </div>
      <div class="icone">
        <i class="fa-solid fa-heart"></i>
      </div>
    </div>

    <div class="reprodutor">
      <div class="buttons">
        <ul class="options">
          <li>
            <i class="fa-solid fa-repeat repeat"></i>
          </li>
          <li>
            <i class="fas fa-step-backward setas anterior"></i>
          </li>
          <li>
            <i class="fas fa-play-circle botao-play"></i>
            <i class="fas fa-pause-circle botao-pause"></i>
          </li>
         
          <li>
            <i class="fas fa-step-forward setas proxima"></i>
          </li>
          <li>
            <i class="fa-solid fa-arrow-rotate-left repeat"></i>
          </li>
        </ul>     
      </div>   
  
      
      <div class="tempo">
        <div class="inicio"><p>0:00</p></div>
        <div class="final"><p>3:40</p></div>
      </div>    
      <div class="barra">   
                  
          <progress value="0" max="1"></progress>
          <div class="ponto"></div>            
      </div>
    </div>

    <div class="volumes">
      <ul>
        <li>
          <i class="fa-solid fa-volume-xmark mudo"></i>
          <i class="fa-solid fa-volume-low baixo"></i>
          <i class="fa-regular fa-volume normal"></i>
          <i class="fa-solid fa-volume-high alto"></i>
        </li>
      </ul>
      <div class="barra volume">                   
        <progress value="0" max="1"></progress>
        <div class="ponto"></div>            
    </div>
    </div>  
  </section>
  <audio src="musicas/sun-killer.mp3"></audio>
  <script src="js/app.js"></script>
</body>
</html>