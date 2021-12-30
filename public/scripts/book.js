// getting data from BookApi class and using then to transmit to Books class to use data.
let books = new BooksApi()
let getBooks = books.initApi('https://api.nytimes.com/svc/books/v3/lists/current/hardcover-fiction.json?api-key=PxFAgpj2Q8LGP27Sv6tAtQit58G8V3EN').then((dataBooks) => {
    let bookHTML = document.querySelector(".container-book");
    let getTrending = new Books(bookHTML);
    getTrending.initTrending(dataBooks);
    let sliderBook = document.querySelector('.container-book');
    let createSliderBook = new Slider(sliderBook, 5000);
});