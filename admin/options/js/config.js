require.config({
    paths: {
        //core



        // libs
        jquery: 'libs/jquery-3.4.1.min'
    }
});

require(['aisb-adminjs'],function (aisb) {
    aisb.tabExecute();
});