(function () {
    'use strict';
    console.log('__________________aisb_root____________')
    console.log(aisb_root)
    console.log('__________________aisb_root____________')
    jQuery(document).ready(function() {
    if (true) {
        const action = ['aisb_adminjs', 'aisb_setup','aisb_create'];
        console.log('------------------- querySelector -------------');
        const setting = document.querySelector('.aisb-setting');
        const setting_action = setting.dataset.action;
        console.log(setting);
        console.log(setting.dataset.action);
        if (setting_action !== '' && action.includes(setting_action)) {
            if (setting_action === 'aisb_setup' && typeof aisb_setup === 'object') {
                console.log('----------- aisb_setup -------- execute-------');
                aisb_setup.execute();
            }
            if (setting_action === 'aisb_adminjs' && typeof aisb_adminjs === 'object') {
                console.log('----------- aisb_adminjs -------- execute-------');
                aisb_adminjs.execute();
            }
            if (setting_action === 'aisb_create' && typeof aisb_create === 'object') {
                console.log('----------- aisb_adminjs -------- execute-------');
                aisb_create.execute();
            }
        }
    }
    });

})();