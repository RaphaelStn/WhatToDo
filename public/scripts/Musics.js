class Musics {
    constructor(MusicHTML) {
        this.html = MusicHTML;
    }
    initTrending(dataMusic) {
        dataMusic = dataMusic.results;
        dataMusic.slice(0, 10).map((musics) => {
            this.trending(musics);
        });
    }
    trending(musics) {
        //Creating the poster for each music in map()
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
        this.img.src = (musics.thumb); // 
        this.poster.appendChild(this.img);
        this.name = document.createElement('p');
        this.name.textContent =  musics.title
        this.poster.appendChild(this.name);
        this.link = document.createElement('a');
        this.link.href='index.php?p=music_poster&id=' + musics.id;
        this.link.className='more';
        this.link.textContent = 'See more >>';
        this.poster.appendChild(this.link);
    }
    random(dataMusics) {
        //Creating one poster from random array
        dataMusics = dataMusics.results;
        let music = dataMusics[Math.floor(Math.random()*dataMusics.length)];
        this.bigPoster = document.createElement('div');
        this.bigPoster.className = 'bigPosterMusic';
        this.html.appendChild(this.bigPoster);
        this.img = document.createElement('img');
        this.img.src = (music.thumb);
        this.bigPoster.appendChild(this.img);
        this.name = document.createElement('p');
        this.name.textContent =  music.title
        this.bigPoster.appendChild(this.name);
    }
    id(dataMusics) {
        let music = dataMusics.results;

        this.bigPoster = document.createElement('div');
        this.bigPoster.className = 'bigPosterMusic';
        this.html.appendChild(this.bigPoster);
        this.name = document.createElement('p');
        this.name.textContent =  music.title
        this.bigPoster.appendChild(this.name);
        this.desc = document.createElement('p');
        this.desc.textContent = music.description;
        this.bigPoster.appendChild(this.desc);
    }
}