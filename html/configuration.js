var aisb_root = {
    domain: "http://localhost/wpartificial/",
    plugin_dir: "http://localhost/wpartificial/wp-content/plugins/ais_bot/",
    upload_path: "http://localhost/wpartificial/wp-content/uploads/"
}
var aisConfig = {
    domain: "http://localhost/wpartificial/",
    path: "wp-content/uploads/",
    plugin_dir2: "http://localhost/wpartificial/wp-content/plugins/ais_bot/",
    plugin_dir: "http://localhost/wpartificial/wp-content/plugins/ais_bot/",
    database : "http://localhost/ai-search/features/wProfessor.php",
    aisb101       : {
        // Filter
        filter_by : "product",
        post_type : ["product"],
        tags : ["product"],

        // Search with ok
        ais_se: false,
        ais_title: true,
        ais_content: true,
        ais_excerpt: true,

        // Layout ok
        result_view: 'ais_grid',

        // Template ok
        showImage: true,
        titleOverImage: true,
        bodyContent: true,
        showTitle: true,
        showTitleWord: 60,
        showContent: false,
        showContentWord: 100,
        // Fuji Search
        // Elasticlurn config
        // Action Config

        // pagination ok
        pagination: true,
        minItem : 4,
        position : 'afterend', //beforebegin

        // Header option
        // Dynamic Menu ok
        showConfigSection: true,
        showPostTypeMenu: true,
        showCart: true,
        showLayoutSelector: true,


        // Product Config ok
        wooCommerce : true,
        showCartTemplate : true,
        addToCart : true,
        cart : true,
        price : true,

        //Artificial Intelligence Actions
        enableAiSearchBot: true,
        aiWooCommerceBot: true,
        aiPostsBot: true,
        aiPagesBot: true,
        aiTagsBot: true,
        aiProductsBot: true,
        aiKnowledgeBot: true,
        aiCustomBot: true,
    }
};
// console.log(aisConfig)
// console.log(aisConfig.aisb101)
// console.log(aisConfig.aisb101.post_type)

// Cookies.remove('name', { path: '' });
// Cookies.set('name2', 'value 222', { expires: 1, path: '/' });
// console.log(Cookies.get('name'));