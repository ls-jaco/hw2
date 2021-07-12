function onResponse(response) {
    return response.json();
}

function onTokenJson(json) {
    // Imposta il token global
    token = json.access_token;
}

function onTokenResponse(response) {
    return response.json();
}

// OAuth credentials --- NON SICURO!
const client_id = "a3d490c5fd084afe820e482860e3c59e";
const client_secret = "1bee37a7a4f3468f9e0c1f18ec16ad27";

// Dichiara variabile token
let token;

// All'apertura della pagina, richiediamo il token
fetch("https://accounts.spotify.com/api/token", {
    method: "post",
    body: "grant_type=client_credentials",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
        Authorization: "Basic " + btoa(client_id + ":" + client_secret),
    },
})
    .then(onTokenResponse)
    .then(onTokenJson)
    .then(searchItemFromSpotify);

function searchItemFromSpotify() {
    let song_wrapper = document.getElementsByClassName("song_wrapper");

    for (let element of song_wrapper) {
        let titoloBrano = element.getElementsByClassName("titolo_brano")[0];
        let copiaTitolo = titoloBrano.innerText;
        let titoloEncoded = encodeURI(copiaTitolo);
        titoloEncoded = titoloEncoded.toLowerCase();

        let urlAlbum =
            "https://api.spotify.com/v1/search?q=" +
            titoloEncoded +
            "&type=track&market=IT&limit=10";

        fetch(urlAlbum, {
            headers: {
                Authorization: "Bearer " + token,
            },
        }).then((response) => {
            response.json().then((json) => {
                let titolo_album =
                    element.getElementsByClassName("titolo_album")[0];
                let audio = element.getElementsByClassName("audio")[0];

                let item = json.tracks.items;
                item.forEach((result) => {
                    if (result.album.name == titolo_album.innerText) {
                        let preview_url = result.preview_url;
                        audio.src = preview_url;
                        audio.load();
                    }
                });
            });
        });
    }
}

function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchbar");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
