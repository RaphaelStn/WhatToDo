// getting data from BookApi class and using then to transmit to Books class to use data.
window.$_GET = new URLSearchParams(location.search);
var id = $_GET.get('id');

let books = new BooksApi();
if(id != null) {
    let getBooks = books.initApi('https://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json?api-key=PxFAgpj2Q8LGP27Sv6tAtQit58G8V3EN&isbn=' + id).then((dataBooks) => {
        let bookHTML = document.querySelector(".container-book");
        let getId= new Books(bookHTML);
        getId.id(dataBooks);
    });
}
else {
    let getBooks = books.initApi('https://api.nytimes.com/svc/books/v3/lists/current/hardcover-fiction.json?api-key=PxFAgpj2Q8LGP27Sv6tAtQit58G8V3EN').then((dataBooks) => {
        let bookHTML = document.querySelector(".container-book");
        let getRandom = new Books(bookHTML);
        getRandom.random(dataBooks);
    });
}
