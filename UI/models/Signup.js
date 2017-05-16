/*global $*/
function Signup() {
  this.models = [];
}
Signup.prototype.signUp = function(credentials){
    var that=this;
    var formData = new FormData();
    formData.append("firstName", credentials.firstName);
    formData.append("lastName", credentials.lastName);
    formData.append("email", credentials.email);
    formData.append("pass", credentials.pass);
    formData.append("repass", credentials.repass);
    formData.append("gender", credentials.gender);
    formData.append("age", credentials.age);
    formData.append("nickName", credentials.nickName);
    formData.append("image", credentials.image);
    console.log (credentials);
    var config = {
        url: "https://blog-andrei-4.c9users.io/signup",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,    
        dataType: "json",
       success: function(resp){
            if (resp) {
                if (resp.error){
                   // alert ("Check network for response! Fixing the error in progress.");
                   console.log("error in resp");
                    that.isCreated = false;
                } else {
                    that.isCreated = true;
                }
            }
            
        },
        error: function(xhr, status, error) {
            alert("Oops!Something is wrong " + xhr.responseText);
        },
        complete: function(){
            console.log("The request is complete");
        }
    };
    return $.ajax(config);
};
