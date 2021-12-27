class MusicApi {
    constructor() {
        this.musics = null;
    }
    async initApi() {
        let thisData = new Promise(function(done, fail) { //**** */
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://shazam.p.rapidapi.com/charts/track?locale=en-US&pageSize=20&startFrom=0",
                "method": "GET",
                "headers": {
                    "x-rapidapi-host": "shazam.p.rapidapi.com",
                    "x-rapidapi-key": "9d78055c7bmsh82197a400774c26p1af9e3jsn07b3c02404ca"
                }
            };
            $.get(settings, function(dataPromise) {
                if (dataPromise) {
                    this.musics = dataPromise;
                    return done(dataPromise);
                }else {
                    return fail(err);
                }
            })
        });
        return thisData;
    }

}