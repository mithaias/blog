/*global $*/
/*global Articles*/
$(document).ready(onHtmlLoaded);
//always check if HTML is loaded before doing anything
//HTML operaations on view
function onHtmlLoaded() {

    function getUrlParam(name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results == null) {
            return null;
        }
        else {
            return results[1] || 0;
        }
    }
    var artId = getUrlParam("id");
    var articles = new Articles();
    articles.getAll().done(function() {
        for (var i = 0; i < articles.models.length; i++) {
            if (articles.models[i].id == artId) {
                var imgSrc = articles.models[i].main_image_url;
                var container = $(".article");

                var articleElem = '<div>';
                if (imgSrc && imgSrc !== '') {
                    articleElem += "<img src='/uploads/" + articles.models[i].main_image_url + "' >";
                }

                articleElem += "<h1 class='articleTitle'>" + articles.models[i].title + "</h1> <li>" + articles.models[i].creation_date + "</li> </br> <p class='articleContent'>" + articles.models[i].content + "</p></div> <h2></h2>";
                //	articleElem.html(articles.models[i].title)

                //articleElem.on("click", goToArticlePage);
                container.append(articleElem);
                console.log(articles.models[i]);
            }
            else {
                console.log("success");
            }
        }
    });
}
