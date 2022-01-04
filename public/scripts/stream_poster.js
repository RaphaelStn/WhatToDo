window.$_GET = new URLSearchParams(location.search);
var id = $_GET.get('id');

console.log(favorite);
let streams = new Api();
if(id != null) {
    let getStreams = streams.initApi('https://api.twitch.tv/helix/streams?sort=views&language=en&user_id=' + id).then((dataStream) => {
        let streamHTML = document.querySelector(".container-stream");
        let getId= new Streams(streamHTML);
        getId.id(dataStream);
    });
}
else {
    let getStreams = streams.initApi('https://api.twitch.tv/helix/streams?sort=views&language=en').then((dataStream) => {
        let streamHTML = document.querySelector(".container-stream");
        let getRandom = new Streams(streamHTML);
        getRandom.random(dataStream);
    });
}