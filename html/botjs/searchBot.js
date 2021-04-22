WPArtificialSB.prototype.searchBot = (function () {
    "use strict";
    let config = {}, botConfig = {}, ais_config = {};
    const inputs = document.querySelectorAll('.sb-ai_search_pro');

    /**
     * Initialize Artificial Intelligence Search Bot
     * searchBot - Initialize Search Bot
     * --- Initialize Input and pass unique event Handler
     * --- Initialize Default setting
     * --- Initialize Default data of shopping cart
     */
    function botInit() {
        // const inputs = document.querySelectorAll('.sb-ai_search_pro');
        var aisNode = document.createElement("DIV");


        inputs.forEach((input) => {
            /**
             * Initialize Input and pass unique event Handler
             */
                // Shopping Cart
            const ais_config_node = input.querySelector('.sb-ai-left-menu');
            const ais_cart = input.querySelector('.ais-shopping-cart');
            const ais_setting = input.querySelector('.ais-setting-box');
            const header = input.querySelector('.ais-light-box');
            const sResult = input.querySelector('.ai_search_display');
            let aisConfig={};


            input.addEventListener('input', function (e) {
                const target = e.target.parentNode.parentNode.querySelector('.ai_search_display');
                if (!!target) {
                    Aisb.controller.bot(e.target.value, target);
                } else {
                    console.error('oops!! Wrong Configuration to set Search Bot. Result Display Element is missing')
                }
            });

            /**
             * Initialize Default setting
             * @type {Element}
             */


            // Add setting config Event
            ais_config_node.addEventListener('click', function (e) {
                const ais_config_show2 = e.target.parentNode.parentNode.parentNode.querySelector('.ais-search-config');
                const ais_config_show = input.querySelector('.ais-search-config');
                if (!!ais_config_show) {
                    let tog = ais_config_show.classList.toggle('ais-block');
                    let aid = ais_config_show.parentNode.dataset.aisbId;
                    if (!!tog) {
                        var cbElements = input.querySelectorAll(".ais-checkbox");

                        for (var i = 0; i < cbElements.length; ++i) {
                            cbElements[i].addEventListener("click", function (e) {
                                let tog2 = this.querySelector(".ais-check").classList.toggle('ais-active');
                                let option = 'aisb_'+aid + '.' + this.dataset.action;
                                if (!!tog2) {
                                    this.dataset.value = false;
                                    Aisb.common.set(option, true);
                                } else {
                                    this.dataset.value = true;
                                    Aisb.common.set(option, false);
                                }
                            });
                        }
                    }
                }
            });

            // add shopping cart event
            ais_cart.addEventListener('click', function (e) {
                const ais_count = e.target.parentNode.querySelector('.ais-cart-count');
                const ais_target = e.target.parentNode.parentNode.parentNode.querySelector('.ai_search_display');
                var toggle = ais_target.classList.toggle('ais-cart-toggle');
                aisNode.innerHTML = '';
                Aisb.common.animation('start', ais_target);

                if (!!toggle) {
                    aisNode.setAttribute('class', 'ais_cart_show ais-ani-tb');
                    Aisb.common.ajax( {
                        url: aisb_root.plugin_dir + 'ais_search.php',
                        data: {action: 'ais_cart_contents'},
                        method: 'POST',
                        type: 'JSON',
                        // withCredentials: true,
                        // timeout: 3000,
                    }).then((response) => {
                        let result = JSON.parse(response.responseText);
                        // set cart number
                        if (result['cart_total'] && !!ais_count) {
                            ais_count.innerText = result['cart_total'];
                        }
                        // Display Cart Items
                        if (result['cart_contents'].length > 0) {
                            var count = 1;
                            aisNode.innerHTML +=
                                `<div class="ais_cart_list">
                                        <div></div>
                                        <h4> Product </h4>
                                        <p> Quantity </p>
                                        <p> Total </p>
                                    </div>`;
                            result['cart_contents'].forEach(ele => {
                                aisNode.innerHTML +=
                                    `<div class="ais_cart_list ais-ani-tb">
                                        <div class="ais_cart_list"><span> &nbsp;${count++}&nbsp;</span>&nbsp;&nbsp; ${ele.image}</div>
                                        <h4>${ele.title}</h4>
                                        <p>${ele.quantity} &#10540; ${ele.price.match(/\d+/)[0] }</p>
                                        <p>${ele.item_total}</p>
                                    </div>`;
                            });
                            aisNode.innerHTML += `<div class="ais_cart_list"><div></div><h4></h4><p> Subtotal- </p><p> ${result['subtotal']} </p></div>`;
                            aisNode.innerHTML += `<div class="ais_cart_list"><div></div><h4></h4><p> Shipping- </p><p> ${result['shipping_cost']} </p></div>`;
                            aisNode.innerHTML += `<div class="ais_cart_list"><div></div><h4></h4><p> Total- </p><p> ${result['total']} </p></div>`;
                            aisNode.innerHTML += `<div class="ais_cart_list"><div class="ais-checkout"><a href="${aisConfig.domain || aisb_root.domain + 'checkout'}" target="_blank">Proceed to checkout &#8594;</a></div></div>`;
                        } else {
                            aisNode.innerHTML = `<div class="ais_cart_list ais-ani-tb"><div class="ais-checkout">No Items </div></div>`;
                        }
                    }).then(() => {
                        ais_target.querySelectorAll(".ais-loader").forEach(ele => ele.style.display = "none");
                    });
                    // document.querySelector(".ais-loader").style.display = "none";


                    //------------
                    // aisNode.setAttribute('class', 'ais_cart_show');
                    // aisNode.innerHTML = `<h1>${ais_count.innerText}</h1>`;
                    ais_target.prepend(aisNode);
                } else {
                    if (ais_target.firstChild.classList.value === 'ais_cart_show ais-ani-tb') {
                        ais_target.removeChild(ais_target.firstChild);
                    }
                    ais_target.querySelectorAll(".ais-loader").forEach(ele => ele.style.display = "none");
                }

            });

            // add setting event
            ais_setting.addEventListener('click', function (e) {
                const ais_style = e.target.parentNode;
                const ais_target = e.target.parentNode.parentNode.parentNode.querySelector('.cb-product-list');
                const aid = e.target.parentNode.parentNode.parentNode.dataset.aisbId;
                ais_target.classList.toggle('sb-list-view');
                let option = 'aisb_'+ aid + '.' + 'result_view';
                if (ais_style.dataset.style === 'list') {
                    e.target.src = 'http://localhost/ai-search/images/grid.svg';
                    ais_style.dataset.style = 'grid';
                    ais_style.classList.remove("ais-list");
                    ais_style.classList.toggle('ais-grid');
                    // Cookie
                    Aisb.common.set(option, 'ais-grid');
                } else {
                    e.target.src = 'http://localhost/ai-search/images/list.svg';
                    ais_style.dataset.style = 'list';
                    ais_style.classList.remove("ais-grid");
                    ais_style.classList.toggle('ais-list');
                    // Cookie
                    Aisb.common.set(option, 'ais-list');
                }
            });





        });

        window.addEventListener('click', function (e) {
            console.log('-----------Click here start--------')
            console.log(e)
            console.log(e.target.offsetParent)
            console.log(e.target.parentNode)
            console.log(e.target.offsetParent.classList.contains('sb-ai_search_pro'))
            console.log('-----------Click here end--------')
            try {
                let parent = e.target.offsetParent;
                let classList = parent.classList;
                if (classList.contains('sb-ai_search_pro') || classList.contains('sb__cart') || classList.contains('ais-shopping-cart')) {
                    console.log('Window ok show')
                    show(parent)
                }else {
                    console.log('Window ok hide')
                    hide(e)
                }
            }
            catch(e){
                // hide(e);
                console.log('Window on error hide')
            }
        });
        function show(ele){
            console.log('-----------Focus in--------')
            const header = ele.querySelector('.ais-light-box');
            const sResult = ele.querySelector('.ai_search_display');
            header.classList.remove("ais-hide");
            header.classList.add("ais-show");
            sResult.classList.remove("ais-hide");
            sResult.classList.add("ais-show");
            lightBoxInit(header);
        }
        function hide(ele){
            console.log('-----------Focus Out--------');
            const header = document.querySelectorAll('.ais-light-box');
            const sResult = document.querySelectorAll('.ai_search_display');
            header.forEach(ele=>{
                ele.classList.remove("ais-show");
                ele.classList.add("ais-hide");
            });
            sResult.forEach(ele=>{
                ele.classList.remove("ais-show");
                ele.classList.add("ais-hide");
            });
        }
    }

     /**
      * Initialize Default data of shopping cart
      * @type {Element}
      */
    function lightBoxInit(header) {
        const ais = 'wpartificial_sb_'+header.parentNode.dataset.aisbId;
         // Set Config
         aisConfig = Aisb.common.aisConfig.hasOwnProperty(ais)? Aisb.common.aisConfig[ais] : {};

        if (!!header) {
            // header setting
            if (!!aisConfig.showConfigSection) {
                if (!aisConfig.showCart) {
                    const cart = header.querySelector('.ais-shopping-cart');
                    // disable cart
                    if (!!cart) cart.style.display = 'none';
                } else { // Initiate aisConfig
                    const count = header.querySelector('.ais-cart-count');
                    Aisb.common.ajax( {
                        data: {action: 'ais_cart_total'},
                        url: aisb_root.plugin_dir + 'ais_search.php',
                        method: 'POST',
                        type: 'JSON',
                        // withCredentials: true,
                        // timeout: 3000,
                    }).then((response) => {
                        let result = JSON.parse(response.responseText);
                        if (!!count) count.innerText = result.cart_total;
                    });
                }
                // disable layout view
                if (!aisConfig.showLayoutSelector) {
                    var grid = header.querySelector('.ais-setting-box');
                    if (!!grid) grid.style.display = 'none';
                } else { // Initiate config

                }
            } else {
                header.style.display = 'none';
            }
        }
        else {
            console.log(' -------------Light box not set ------------')
        }
    }

    function bot() {
        let sb = new Promise(function (resolve, reject) {
            let ids = {};
            inputs.forEach(input =>{
                // Search Bot Name
                let aisb_id = input.dataset.aisbId;
                ids['wpartificial_sb_'+aisb_id]=aisb_id;
            });

            resolve(getConfiguration(ids));
        }).then(function () {
            botInit();
        }).catch(function (e) {
            console.log('Error----', e)
        })
    }

    // get configuration
     function getConfiguration(ids){

         var config = {
             url: aisb_root.plugin_dir + 'ais_search.php',
             data: {
                 action: 'ais_bot_manager',
                 ais_api: 'ais_get_bot_settings',
                 requestData : JSON.stringify(ids)
             },
             method: 'POST',
             type: 'text',
             withCredentials: true,
             timeout: 9000,
         }

         Aisb.common.ajax(config).then(function (result) {
             var obj = Aisb.common.jsonParse(result.responseText,'ais_get_bot_settings');
             var data = Aisb.common.jsonParse(obj.data, 'ais_get_bot_settings');
             for (var key in data){
                 if (!data.hasOwnProperty(key))return;
                 var value = data[key];
                 var json = Aisb.common.jsonParse(value, 'ais_get_bot_settings');
                 if (json !== false){
                     botConfig[key] = json;
                 } else {
                     console.error('Not Valid Json')
                 }
             }
             Aisb.common.aisConfig =  Object.assign({}, botConfig)
             // aisConfig = Aisb.common.aisConfig;
             console.log('------- Config Init-------');
             console.log(Aisb.common.aisConfig);
         })
     }

    return {
        bot: bot
    }
})();
// Init App
// searchBot.bot();
// let z = new Aisb();
// Aisb.prototype.common2 = common;
// let aisb = new Aisb();
// console.log(aisb)

// Object.keys only return own keys
// console.log(Object.keys(aisb)); // jumps

let WPArtificialSearch = new WPArtificialSB();
// for..in loops over both own and inherited keys
for(let prop in WPArtificialSearch) console.log(prop); // jumps, then eats
WPArtificialSearch.searchBot.bot();