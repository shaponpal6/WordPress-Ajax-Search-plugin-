WPArtificialSB.prototype.controller = (function () {
    "use strict";

    /**
     * Action Indicator
     */
    const fe = Aisb.common.features;

    /**
     * Indicator of action
     * @param val
     * @param target
     * @returns {boolean}
     */
    function singleAction(val, target) {
        let first = val.substr(0, 1);
        // Check Quick Symbol Action from 1st character
        if (fe.symbols.indexOf(val.substr(0, 1)) !== -1) {
            Aisb.actionBot.bot(val.substr(0, 1), val , 0, target);
            return true;
        } else if (fe.action.indexOf(val.split(' ')[0]) !== -1) {
            Aisb.actionBot.bot(val.split('')[0], val, 1, target);
            return true;
        } else if (fe.toWords.indexOf(val.split(' ').slice(0,2).join(' ')) !== -1) {
            Aisb.actionBot.bot(val.split(' ').slice(0,2).join(' '), val, 2, target);
            return true;
        }
        console.log('single controller running', val);
        return false;
    }

    /**
     * Quick Action for filter
     * @param val
     * @param target
     * @returns {boolean}
     */
    function quickAction(val,target) {
        // Get 1st word from string & allow only letter
        let first = val.replace(/ .*/,'').replace(/[^a-zA-Z]+/g, '');
        if (fe.action.indexOf(first) !== -1) {
            Aisb.actionBot.bot(first, val,6,target);
            return true;
        }
        console.log('22222222 controller running', val);
        return false;
    }

    /**
     * KnowledgeBase Controller
     * @param val
     * @param target
     */
    function qknowledge(val,target) {
        // async function knowledge() {
        //     return await Aisb.searchEngine.run('master', val, target);
        // }
        // knowledge().then((r)=>{
        //     return true;
        // }).catch(e=>{
        //     return false;
        // });
        Aisb.searchEngine.run('master', val, target)
        console.log('33333333 controller running', val);
    }

    /**
     * Filter Input
     * @param input
     * @returns {*}
     */
    function inputFilter(input) {
        var output = input.trim();
        return output;
    }

    /**
     * Execute Bot Controller
     * @param feature
     * @param target
     * @returns {Promise<void>}
     */
    async function bot(feature, target) {
        var _feature = inputFilter(feature);



        // const pipe1 = await new Promise(res => res(singleAction(_feature,target)));
        // if (!pipe1){
        //     const pipe2 = await new Promise(res => res(quickAction(_feature,target)));
        //     if (!pipe2){
        //         const pipe3 = await new Promise(res => res(qknowledge(_feature,target)));
        //     }
        // }

        /**
         * Get User Input and indicate right action with a process pipeline
         */
        [singleAction, quickAction, qknowledge].some(fn => fn(_feature, target));

    }

    return {
        bot: bot
    }
})();