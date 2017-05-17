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

                articleElem +=
                    // Title
                    "<h1 class='articleTitle'>" + articles.models[i].title + "</h1>" +

                    //Creation Date
                    "<h6>Published on " + articles.models[i].creation_date + "</h6>" +

                    // Article Content
                    "<div class='row '> <div class = 'col-sm-7 sm-margin-b-50'> <div class='margin-b-30'><p>" + articles.models[i].content + "</p></div> </div> </div>";

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
