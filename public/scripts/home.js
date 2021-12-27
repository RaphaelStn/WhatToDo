// scripts for home page setting sliders

let music = new MusicApi()
let getMusic = music.initApi().then((dataMusic) => {
    let musicHtml = document.querySelector(".container-music");
    let getTrending = new Music(dataMusic, musicHtml);
    let sliderMusic = document.querySelector('.container-music');
    let createSliderMusic = new Slider(sliderMusic, 5000);
});

let sliderMovie = document.querySelector('.container-movie');
let createSliderMovie = new Slider(sliderMovie, 5000);

let sliderShow = document.querySelector('.container-show');
let createSliderShow = new Slider(sliderShow, 5000);

let sliderGame = document.querySelector('.container-game');
let createSliderGame = new Slider(sliderGame, 5000);


