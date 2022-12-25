window.onload = function() {
    render();
};

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}

function phoneAuth() {
    var x = document.getElementById("verification-Div");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }

    var number = document.getElementById('Phone').value;
    number = "+92"+number[1]+number[2]+number[3]+number[4]+number[5]+number[6]+number[7]+number[8]+number[9]+number[10];
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        console.log(coderesult);
        alert("OTP sent");
    }).catch(function(error) {
        alert(error.message);
    });
}

function codeverify() {
    var code = document.getElementById('verificationCode').value;


    coderesult.confirm(code).then(function(result) {
        
        var number = document.getElementById('Name').value;
        var email = document.getElementById('Email').value;
        var phone = document.getElementById('Phone').value;
        var password = document.getElementById('Password').value;

        $.ajax({
            type: "POST",
            url: "request/_signup.php",
            data: {number:number,email:email,phone:phone,password:password},
            dataType: "json",
            encode: true,
        }).done(function (data) {
            if(data == 1){
                alert("Verification successful!");
            }else{
                alert("Creation failed!");
            }
        });

        var user = result.user;
        console.log(user);

        // window.onload = setTimeout(function(){
        //     window.location = 'dashboard.php';
        // }, 2000);

    }).catch(function(error) {
        alert("OTP is not valid!");
    });
}