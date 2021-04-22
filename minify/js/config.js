// require.config({
//     paths: {
//         //core
//
//
//         // libs
//         jquery: 'libs/jquery-3.4.1.min',
//         aisb_setup: 'aisb_setup'
//     }
// });
//
// require(['aisb_adminjs', 'aisb_setup'], function (aisb_setting, aisb_setup) {
//     const action = ['aisb_adminjs', 'aisb_setup'];
//     const setting = document.querySelector('.aisb-setting').dataset.action;
//     console.log(setting);
//     // console.log(setting.dataset.action);
//     if (setting !== '' && action.includes(setting)) {
//         console.log('true')
//         aisb_setup.execute();
//     }
//
//     // aisb_setting.tabExecute();
//     // aisb_setup.execute();
// });

(function () {
    'use strict';
    if (true) {
        const action = ['aisb_adminjs', 'aisb_setup'];
        const setting = document.querySelector('.aisb-setting').dataset.action;
        if (setting !== '' && action.includes(setting)) {
            if (setting === 'aisb_setup' && typeof aisb_setup === 'object') {
                aisb_setup.execute();
            }
            if (setting === 'aisb_adminjs' && typeof aisb_adminjs === 'object') {
                aisb_adminjs.execute();
            }
        }
    }

})();