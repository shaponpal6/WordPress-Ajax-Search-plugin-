let aisb_create = (function() {
    'use strict';
    const plugin_dir= aisb_root.plugin_dir;
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
    function create(data) {
        const conf = Object.assign({}, config, {
            data: {
                action: 'ais_bot_manager',
                ais_api: 'ais_bot_create',
                requestData : JSON.stringify(data)
            },
        });
        console.log(data);

        ais_common.ajax(conf).then((response)=>{
            console.log(response.responseText);
            var result = JSON.parse(response.responseText);
            if ( result.status === 'ok'){
                // active(3);
                loader.style.display = 'none';
                bot_list();
            }else {
                console.error('Something went wrong!!!');
            }
        });



    }
    function update(data) {
        const conf = Object.assign({}, config, {
            data: {
                action: 'ais_bot_manager',
                ais_api: 'ais_bot_update',
                requestData : JSON.stringify(data)
            },
        });
        ais_common.ajax(conf).then((response)=>{
            console.log(response.responseText);
            var result = JSON.parse(response.responseText);
            if (typeof result.data.status === 'number' && result.data.status === 'ok'){
                // active(3);
                loader.style.display = 'none';
            }else {
                console.error('Something went wrong!!!');
            }
        });
    }
    function ais_delete(data) {
        const conf = Object.assign({}, config, {
            data: {
                action: 'ais_bot_manager',
                ais_api: 'ais_bot_delete',
                requestData : JSON.stringify(data)
            },
        });
        ais_common.ajax(conf).then((response)=>{
            console.log(response.responseText);
            var result = JSON.parse(response.responseText);
            if (typeof result.data.status === 'number' && result.data.status === 'ok'){
                // active(3);
                loader.style.display = 'none';
            }else {
                console.error('Something went wrong!!!');
            }
        });
    }
    function bot_list() {
        const conf = Object.assign({}, config, {
            data: {
                action: 'ais_bot_manager',
                ais_api: 'ais_bot_list',
                requestData : ''
            },
        });
        ais_common.ajax(conf).then((response)=>{
            console.log(response.responseText);
            var result = JSON.parse(response.responseText);
            if ( result.status === 'ok'){
                let posts = result.data;
                let html = '<thead><tr><th>SI</th><th>Name</th><th>Shortcode</th><th>Action</th></tr></thead>';
                const div = document.createElement('tbody');
                const tbody = document.querySelector('#ais_bot_list');
                if (typeof posts === 'object'){
                     for (var i =0; i < posts.length; i++) {
                        console.log(posts[i]);
                        console.log(posts[i].post_title);
                        html += `<tr><td>${i+1}</td>
                                    <td>${posts[i].post_title}</td>
                                    <td>[wpartificial-search id="${posts[i].post_parent}" name="${posts[i].post_name}"]</td>
                                    <td>Config || Edit</td>
                                    </tr>`;
                     }
                }
                div.innerHTML = html;
                tbody.innerHTML='';
                tbody.appendChild(div);


                loader.style.display = 'none';
            }else {
                console.error('Something went wrong!!!');
            }
        });
    }

    function execute() {
        const btn = document.querySelector('.ais_create_btn');
        console.log(btn);
        btn.addEventListener('click', function (e) {
            var data = ais_common.getObject(e);
            console.log(e);
            let action = e.target.dataset.action;
            console.log(action);
            console.log(data);
            if (action === 'create'){
                create(data);
            }else if (action === 'update'){
                update(data);
            }else if (action === 'delete'){
                ais_delete(data);
            }

        });
        // Bot List
        bot_list();
    }



    return {
        execute: execute,
    };
})();
