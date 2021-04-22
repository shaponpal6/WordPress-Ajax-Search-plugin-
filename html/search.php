<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>autoComplete.js - Vanilla Javascript library</title>
    <meta name=”description" content=”Simple autocomplete pure vanilla Javascript library thats designed for speed, high
          versatility and seamless integration with wide range of projects and systems.”>
    <meta name="keywords"
          content="autoComplete.js, autocomplete, easy-to-use, simple, pure, vanilla, javascript, js, library, speed, lightning, blazing, fast, search, suggestions, versatile, customizable, hackable, developer friendly, zero dependencies, lightweight, high integration, scalable, scalability, open source, github">
    <meta name="subject" content="autoComplete Javascript Library">
    <meta name="author" content="Tarek Raafat">
    <meta name="copyright" content="Tarek Raafat">
    <meta name="owner" content="Tarek Raafat">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--    		<link rel="stylesheet" type="text/css" media="screen" href="./css/autoComplete.css">-->
    <!--    		<link rel="stylesheet" type="text/css" media="screen" href="./css/main.css">-->
    <link rel="stylesheet" type="text/css" media="screen" href="./css/search.css">
    <!--    <link rel="stylesheet" type="text/css" media="screen" href="./css/carousels.css">-->
    <!--    <link rel="stylesheet" type="text/css" media="screen" href="./css/paginate.css">-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
</head>

<body>


