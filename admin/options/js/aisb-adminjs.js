define('aisb-adminjs',["jquery"], function($) {
    const cbTabs = document.querySelectorAll("ul#cb-settings-actions > li");
    const cbTabs2 = document.querySelectorAll("ul#cb-settings-actions2 > li");
    const ais_save = document.getElementById("ais-save-action-btn");

    function aisSaveAllActions(e) {
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
        send('ais-save-action.php', result);

    }

    // Send Request
    function send(url, data) {

        // Variable to hold request
        var request;
        // Abort any pending request
        if (request) {
            request.abort();
        }
        // Fire off the request to /form.php
        request = $.ajax({
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
        tabExecute: tabExecute
    }
});