$(document).ready(function(){
    $('.flagFavoritoContato').click(function(){
       var idContato = $(this).prop("id");
       var titulo = $(this).prop("title");
       
       if(titulo === "Favorito"){
            $(this).html('<i class="bi bi-start"></i>').prop("title","Não Favorito");
            $.getJSON('./pages/contacts/atualizaFavoritoContato.php?idContato='+idContato+'&flagFavoritoContato=0');
       }else{
        $(this).html('<i class="bi bi-start-fill"></i>').prop("title","Favorito");
        $.getJSON('./pages/contacts/atualizaFavoritoContato.php?idContato='+idContato+'&flagFavoritoContato=1');
       }
    }) 
})