let knowledgeBase = (function () {
    "use strict";
    function bot(val,target) {
        return searchEngine.run('master', val,target);
    }
    return{
        bot : bot
    }
})();