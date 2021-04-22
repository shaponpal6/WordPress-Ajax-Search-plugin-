let aisb_adminjs =( function() {
    const cbTabs = document.querySelectorAll("ul#cb-settings-actions > li");
    const cbTabs2 = document.querySelectorAll("ul#cb-settings-actions2 > li");
    const ais_save = document.getElementById("ais-save-action-btn");

    const loader = document.createElement('DIV');
    loader.setAttribute('class', 'ais-loader');

    function aisSaveAllActions(e) {
        loader.style.display = 'block';
        console.log(e);
        console.log(e.target);
        console.log(e.target.offsetParent);
        console.log(e.target.parentElement);
        e.target.parentElement.appendChild(loader);
        const group = document.querySelectorAll('.ais-settings-group .cb-setting .ais-item');
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
        sendRequest( result);

    }

    // Send Request
    // step one
    function sendRequest(data) {
        const obj = data;
        const plugin_dir= "http://localhost/wpartificial/wp-content/plugins/ais_bot/";
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
        ais_common.ajax(config).then((response)=>{
            console.log(typeof response.responseText)
            console.log(response.responseText)
            var result = JSON.parse(response.responseText);
            if (typeof result.data.status === 'number' && result.data.status === 1){
                loader.style.display = 'none';
            }else {
                console.error('Something went wrong!!!');
            }
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
            console.log("Hooray, it worked!");
            console.log(textStatus);
            console.log(jqXHR);
            console.log(response);
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
            console.log('Tab----- cbBotConfig');
            title.innerText = "Configration ";
        }
        else if (activePaneId === '#userSetting') {
            console.log('Tab----- userSetting');
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
            console.log('hhhhhhhhhhhhhhhhhhhhhhhhhhhh');
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
        for (var i = 0; i < cbTabs.length; i++) {
            cbTabs[i].addEventListener("click", cbTabClicks);
        }
        for (var i = 0; i < cbTabs2.length; i++) {
            cbTabs2[i].addEventListener("click", cbTabClicks);
        }
        ais_save.addEventListener('click', aisSaveAllActions);
    }
    return {
        execute: tabExecute
    }
})();