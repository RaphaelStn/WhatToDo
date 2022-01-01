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
        //Creating the poster for each book in map()
        this.poster = document.createElement('div');
        this.poster.className = 'poster';
        this.html.appendChild(this.poster);
        this.likeBtn = document.createElement('div');
		this.likeBtn.innerHTML = "<i class='far fa-heart'></i>";
		this.likeBtn.className = "favorite";
		this.likeBtn.addEventListener('click', _ => {
			this.liked();
		})
		this.poster.appendChild(this.likeBtn);
        this.img = document.createElement('img');
        this.img.src = (books.book_image);
        this.poster.appendChild(this.img);
        this.name = document.createElement('p');
        this.name.textContent =  books.title.toLowerCase() + ' - ' + books.author
        this.poster.appendChild(this.name);
        this.link = document.createElement('a');
        this.link.href='index.php?p=book_poster&id=' + books.isbns[1].isbn13;
        this.link.className='more';
        this.link.textContent = 'See more >>';
        this.poster.appendChild(this.link);
    }
    random(dataBooks) {
        //Creating one poster from random array
        dataBooks = dataBooks.results.books;
        let book = dataBooks[Math.floor(Math.random()*dataBooks.length)];
        this.bigPoster = document.createElement('div');
        this.bigPoster.className = 'bigPosterBook';
        this.html.appendChild(this.bigPoster);
        this.img = document.createElement('img');
        this.img.src = (book.book_image);
        this.bigPoster.appendChild(this.img);
        this.name = document.createElement('p');
        this.name.textContent =  book.title.toLowerCase() + ' - ' + book.author;
        this.bigPoster.appendChild(this.name);
    }
    id(dataBooks) {
        let book = dataBooks.results[0];

        this.bigPoster = document.createElement('div');
        this.bigPoster.className = 'bigPosterBook';
        this.html.appendChild(this.bigPoster);
        this.name = document.createElement('p');
        this.name.textContent =  book.title.toLowerCase() + ' - ' + book.author
        this.bigPoster.appendChild(this.name);
        this.desc = document.createElement('p');
        this.desc.textContent = book.description;
        this.bigPoster.appendChild(this.desc);
    }
}