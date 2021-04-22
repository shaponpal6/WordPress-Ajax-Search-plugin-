 let searchBot = (function () {
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
                console.log(target);
                if (!!target) {
                    controller.bot(e.target.value, target);
                } else {
                    console.error('oops!! Wrong Configuration to set Search Bot. Result Display Element is missing')
                }
            });


            // input.addEventListener('click', function (e) {
            //     let parent = e.target.offsetParent;
            //     if (parent.classList.contains('sb-ai_search_pro') && parent.dataset.aisbId === input.dataset.aisbId) {
            //         console.log('input click but set')
            //         onFocus(input)
            //     }else {
            //         console.log('outside input click but not set')
            //         onFocusOut(input);
            //     }
            // });

            let _ais= input.querySelector('input[type="text"]');

            // _ais.addEventListener('focusin', onFocus);
            // _ais.addEventListener('focusout', onFocusOut);

            function onFocus(e){
                console.log('-----------Focus in--------')
                console.log(header)
                console.log(header.parentNode)
                console.log(header.parentElement)
                console.log(!!header)
                lightBoxInit(header);
                header.classList.remove("ais-hide");;
                header.classList.add("ais-show");;
                // ais_config_node.style.display = 'block';
                // sResult.style.display = 'block';
                sResult.classList.remove("ais-hide");;
                sResult.classList.add("ais-show");;
                console.log(sResult);
                console.log(sResult);
                console.log('Focus');
                console.log(e);
            }
            function onFocusOut(e){
                console.log('-----------Focus Out--------')
                console.log(header)
                lightBoxInit(header);
                header.classList.remove("ais-show");;
                header.classList.add("ais-hide");;
                // ais_config_node.style.display = 'none';
                // sResult.style.display = 'none';
                sResult.classList.remove("ais-show");;
                sResult.classList.add("ais-hide");;
                console.log(sResult);
                console.log(sResult);
                console.log('Focus');
                console.log(e);
            }

            /**
             * Initialize Default setting
             * @type {Element}
             */


            // Add setting config Event
            ais_config_node.addEventListener('click', function (e) {
                const ais_config_show2 = e.target.parentNode.parentNode.parentNode.querySelector('.ais-search-config');
                const ais_config_show = input.querySelector('.ais-search-config');
                if (!!ais_config_show) {
                    var tog = ais_config_show.classList.toggle('ais-show');
                    if (!!tog) {
                        var cbElements = input.querySelectorAll(".ais-checkbox");

                        for (var i = 0; i < cbElements.length; ++i) {
                            cbElements[i].addEventListener("click", function (e) {
                                let tog = this.querySelector(".ais-check").classList.toggle('ais-active');
                                let option = aisb + '.' + this.dataset.action;
                                if (!!tog) {
                                    this.dataset.value = false;
                                    common.set(option, true);
                                } else {
                                    this.dataset.value = true;
                                    common.set(option, false);
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
                common.animation('start', ais_target);

                if (!!toggle) {
                    aisNode.setAttribute('class', 'ais_cart_show ais-ani-tb');
                    common.ajax( {
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
                ais_target.classList.toggle('sb-list-view');
                let option = aisb + '.' + 'result_view';
                if (ais_style.dataset.style === 'list') {
                    e.target.src = 'http://localhost/ai-search/images/grid.svg';
                    ais_style.dataset.style = 'grid';
                    ais_style.classList.remove("ais-list");
                    ais_style.classList.toggle('ais-grid');
                    // Cookie
                    common.set(option, 'ais-grid');
                } else {
                    e.target.src = 'http://localhost/ai-search/images/list.svg';
                    ais_style.dataset.style = 'list';
                    ais_style.classList.remove("ais-grid");
                    ais_style.classList.toggle('ais-list');
                    // Cookie
                    common.set(option, 'ais-list');
                }
            });





        });

        window.addEventListener('click', function (e) {
            console.log('-----------Click here start--------')
            console.log(e)
            console.log(e.target.offsetParent)
            console.log('-----------Click here end--------')
            try {
                let parent = e.target.offsetParent;
                if (parent.classList.contains('sb-ai_search_pro')) {
                    show(parent)
                    console.log('Window click but not set')
                }else {
                    hide(e)
                }
            }
            catch(e){
                hide(e);
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
         console.log('--------------- Header ---------------');
         console.log(header);
         console.log(header.parentNode);
         console.log(header.parentNode.dataset.aisbId);
         console.log(ais);
         // Set Config
         aisConfig = common.aisConfig.hasOwnProperty(ais)? common.aisConfig[ais] : {};
         console.log('tttttttttttttttttttttttt');
         console.log(aisConfig);
         console.log(aisConfig.showConfigSection);

        if (!!header) {
            // header setting
            console.log(aisConfig)
            if (!!aisConfig.showConfigSection) {
                if (!aisConfig.showCart) {
                    const cart = header.querySelector('.ais-shopping-cart');
                    // disable cart
                    if (!!cart) cart.style.display = 'none';
                } else { // Initiate aisConfig
                    const count = header.querySelector('.ais-cart-count');
                    common.ajax( {
                        data: {action: 'ais_cart_total'},
                        url: aisb_root.plugin_dir + 'ais_search.php',
                        method: 'POST',
                        type: 'JSON',
                        // withCredentials: true,
                        // timeout: 3000,
                    }).then((response) => {
                        let result = JSON.parse(response.responseText);
                        // console.log(result);
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

         common.ajax(config).then(function (result) {
             var obj = common.jsonParse(result.responseText,'ais_get_bot_settings');
             var data = common.jsonParse(obj.data, 'ais_get_bot_settings');
             for (var key in data){
                 if (!data.hasOwnProperty(key))return;
                 var value = data[key];
                 var json = common.jsonParse(value, 'ais_get_bot_settings');
                 if (json !== false){
                     botConfig[key] = json;
                 } else {
                     console.error('Not Valid Json')
                 }
             }
             common.aisConfig =  Object.assign({}, botConfig)
             // aisConfig = common.aisConfig;
             console.log('------- Config Init-------');
             console.log(common.aisConfig);
             console.log(aisConfig);
         })
     }

    return {
        bot: bot
    }
})();
// Init App
searchBot.bot();