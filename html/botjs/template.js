WPArtificialSB.prototype.template = (function () {
    "use strict";
    const cbBotMessages = document.getElementById('cbBotMessages'); // show message
    const cbMessages = document.getElementById('ai_search_display'); // show message
    let menus = [], subMenus=[], filterData=[], config = {}, aisConfig={}, botName = 'aisb100';

    /**
     * Load Image
     * @param src
     * @param alt
     * @returns {HTMLImageElement}
     */
    function image(src, alt) {
        var domain = aisb_root.domain || aisConfig.domain,
            path = aisConfig.path || aisb_root.upload_path,
            img = new Image(),
            def = aisb_root.plugin_dir+'images/default.png';
        // console.log(imageExists(src))
        if (src !=='') {
            img.src = path;
        }else {
            img.src = def;
        }
        img.alt = alt;
        return img;
    }

    /**
     * Menu Click
     * @param event
     */
    function menuClick(e) {
        let tag = e.target.dataset.tag,
            newTarget = e.target.offsetParent.querySelector('.ai_search_display'),
            //newTarget =e.target.parentNode.parentNode.parentNode.querySelector('.ai_search_display'),
            newData=[];
        console.log(newTarget)
        if (tag === 'ais_all'){
            newData = filterData;
        }else {
            for (var i = 0; i < filterData.length; i++) {
                if (filterData[i].type === tag) {
                    newData.push(filterData[i]);
                }
            }
        }
        // Call Action
        callToAction(newTarget, newData);
    }

    /**
     * Execute Menus
     * @param type
     * @param target
     */
    function executeMenus(type, target) {
        let ele;
        try {
            ele = target.offsetParent.querySelector('.ais-menus');
        }catch (e) {
            ele = target.parentNode.querySelector('.ais-menus');
        }
        const subEle = ele.querySelector('.ais-menus-sub');
        if (!!ele){
            // for All
            if (menus.length < 1) {
                var node = document.createElement('DIV');
                node.innerText = 'All';
                node.setAttribute('class', 'ais_pagi');
                node.setAttribute('data-tag', 'ais_all');
                node.addEventListener('click', menuClick, true);
                ele.appendChild(node);
            }
            if (menus.indexOf(type) === -1 ){
                var node = document.createElement('DIV');
                node.innerText = type;
                node.setAttribute('class', 'ais_pagi');
                node.setAttribute('data-tag', type);
                node.addEventListener('click', menuClick, true);
                ele.appendChild(node);
                menus.push( type);
            }
            // Menu Carousal Execute
            menuCarousal(target);
        }
    }

    /**
     * Make Dynamic menu with post type
     * @param target
     */
    function menuCarousal(target) {
        console.log('-----------tr----------');
        console.log(target);
        console.log(target.parentNode);
        console.log(target.offsetParent);
        const container = target.parentNode.querySelector(".ais-menus");
        const lefty = target.parentNode.querySelector(".ais-lefty");
        let translate = 0;

        lefty.addEventListener("click", function() {
            translate += 200;
            container.style.transform = "translateX(" + translate + "px" + ")";
        });

        const righty = target.parentNode.querySelector(".ais-righty");
        righty.addEventListener("click", function() {
            translate -= 200;
            container.style.transform = "translateX(" + translate + "px" + ")";
        });
    }

    /**
     * make Dynamic Template
     * @param key
     * @param data
     * @param type
     * @param target
     * @returns {string}
     */
    function productCarousel(key, data, type, target) {
        var i = 1;
        var data1 = Object.values(data);
        // common.animation('stop');
        var domain = aisb_root.domain || aisConfig.domain,
            path = aisConfig.path || aisb_root.upload_path,
            def = aisb_root.plugin_dir+'images/default.png';

        let imageTemplate = function (id, title, attachment, target) {
            if (config.showImage) {
                var wrap = document.createElement('div'),
                    src = path + attachment;
                // console.log(image(attachment, title))
                wrap.appendChild(image(attachment, title));

                return `
               <div class="cb-product-img cb-img2-${id}" data-action="${(attachment, id, title, target)}">
                    <span class="cb-img-${id}"><img src="${ attachment !=='' ? path + attachment : def}"/></span>
                    <div class="cb-img-hover">
                        <div class="cb-img-overflow"><a class='cb-view-btn' href="${aisb_root.domain.replace(/\/$/, "")}?p=${id}">View Details</a></div>
                    </div>
                </div>`;
            }else {return ''}
        }
        let titleContent = function (id, title, content, theme) {
            if (config.bodyContent) {
                return `
                <div class="cb-s-content">
                    ${config.showTitle ? '<a target="_blank" href="'+aisb_root.domain.replace(/\/$/, "")+'?p='+id+'">'+ title.substring(0, config.showTitleWord || 60)+'</a>':''}
                    ${config.showContent ? '<p class="cb-s-text">'+content.substring(0, config.showContentWord || 100)+'</p>':''}
                </div>`;
            }else {return ''}
        }
        let addToCart = function (id, price, type) {
            if (config.showCartTemplate && type==='product') {
                return `
                <div class="cb-s-footer" style="">
                    <div class="s-price"><span class="ais_price">Price:</span><span class="ais_price_val">${price}</span></div>
                    ${config.addToCart ? '<div class="s-buy s-buy-plus ais-add-to-cart" data-pid="' + id + '">Add to Cart</div>' : ''}
                </div>`;
            }else {return ''}
        }

        return `
        <div class="carousel ais-ani-tb">
            <div class="js-product-carousel carousel__view">
            
            <ul class="cb-product-list js-product-list ${type}">
            ${data.map(post => (`             
                   <li class="ais_pagination ais_pagi_${post.type}" data-action="${config.showPostTypeMenu ? executeMenus(post.type, target) : false}">
                        <div class="sb__cart cb-shadow-1 product-list__item">
                            ${imageTemplate(post.id, post.post_title, post.attachment, target)}
                            ${titleContent(post.id, post.post_title, post.post_content, 'theme')}
                            ${addToCart(post.id, post.price, post.type)}
                        </div>
                    </li>
               
             `)).join(' ')}
            </ul>
        </div>
        </div>
        `;
    }

    /**
     * Main call to action
     * @param target
     * @param label
     */
    function callToAction(target, label) {
        var template = new Promise(function (res, rej) {
            //res(productTemplateDefault(Date.now(), label, 'product-slider-one'))
            // option class --- sb-list-view, sb_big_cart, sb-grid-1,2,3,4
            res(productCarousel(Date.now(), label, 'sb-grid-3', target));
            // res(dataWithPagination(Date.now(), label, 'product-slider-one'));
        }).then(function (result) {
            target.innerHTML = '';
            target.innerHTML = result;
        }).then(function () {
            //slider.execute();
            //carousel.execute();
            if (config.pagination)
            Aisb.pagination.execute(target.querySelector('.cb-product-list'), 'LI', {
                header: false,
                minItem: config.minItem || 6,
                position: config.position || 'afterend', //beforebegin
            });
            // paginate.execute('sbPaginationTable')
            // var height = document.getElementById("ai_search_display").scrollHeight;
            // common.scrollTo(document.querySelector('.scrollbar'), height, 600);
        }).then(function () {
            if (!config.addToCart) return;
            var ais_cart = target.querySelectorAll('.ais-add-to-cart');
            if (ais_cart) {
                ais_cart.forEach(ele => {
                    ele.addEventListener('click', Aisb.eCommerce.onAddToCart);
                });
            }
        });
    }


    /**
     * Default Config
     * @param name
     */
    function defaultConfig(aisConfig) {
        console.log('----------------aisConfig from template page ------------');
        console.log(aisConfig);
        console.log(!!aisConfig);
        if (Object.keys(aisConfig).length !== 0 && aisConfig.constructor === Object){
            config = aisConfig;
        }else {
            config = {
                pagination: 1,
                showImage: true,
                titleOverImage: true,
                bodyContent: true,
                showTitle: true,
                showTitleWord: 60,
                showContent: true,
                showContentWord: 100,
            }
        }
        console.log(config);
    }

    /**
     * Create Template
     * @param controllerName
     * @param label
     * @param target
     */
    function sTemplate(controllerName, label, target) {
        // set default config
        let ais = Aisb.common.aisBot(target);
        console.log(label)
        config = Aisb.common.aisConfig.hasOwnProperty(ais)? Aisb.common.aisConfig[ais] : {};
        console.log(config)
        // defaultConfig(aisConfig);
        // if (!controllerName) return;
        if (label === undefined || label.length == 0) return;
        target.innerHTML = '';
        try {
            target.offsetParent.querySelector('.ais-menus').innerHTML ='';
        }catch (e) {
            target.parentNode.querySelector('.ais-menus').innerHTML ='';
        }

        menus = [];
        filterData = label;

        // Call Action
        callToAction(target, label);

    }



    return {
        set: sTemplate
    }
})();