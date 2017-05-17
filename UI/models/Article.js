function Article(options) {
    this.id = options.id;
    this.title = options.title;
    this.category = options.category || "default topic";
    this.content = options.content;
    this.main_image_url = options.main_image_url;
    this.creation_date = options.creation_date || new Date();
}
Article.prototype.update = function(data) {
    //here we should save the data to the server
    //do an AJAX request or save it in the local storage

};

Article.prototype.save = function(articleData) {
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