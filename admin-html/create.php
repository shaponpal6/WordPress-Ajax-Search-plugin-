<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Multi Step Form with Progress Bar using jQuery and CSS3</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


        <link rel="stylesheet" href="css/aisb-admin.css">
        <link rel="stylesheet" href="css/setup.css">
        <link rel="stylesheet" href="css/create.css">

<!--    <link rel="stylesheet" href="css/minify.css">-->


</head>

<body>

<!-- multistep form -->
<div class="aisb-setting" data-action="aisb_create">

    <div class="ais_create_step">
        <h2 class="fs-title">Create your Search Bot</h2>
        <h3 class="fs-subtitle">This is step 1</h3>
        <div class="s-row">
            <label for="botName">Name</label>
            <div class="s-action">
                <input type="text" id="botName" class="main__input ais-item" data-key="botName" data-action="text" data-value="" placeholder="">
            </div>
        </div>
        <input id="aisb_create_btn" type="button" name="next" data-action="create" class="ais_create_btn next action-button" value="Create" />
    </div>

<!--    Display Bot-->
    <div class="ais_create_step">
        <h2 class="fs-title">Create your Search Bot</h2>
        <h3 class="fs-subtitle">This is step 1</h3>
        <table  id="ais_bot_list">
        </table>

    </div>

</div>
<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
<!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>-->



<!--<script  src="./script.js"></script>-->
<!--<script data-main="js/config" src="js/libs/require.js"></script>-->


<script src="js/libs/jquery-3.4.1.min.js"></script>
<script src="js/common.js"></script>
<script src="js/aisb_setup.js"></script>
<script src="js/aisb_create.js"></script>
<script src="js/config.js"></script>
<!---->
<!---->
<!--<script src="js/ais-admin.min.js"></script>-->




</body>

</html>