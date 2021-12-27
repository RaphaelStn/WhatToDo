let books = new BooksApi()
let getBooks = books.initApi().then((dataBooks) => {
    let bookHTML = document.querySelector(".container-book");
    let getTrending = new Books(bookHTML);
    getTrending.initTrending(dataBooks);
    let sliderBook = document.querySelector('.container-book');
    let createSliderBook = new Slider(sliderBook, 5000);
});