var sign_in = document.getElementById('sign-in');
var formBody = document.getElementById('form-body');
var sign_in_office = document.getElementById('sign-in-office');

sign_in.addEventListener('click', function displayFunction(){
    sign_in.style.display ='none'
    sign_in_office.style.display ='none'
    formBody.style.display = 'block'
}
);

sign_in_office.addEventListener('click', function show(){
    sign_in.style.display ='none'
    sign_in_office.style.display ='none'
    formBody.style.display = 'block'
}
);
