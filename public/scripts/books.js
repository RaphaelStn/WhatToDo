class Books {
    constructor(bookHTML) {
        this.html = bookHTML;
    }
    initTrending(dataBooks) {
        dataBooks = dataBooks.results.books;
        dataBooks.slice(0, 10).map((books) => {
            this.trending(books);
        });
    }
    trending(books) {
        this.poster = document.createElement('div');
        this.poster.className = 'poster';
        this.html.appendChild(this.poster);
        this.img = document.createElement('img');
        this.img.src = (books.book_image);
        this.poster.appendChild(this.img);
        this.name = document.createElement('p');
        this.name.textContent =  (books.title.toLowerCase()) + ' - ' + (books.author)
        this.poster.appendChild(this.name);
    }
    random(dataBooks) {
        dataBooks = dataBooks.results.books;
        let book = dataBooks[Math.floor(Math.random()*dataBooks.length)];
        console.log(book);
        this.bigPoster = document.createElement('div');
        this.bigPoster.className = 'bigPosterBook';
        this.html.appendChild(this.bigPoster);
        this.img = document.createElement('img');
        this.img.src = (book.book_image);
        this.bigPoster.appendChild(this.img);
        this.name = document.createElement('p');
        this.name.textContent =  (book.title.toLowerCase()) + ' - ' + (book.author)
        this.bigPoster.appendChild(this.name);

    }
}