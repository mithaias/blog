/*global $*/
function Login(options) {
    this.email = options.email;
    this.pass = options.pass;
}


Login.prototype.signIn = function(){;
    var that=this;
    var config = {
        url: "https://blog-andrei-4.c9users.io/login",
        method: "POST",
        data:{
            email:this.email,
            pass:this.pass
        },
        dataType: "json",
        success: function(resp){
            if (resp) {
            that.isLogged = resp.isLogged || false;
            }
            console.log("succes");
        },
        error: function(xhr, status, error) {
            alert("Oops!Something is wrong " + error);
        },
        complete: function(){
            console.log("The request is complete");
        }
    };
    return $.ajax(config);
};

function Logout() {
    
}


Logout.prototype.logOut = function(){ 
        var config = {
            url: "https://blog-andrei-4.c9users.io/logout",
            method: "GET",
            // dataType:"json",
            success: function(resp) {
                
                console.log("logout success");
            },
            
            error: function() {
                console.log("logout fail");
            }
        };
        return $.ajax(config);
};