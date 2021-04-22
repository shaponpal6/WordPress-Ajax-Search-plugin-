let aisb_adminjs =( function() {
    let cbTabs,  cbTabs2;

    const loader = document.createElement('DIV');
    loader.setAttribute('class', 'ais-loader');

    function setMenus() {
        const plugin_dir= aisb_root.plugin_dir;
        let config = {
            url: plugin_dir+'ais_search.php',
            data: {
                action: 'ais_bot_install',
                ais_api: 'ais_get_bot',
                requestData : JSON.stringify()
            },
            //data: {action: 'ais_cart_contents'},
            method: 'POST',
            type: 'text',
            // withCredentials: true,
            // timeout: 3000,
        }
        ais_common.ajax(config).then((response)=>{
            var result = JSON.parse(response.responseText);
            const ul = document.querySelector('.ais-instance');
            for (var i =0; i < result.data.length; i++) {
                const li = document.createElement('LI');
                li.setAttribute('data-ais-id', result.data[i].post_parent);
                li.innerHTML = `<h1>${result.data[i].post_title}</h1>`;
                li.addEventListener('click', menuExpand);
                ul.appendChild(li);
            }

        });
    }
    function menuExpand(e) {
        let id;
        if (!!e.target.parentNode.dataset.aisId){
            id = e.target.parentNode.dataset.aisId;
        } else {
            id = e.target.dataset.aisId;
        }
        var url = new URL(window.location.href);
        url.searchParams.set('aisb_id', id);
        // var stateObj = { foo: "bar" };
        // window.history.pushState(null, null, url);
        window.history.replaceState(null, null, url);

        var aisb = document.getElementById('aisb_id');
        aisb.value = id;

        setOptions(id);
    }
    function setOptions(id) {
        console.log('_____Option config Id ___', id)
        if (!id) return;
        loader.style.display = 'block';
        document.querySelector('.ais-main-container').appendChild(loader);
        const plugin_dir= aisb_root.plugin_dir;
        let config = {
            url: plugin_dir+'ais_search.php',
            data: {
                action: 'ais_bot_install',
                ais_api: 'ais_get_bot_config',
                requestData : JSON.stringify({"botId": id})
            },
            //data: {action: 'ais_cart_contents'},
            method: 'POST',
            type: 'text',
            // withCredentials: true,
            // timeout: 3000,
        }
        ais_common.ajax(config).then((response)=>{
            var result = JSON.parse(response.responseText);
            console.log('_____Option config Data ___', result.data)
            console.log(typeof result.data)
            console.log(JSON.parse( result.data))
            console.log( typeof JSON.parse( result.data))
            setOptionConfig(JSON.parse(result.data));
        });

        // sendRequest( result);

    }
    function setOptionConfig(options) {
        var options2 = {
            addToCart: 1,
            aiCustomBot: 1,
            aiKnowledgeBot: 1,
            aiPagesBot: 1,
            aiPostsBot: 1,
            aiTagsBot: 1,
            aiWooCommerceBot: 1,
            ais_content: 1,
            ais_excerpt: 1,
            ais_se: 1,
            ais_title: 1,
            bodyContent: 1,
            cart: 1,
            domain: "http://wpartificial.com",
            enableAiSearchBot: 1,
            key1: "hello",
            key2: 1,
            key3: "2",
            key4: "4",
            minItem: "",
            pagination: 1,
            path: "http://wpartificial.com/path",
            plugin_dir: "http://wpartificial.com/plugin",
            position: "afterend",
            price: 0,
            result_view: "ais_grid",
            showCart: 0,
            showCartTemplate: 0,
            showConfigSection: 0,
            showContent: 0,
            showContentWord: "",
            showImage: 0,
            showLayoutSelector: 0,
            showPostTypeMenu: 0,
            showTitle: 0,
            showTitleWord: "",
            titleOverImage: 0,
            wooCommerce: 0
        }
        const group = document.querySelectorAll('.ais-settings-group .cb-setting .ais-item');
        let result = {};
        for (var i=0; i < group.length; i++){
            var type = group[i].dataset.action;
            var key = group[i].dataset.key;
            if(type==='text'){
                group[i].value = options[key] !== ''? options[key] : '';
            }
            if(type==='checkbox'){
                if (options[key] === 1){
                    group[i].checked = true;
                }else {
                    group[i].checked = false;
                }
            }
            if(type==='select'){
                for(var j=0; j < group[i].options.length; j++)
                {
                    if(group[i].options[j].value === options[key]) {
                        group[i].options[j].selected = true;
                        break;
                    }
                }
            }
            if(type==='radio'){
                var radio = group[i].querySelectorAll("input");
                for(var j=0; j < radio.length; j++)
                {
                    if(radio[j].value === options[key]) {
                        radio[j].checked=true;
                        break;
                    }
                }
            }
        }
        loader.style.display = 'none';
    }
    function aisSaveAllActions(e) {
        loader.style.display = 'block';
        e.target.parentElement.appendChild(loader);
        const group = document.querySelectorAll('.ais-settings-group .ais-item');
        let result = {};
        for (var i=0; i < group.length; i++){
            var type = group[i].dataset.action;
            var key = group[i].dataset.key;
            if(type==='text'){
                result[key]=group[i].value;
            }
            if(type==='checkbox'){
                result[key]=group[i].checked == true ? 1 : 0;
            }
            if(type==='select'){
                result[key]= group[i].options[group[i].selectedIndex].value;
            }
            if(type==='radio'){
                var radio = group[i].querySelector("input:checked");
                result[key]= radio ? radio.value : '1';
            }
        }
        sendRequest( result);

    }

    // Send Request
    // step one
    function sendRequest(data) {
        const obj = data;
        const plugin_dir= aisb_root.plugin_dir;
        let config = {
            url: plugin_dir+'ais_search.php',
            data: {
                action: 'ais_bot_install',
                ais_api: 'ais_bot_settings',
                requestData : JSON.stringify(obj)
            },
            //data: {action: 'ais_cart_contents'},
            method: 'POST',
            type: 'text',
            // withCredentials: true,
            // timeout: 3000,
        }
        // Get Url Param
        var url = new URL(window.location.href);
        var uid = url.searchParams.get("aisb_id");
        if (uid !== obj.aisb_id) return;
        ais_common.ajax(config).then((response)=>{
            var result = JSON.parse(response.responseText);
            if (typeof result.status === 'number' && result.status === 1){
                console.log('-----------loader--------------')
                console.log(loader)
                loader.style.display = 'none';
            }else {
                console.error('Something went wrong!!!');
            }
        }).then(function () {
            setOptions(uid);
        });
    }

    function send(url, data) {

        // Variable to hold request
        var request;
        // Abort any pending request
        if (request) {
            request.abort();
        }
        // Fire off the request to /form.php
        request = jQuery.ajax({
            url: url,
            type: "post",
            beforeSend: function(request) {
                request.setRequestHeader("Authorization", 'My Token55555555');
                request.setRequestHeader("X-CSRF-TOKEN", 'My Token55555555');
                // request.setRequestHeader("Content-Type", 'application/json');
            },
            data: {"data": data}
        });
        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            // $inputs.prop("disabled", false);
        });
    }

    function tabAction(activePaneId) {
        const title = document.getElementById('cb-title');

        if (activePaneId === '#cbBotConfig') {
            title.innerText = "Configration ";
        }
        else if (activePaneId === '#userSetting') {
            title.innerText = "Users ";
        }
        else if (activePaneId === '#clientsSetting') {
            title.innerText = "Clients List";
        }
        else if (activePaneId === '#cbSetting') {
            title.innerText = "Bot Configuration";
        }
        else if (activePaneId === '#cbTags') {
            title.innerText = "Tags";
        }
        else if (activePaneId === '#cbKnowledgeBase') {
            title.innerText = "Knowledge Base";
        }else {
            console.log('other----------------');
        }

    }

    function cbTabClicks(tabClickEvent) {
        tabClickEvent.preventDefault();
        for (var i = 0; i < cbTabs.length; i++) {
            cbTabs[i].classList.remove("sidebar__menu-item--active");
        }
        for (var i = 0; i < cbTabs2.length; i++) {
            cbTabs2[i].classList.remove("sidebar__menu-item--active");
        }
        var clickedTab = tabClickEvent.currentTarget;
        clickedTab.classList.add("sidebar__menu-item--active");
        tabClickEvent.preventDefault();
        const myContentPanes = document.querySelectorAll(".cb-setting");
        for (i = 0; i < myContentPanes.length; i++) {
            myContentPanes[i].classList.remove("active");
        }
        var anchorReference = tabClickEvent.target;
        var activePaneId = anchorReference.getAttribute("data-id");
        var activePane = document.querySelector(activePaneId);
        activePane.classList.add("active");
        // Each Tab Action
        tabAction(activePaneId);
    }

    // Tab Execute
    function tabExecute() {
        // var url = new URL(window.location.href);
        setMenus();
        setOptions();
        cbTabs = document.querySelectorAll("ul#cb-settings-actions > li");
        cbTabs2 = document.querySelectorAll("ul#cb-settings-actions2 > li");
        for (var i = 0; i < cbTabs.length; i++) {
            cbTabs[i].addEventListener("click", cbTabClicks);
        }
        for (var i = 0; i < cbTabs2.length; i++) {
            cbTabs2[i].addEventListener("click", cbTabClicks);
        }
        const ais_save = document.querySelector("#ais-save-action-btn");
        ais_save.addEventListener('click', aisSaveAllActions);
    }
    return {
        execute: tabExecute
    }
})();