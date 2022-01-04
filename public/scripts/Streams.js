class Streams {
    constructor(streamHTML) {
        this.HTML = streamHTML;
    }

    //Get trending streams and mapping it
    initTrending(dataStreams) {
        dataStreams = dataStreams.data;
        dataStreams.slice(0,10).map((stream) => {
            this.trending(stream);
        });
    }
    trending(stream) {
        this.poster = document.createElement('div');
        this.poster.className = 'poster';
        this.HTML.appendChild(this.poster);

        //Creating the link on the img
        this.link = document.createElement('a');
        this.link.href='index.php?p=stream_poster&id=' + stream.user_id;
        this.link.className='more';
        this.poster.appendChild(this.link);
        this.img = document.createElement('img');
        let thumbnail = stream.thumbnail_url;
        let widthRegex = /\{width\}/i;
        let heightRegex = /\{height\}/i;
        thumbnail = thumbnail.replace(widthRegex, '240');
        thumbnail = thumbnail.replace(heightRegex, '240');
        this.img.src = (thumbnail); 
        this.link.appendChild(this.img);

        //Generating the title
        this.name = document.createElement('p');
        this.name.textContent =  stream.title
        this.poster.appendChild(this.name);

    }
    id(dataStream) {
        let stream = dataStream.data;
        stream = stream[0];
        this.bigPoster = document.createElement('div');
        this.bigPoster.className = 'bigPosterStream';
        this.HTML.appendChild(this.bigPoster);

        //Generating the img
        this.img = document.createElement('img');
        let thumbnail = stream.thumbnail_url;
        let widthRegex = /\{width\}/i;
        let heightRegex = /\{height\}/i;
        thumbnail = thumbnail.replace(widthRegex, '340');
        thumbnail = thumbnail.replace(heightRegex, '220');
        this.img.src = (thumbnail); 
        this.bigPoster.appendChild(this.img);

        //Generating the title
        this.name = document.createElement('p');
        this.name.textContent =  stream.title
        this.bigPoster.appendChild(this.name);

    }
    random(dataStream) {
        dataStream = dataStream.data;
        let stream = dataStream[Math.floor(Math.random()*dataStream.length)];
        this.bigPoster = document.createElement('div');
        this.bigPoster.className = 'bigPosterStream';
        this.HTML.appendChild(this.bigPoster);

        //Generating the img
        this.img = document.createElement('img');
        let thumbnail = stream.thumbnail_url;
        let widthRegex = /\{width\}/i;
        let heightRegex = /\{height\}/i;
        thumbnail = thumbnail.replace(widthRegex, '340');
        thumbnail = thumbnail.replace(heightRegex, '220');
        this.img.src = (thumbnail); 
        this.bigPoster.appendChild(this.img);

        //Generating the title
        this.name = document.createElement('p');
        this.name.textContent =  stream.title
        this.bigPoster.appendChild(this.name);
    }
}