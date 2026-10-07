function getAllPosts() {
    let url = 'https://jsonplaceholder.typicode.com/posts';
    let con = document.getElementsByClassName('console')[0];

    fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(myJson) {
        let jsonText = JSON.stringify(myJson);
        let myP = document.createElement('p');
        myP.innerHTML = jsonText;
        con.insertBefore(myP, con.firstChild);
    });
}

function getPostData() {
    let txt = document.getElementById('txt_post_id').value;
    let url = `https://jsonplaceholder.typicode.com/posts/${txt}`;
    let con = document.getElementsByClassName('console')[0];

    fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(myJson) {
        let jsonText = JSON.stringify(myJson);
        let myP = document.createElement('p');
        myP.innerHTML = jsonText;
        con.insertBefore(myP, con.firstChild);
    });
}

function getAllTasks() {
    let url = 'https://jsonplaceholder.typicode.com/todos';
    let con = document.getElementsByClassName('console')[0];

    fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(myJson) {
        let jsonText = JSON.stringify(myJson);
        let myP = document.createElement('p');
        myP.innerHTML = jsonText;
        con.insertBefore(myP, con.firstChild);
    });
}

function getCompletedTasks() {
    let url = 'https://jsonplaceholder.typicode.com/todos?completed=true';
    let con = document.getElementsByClassName('console')[0];

    fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(myJson) {
        let jsonText = JSON.stringify(myJson);
        let myP = document.createElement('p');
        myP.innerHTML = jsonText;
        con.insertBefore(myP, con.firstChild);
    });
}

function getAlbumCount() {
    let url = 'https://jsonplaceholder.typicode.com/albums';
    let con = document.getElementsByClassName('console')[0];

    fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(myJson) {
        let myP = document.createElement('p');
        myP.innerHTML = 'Número de álbuns: ' + myJson.length;
        con.insertBefore(myP, con.firstChild);
    });
}

function getFirstAlbumPicture() {
    let txt = document.getElementById('txt_album_id').value;
    let url = `https://jsonplaceholder.typicode.com/albums/${txt}/photos`;
    let con = document.getElementsByClassName('console')[0];

    fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(myJson) {
        let photo = myJson[0];
        let myImg = document.createElement('img');
        myImg.src = photo.url;
        
        let myP = document.createElement('p');
        myP.appendChild(myImg);
        con.insertBefore(myP, con.firstChild);
    });
}

function getAlbumData() {
    let txt = document.getElementById('txt_album_id').value;
    let url = `https://jsonplaceholder.typicode.com/albums/${txt}`;
    let con = document.getElementsByClassName('console')[0];

    fetch(url)
    .then(function(response) {
        return response.json();
    })
    .then(function(myJson) {
        let jsonText = JSON.stringify(myJson);
        let myP = document.createElement('p');
        myP.innerHTML = jsonText;
        con.insertBefore(myP, con.firstChild);
    });
}