//--------------------
console.log('--------------------- Host --------------------');
console.log(location.hostname);
console.log(location);
// var url = WPURLS.siteurl;
// console.log(url);
console.log(aisb_root);
console.log(aisb_root.siteurl);
// console.log(object_name);
// alert( object_name.some_string);


var url = 'http://localhost/wpartificial?ais_type=cart_total&post_type=product&quantity=3&add-to-cart=21';



document.getElementById('ais_ajax').addEventListener('click', function (e) {
    console.log(e);
    console.log(aisb_localize.ajaxurl);
    console.log(aisb_localize.custom_ajax_url);
    jQuery.ajax({
        type: "POST",
        url: 'http://localhost/wpartificial/wp-content/plugins/ais_bot/ais_search.php',
        data: { action: 'ais_cart_total', param: 'st1' }
    }).then((res)=>{
        console.log( res );
        return res;
    }).done(function( msg ) {
        console.log( msg );
    });

});

