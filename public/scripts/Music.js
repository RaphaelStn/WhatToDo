class Music {
    constructor(dataMusic, musicHtml) {
        this.dataMusic = dataMusic.tracks;
        this.html = musicHtml;
        console.log(this.dataMusic);
        this.initTrending(this.dataMusic);
    }
    initTrending(dataMusic) {
        dataMusic.slice(0, 10).map((music) => {
            this.trending(music);
        });
    }
    trending(music) {
        this.poster = document.createElement('div');
        this.poster.className = 'poster';
        this.html.appendChild(this.poster);
        this.img = document.createElement('img');
        this.img.src = (music.images.background);
        this.poster.appendChild(this.img);
        this.name = document.createElement('p');
        this.name.textContent =  (music.subtitle)+  " - " + (music.title);
        this.poster.appendChild(this.name);
    }
}