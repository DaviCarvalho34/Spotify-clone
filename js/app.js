let musicas = [
  {titulo:'Sun-Killer', artista:'Spiritbox', source:'musicas/sun-killer.mp3'},
  {titulo:'Hurt-You', artista:'Spiritbox', source:'musicas/hurt-you.mp3'},
  {titulo:'Yellowjacket (feat. Sam Carter)', artista:'Spiritbox', source:'musicas/Yellowjacket (feat. Sam Carter).mp3'},
  {titulo:'The Summit', artista:'Spiritbox', source:'musicas/The-Summit.mp3'},  
  {titulo:'Secret Garden', artista:'Spiritbox', source:'musicas/Secret-Garden.mp3'},  
  {titulo:'Silk In The Strings', artista:'Spiritbox', source:'musicas/Silk-In-The-Strings.mp3'},  
  {titulo:'Holy Roller', artista:'Spiritbox', source:'musicas/Holy-Roller.mp3'},  
  {titulo:'eternal blue', artista:'Spiritbox', source:'musicas/eternal-blue.mp3'},  
  {titulo:'We Live In A Strange-World', artista:'Spiritbox', source:'musicas/We-Live-In-A-Strange-World.mp3'},  
  {titulo:'Halcyon', artista:'Spiritbox', source:'musicas/Halcyon.mp3'},  
  {titulo:'Circle With Me', artista:'Spiritbox', source:'musicas/Circle-With-Me.mp3'},  
  {titulo:'Constance', artista:'Spiritbox', source:'musicas/Constance.mp3'}  
];


let musica = document.querySelector('audio');
let musicaIndex = 0;
let tempoDecorrido = document.querySelector('.tempo .inicio');
tempoDecorrido.style.color = '#ddd3d3';
let duracaoMusica = document.querySelector('.tempo .final');
duracaoMusica.style.color = '#ddd3d3';
duracaoMusica.textContent = segundosParaMinutos(Math.floor(musica.duration));
let volumeController = document.querySelector('#volume');


let nomeMusica = document.querySelector('.descricao h4');
let nomeArtista = document.querySelector('.descricao span');

const inputSlider = document.querySelector('#volume');

inputSlider.oniput = (()=>{
  let value = inputSlider.value;
});

console.log(volume);
document.querySelector('.botao-play').addEventListener('click', tocarMusica);

document.querySelector('.botao-pause').addEventListener('click', pausarMusica);

musica.addEventListener('timeupdate', atualizarBarra);

volume.addEventListener('change',function(e){
  musica.volume = e.currentTarget.value / 100;
})

document.querySelector('.anterior').addEventListener('click', () => {
  musicaIndex--; 
  let tamanho = musicas.length;
  if (musicaIndex < 0){
      musicaIndex = tamanho;
  }
  renderizarMusica(musicaIndex);
});

document.querySelector('.proxima').addEventListener('click', () => {
  musicaIndex++;
  let tamanho = musicas.length;
  if (musicaIndex > tamanho){
      musicaIndex = 0;
  }
  renderizarMusica(musicaIndex);
  console.log(musica);
});

function renderizarMusica(musicaIndex){
  musica.setAttribute('src', musicas[musicaIndex].source);

  musica.addEventListener('loadeddata', () => {
      nomeMusica.textContent = musicas[musicaIndex].titulo;
      nomeArtista.textContent = musicas[musicaIndex].artista;
    
      duracaoMusica.textContent = segundosParaMinutos(Math.floor(musica.duration));
      musica.play();
      document.querySelector('.botao-pause').style.display = 'block';
  document.querySelector('.botao-play').style.display = 'none';
  })
  document.body.append(musica);
}


function tocarMusica(){
  musica.play();
  document.querySelector('.botao-pause').style.display = 'block';
  document.querySelector('.botao-play').style.display = 'none';
}

function pausarMusica(){
  musica.pause()
  document.querySelector('.botao-pause').style.display = 'none';
  document.querySelector('.botao-play').style.display = 'block';
}

function atualizarBarra(){
  let barra = document.querySelector('progress');
  barra.style.width = Math.floor((musica.currentTime / musica.duration) * 100) + '%';
  tempoDecorrido.textContent = segundosParaMinutos(Math.floor(musica.currentTime));
}

function segundosParaMinutos(segundos){
  let campoMinutos = Math.floor(segundos / 60);
  let campoSegundos = segundos % 60;
  if (campoSegundos < 10){
      campoSegundos = '0' + campoSegundos;
  }

  return campoMinutos+':'+campoSegundos;
}