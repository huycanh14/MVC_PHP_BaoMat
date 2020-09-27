var inputPass = $("#password-signup");
var inputSHA = $("#passwordsha1");
var inputPasswordLogin = $("#password-login");
var inputPasswordSHALogin = $("#passwordsha-login");

$("#password-signup").change(function () {
    let val = inputPass.val();
    inputSHA.val(sha1(val));
});


$("#password-login").change(function () {
    let val = inputPasswordLogin.val();
    inputPasswordSHALogin.val(sha1(val));
    // console.log(inputPasswordSHALogin.val());
})