var pas1 = '0 0';
var regExPass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^\w\s]).{6,}/;
function acept_pasFun(password) {
    if (password.value.search(regExPass) != -1) {
        password.style = 'border-bottom: 2px solid #9ACD32;';
    }
    else {
        password.style = 'border-bottom: 2px solid #B22222;';
    }
    pas1 = password.value;
}
function acept_pas2Fun(password2) {
    if (password2.value === pas1) {
        password2.style = 'border-bottom: 2px solid #9ACD32;';
    }
    else {
        password2.style = 'border-bottom: 2px solid #B22222;';
    }
}
var regExEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]+)$/;
function emailFun(email) {
    if (email.value.search(regExEmail) != -1) {
        email.style = 'border-bottom: 2px solid #9ACD32;';
    }
    else {
        email.style = 'border-bottom: 2px solid #B22222;';
    }
}
var regExFname = /^[А-Я][а-я]+$/;
function full_nameFun(full_name) {
    if (full_name.value.search(regExFname) != -1) {
        full_name.style = 'border-bottom: 2px solid #9ACD32;';
    }
    else {
        full_name.style = 'border-bottom: 2px solid #B22222;';
    }
}    