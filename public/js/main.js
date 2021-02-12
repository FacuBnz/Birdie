var url = 'http://localhost/pruebas-laravel/public';

window.addEventListener("load", function (){

    //search
    $('#buscador').submit(function (){
        $(this).attr('action',url+'/people/'+$('#buscador #search').val());
    })

})