<div class="ai-sb-container">

    <div class="sb-ai_search_pro" data-aisb-name="aisb101" data-aisb-id="8">
        <div class="sb-ai-search-box">
            <label class="sb-ai-left-menu"><img src="images/magnifier.svg" style="width: 20px"></label>
            <input id="ai_search_box3" type="text" class="ai_search_input_1" placeholder="What are you looking for?">
            <button class="sb-ai-right-btn"><img src="images/magnifier.svg" style="display: none; width: 20px"> Search
            </button>
        </div>

        <div class="ais-search-config">
            <div class="ais-checkbox" data-action="ais_se" data-value="true">
                <i class="ais-check ais-active">&nbsp;</i> Use Search Engine
            </div>
            <div class="ais-checkbox" data-action="ais_se2" data-value="false">
                <i class="ais-check">&nbsp;</i> Use Search Engine2
            </div>
            <div class="ais-checkbox" data-action="ais_se3" data-value="true">
                <i class="ais-check ais-active">&nbsp;</i> Use Search Engine3
            </div>
        </div>

        <div class="ais-light-box ais-hide">
            <div class="ais-menu-container">
                <button class="ais-lefty ais-paddle" id="left-button"> << </button>
                <div class="ais-menus"></div>
                <button class="ais-righty ais-paddle" id="right-button"> >> </button>
            </div>
            <div class="ais-shopping-cart"><img style="width: 20px" src="images/shopping-cart-solid.svg"/><sup
                        class="ais-cart-count">0</sup></div>
            <div class="ais-setting-box ais-grid" data-style="grid">
                <img style="width: 20px" src="images/list.svg"/>
            </div>
        </div>

        <div class="ai_search_display scrollbar ais-hide">
            <div class="ais-search-result"></div>
        </div>
    </div>


    <div class="sb-ai_search_pro" data-aisb-name="aisb102" data-aisb-id="9">
        <div class="sb-ai-search-box">
            <label class="sb-ai-left-menu"><img src="images/magnifier.svg" style="width: 30px"></label>
            <input id="ai_search_box" type="text" class="ai_search_input_1" placeholder="What are you looking for?">
            <button class="sb-ai-right-btn">Search</button>
        </div>

        <div class="ais-search-config">

            <div class="ais-checkbox" data-action="ais_se" data-value="true">
                <i class="ais-check">&nbsp;</i> Use Search Engine
            </div>
            <div class="ais-checkbox" data-action="ais_se" data-value="true">
                <i class="ais-check">&nbsp;</i> Use Search Engine2
            </div>
            <div class="ais-checkbox" data-action="ais_se" data-value="true">
                <i class="ais-check">&nbsp;</i> Use Search Engine3
            </div>
        </div>


        <div class="ais-light-box">
            <div class="ais-menus"></div>
            <div class="ais-shopping-cart"><img style="width: 20px" src="images/shopping-cart-solid.svg"/><sup
                        class="ais-cart-count">22</sup></div>
            <div class="ais-setting-box ais-grid" data-style="grid">
                <img style="width: 20px" src="images/list.svg"/>
            </div>
        </div>

        <div id="ai_search_display" class="ai_search_display scrollbar">

            <!--            <div class="ais-loader"></div>-->
            <div class="ais-search-result"></div>

            <div class="carousel ais-ani-tb">
                <div class="js-product-carousel carousel__view">
                    <span class="carousel__control js-carousel-prev"><i class="icon"> &lt;&lt; </i></span>
                    <span href="#" class="carousel__control js-carousel-next"><i class="icon"> &gt;&gt; </i></span>

                    <ul class="cb-product-list js-product-list sb-list-view2 sb_big_cart2 sb-grid-2---">

                        <li>
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy S10+">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=11">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=11">Samsung Galaxy S10+</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy S10+</p>
                                    <div class="cb-s-footer">
                                        <div class="s-price">Price: $99</div>
                                        <div class="s-buy">Buy Now</div>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy A50">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=13">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=13">Samsung Galaxy A50</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A50</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a30.jpeg"
                                         alt="Samsung Galaxy A30">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=15">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=15">Samsung Galaxy A30</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A30</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-m10.jpeg"
                                         alt="Samsung Galaxy M10">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=21">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=21">Samsung Galaxy M10</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M10</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy M20">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=23">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=23">Samsung Galaxy M20</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M20</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-j2-core.jpeg"
                                         alt="Samsung Galaxy J2 Core">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=19">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=19">Samsung Galaxy J2 Core</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy J2 Core</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy S10+">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=11">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=11">Samsung Galaxy S10+</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy S10+</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy A50">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=13">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=13">Samsung Galaxy A50</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A50</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a30.jpeg"
                                         alt="Samsung Galaxy A30">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=15">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=15">Samsung Galaxy A30</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A30</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-m10.jpeg"
                                         alt="Samsung Galaxy M10">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=21">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=21">Samsung Galaxy M10</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M10</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy M20">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=23">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=23">Samsung Galaxy M20</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M20</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-j2-core.jpeg"
                                         alt="Samsung Galaxy J2 Core">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=19">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=19">Samsung Galaxy J2 Core</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy J2 Core</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy S10+">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=11">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=11">Samsung Galaxy S10+</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy S10+</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy A50">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=13">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=13">Samsung Galaxy A50</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A50</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a30.jpeg"
                                         alt="Samsung Galaxy A30">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=15">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=15">Samsung Galaxy A30</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A30</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-m10.jpeg"
                                         alt="Samsung Galaxy M10">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=21">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=21">Samsung Galaxy M10</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M10</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy M20">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=23">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=23">Samsung Galaxy M20</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M20</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-j2-core.jpeg"
                                         alt="Samsung Galaxy J2 Core">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=19">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=19">Samsung Galaxy J2 Core</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy J2 Core</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>


                    </ul>
                </div>
            </div>


        </div>
    </div>

