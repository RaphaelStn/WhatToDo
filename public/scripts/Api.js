class Api {
    constructor() {
        this.data = null;
    }
    //async function to get API and return data in promise
    async initApi(url) {
        let thisDatas = new Promise(function(done, fail) {
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": url,
                "method": "GET",
                "headers": {
                "Authorization" : "Bearer qs1xl0ehjmi0h8xhyt5jvrvt47ryyf",
                "Client-Id": "mzqtjchpz6918rvs2dkx3dat9tk48x"
                }
            };
            $.get(settings, function(dataPromise) {
                if (dataPromise) {
                    this.data = dataPromise;
                    return done(dataPromise);
                }else {
                    return fail(err);
                }
            })
        });
        return thisDatas;
    }
}