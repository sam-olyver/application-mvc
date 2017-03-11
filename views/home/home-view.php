<?php if ( ! defined('ABSPATH')) exit; ?>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container-app {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
</head>        
<body>
<?php 
    // /views/_includes/menu.php
    require ABSPATH . '/../views/_includes/_menu.php';

?>
    <div class="container-app">
       	<div class="content">
           	<div class="title">APP - MVC</div>
    	</div>
    </div>