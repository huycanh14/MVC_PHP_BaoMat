console.log(1111)
var inputPass = $("#password-signup");
var inputSHA = $("#passwordsha1");
$("#password-signup").change(function () {
    console.log(inputPass.val());
    let val = inputPass.val();
    inputSHA.val(sha1(val));
    console.log(inputSHA.val());
});