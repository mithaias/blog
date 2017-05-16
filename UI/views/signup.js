/* global $ */
/* global Signup */

$(document).ready(onHtmlLoaded);

function onHtmlLoaded() {
    var signupBtn = $("#signup_btn");
    var signupModel;
    signupBtn.on("click", function() {
        var firstNameValue = $("input[name='firstName']").val();
        var lastNameValue = $("input[name='lastName']").val();
        var emailValue = $("input[name='email']").val();
        var passValue =$("input[name='pass']").val();
        var repassValue =$("input[name='repass']").val();
        var genderValue = $("input[type='radio']:checked").val();
        var ageValue =$("input[name='age']").val();
        var nickNameValue = $("input[name='nickName']").val();
        // var imgFile = $("input[name='image']")[0].files[0];
    
            signupModel = new Signup();
        var signupReq = signupModel.signUp({
            firstName: firstNameValue,
            lastName: lastNameValue,
            email: emailValue,
            pass: passValue,
            repass: repassValue,
            gender: genderValue,
            age: ageValue,
            nickName: nickNameValue,
            // image: imgFile
        });
      
        signupReq.done(function(resp){
            redirectUserToHomepage();
        });
    });

    function redirectUserToHomepage() {
        
      if (signupModel.isCreated) {
             window.location.href = "https://web9-auxentiu.c9users.io/blog/UI/pages/login.html";
      }
      else {
          console.log (signupModel.isCreated);
             alert("Account creation failed");
        }
    }
}