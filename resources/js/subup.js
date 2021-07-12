document.addEventListener('DOMContentLoaded', function(){
    
    let a = fetch('subup/data').then(onResponse).then(showMetodiPagamento);

}, false);

function onResponse(response){
    console.log(response);
    return response.json();
}

function showMetodiPagamento(json){

    let form = document.getElementById('carte');

    if(json.length == 0){

        let vuoto = document.createElement('div');
        let h1 = document.createElement('h1');
        h1.innerText = 'SUBSCRIBE';
        vuoto.appendChild(h1);

        let p = document.createElement('p');
        p.innerText = 'Non hai metodi di pagamento, aggiungine uno!';

        vuoto.appendChild(p);
        form.appendChild(vuoto);
    }
    else{

    for(let i=0; i<(json.length); i++){

        let input_container = document.createElement('div');
        input_container.className = 'input_container';

        let creditcard = document.createElement('input');
        creditcard.type = 'radio';
        creditcard.className = 'input_check';
        creditcard.name = 'creditcard';
        creditcard.value = json[i].n_carta;
        let label = document.createElement('label');
        label.innerHTML = json[i].n_carta;


        input_container.appendChild(creditcard);
        input_container.appendChild(label);
        form.appendChild(input_container);
    }
    
    let input_container = document.createElement('div');
    input_container.className = 'input_container';
    let submit = document.createElement('input');
    submit.type = 'submit';
    submit.name = 'submit';
    submit.className = 'btn';
    submit.value = 'Submit';

    input_container.appendChild(submit);
    form.appendChild(submit);
    }   
}