/* global $*/
/* global Articles*/
$(document).ready(onHtmlLoaded);

function onHtmlLoaded() {
    $("#save_article").on("click", function() {
        var articleTitle = $("input[name='title']").val();
        var articleContent = $("textarea[name='content']").val();
        var articleCategory = $("select[name='category'").val();
        var articlePublished = $("input[type='radio']:checked").val();
        var imgFile = $("#img")[0].files[0];

        var articles = new Articles();
        var saveOperation = articles.save({
            title: articleTitle,
            content: articleContent,
            category_id: articleCategory,
            published: articlePublished,
            img: imgFile,
        });
        saveOperation.done(redirectUserToArticlesPage);
    });

    function redirectUserToArticlesPage() {
        window.location.href = "https://blog-andrei-4.c9users.io/articles";
    }
}