</div>
<div class="ai-sb-container">

    <div class="sb-ai_search_pro" data-aisb-name="aisb101" data-aisb-id="7">
        <div class="sb-ai-search-box">
            <label class="sb-ai-left-menu"><img src="images/magnifier.svg" style="width: 20px"></label>
            <input id="ai_search_box3" type="text" class="ai_search_input_1" placeholder="What are you looking for?">
            <button class="sb-ai-right-btn"><img src="images/magnifier.svg" style="display: none; width: 20px"> Search
            </button>
        </div>

        <div class="ais-search-config">

            <div class="ais-checkbox" data-action="ais_se" data-value="true">
                <i class="ais-check ais-active">&nbsp;</i> Use Search Engine
            </div>
            <div class="ais-checkbox" data-action="ais_se2" data-value="false">
                <i class="ais-check">&nbsp;</i> Use Search Engine2
            </div>
            <div class="ais-checkbox" data-action="ais_se3" data-value="true">
                <i class="ais-check ais-active">&nbsp;</i> Use Search Engine3
            </div>
        </div>

        <div class="ais-light-box">
            <div class="ais-menu-container">
                <button class="ais-lefty ais-paddle" id="left-button"> << </button>
                <div class="ais-menus">
                    <div class="ais_pagi" data-tag="ais_all">All</div>
                    <div class="ais_pagi" data-tag="product">product</div>
                    <div class="ais_pagi" data-tag="product">product2</div>
                    <div class="ais_pagi" data-tag="product">product3</div>
                    <div class="ais_pagi" data-tag="product">product4</div>
                    <div class="ais_pagi" data-tag="product">product5</div>
                    <div class="ais_pagi" data-tag="page">page2</div>
                    <div class="ais_pagi" data-tag="page">page3</div>
                    <div class="ais_pagi" data-tag="page">page4</div>
                    <div class="ais_pagi" data-tag="page">page5</div>
                    <div class="ais_pagi" data-tag="page">page6</div>
                    <div class="ais_pagi" data-tag="product">product2</div>
                    <div class="ais_pagi" data-tag="product">product3</div>
                    <div class="ais_pagi" data-tag="product">product4</div>
                    <div class="ais_pagi" data-tag="product">product5</div>
                    <div class="ais_pagi" data-tag="page">page2</div>
                    <div class="ais_pagi" data-tag="page">page3</div>
                    <div class="ais_pagi" data-tag="page">page4</div>
                    <div class="ais_pagi" data-tag="page">page5</div>
                    <div class="ais_pagi" data-tag="page">page6</div>
                    <div class="ais_pagi" data-tag="product">product2</div>
                    <div class="ais_pagi" data-tag="product">product3</div>
                    <div class="ais_pagi" data-tag="product">product4</div>
                    <div class="ais_pagi" data-tag="product">product5</div>
                    <div class="ais_pagi" data-tag="page">page2</div>
                    <div class="ais_pagi" data-tag="page">page3</div>
                    <div class="ais_pagi" data-tag="page">page4</div>
                    <div class="ais_pagi" data-tag="page">page5</div>
                    <div class="ais_pagi" data-tag="page">page6</div>
                    <div class="ais_pagi" data-tag="product">product2</div>
                    <div class="ais_pagi" data-tag="product">product3</div>
                    <div class="ais_pagi" data-tag="product">product4</div>
                    <div class="ais_pagi" data-tag="product">product5</div>
                    <div class="ais_pagi" data-tag="page">page2</div>
                    <div class="ais_pagi" data-tag="page">page3</div>
                    <div class="ais_pagi" data-tag="page">page4</div>
                    <div class="ais_pagi" data-tag="page">page5</div>
                    <div class="ais_pagi" data-tag="page">page6</div>
                    <div class="ais_pagi" data-tag="page">page7</div>
                </div>
                <button class="ais-righty ais-paddle" id="right-button"> >> </button>
            </div>
            <div class="ais-shopping-cart"><img style="width: 20px" src="images/shopping-cart-solid.svg"/><sup
                        class="ais-cart-count">22</sup></div>
            <div class="ais-setting-box ais-grid" data-style="grid">
                <img style="width: 20px" src="images/list.svg"/>
            </div>
        </div>

        <div id="ai_search_display2" class="ai_search_display scrollbar">
            <div class="ais-search-result"></div>
        </div>
    </div>


    <div class="sb-ai_search_pro" data-aisb-name="aisb102" data-aisb-id="10">
        <div class="sb-ai-search-box">
            <label class="sb-ai-left-menu"><img src="images/magnifier.svg" style="width: 30px"></label>
            <input id="ai_search_box" type="text" class="ai_search_input_1" placeholder="What are you looking for?">
            <button class="sb-ai-right-btn">Search</button>
        </div>

        <div class="ais-search-config">

            <div class="ais-checkbox" data-action="ais_se" data-value="true">
                <i class="ais-check">&nbsp;</i> Use Search Engine
            </div>
            <div class="ais-checkbox" data-action="ais_se" data-value="true">
                <i class="ais-check">&nbsp;</i> Use Search Engine2
            </div>
            <div class="ais-checkbox" data-action="ais_se" data-value="true">
                <i class="ais-check">&nbsp;</i> Use Search Engine3
            </div>
        </div>


        <div class="ais-light-box">
            <div class="ais-menus"></div>
            <div class="ais-shopping-cart"><img style="width: 20px" src="images/shopping-cart-solid.svg"/><sup
                        class="ais-cart-count">22</sup></div>
            <div class="ais-setting-box ais-grid" data-style="grid">
                <img style="width: 20px" src="images/list.svg"/>
            </div>
        </div>

        <div id="ai_search_display" class="ai_search_display scrollbar">

            <!--            <div class="ais-loader"></div>-->
            <div class="ais-search-result"></div>

            <div class="carousel ais-ani-tb">
                <div class="js-product-carousel carousel__view">
                    <span class="carousel__control js-carousel-prev"><i class="icon"> &lt;&lt; </i></span>
                    <span href="#" class="carousel__control js-carousel-next"><i class="icon"> &gt;&gt; </i></span>

                    <ul class="cb-product-list js-product-list sb-list-view2 sb_big_cart2 sb-grid-2---">

                        <li>
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy S10+">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=11">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=11">Samsung Galaxy S10+</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy S10+</p>
                                    <div class="cb-s-footer">
                                        <div class="s-price">Price: $99</div>
                                        <div class="s-buy">Buy Now</div>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy A50">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=13">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=13">Samsung Galaxy A50</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A50</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a30.jpeg"
                                         alt="Samsung Galaxy A30">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=15">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=15">Samsung Galaxy A30</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A30</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-m10.jpeg"
                                         alt="Samsung Galaxy M10">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=21">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=21">Samsung Galaxy M10</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M10</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy M20">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=23">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=23">Samsung Galaxy M20</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M20</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-j2-core.jpeg"
                                         alt="Samsung Galaxy J2 Core">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=19">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=19">Samsung Galaxy J2 Core</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy J2 Core</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy S10+">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=11">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=11">Samsung Galaxy S10+</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy S10+</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy A50">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=13">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=13">Samsung Galaxy A50</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A50</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a30.jpeg"
                                         alt="Samsung Galaxy A30">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=15">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=15">Samsung Galaxy A30</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A30</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-m10.jpeg"
                                         alt="Samsung Galaxy M10">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=21">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=21">Samsung Galaxy M10</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M10</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy M20">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=23">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=23">Samsung Galaxy M20</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M20</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-j2-core.jpeg"
                                         alt="Samsung Galaxy J2 Core">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=19">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=19">Samsung Galaxy J2 Core</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy J2 Core</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy S10+">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=11">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=11">Samsung Galaxy S10+</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy S10+</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy A50">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=13">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=13">Samsung Galaxy A50</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A50</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a30.jpeg"
                                         alt="Samsung Galaxy A30">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=15">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=15">Samsung Galaxy A30</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy A30</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-m10.jpeg"
                                         alt="Samsung Galaxy M10">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=21">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=21">Samsung Galaxy M10</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M10</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wordpress/wp-content/uploads/mobile/samsung/samsung-galaxy-a50.jpeg"
                                         alt="Samsung Galaxy M20">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=23">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=23">Samsung Galaxy M20</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy M20</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>
                        <li class="sb_big_cart">
                            <div class="sb__cart cb-shadow-1 product-list__item">
                                <div class="cb-product-img">
                                    <img src="http://localhost/wpartificial/wp-content/uploads/mobile/samsung/samsung-galaxy-j2-core.jpeg"
                                         alt="Samsung Galaxy J2 Core">
                                    <div class="cb-img-hover">
                                        <div class="cb-img-overflow"><a class="cb-view-btn"
                                                                        href="http://localhost/wordpress?p=19">View
                                                Details</a></div>
                                    </div>
                                </div>
                                <div class="cb-s-content">
                                    <a href="http://localhost/wordpress?p=19">Samsung Galaxy J2 Core</a>
                                    <hr>
                                    <p class="cb-s-text">Samsung Galaxy J2 Core</p>
                                </div>
                                <div class="cb-s-footer">
                                    <div class="s-price">Price: $99</div>
                                    <div class="s-buy">Buy Now</div>
                                </div>
                            </div>
                        </li>


                    </ul>
                </div>
            </div>


        </div>
    </div>

