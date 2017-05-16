/*global $*/
/*global Articles*/
$(document).ready(onHtmlLoaded);

function onHtmlLoaded() {
	var articles = new Articles();
	articles.getAll().done(function() {
		var container = $(".containerart");

		for (var i = 0; i < articles.models.length; i++) {
			var articleElem = '<div>';
			if (articles.models[i].main_image_url && articles.models[i].main_image_url !== '') {
				articleElem += "<img src='/uploads/" + articles.models[i].main_image_url + "' >";
			}

			articleElem += "<a onclick='goToArticlePage(" + articles.models[i].id + ")'>" + articles.models[i].title + "</a> <li>" + articles.models[i].creation_date + "</li> </br> <p>" + articles.models[i].content + "</p><button onclick='goToArticlePage(" + articles.models[i].id + ")' >View Article </button></div> <h2></h2>";
			//	articleElem.html(articles.models[i].title)

			//articleElem.on("click", goToArticlePage);
			container.append(articleElem);
			console.log(articles.models[i]);
		}
	});
}

function goToArticlePage(artId) {
	window.location.href = "/article?id=" + artId;
}
