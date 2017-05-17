/*global $*/
/*global Articles*/
$(document).ready(onHtmlLoaded);

function onHtmlLoaded() {
	var articles = new Articles();
	articles.getAll().done(function() {
		var container = $(".containerart");
		var maxLen = 200;

		for (var i = 0; i < articles.models.length; i++) {
			var articleElem = '<div>';
			if (articles.models[i].main_image_url && articles.models[i].main_image_url !== '') {
				articleElem += "<img class='img-responsive' style='width: 10%; float: left;' src='/uploads/" + articles.models[i].main_image_url + "'  alt='Article Image'>";
			}

			var str = articles.models[i].content;
			if (str.length > maxLen) {
				str = str.substr(0, maxLen) + "...";
			}

			articleElem +=
				// Title
				"<div class='col-sm-6'>" +
				"<h4 onclick='goToArticlePage(" + articles.models[i].id + ")'>" + articles.models[i].title + "</h4>" +
				"</div>" +

				// Creation Date
				"<h7>Published on " + articles.models[i].creation_date + "</h7>" +

				// Content
				"<div class='row '> <div class = 'col-sm-7 sm-margin-b-50'> <div class='margin-b-30'><p>" + str + "</p></div></div></div>" +

				// Redirect Button
				"<button onclick='goToArticlePage(" + articles.models[i].id +
				")' >View Article </button></div></br></br></br>";


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
