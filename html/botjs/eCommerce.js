WPArtificialSB.prototype.eCommerce = (function () {
    "use strict";
    function calculator(val) {
        console.log('Caculator Init');
    }
    function localTime(f) {
        console.log(Date.now());
    }
    function onAddToCart(cart) {
        cart.target.classList.remove('s-buy-plus');
        cart.target.innerHTML = ' <div class="load">\n' +
            '    <span></span>\n' +
            '    <span></span>\n' +
            '    <span></span>\n' +
            '    <span></span>\n' +
            '  </div>';
        var pid = cart.target.dataset.pid;
        // var kvp = document.location.search.substr(1).split('&');
        // var url = new URL(window.location.href);
        var url = new URL(aisb_root.domain);
        url.searchParams.set('post_type', 'product');
        url.searchParams.set('add-to-cart', pid);
        // var url2 = aisConfig.domain+"?ais_type=cart_total&post_type=product&quantity=3&add-to-cart=" + pid;

        console.log(url)
        Aisb.common.ajax({url: url, method: 'GET'}).then((result)=>{
            if (result.readyState === 4){
                var cart_count = document.querySelectorAll('.ais-cart-count');
                cart_count.forEach(ele=>{
                    var value = parseInt(ele.innerText) ? parseInt(ele.innerText) : 0;
                    ele.innerText = (parseInt(value) + 1);
                });
                cart.target.innerHTML = '<a href="">View Cart</a>';
                cart.target.classList.add('s-buy-plus');
            }
        });
    }
    return{
        onAddToCart: onAddToCart
    }
})();