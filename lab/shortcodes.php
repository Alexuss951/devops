<?php
define("CSS_PATH", "css/");
?>

<!DOCTYPE html>
<html lang="en" class="wide">
<head>
    <title>Shortcodes</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/rd-mailform.css"/>


    <link href='//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic'
          rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/material-icons.css">

    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <style>
 
        .icon-short-code {
          font-size: 16px;
        }

        .icon-short-code .box__left {
          padding-right: 10px;
          color: black;
        }

        h2{
            font-family: Roboto, sans-serif;
            font-size: 45px;
            line-height: 1.7;
        }

        h3{
            font-weight: 700;
            text-transform: uppercase;
            font-size: 28px;
            line-height: 1.7;
        }

		h2 + h3{
			margin-top: 30px;
		}

		h3 + .row{
			margin-top: 20px;
		}

		.row + h3{ 
			margin-top: 60px;	
		}

        .box .box__left, 
        .box .box__right,
        .box .box__body { 
          display: table-cell;
          vertical-align: top;
        }
    </style>

    <!--[if lt IE 10]>
    <div
        style='background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <script src='js/device.min.js'></script>
</head>

<body>
<div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->

    <header class="bg-primary-variant-1 text-center text-md-left">
        <section>
            <div id="stuck_container" class="stuck_container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-7 inset-1">
                            <div class="brand">
                                <h1 class="brand_name text-sm-left">
                                    <a href="./">Pharmacy</a>
                                </h1>
                            </div>
                            <ul class="inline-list pull-sm-right">
                                <li><a href="#" class="icon icon-sm icon-default fa-facebook"></a></li>
                                <li><a href="#" class="icon icon-sm icon-default fa-linkedin"></a></li>
                                <li><a href="#" class="icon icon-sm icon-default fa-skype"></a></li>
                            </ul>
                        </div>
                        <div class="col-md-5 col-sm-5 offset-1 bg-primary-variant-2">
                            <form class="search-form text-sm-left" action="search.php" method="GET"
                                  accept-charset="utf-8">
                                <h6 class="regular">Search</h6>
                                <label class="search-form_label">
                                    <input class="search-form_input" type="text" name="s" autocomplete="off"/>
                                    <span class="search-form_liveout"></span>
                                </label>
                                <button class="search-form_submit material-icons-search" type="submit"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </header>

    <!--========================================================
                              CONTENT
    =========================================================-->
    <main class="content">
        <!-- Shortcodes -->
        <section class="well-5">
            <div class="container">

                <!-- Icons -->
                <?php
                $packs = array(
                    "font-awesome","material-icons", "hotel-pictograms", "material-design", "linecons", "fl-sympletts",
                    "fl-squared-ui", "fl-soft-icons", "fl-simpleicon-communication",
                    "fl-real-estate-3", "fl-puppets", "fl-outicons", "fl-line-ui",
                    "fl-line-icon-set", "fl-justicons", "fl-icon-works", "fl-great-icon-set",
                    "fl-glypho", "fl-free-chaos", "fl-flat-icons-set-2", "fl-fill-round-icons",
                    "fl-dripicons", "fl-drawing-tools", "fl-demo-icons", "fl-demo-icons", "fl-crisp-icons",
                    "fl-continuous", "fl-clear-icons", "fl-chapps", "fl-budicons-launch", "fl-budicons-free",
                    "fl-bigmug-line", "fl-36-slim-icons", "beach-icons", "arrows"
                );

                $di = new RecursiveDirectoryIterator(CSS_PATH);
                $files = array();
                $fa = 0;
                foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
                    if (in_array(basename($filename, ".css"), $packs)) {
                        if (basename($filename, ".css") != "font-awesome"){
                            array_push($files, $filename);
                            echo "<link rel='stylesheet' href='css/" . basename($filename) . "'>";
                        }
                        else{
                            $fa = 1;
                        }

                    }
                }

                if($fa){
                    array_push($files, "css\\font-awesome.css");
                    echo "<link rel='stylesheet' href='css/" . basename($filename) . "'>";
                }

                if (count($files) > 0) {
                    echo '<h2>Icons</h2>';
                    foreach ($files as $i => $filename) {
                        echo '<h3>' . basename($filename, ".css") . '</h3>';
                        echo '<div class="row">';
                        $handle = fopen($filename, "r");
                        $icons = array();

                        while (($line = fgets($handle)) !== false) {
                            if (preg_match("/\.(" . ( (basename($filename, ".css") == "material-design") || (basename($filename, ".css") == "hotel-pictograms") ? "(flaticon)|(material-design)" : basename($filename, ".css")) . "-[\w\d_-]+)\:before\s*\{/i", $line, $result)) {
                                array_push($icons, $result[1]);
                            }


                            switch (basename($filename, ".css")) {
                                case 'font-awesome':
                                    if(preg_match("/\.(fa-[\w\d_-]+)\:before\s*\{/i", $line, $result)) {
                                        array_push($icons, $result[1]);
                                    }
                                    break;

                            }
                        }



                        if (count($icons) <= 10){
                            $bp = ceil(count($icons) / 5);
                        }
                        else{
                            $bp = ceil(count($icons) / 10);
                        }

                        foreach ($icons as $i => $value) {
                            if (fmod($i + $bp, $bp) == 0) {
                                if ($i != 0) {
                                    echo '</div>';
                                }
                                echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 clear-shortcode-xs-6">';
                            }
                            echo '<div class="box icon-short-code">';
                            echo '<div class="box__left">';
                            echo '<div class="icon ' . $value . '"></div>';
                            echo '</div>';
                            echo '<div class="box__body"> .' . $value . '</div>';
                            echo '</div>';
                            if ($i == count($icons) - 1) {
                                echo '</div>';
                            }
                        }

                        echo '</div>';
                        fclose($handle);
                    }
                }
                ?>
                <!-- END Icons -->
            </div>
        </section>
        <!-- END Shortcodes -->
    </main>

    <!--========================================================
                             FOOTER
   =========================================================-->
    <footer class="bg-footer text-center text-md-left">
        <div class="container">
            <div class="row">

                <div class="col-md-6 well-7 inset-10 pull-md-right">
                    <h4>Contacts</h4>
                    <!-- RD Mailform -->
                    <form class='rd-mailform' method="post" action="bat/rd-mailform.php">
                        <!-- RD Mailform Type -->
                        <input type="hidden" name="form-type" value="contact"/>
                        <!-- END RD Mailform Type -->
                        <fieldset>

                            <label data-add-placeholder>
                                <input type="text"
                                       name="name"
                                       placeholder="Name"
                                       data-constraints="@NotEmpty @LettersOnly"/>
                            </label>

                            <label data-add-placeholder>
                                <input type="text"
                                       name="email"
                                       placeholder="E-mail"
                                       data-constraints="@NotEmpty @Email"/>
                            </label>

                            <label data-add-placeholder>
                                <textarea name="message" placeholder="Message"
                                          data-constraints="@NotEmpty"></textarea>
                            </label>

                            <div class="mfControls btn-group">
                                <button class="btn btn-md-variant-3 btn-secondary" type="submit">Send</button>
                            </div>

                            <div class="mfInfo"></div>
                        </fieldset>
                    </form>
                    <!-- END RD Mailform -->
                </div>

                <div class="col-md-6 well-7 pull-md-left">
                    <div class="brand">
                        <h1 class="brand_name">
                            <a href="./">Pharmacy</a>
                        </h1>
                    </div>
                    <address>
                        9870 St Mary Place,<br class="br-lg-visible">
                        London, DC 45 Fr 45.
                    </address>
                    <dl>
                        <dt>E-mail:</dt>
                        <dd><a href='mailto:#'>mail@demolink.org</a></dd>
                    </dl>
                    <dl class="contact-info">
                        <dt>Tel:</dt>
                        <dd><a href='callto:#'>800-2345-6789</a></dd>
                    </dl>
                    <ul class="inline-list">
                        <li><a href="#" class="icon icon-sm icon-default fa-facebook"></a></li>
                        <li><a href="#" class="icon icon-sm icon-default fa-linkedin"></a></li>
                        <li><a href="#" class="icon icon-sm icon-default fa-skype"></a></li>
                    </ul>
                    <p>
                        &copy; <span id="copyright-year"></span>
                        All Rights Reserved.
                    </p>

                    <!-- {%FOOTER_LINK} -->
                </div>

            </div>
        </div>

    </footer>

</div>

<script src="js/script.js"></script>

</body>
</html>