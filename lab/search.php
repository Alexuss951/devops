<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Results</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/rd-mailform.css"/>
    <link rel="stylesheet" href="css/touch-touch.css"/>

    <link href='//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic'
          rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/material-icons.css">

    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>

    <!--[if lt IE 9]>
    <html class="lt-ie9">
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <script src='js/selectivizr-min.js'></script>
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
    <section id="content" class="content well-5">
        <div class="container ">
            <h4>Search Results</h4>
            <div id="search-results"></div>
        </div>
    </section>

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