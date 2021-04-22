
//config file
requirejs.config({
    paths: {
        common : 'common',
        fuseSearch: 'fuseSearch',
        eCommerce: 'eCommerce',
        searchBot: 'searchBot',
        help: 'help',
        controller: 'controller',
        actionBot: 'actionBot',
        knowledgeBase: 'knowledgeBase',
        customBot: 'customBot',
        axios: 'axios.min',
        template: 'template',
        elasticlunr: 'elasticlunr',
        searchEngine: 'searchEngine',
        pagination: 'pagination',
        jsCookie: 'jsCookie'
    },
    baseUrl: 'botjs-clean'
});


define("config", function(){});

require(['config'], function (config) {
    //search.bot();
    require(['searchBot'], function (search) {
        search.bot();
    });
});
define("myDreamProject", function(){});