</div>
<a href="http://localhost/wpartificial/wp-content/plugins/ais_bot/minify/js_min.php" target="_blank">Js Minify</a> ||
<a href="http://localhost/wpartificial/wp-content/plugins/ais_bot/minify/css_min.php" target="_blank">CSS Minify</a>
<!--		<script src="./js/autoComplete.min.js"></script>-->
<!--		<script src="./js/index.js"></script>-->
<!--<script src="https://www.gstatic.com/firebasejs/5.7.2/firebase.js"></script>-->
<!--<script>-->
<!--    // Initialize Firebase-->
<!--    var config = {-->
<!--        apiKey: "AIzaSyBOBOE_v_FSqJh70UdnGnyKYTdtELz0BEY",-->
<!--        databaseURL: 'https://screets-live-chat-4e0f0.firebaseio.com',-->
<!--        serviceAccount: 'screets-live-chat-4e0f0-firebase-adminsdk-wikmy-6d7de2b13f.json'-->
<!--    };-->
<!--    firebase.initializeApp(config);-->
<!--</script>-->
<!--<script src="friendlychat/scripts/main.js"></script>-->


<!--<script src="js.cookie.min.js" type="text/javascript" charset="utf-8"></script>-->

<!--<script src="configuration.js" type="text/javascript" charset="utf-8"></script>-->
<!--<script src="botjs/jquery.min.js" type="text/javascript" charset="utf-8"></script>-->
<!--<script src="botjs/fuse.min.js" type="text/javascript" charset="utf-8"></script>-->
<!--<script data-main="botjs/config" src="require.js"></script>-->
<!--<script src="botjs/myDreamProject.js"></script>-->


