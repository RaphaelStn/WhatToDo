let music = new MusicApi()
let getMusic = music.initApi().then((dataMusic) => {
    let musicHtml = document.querySelector(".home-music");
    let getTrending = new Music(dataMusic, musicHtml);
});