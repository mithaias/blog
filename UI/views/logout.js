/*global $*/
/*global Logout*/
$(document).ready(onHtmlLoaded);

function onHtmlLoaded() {
    var logoutBtn = $("#logout_btn");
    var logoutModel;
    logoutBtn.on("click", function() {
        // var emailValue = $("[name='user_email']").val();
        // var passValue =$("[name='user_password']").val();
        
        logoutModel = new Logout({
           
        });
        var logoutReq = logoutModel.logOut();
        logoutReq.done(redirectUserToLoginPage);
    });
    function redirectUserToLoginPage() {
        
        if (logoutModel) {
             window.location.href = "https://blog-andrei-4.c9users.io/UI/pages/login.html";
        }
        else {
            alert ("logout failed");
        }
               

    }
}