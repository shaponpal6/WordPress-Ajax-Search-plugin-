WPArtificialSB.prototype.searchEngine = (function () {
    "use strict";
    let aisConfig;

    var elastic= elasticlunr(function () {
        this.addField('id');
        this.addField('post_title');
        this.setRef('id');
    });
    var kIndex = elasticlunr(function () {
        this.addField('question');
        this.addField('tag');
        this.setRef('answer');
    });

    var options = {
        shouldSort: true,
        threshold: 0.6,
        location: 0,
        distance: 100,
        maxPatternLength: 32,
        minMatchCharLength: 1,
        keys: [
            "post_title",
            "post_content"
        ]
    };


    /**
     * Knowledge Base Sesarch
     * @param question
     */
    async function knowledgeBase(question, target) {
        master(question, '', target);
    }


    // Generate Api session
    function generateUrl(type) {
        var key = 'wpaisearch', ip = '',
            url =  aisb_root.plugin_dir + 'ais_search.php',
            session = Math.floor(Math.random() * 898493).toString() + Date.now().toString().substr(5, 13) + Math.floor(Math.random() * 898483593).toString(),
            param = '?type=' + type + 'key=' + key + '&ip=' + ip + '&session=' + session;

        var api = new URL(url);
        api.searchParams.set('type', 'ais_' + type);
        api.searchParams.set('key', key);
        api.searchParams.set('ip', ip);
        api.searchParams.set('session', session);

        return api;
    }


    function master(api, feature,  target) {
        Aisb.common.animation('start', target);
        var key = 'wpaisearch', ip = '',
            url = aisb_root.plugin_dir + 'ais_search.php',
            session = Math.floor(Math.random() * 898493).toString() + Date.now().toString().substr(5, 13) + Math.floor(Math.random() * 898483593).toString(),
            param = '?type=' + api + 'key=' + key + '&ip=' + ip + '&session=' + session;

        var search, fuseSearch, request, feature2, feature3, lab = [], state, data = [],
            action = 'ais_' + api;

        //-------------------------------------------

        var config = {
            url: aisb_root.plugin_dir + 'ais_search.php',
            data: {
                action: 'ais_professor',
                ais_api: api,
                ais_secret_key: key,
                ais_ip: ip,
                ais_session: session
            },
            //data: {action: 'ais_cart_contents'},
            method: 'POST',
            type: 'text',
            withCredentials: true,
            timeout: 3000,
        }

        Aisb.common.ajax(config)
        // once(config)
            .then(function (response) {
                if (response.responseText ==='') return ;
                var response = Aisb.common.jsonParse(response.responseText, 'FuesSearch');
                var posts = response.data;
                // var posts = response.data;
                for (var key in posts) {
                    if (!posts.hasOwnProperty(key)) continue;
                    var post = posts[key];
                    var docid = {
                        id: post ['id'],
                        post_title: post['post_title'],
                        post_content: post['post_content'],
                        tags: post['tags'],
                        type: post['type'],
                        attachment: post['attachment']
                    };
                    if (post.hasOwnProperty('product')) {
                        var product = post['product'];
                        // For Product attribute
                        if (product.hasOwnProperty('price') && product['price'] !== '') {
                            docid['price'] = product['price'];
                        }
                        if (product.hasOwnProperty('weight') && product['weight'] !== '') {
                            docid.weight = product['weight'];
                        }
                        if (product.hasOwnProperty('height') && product['height'] !== '') {
                            docid.height = product['height'];
                        }
                        if (product.hasOwnProperty('length') && product['length'] !== '') {
                            docid.length = product['length'];
                        }
                        if (product.hasOwnProperty('width') && product['width'] !== '') {
                            docid.width = product['width'];
                        }

                    }
                    data[key] = docid;
                    elastic.addDoc(docid);
                }
            })
            .catch(function (error) {
                console.info(error);
            })
            .then(function () {
                // Filter
                const r = Aisb.common.attributes();
                var copy = (arr, del) => {
                    return arr.map((ele) => {
                        return del + ele
                    });
                };

                const attrs = [...r.attPro, ...copy(r.attPro, '-'), ...copy(r.attPro, '--')];
                var ma = [];

                attrs.forEach((ele) => {
                    var m = feature.search(ele);
                    if (m !== -1) {
                        ma.push(m);
                    }
                });
                var inx = [...new Set(ma)].sort((a, b) => {
                    return a - b
                });

                if (inx.length > 0) {
                    feature2 = feature.substr(0, inx[0] - 1);
                    feature3 = feature.substr(inx[0], feature.length - 1);
                    for (var i = 0; i < inx.length; i++) {
                        var s = inx[i], end = inx.hasOwnProperty(i + 1) ? inx[i + 1] : feature.length;
                        lab[i] = feature.slice(s, end);
                    }
                } else {
                    feature2 = feature;
                    feature3 = '';
                }
            }).then(function () {
            // console.time('addDoc Search Time');
            let sResult =[];
            console.log(aisConfig);
            if (aisConfig.ais_se){
                var label = elastic.search(feature2, {});
                for (var e=0; e < label.length; e++){
                    if (label[e].hasOwnProperty('doc'))
                        sResult.push(label[e].doc);
                }
            } else {
                // fuse
                let fuseSearch = new Fuse(data, options);
                sResult = fuseSearch.search(feature2);
            }

            console.log('Fuse search Array');
            console.log(sResult);

            // Choose Template
            masterChoose(sResult, lab, target);
            return true;
        });
    }

// Master choose after search result
// select templete
    function masterChoose(label, lab, target) {
        var product = [], filterResult = [], post = [], page = [], interval = 1;

        // ------- Attributes-----------------
        const atts = Aisb.common.attributes();
        // ------- Attributes-----------------
        var filter = [];
        for (var k = 0; k < lab.length; k++) {
            ['price', 'weight', 'height', 'width'].forEach((ele) => {
                if (lab[k].search(ele) !== -1) {
                    let pStr = lab[k].replace(ele, ''),
                        val = pStr.match(/\d+/g) ? pStr.match(/\d+/g)[0] : '',
                        cStr = pStr.slice(0, pStr.indexOf(val)).trim().toLowerCase(), dia = '';

                    if (atts.eq.indexOf(cStr) !== -1 || cStr.length < 1) {
                        dia = '=';
                    } else if (atts.less.indexOf(cStr) !== -1) {
                        dia = '<';
                    } else if (atts.up.indexOf(cStr) !== -1) {
                        dia = '>';
                    }
                    // set
                    if (val.length > 0 && dia.length > 0) {
                        filter.push({key: ele, dia: dia, val: val});
                    }
                }
            });
        }

        for (var key in label) {
            var result = label[key];
            var boo = (a, b, dia) => {
                if (dia === '<') {
                    return !!(parseInt(a) < parseInt(b));
                } else if (dia === '>') {
                    return !!(parseInt(a) > parseInt(b));
                } else if (dia === '=') {
                    return !!(parseInt(a) == parseInt(b));
                } else {
                    return !!(parseInt(a) < parseInt(b));
                }
            }

            // product
            if (result.type === 'product') {
                if (filter.length > 0) {
                    filter.forEach((ele) => {
                        if (ele.key === "price" && boo(result.price, ele.val, ele.dia)) filterResult.push(result);
                        else if (ele.key === "weight" && boo(result.weight, ele.val, ele.dia)) filterResult.push(result);
                        else if (ele.key === "height" && boo(result.height, ele.val, ele.dia)) filterResult.push(result);
                        else if (ele.key === "length" && boo(result.length, ele.val, ele.dia)) filterResult.push(result);
                        else if (ele.key === "width" && boo(result.width, ele.val, ele.dia)) filterResult.push(result);

                    });

                } else {
                    filterResult.push(result);
                }
            } else {
                filterResult.push(result);
            }
            // // post
            // if (result.type === 'post') {
            //     post.push(result);
            // }
            // // page
            // if (result.type === 'page') {
            //     page.push(result);
            // }

        }
        target.innerHTML = '';
        Promise.resolve(Aisb.template.set('products', filterResult, target));

    }


    function run(action, val, target) {
        // Set Config
        var ais = Aisb.common.aisBot(target);
        aisConfig = Aisb.common.aisConfig.hasOwnProperty(ais)? Aisb.common.aisConfig[ais] : {};
        // defaultConfig(aisConfig);

        if (action === 'master') {
            console.log('_______Fuse Action ____ok____', action);
            // knowledgeBase(val, target)
            master(action, val, target)
        } else {
            console.log('_______Fuse Action ____not ok____', action);
        }
        if (action === 'products') master(action, val, target);
        if (action === 'posts') master(action, val, target);
        if (action === 'pages') master(action, val, target);
        if (action === 'tags') master(action, val, target);
    }

    return {
        run: run
    }
})();