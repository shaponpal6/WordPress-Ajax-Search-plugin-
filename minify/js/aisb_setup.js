let aisb_setup = (function() {
    'use strict';
    const plugin_dir= "http://localhost/wpartificial/wp-content/plugins/ais_bot/";
    let config = {
        url: plugin_dir+'ais_search.php',
        data: {},
        //data: {action: 'ais_cart_contents'},
        method: 'POST',
        type: 'text',
        // withCredentials: true,
        // timeout: 3000,
    }
    const loader = document.createElement('DIV');
    loader.setAttribute('class', 'ais-loader');

    // Default Bot
    const aisb100 = {
        // Filter
        filter_by : "product",
        post_type : ["product"],
        tags : ["product"],

        // Search with ok
        ais_se: false,
        ais_title: true,
        ais_content: true,
        ais_excerpt: true,

        // Layout ok
        result_view: 'ais_grid',

        // Template ok
        showImage: true,
        titleOverImage: true,
        bodyContent: true,
        showTitle: true,
        showTitleWord: 60,
        showContent: false,
        showContentWord: 100,
        // Fuji Search
        // Elasticlurn config
        // Action Config

        // pagination ok
        pagination: true,
        minItem : 4,
        position : 'afterend', //beforebegin

        // Header option
        // Dynamic Menu ok
        showConfigSection: true,
        showPostTypeMenu: true,
        showCart: true,
        showLayoutSelector: true,


        // Product Config ok
        wooCommerce : true,
        showCartTemplate : true,
        addToCart : true,
        cart : true,
        price : true,

        //Artificial Intelligence Actions
        enableAiSearchBot: true,
        aiWooCommerceBot: true,
        aiPostsBot: true,
        aiPagesBot: true,
        aiTagsBot: true,
        aiProductsBot: true,
        aiKnowledgeBot: true,
        aiCustomBot: true,
    }

    function getObject(e) {
        const group = document.querySelectorAll('.aisb-setting .ais_setup_step .ais-item');
        let result = {};
        for (var i=0; i < group.length; i++){
            var type = group[i].dataset.action;
            var key = group[i].dataset.key;
            if(type==='text'){
                console.log(type);
                result[key]=group[i].value;
            }
            if(type==='checkbox'){
                console.log(type);
                result[key]=group[i].checked == true ? 1 : 0;
            }
            if(type==='select'){
                console.log(type);
                result[key]= group[i].options[group[i].selectedIndex].value;
            }
            if(type==='radio'){
                console.log(type);
                var radio = group[i].querySelector("input:checked");
                console.log(radio);
                result[key]= radio ? radio.value : '1';
            }
        }
        console.log(group);
        console.log(result);
        return result;

    }

    // step one
    function step_one(e) {
        const obj = getObject(e);
        const conf = Object.assign({}, config, {
            data: {
                action: 'ais_bot_install',
                ais_api: 'ais_site_config',
                requestData : JSON.stringify(obj)
            },
        });
        ais_common.ajax(conf).then((response)=>{
            console.log(typeof response.responseText)
            console.log(response.responseText)
            var result = JSON.parse(response.responseText);
            if (typeof result.data.status === 'number' && result.data.status === 1){
                active(1);
            }else {
                console.error('Something went wrong!!!');
            }
        });
    }
    // step one
    function step_two(e) {
        const obj = aisb100;
        console.log(aisb100)
        console.log(obj)
        const conf = Object.assign({}, config, {
            data: {
                action: 'ais_bot_install',
                ais_api: 'ais_bot_init',
                requestData : JSON.stringify(obj)
            },
        });
        ais_common.ajax(conf).then((response)=>{
            var result = JSON.parse(response.responseText);
            if (typeof result.data.status === 'number' && result.data.status === 1){
                active(2);
            }else {
                console.error('Something went wrong!!!');
            }
        });
    }
    // step one
    function step_three(e) {
        const obj = getObject(e);
        const conf = Object.assign({}, config, {
            data: {
                action: 'ais_bot_install',
                ais_api: 'ais_bot_active',
                requestData : JSON.stringify(obj)
            },
        });
        ais_common.ajax(conf).then((response)=>{
            var result = JSON.parse(response.responseText);
            if (typeof result.data.status === 'number' && result.data.status === 1){
                active(3);
                loader.style.display = 'none';
            }else {
                console.error('Something went wrong!!!');
            }
        });
    }

    function execute() {
        const next = document.querySelectorAll('.ais_sutup_btn');
        const prev = document.querySelectorAll('.ais_sutup_btn_prev');

        next.forEach(ele=>{
            ele.addEventListener('click', (e)=>{
                // add loader
                loader.style.display = 'block';
                ele.offsetParent.appendChild(loader);
                let set = parseInt(e.target.dataset.step);
                if (set === 1){step_one(e)}
                if (set === 2){step_two(e)}
                if (set === 3){step_three(e)}
                // active(set);
            });
        });

        // Previous Action
        prev.forEach(ele=>{
            console.log(ele);
            ele.addEventListener('click', (e)=>{
                let set = parseInt(e.target.dataset.step);
                active(set);
            });
        });
    }
    var active = (set)=>{
        // Next display
        if (set < 3) {
            var step = document.querySelectorAll('.ais_setup_step');
            var step_no = document.querySelectorAll('.ais_step_no');
            for (var x = 0; x < step.length; x++) {
                if (x === set) {
                    step[set].style.display = 'block';
                } else {
                    step[x].style.display = 'none';
                }
                // var load = step[x].querySelector('.ais-loader');
                // if (load){
                //     // load.style.display = 'none';
                // }
                loader.style.display = 'none';
            }
            for (var x = 0; x < step_no.length; x++) {
                if (x <= set) {
                    step_no[x].classList.add('ais_ok');
                } else {
                    step_no[x].classList.remove('ais_ok');
                }
            }


        }
    }

    return {
        execute: execute,
    };
})();
