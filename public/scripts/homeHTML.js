// getting data from BookApi class and using then to transmit to Books class to use data.
let books = new BooksApi()
let getBooks = books.initApi().then((dataBooks) => {
    let bookHTML = document.querySelector(".container-book");
    let getTrending = new Books(bookHTML);
    getTrending.initTrending(dataBooks);
    //Creating the slider books
    let sliderBook = document.querySelector('.container-book');
    let createSliderBook = new Slider(sliderBook, 5000);
});
//Creating the other sliders
let sliderMovie = document.querySelector('.container-movie');
let createSliderMovie = new Slider(sliderMovie, 5000);

let sliderShow = document.querySelector('.container-show');
let createSliderShow = new Slider(sliderShow, 5000);

let sliderGame = document.querySelector('.container-game');
let createSliderGame = new Slider(sliderGame, 5000);