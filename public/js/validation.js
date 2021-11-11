$(document).ready(function(){

    function checkEmail(email){
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    function Email(){
        const email = $('#email').val();
        const msg = $('#invalid-email');

        if (checkEmail(email) == false) {
            $('#email').addClass('is-invalid');
            msg.text('O email digitado é invalido');
            return false;
        } else {
            $('#email').removeClass('is-invalid');
            return true;
        }
    }


    function checkName(){
        const name = $('#name').val();
        const msg = $('#invalid-name');

        if (name.length < 4){
            $('#name').addClass('is-invalid');
            msg.text('O nome deve ter no minimo 4 caracteres');
            return false;
        } else {
            $('#name').removeClass('is-invalid');
            return true;
        }
    }

    function checkPassword(){
        const password = $('#password').val();
        const confirmPassword = $('#password_confirmation').val();
        const msgPass = $('#invalid-password');
        const msgConfirm = $('#invalid-password_confirmation');

        if(password !== confirmPassword){
            $('#password').addClass('is-invalid');
            $('#password_confirmation').addClass('is-invalid');
            msgPass.text('A senha e a confirmação devem ser iguais');
            msgConfirm.text('A senha e a confirmação devem ser iguais');
            return false;
        } else if (password.length < 4){
            $('#password').addClass('is-invalid');
            $('#password_confirmation').addClass('is-invalid');
            msgPass.text('A senha deve ter mais de 4 caracteres');
            msgConfirm.text('A confirmação de senha deve ter mais de 4 caracteres');
        } else {
            $('#password').removeClass('is-invalid');
            $('#password_confirmation').removeClass('is-invalid');
            return true;
        }
        
        console.log(password.length);
    }

    $('#submit').click( function(){
        checkName();
        Email();
        checkPassword();
    })

})