let actionBot = (function () {
    "use strict";
    var _action, _val;
    const fe = common.features;
    let aisConfig;
    console.log(aisConfig);

    /**
     * url Bot
     * @param url
     */
    function urlBot(f) {
        const root = aisb_root.domain;
        var target = root + f;
        //window.location.href = target;
        window.open(target);
    }

    /**
     * Symbol Action Bot
     * @param a - action
     * @param f - feature
     * @param target
     */
    function symbol(a, f, target) {
        // Product
        if (fe.symPro.indexOf(a) !== -1){
            console.log('Product Action : ' + a);
            // pb.bot(f.substr(1).trim(), 'product', target);
            searchEngine.run('products',f.substr(1).trim(), target);
        }else if (fe.symAuthor.indexOf(a) !== -1){
            console.log('author Action : ' + a);
            // pb.bot(f.substr(1).trim(), 'author', target);
            searchEngine.run('author',f.substr(1).trim(), target);
        }else if (fe.symRe.indexOf(a) !== -1){ // redirect
            console.log('Redirect Action: ' + a);
            urlBot(f.trim());
        } else if (fe.symHelp.indexOf(a) !== -1){ // help
            console.log('Help  Action : ' + a);
            help.bot(f.substr(1).trim(), target);
        }
    }

    /**
     * Word Action Bot
     * @param a - action
     * @param f - feature
     * @param target
     */
    function word(a, f, target) {
        console.log('word Bot');
        const feature = f.substr(f.indexOf(" ") + 1).trim();
        // Product
        if (fe.product1.indexOf(a) !== -1){
            console.log('Product Action : ' + a);
            // pb.bot(feature, 'product', target);
            searchEngine.run('products',feature, target);
        } else if (fe.post1.indexOf(a) !== -1){ // redirect
            console.log('Post Action: ' + a);
            // post.bot(feature, 'post', target);
            searchEngine.run('posts',feature, target);
        } else if (fe.tag1.indexOf(a) !== -1){ // help
            console.log('tag Action : ' + a);
            // tag.bot(feature, 'tag', target);
            searchEngine.run('tags',feature, target);
        } else if (fe.page1.indexOf(a) !== -1){ // help
            console.log('page Action : ' + a);
            // page.bot(feature, 'page', target);
            searchEngine.run('pages',feature, target);
        } else if (fe.word1.indexOf(a) !== -1){ // help
            console.log('Help Action : ' + a);
            custom.bot(feature, a, target);
        }
    }

    /**
     * Two Words Action Bot
     * @param a
     * @param f
     * @param target
     */
    function toWords(a, f, target) {
        console.log('Two Word Bot');
        var feature = f.split(' ').slice(2).join(' ').trim();
        // Product
        if (fe.product2.indexOf(a) !== -1){
            console.log('Product Action : ' + a);
            // pb.bot(feature, 'product', target);
            searchEngine.run('products',feature, target);
        } else if (fe.post2.indexOf(a) !== -1){ // redirect
            console.log('Post Action: ' + a);
            // post.bot(feature, 'post', target);
            searchEngine.run('posts',feature, target);
        } else if (fe.tag2.indexOf(a) !== -1){ // help
            console.log('tag Action : ' + a);
            // tag.bot(feature, 'tag', target);
            searchEngine.run('tags',feature, target);
        } else if (fe.page2.indexOf(a) !== -1){ // help
            console.log('page Action : ' + a);
            // page.bot(feature, 'page', target);
            searchEngine.run('pages',feature, target);
        } else if (fe.word2.indexOf(a) !== -1){ // help
            console.log('Help Action : ' + a);
            custom.bot(feature, a, target);
        }
    }

    /**
     * Indicate action
     * @param action
     * @param val
     * @param type
     * @param target
     */
    function bot(action, val, type, target) {
        let ais = common.aisBot(target);
        aisConfig = common.aisConfig.hasOwnProperty(ais)? common.aisConfig[ais] : {};
        console.log('__________________________ Action config ______________');
        console.log(aisConfig);
        if (type == 0){
            symbol(action, val, target);
        } else if (type == 1){
            word(action, val,target);
        } else if (type == 2){
            toWords(action, val,target);
        }else if (type == 6){
            word(action, val,target);
        }
    }
    return{
        bot: bot
    }
})();