let ais_common = (function() {
    'use strict';

    // const instance = axios.create({
    //     baseURL: 'https://some-domain.com/api/',
    //     timeout: 10000,
    //     headers: {'X-Custom-Header': 'foobar'}
    // });

    function getObject(e) {
        const group = document.querySelectorAll('.aisb-setting .ais-item');
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

    function httpRequest(options) {

        // var r = {
        //     "method" : "post",
        //     "url" : "post",
        //     "data" : {},
        //     "type" : "json",
        //     "async" : true,
        //     "timeout" : 10000,
        //     "withCredentials" : false,
        // }

        // if (typeof url !== 'undefined' && typeof url === 'string'){
        //     url = url;
        // }else if(typeof url === 'object') {
        //     options = url;
        //     url = typeof options.url !== 'undefined' ? options.url : '';
        // }else {
        //     url = '';
        // }


        let method = typeof options.method !== 'undefined' ? options.method : 'GET',
            async = typeof options.async !== 'undefined' ? options.async : true,
            url = typeof options.url !== 'undefined' ? options.url : '',
            type = typeof options.type !== 'undefined' ? options.type : '',
            data2 = typeof options.data !== 'undefined' ? options.data : '',
            timeout = typeof options.timeout !== 'undefined' ? options.timeout : '',
            withCredentials = typeof options.withCredentials !== 'undefined' ? options.withCredentials : false;

        if (typeof options.data !== 'undefined' && typeof options.data === 'object') {
            var data = Object.entries(options.data).map(e => e.join('=')).join('&');
            console.log(options.data);
            console.log(data);
        } else {
            var data = '';
        }

        // Create the XHR request
        var x = function () {
            if (typeof XMLHttpRequest !== 'undefined') {
                return new XMLHttpRequest();
            }
            var versions = [
                "MSXML2.XmlHttp.6.0",
                "MSXML2.XmlHttp.5.0",
                "MSXML2.XmlHttp.4.0",
                "MSXML2.XmlHttp.3.0",
                "MSXML2.XmlHttp.2.0",
                "Microsoft.XmlHttp"
            ];

            var xhr;
            for (var i = 0; i < versions.length; i++) {
                try {
                    xhr = new ActiveXObject(versions[i]);
                    break;
                } catch (e) {
                }
            }
            return xhr;
        };
        var request = x();

        // Return it as a Promise
        return new Promise(function (resolve, reject) {

            // Setup our listener to process compeleted requests
            request.onreadystatechange = function () {

                // Only run if the request is complete
                if (request.readyState !== 4) return;

                // Process the response
                if (request.status >= 200 && request.status < 300) {
                    // If successful
                    resolve(request);
                } else {
                    // If failed
                    reject({
                        status: request.status,
                        statusText: request.statusText
                    });
                }

            };
            // request.abort();
            request.responseType = type;
            request.withCredentials = withCredentials;
            request.timeout = timeout;
            // Setup our HTTP request
            if (method == 'POST') {
                request.open(method, url, async);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                request.send(data);
            } else {
                if (typeof data !== 'undefined' && data !== null) {
                    url = data.length > 0 ? url + '?' + data : url;
                }
                request.open(method, url, async);
                request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                request.send();
            }

            // request.open(method || 'GET', url, true);
            // Send the rerequestquest
            // request.send();

        });
    };

    function ajax(options) {
        console.log('jquery Ajax call')
        // console.log(jQuery.ajax(options))
        return httpRequest(options);

        // return jQuery.ajax(options);

    }

    function request(options) {
        httpRequest(options);
        ajax(options);
    }

    return {
        ajax: ajax,
        getObject: getObject,
    };
})();
