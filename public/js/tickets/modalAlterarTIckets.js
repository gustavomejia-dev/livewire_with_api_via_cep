function alterarTickets(){
    
    if(document.getElementById('technicals').value != '*') 
    {
        document.getElementById('modalAlterarTicket').style.display = 'block';
        
    }
    
}

function close_modal(){
    document.getElementById('modalAlterarTicket').style.display = 'none';
}