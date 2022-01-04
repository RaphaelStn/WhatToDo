let streams = new Api();
let getStreams = streams.initApi('https://api.twitch.tv/helix/streams?sort=views&language=en').then((dataStreams) => {
    let streamHTML = document.querySelector('.container-stream');
    let getTop = new Streams(streamHTML);
    getTop.initTrending(dataStreams);
});

//Creating the other sliders
let sliderMovie = document.querySelector('.container-movie');
let createSliderMovie = new Slider(sliderMovie, 5000);

let sliderShow = document.querySelector('.container-show');
let createSliderShow = new Slider(sliderShow, 5000);

let sliderGame = document.querySelector('.container-game');
let createSliderGame = new Slider(sliderGame, 5000);