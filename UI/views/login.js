/*global $*/
/*global Login*/
$(document).ready(onHtmlLoaded);

function onHtmlLoaded() {
    function login() {
        var loginBtn = $("#login_btn");
        var loginModel;
        loginBtn.on("click", function() {
            var emailValue = $("[name='user_email']").val();
            var passValue = $("[name='user_password']").val();

            loginModel = new Login({
                email: emailValue,
                pass: passValue
            });
            var loginReq = loginModel.signIn();
            loginReq.done(redirectUserToArticlesPage);
        });

        function redirectUserToArticlesPage() {

            if (loginModel.isLogged) {
                window.location.href = "https://blog-andrei-4.c9users.io/articles";
            }
            else {
                alert("login failed");
            }
        }
    }
}
