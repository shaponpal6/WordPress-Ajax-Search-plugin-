let Aisb = function(){}
let common = (function () {
    "use strict";
    var isCancel = false;

    let aisConfig = {};

    function aisBot(target) {
        const aid = target.offsetParent.dataset.aisbId;
        const ais = parseInt(aid) !== NaN ? 'wpartificial_sb_'+aid :'';
        return ais;
    }

    // optimize feature
    const fe = {
        symAuthor: ['@'],
        symPro:  ['$'],
        symRe: ['/'],
        symHelp: ['-'],
        product1: ['product'],
        post1: ['post'],
        page1: ['page'],
        tag1: ['tag', 'cat', 'category'],
        word1: ['cal', 'login', 'signin', 'logout', 'signout', 'temp', 'time', 'now', 'weather'],
        product2: ['i need', 'i want', 'give me'],
        post2: [],
        page2: [],
        tag2: [],
        word2: ['weather forecast'],
        w2: ['i need', 'i want', 'give me'],
        w3: ['i need product', 'give me product']
    }
    const features = Object.assign({}, fe, {
        symbols: Array.from(new Set(fe.symPro.concat(fe.symRe, fe.symHelp))),
        action:  Array.from(new Set(fe.product1.concat(fe.post1, fe.page1, fe.tag1, fe.word1))),
        toWords:  Array.from(new Set(fe.product2.concat(fe.post2, fe.page2, fe.tag2, fe.word2)))
    });


    // Filter attributes
    const attributes = function () {
        return {
            attPro: ['price', 'weight', 'height', 'width', 'length'],
            analysisUp: ['top seal', 'top buy', 'most seal', 'most buy', 'trading', 'top', 'high'],
            analysislow: ['down seal', 'down buy', 'less seal', 'less buy', 'down', 'low'],
            seperator: ['-', '--', '|'],
            eq: ['=', 'equal', 'like', 'same', 'to', 'equal to'],
            less: ['<', 'less then', 'less', 'low', 'down', 'lower', 'lower then'],
            up: ['>', 'greater then', 'greater', 'high', 'up', 'upper', 'higher', 'upper then', 'higher then']
        }
    }

    // Remove all multiple white space
    function whiteSpaces(s) {
        return s.split(' ').filter((n) =>n).join(' ');
    }

    // String cut n number
    function contentCut(text, start, end, replace = '') {
        var str = text.split(' ');
        if (str.length > end) {
            var content = str.slice(start, end).join(' ');
            return content + ' ' + replace;
        } else {
            return str.slice(start, str.length).join(' ');
        }
    }

    // Promise State Check
    function promiseState(p) {
        const t = {};
        return Promise.race([p, t])
            .then(v => (v === t) ? "pending" : "fulfilled", () => "rejected");
    }

    // Current Time
    function time(t) {
        var d = new Date(t);

        // d.toLocaleString(); // expected output: "7/25/2016, 1:35:07 PM"
        //
        // d.toLocaleDateString(); // expected output: "7/25/2016"
        //
        // d.toDateString();  // expected output: "Mon Jul 25 2016"
        //
        // d.toTimeString(); // expected output: "13:35:07 GMT+0530 (India Standard Time)"
        //
        // d.toLocaleTimeString(); // expected output: "1:35:07 PM"

        return d.toLocaleString('en-US', {hour: 'numeric', minute: 'numeric', hour12: true});
    }

    // Current Time
    function date(t) {
        var d = new Date(t);

        // d.toLocaleString(); // expected output: "7/25/2016, 1:35:07 PM"
        //
        // d.toLocaleDateString(); // expected output: "7/25/2016"
        //
        // d.toDateString();  // expected output: "Mon Jul 25 2016"
        //
        // d.toTimeString(); // expected output: "13:35:07 GMT+0530 (India Standard Time)"
        //
        // d.toLocaleTimeString(); // expected output: "1:35:07 PM"

        return d.toLocaleDateString('en-US');
    }

    // Current Time to ago
    function timeAgo(t) {
        var d = new Date(t);
        var t = new Date();
        var diffMs = (t - d);
        var diffDays = Math.floor(diffMs / 86400000); // days
        var diffHrs = Math.floor((diffMs % 86400000) / 3600000); // hours
        var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000); // minutes

        if (diffDays > 0) {
            return diffDays > 1 ? diffDays + ' days ago' : diffDays + ' day ago';
        } else if (diffHrs > 0) {
            return diffHrs > 1 ? diffHrs + ' hours ago ' : diffHrs + ' hour ago';
        } else if (diffMins > 0) {
            return diffMins > 1 ? diffMins + ' mins ago ' : diffMins + ' min ago';
        } else {
            return d.toLocaleString('en-US', {hour: 'numeric', minute: 'numeric', hour12: true});
        }
    }

    // is json
    function isJSON(obj) {
        if (obj instanceof Array) {
            return JSON.parse(JSON.stringify(Object.assign({}, obj)));
        } else if (obj instanceof Object) {
            return JSON.parse(JSON.stringify(obj));
        } else {
            return false;
        }
    }

    // debug
    function debug(code, error, customMeg) {
        console.log('\b\b\b ' + code + ': ' + customMeg + ' \bError: ' + error);
    }

    // scroll top
    function scrollTo(element, to, duration) {
        var start = element.scrollTop,
            change = to - start,
            currentTime = 0,
            increment = 2;

        var animateScroll = function () {
            currentTime += increment;
            var val = Math.easeInOutQuad(currentTime, start, change, duration);
            element.scrollTop = val;
            if (currentTime < duration) {
                setTimeout(animateScroll, increment);
            }
        };
        animateScroll();
    }

    //t = current time
    //b = start value
    //c = change in value
    //d = duration
    Math.easeInOutQuad = function (t, b, c, d) {
        t /= d / 2;
        if (t < 1) return c / 2 * t * t + b;
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
    };

    // set Cookie
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays | 1 * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    //get cookie
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    // check cookie
    function set(name, value, config = {expires: 7, path: '/', domain: '', secure: false}) {
        return Cookies.set(name, value, {
            expires: config.exp,
            path: config.path,
            domain: config.domain,
            secure: config.secure
        });
    }

    // get Cookie
    function get(name, config = {expires: 7, path: '/', domain: '', secure: false}) {
        return Cookies.get(name, {
            expires: config.exp,
            path: config.path,
            domain: config.domain,
            secure: config.secure
        });
    }

    function animation(action, target) {
        if (action === 'start') {
            var div = document.createElement('DIV');
            div.setAttribute('class', 'ais-loader');
            // document.querySelector(".ai_search_display").appendChild(div);
            target.appendChild(div);
            // document.querySelector(".ais-loader").classList.remove = " ais-ani-tb";
        }
        if (action === 'stop') {
            document.querySelectorAll(".ais-loader").forEach(ele => ele.style.display = "none");
            // document.querySelector(".ais-loader").classList.add = " ais-ani-tb";
        }
    }

    // console log
    function log(val) {
        console.log(val);
    }

    // Send Ajax Call
    function ajax(options) {

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
            url = typeof options.url !== 'undefined' ? options.url : aisb_root.plugin_dir + 'ais_search.php',
            type = typeof options.type !== 'undefined' ? options.type : 'text',
            timeout = typeof options.timeout !== 'undefined' ? options.timeout : 60000,
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


    // Request
    function request(url, options) {
        ajax(url, options)
            .then(function (posts) {
                console.log('Success!', posts);
                console.log(posts.responseText);
            })
            .catch(function (error) {
                console.log('Something went wrong', error);
            });


    }
    function jsonParse(str, ctrl='') {
        try {
            var json = JSON.parse(str);
        } catch (e) {
            console.error(ctrl,' => ', 'SyntaxError: Unexpected token u in JSON at position 0')
            return false;
        }
        return json;
    }

    return {
        animation: animation,
        set: set,
        get: get,
        ajax: ajax,
        request: request,
        log: log,
        debug: debug,
        contentCut: contentCut,
        promiseState: promiseState,
        time: time,
        date: date,
        timeAgo: timeAgo,
        aisConfig: aisConfig,
        aisBot: aisBot,
        jsonParse: jsonParse,
        isJSON: isJSON,
        features: features,
        attributes: attributes,
        whiteSpaces: whiteSpaces,
        scrollTo: scrollTo,
        setCookie: setCookie,
        getCookie: getCookie
    }
})();

// let z = new Aisb();
Aisb.prototype.common2 = common;
console.log(new Aisb())