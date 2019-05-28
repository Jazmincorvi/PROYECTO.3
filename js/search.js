const form = document.getElementById('search');
const btn = document.getElementById('btn-search');

form.addEventListener('submit', e=>{

    e.preventDefault();

    const data = new FormData(form);

    // console.log(data.get('search-cc_nit'));
    let cedula = data.get('search-cc_nit');
    let nombre = data.get('search-nombre');
    let apellido = data.get('search-apellido');



})
