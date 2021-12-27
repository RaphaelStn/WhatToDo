let books = new BooksApi()
let getBooks = books.initApi().then((dataBooks) => {
    let bookHTML = document.querySelector(".container-book");
    let getRandom = new Books(bookHTML);
    getRandom.random(dataBooks);
});