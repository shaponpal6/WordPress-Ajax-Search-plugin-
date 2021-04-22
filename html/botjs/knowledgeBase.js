WPArtificialSB.prototype.knowledgeBase = (function () {
    "use strict";
    function bot(val,target) {
        return Aisb.searchEngine.run('master', val, target);
    }
    return{
        bot : bot
    }
})();