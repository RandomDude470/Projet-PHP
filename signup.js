password = $('input[type="password"]')[0].value;
enteredpassword="";
passwordconfirm = $('input#confirmp')[0];
passwordconfirm.addEventListener("input",checkpassword);
function checkpassword(element) {
    password = $('input[type="password"]')[0].value;
    if (element.data==null) {
       enteredpassword = enteredpassword.slice(0,-1);
    }else{

        enteredpassword += element.data;
    }
    if (password != enteredpassword) {
        passwordconfirm.classList.add('badp');
        passwordconfirm.classList.remove('goodp');
    }else{
        passwordconfirm.classList.add('goodp');
        passwordconfirm.classList.remove('badp');
        passwordconfirm.classList.remove('red');
        $('#error2')[0].remove();
    }
}