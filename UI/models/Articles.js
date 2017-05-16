/* global $ */
function Articles(){
	this.models = [];
}

Articles.prototype.getAll = function() {
        var that=this;
        var config = {
            url: "/api/articles",
            method: "GET",
            success: function(resp) {
			            $.each(resp, function(i, articles){
			            var articleById = new Articles();
				        that.models.push(articles);
			        });
	        },
	       error: function(){
			        console.log("Something went wrong!");
	        }
	    };
	return $.ajax(config);
};

Articles.prototype.removeArticle = function(articleId) {
	//here we will search for article model by id
	//and we remove it from models array and from 
	//server/localStorage
};

Articles.prototype.save = function(articleData) {
	var userId = sessionStorage.getItem("userId");
	var formData = new FormData();
	formData.append("main_image_url",articleData.img);
	formData.append("title", articleData.title);
	formData.append("content", articleData.content);
	formData.append("userId", userId);
	formData.append("category_id", articleData.category_id);
    formData.append("published", articleData.published);
        var config = {
            url: "/api/articles/add",
            method: "POST",
            data: formData,

            processData: false,
            contentType: false,
            success: function(resp) {
                console.log ("succes");
            },
            
        error: function(xhr, status, error) {
            alert("Oops!Something is wrong " + error);
        },
        };
        return $.ajax(config);
};