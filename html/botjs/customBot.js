WPArtificialSB.prototype.customBot = (function () {
    "use strict";
    function calculator(val) {
        console.log('Caculator Init');
    }
    function localTime(f) {
        console.log(Date.now());
    }
    function bot(fea, type) {
        if (type==='cal') calculator(fea);
        else if (type==='login' || type==='signin') localTime(fea);
        else if (type==='logout' || type==='signout') localTime(fea);
        else if (type==='now') localTime(fea);
        else if (type==='time') localTime(fea);
        else if (type==='date') localTime(fea);
        else if (type==='temp') localTime(fea);
        else if (type==='weather forecast') localTime(fea);
        else if (type==='weather') localTime(fea);
    }
    return{
        bot: bot
    }
})();
