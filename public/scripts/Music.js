class Music {
    constructor(dataMusic, musicHtml) {
        this.dataMusic = dataMusic.tracks;
        this.html = musicHtml;
        this.musicTrending = this.html.querySelector(".home-trending");
        console.log(this.dataMusic);
        this.initTrending(this.dataMusic);
    }
    initTrending(dataMusic) {
        dataMusic.slice(0, 4).map((music) => {
            this.trending(music);
        });
    }
    trending(music) {
        this.divTrending = document.createElement("div");
        this.divTrending.className="trending-container";
        this.musicTrending.appendChild(this.divTrending);
        this.img = document.createElement("img");
        this.img.className="trending-img";
        this.img.src = (music.images.background)
        this.divTrending.appendChild(this.img);
        this.name = document.createElement("p");
        this.name.textContent = (music.subtitle)+  " - " + (music.title);
        this.divTrending.appendChild(this.name);
    }
}