<!--fuseSearch: 'fuseSearch',-->
<!--eCommerce: 'eCommerce',-->
<!--searchBot: 'searchBot',-->
<!--help: 'help',-->
<!--controller: 'controller',-->
<!--actionBot: 'actionBot',-->
<!--knowledgeBase: 'knowledgeBase',-->
<!--customBot: 'customBot',-->
<!--axios: 'axios.min',-->
<!--template: 'template',-->
<!--elasticlunr: 'elasticlunr',-->
<!--searchEngine: 'searchEngine',-->
<!--pagination: 'pagination',-->
<!--jsCookie: 'jsCookie',-->

<script src="configuration.js" type="text/javascript" charset="utf-8"></script>


<script src="botjs/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="botjs/fuse.min.js" type="text/javascript" charset="utf-8"></script>
<script src="botjs/jsCookie.js"></script>
<script src="botjs/Aisb.js"></script>
<script src="botjs/elasticlunr.js"></script>
<script src="botjs/pagination.js"></script>
<script src="botjs/axios.min.js"></script>
<script src="botjs/common.js"></script>
<script src="botjs/eCommerce.js"></script>
<script src="botjs/help.js"></script>
<script src="botjs/knowledgeBase.js"></script>
<script src="botjs/customBot.js"></script>
<script src="botjs/actionBot.js"></script>
<script src="botjs/template.js"></script>
<script src="botjs/searchEngine.js"></script>
<script src="botjs/controller.js"></script>
<script src="botjs/searchBot.js"></script>



<!-- 'jquery.min','fuse.min', 'jsCookie','elasticlunr','pagination','axios.min','common','eCommerce','help','knowledgeBase',
'customBot','actionBot','template','fuseSearch','searchEngine','controller','searchBot'
-->

<!--<script src="../public/js/wpartificial-search.min.js"></script>-->
<script>
    // searchBot.bot();
</script>




</body>

</html>