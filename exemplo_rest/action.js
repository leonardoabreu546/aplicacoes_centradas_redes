function getAllPosts()
{
    let url=fetch('https://jsonplaceholder.typicode.com/posts')
    let con = document.getElementeryByClassName('container')[0]
    fetch(url)
    .then(function(response){
        return response.json()
    })
    .then(function(myJson){
        let jsonText = JSON.stringify(myJson)
        let jsonObj = JSON.parse(jsonText)
        let myP = document.createElement('p')
        myP.innerHTML = json.jsonText
        
        // Process the data
    })
}

function getPostData()
{
    //ex2
}

function getAllTasks()
{
    //ex3
}

function getCompletedTasks()
{
    //ex4
}

function getAlbumCount()
{
    //ex5
}

function getFirstAlbumPicture()
{
    //ex6
}

function getAlbumData()
{
    //ex7
}


