//aqui está o codigo que abre a modal da parte listar tickets


//TOKEN 
const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
// função que abre a modal abre a modal 
function openModal(id) {
    fetch('http://aprendendolaravel.sis/sistema/edit/ticket/'+id, {
        method: 'get',
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-Token": csrfToken
        }
    })
    .then(response => {
        return response.json();
    })
    .then(result => {
        
        document.getElementById('floating_email').value = result.email;
        document.getElementById('floating_first_name').value = result.nome_remetente;
        document.getElementById('comment').value = result.texto;
        document.getElementById('status-ticket').value = result.status;
        
        // if(result.status === document.getElementById('status-ticket'))

        
    })
    .then(text => {
        return console.log(text);
    })
    .catch(error => console.error(error));
};
