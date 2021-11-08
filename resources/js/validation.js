let password = document.querySelector('#password');
let confirm = document.querySelector('#confirm');
let submit = document.querySelector('#submit');


submit.addEventListener('click', ()=>{
    if (password === confirm){
        console.log('iguais');
    }
    console.log('teste');
})