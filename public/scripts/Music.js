let music = new MusicApi()
let getMusic = music.initApi().then((dataMusic) => {
    let musicHtml = document.querySelector(".container-music");
    let getTrending = new Music(dataMusic, musicHtml);
    let sliderMusic = document.querySelector('.container-music');
    let createSliderMusic = new Slider(sliderMusic, 5000);
});