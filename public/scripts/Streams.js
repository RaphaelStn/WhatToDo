class Streams {
    constructor(streamHTML) {
        this.HTML = streamHTML;
    }

    //Get trending streams and mapping it
    initStreams(dataStreams) {
        dataStreams = dataStreams.data;
        dataStreams.slice(0,4).map((stream) => {
            this.streamings(stream);
        });
    }
    streamings(stream) {
        this.iframe = document.createElement('iframe');
        this.iframe.src = 'https://player.twitch.tv/?channel=' + stream.user_login + '&parent=whattodo.raphael-stacino.fr&autoplay=false';
        this.iframe.width = '640';
        this.iframe.height = '360';
        this.HTML.appendChild(this.iframe);
    }
}