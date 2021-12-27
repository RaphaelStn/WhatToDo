class BooksApi {
    constructor() {
        this.books = null;
    }
    async initApi() {
        let thisData = new Promise(function(done, fail) { //**** */
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://api.nytimes.com/svc/books/v3/lists/current/hardcover-fiction.json?api-key=PxFAgpj2Q8LGP27Sv6tAtQit58G8V3EN",
                "method": "GET",
            };
            $.get(settings, function(dataPromise) {
                if (dataPromise) {
                    this.books = dataPromise;
                    return done(dataPromise);
                }else {
                    return fail(err);
                }
            })
        });
        return thisData;
    }
}