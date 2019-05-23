$(document).ready(function () {
    $('.filter').change(function() {
        $('.applica').removeClass( "green" ).addClass( "orange" );
    });

    $('.priceFilter').change(function(){
        $('.applica').removeClass( "green" ).addClass( "orange" );
    });

    $('.applica').click(function(){
        applica();
    });

    $('.reset').click(function(){
        $('.filter').each(function(){
            $(this).prop("checked", false);
        });
        $('.priceFilter').each(function(){
            var val = $(this).next('label').text()
            if(val == 'Indifferente'){
                $(this).prop("checked", true);
            } else {
                $(this).prop("checked", false);
            }
        });
        applica();
    });

    $('.searchbar').keypress( function( e ) {
    var code = e.keyCode || e.which;
    if( code === 13 ) {
        applica();
    }
    });
});

function applica(){
    $('applica').removeClass( "orange" ).addClass( "green" );
    var queryParameters = {}, queryString = location.search.substring(1),
    re = /([^&=]+)=([^&]*)/g, m;
    while (m = re.exec(queryString)) {
    queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
    }
    var searchvalue = $('.searchbar').val();
    queryParameters['s'] = searchvalue;
    queryParameters['cat']='';
    var first = true;
    $('.filter').each(function(){
        if(this.checked) {
            var value = $(this).next('label').text();
            if(first){
                queryParameters['cat']=value;
                first = false;
            } else {
                queryParameters['cat']+='_'+value;
            }
        }
    });
    queryParameters['price']='';
    $('.priceFilter').each(function(){
        if(this.checked){
            queryParameters['price'] = $(this).next('label').text();
        }
    });
    location.search = $.param(queryParameters); // Causes page to reload
}
