        <!--========== FOOTER ==========-->
        <footer class="footer">
            <!-- Links -->
            <div class="section-seperator">
                <div class="content-md container">
                    <div class="row">
                        <div class="col-sm-2 sm-margin-b-30">
                            <!-- List -->
                            <ul class="list-unstyled footer-list">
                                <li class="footer-list-item"><a href="/acasa">Home</a></li>
                                <li class="footer-list-item"><a href="/about.html">About</a></li>
                                <li class="footer-list-item"><a href="/articles.html">Articles</a></li>
                                <li class="footer-list-item"><a href="/login.html">Login</a></li>
                            </ul>
                            <!-- End List -->
                        </div>
                        <div class="col-sm-2 sm-margin-b-30">
                            <!-- List -->
                            <ul class="list-unstyled footer-list">
                                <li class="footer-list-item"><a href="https://twitter.com/PopAndrei12">Twitter</a></li>
                                <li class="footer-list-item"><a href="https://www.facebook.com/shagiy">Facebook</a></li>
                                <li class="footer-list-item"><a href="https://www.instagram.com/mithaias/">Instagram</a></li>
                                <li class="footer-list-item"><a href="https://www.youtube.com/channel/UC6RNaX3Pl8jr3Iy9GG5u6FA">YouTube</a></li>
                            </ul>
                            <!-- End List -->
                        </div>
                        <div class="col-sm-3">
                            <!-- List -->
                            <ul class="list-unstyled footer-list">
                                <li class="footer-list-item"><a href="http://keenthemes.com/">Privacy Policy</a></li>
                                <li class="footer-list-item"><a href="http://keenthemes.com/">Terms &amp; Conditions</a></li>
                            </ul>
                            <!-- End List -->
                        </div>
                    </div>
                    <!--// end row -->
                </div>
            </div>
            <!-- End Links -->
        </footer>
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="/UI/HTML/vendor/jquery.min.js" type="text/javascript"></script>
        <script src="/UI/HTML/vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="/UI/HTML/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <?php
        // PAGE LEVEL PLUGINS / SCRIPTS
        if (file_exists("UI/pages/" . $scripts)) {
            include "UI/pages/" . $scripts;
        }
        ?>

        <!-- ALL MODELS LOADED HERE -->
        <script type="text/javascript" src="/UI/models/Articles.js"></script>
        <script type="text/javascript" src="/UI/models/Article.js"></script>
        <script type="text/javascript" src="/UI/models/Login.js"></script>
        <script type="text/javascript" src="/UI/models/Signup.js"></script>

        <!-- ALL VIEWS LOADED HERE -->
        <script type="text/javascript" src="/UI/views/articles.js"></script>
        <script type="text/javascript" src="/UI/views/article.js"></script>
        <script type="text/javascript" src="/UI/views/login.js"></script>
        <script type="text/javascript" src="/UI/views/logout.js"></script>
        <script type="text/javascript" src="/UI/views/newArt.js"></script>
        <script type="text/javascript" src="/UI/views/signup.js"></script>
        <script type="text/javascript" src="/UI/views/searchBox.js"></script>

        <!-- SOME PLUGINS AND SOME SCRIPTS
        ARE LOADED IN THEYR SPECIFIC PAGES-->

    </body>
    <!-- END BODY -->
</html>