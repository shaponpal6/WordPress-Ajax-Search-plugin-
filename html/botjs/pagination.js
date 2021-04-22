WPArtificialSB.prototype.pagination = (function () {
    "use strict";

    function execute(tId, tab, config = {}) {

        // get the table element
        var $table = (typeof tId === 'string' || tId instanceof String) ? document.querySelector(tId) : tId,
            $pg_width = $table.offsetWidth;
        if (!$table) return console.error('Wrong Configuration');
        var $li = $table.querySelectorAll(tab);
        // Enable Add to cart
        // add_to_cart($li);

        if (!$li || $li.length < 1) return console.warn('Less number of rows per page : ' + tab);
        var $name = Math.floor(Math.random() * (900 - 6 + 1)) + 6,
            $n = config.minItem || 10, // number of rows per page,
            // number of rows of the table
            $rowCount = $li.length,
            // get the first cell's tag name (in the first row)
            $firstRow = tab === 'TH' ? $li[0].firstElementChild.tagName : $li[0].tagName,
            // boolean var to check if table has a head row
            $hasHead = (config.header || false),
            // an array to hold each row
            $tr = [],
            // loop counters, to start count from rows[1] (2nd row) if the first row has a head tag
            $i, $ii, $j = ($hasHead) ? 1 : 0,
            $position = ['beforebegin', 'afterbegin', 'beforeend', 'afterend'],
            // holds the first row if it has a (<TH>) & nothing if (<TD>)
            $th = ($hasHead ? $li[0].outerHTML : "");
        // count the number of pages
        var $pageCount = Math.ceil($rowCount / $n);
        // if we had one page only, then we have nothing to do ..

        if ($pageCount > 1) {
            // assign each row outHTML (tag name & innerHTML) to the array
            for ($i = $j, $ii = 0; $i < $rowCount; $i++, $ii++) {
                $tr[$ii] = $li[$i].outerHTML;
            }
            // create a div block to hold the buttons
            $table.insertAdjacentHTML($position.indexOf(config.position) > -1 ? config.position : 'afterend', "<div class='ais-pagination-btn'></div>");
            // the first sort, default page is the first one
            sort(1);
        }



        // ($p) is the selected page number. it will be generated when a user clicks a button
        function sort($p) {
            /* create ($rows) a variable to hold the group of rows
            ** to be displayed on the selected page,
            ** ($s) the start point .. the first row in each page, Do The Math
            */
            var $rows = $th, $s = (($n * $p) - $n);
            for ($i = $s; $i < ($s + $n) && $i < $tr.length; $i++){
                $rows += $tr[$i];
            }
            // add_to_cart($li);


            // now the table has a processed group of rows ..
            $table.innerHTML = $rows;
            // create the pagination buttons
            var btn = $table.parentElement.querySelector('.ais-pagination-btn');
            btn.innerHTML = pageButtons($pageCount, $p);
            // CSS Stuff
            btn.querySelector("#sp_" + $p + $name).setAttribute("class", "ais_pg_active");

            // Set OnClick
            var pgBtn = btn.querySelectorAll('.ais-pgBtn');
            // Get Width
            var $ele_width = 0;
            pgBtn.forEach(ele => {
                $ele_width += ele.offsetWidth;
            });
            var $item = Math.floor($pg_width/($ele_width/$pageCount));
            // Set Onclick
            for (var i = 0; i < pgBtn.length; i++){
                pgBtn[i].addEventListener("click", e => sort(e.target.dataset.id));
                // Hide Button
                var $center = ($item-2)/2;
                if (pgBtn.length > $item  ){
                    if (i > 2 && i < pgBtn.length-2 && i > $item-4 ){
                        (i===pgBtn.length-3) ? pgBtn[pgBtn.length-3].value = '..' : pgBtn[i].style.display = 'none';
                    }
                }
            }
			//setTimeout(()=>{add_to_cart($li)},3000);
            // add_to_cart($li)
           
        }

        function addToCart(e){
            console.log('click add to cart');
            console.log(e);
        }

        // add to cart
        function add_to_cart(target) {
            // console.log(target);
            // var ais_cart = target.querySelectorAll('.ais-add-to-cart');
            // console.log(ais_cart);
            // return;
            // if (!config.addToCart) return;
            for (var c =0; c < target.length; c++){
                var ais_cart = target[c].querySelector('.ais-add-to-cart');
                console.log(ais_cart);
                console.log(!!ais_cart);
                if (!!ais_cart) {
                    ais_cart.addEventListener('click', addToCart);
                    // ais_cart.addEventListener('click', eCommerce.onAddToCart);
                   /** ais_cart.forEach(ele => {
                        console.log(ele);
                        ele.addEventListener('click', eCommerce.onAddToCart);
                    });
					*/
                }
            }
            // return;


        }


        // ($pCount) : number of pages,($cur) : current page, the selected one ..
        function pageButtons($pCount, $cur) {
            /* this variables will disable the "Prev" button on 1st page
               and "next" button on the last one */
            var $prevDis = ($cur == 1) ? "disabled" : "",
                $nextDis = ($cur == $pCount) ? "disabled" : "",
                /* this ($buttons) will hold every single button needed
                ** it will creates each button and sets the onclick attribute
                ** to the "sort" function with a special ($p) number..
                */
                $buttons = "<input class='ais-pgBtn' data-id='" + ($cur - 1) + "' type='button' value='&#171;' " + $prevDis + ">";
            for ($i = 1; $i <= $pCount; $i++) {
                $buttons += "<input class='ais-pgBtn' data-id='" + $i + "' type='button' id='sp_" + $i + $name + "'value='" + $i + "'>";
            }
            $buttons += "<input class='ais-pgBtn' data-id='" + (parseInt($cur) + 1) + "' type='button' value='&#187;' " + $nextDis + ">";
            return $buttons;
        }

    }

    return {
        execute: execute
    }

})();