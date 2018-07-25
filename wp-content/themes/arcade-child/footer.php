<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the main and #page div elements.
 *
 * @since 1.0.0
 */
$bavotasan_theme_options = bavotasan_theme_options();
?>
	</main><!-- main -->

    <div class="elephant-footer">
        <div class="footer__logo--top">
            <a href="#"><img alt="elephant insurance" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/footer_logo.png"/></a>
        </div>
        <div class="footer__top">
            <div class="footer-column footer-column--lg">
                <div class="footer-column__header" data-column="offerings">Insurance Offerings</div>
                <div class="footer-column__links footer-column__links--collapsed" data-columnlink="offerings">
                    <div class="fx fx-col mr-48 mr-0-md">
                        <a href="/car-insurance">Car insurance</a>
                        <a href="/homeowners-insurance">Home insurance</a>
                        <a href="/renters-insurance">Renter's insurance</a>
                        <a href="/condo-insurance">Condo insurance</a>
                        <a href="/motorcycle-insurance">Motorcycle insurance</a>
                    </div>
                    <div class="fx fx-col">
                        
                        <a href="/atv-insurance">ATV insurance</a>
                        <a href="/life-insurance">Life insurance</a>
                        <a href="/property-insurance">Property insurance</a>
                        <a href="/umbrella-insurance">Umbrella insurance</a>
                    </div>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-column__header" data-column="resources">Resources</div>
                <div class="footer-column__links footer-column__links--collapsed" data-columnlink="resources">
                    <div class="fx fx-col">
                        <a href="/about">About Us</a>
                        <a href="/corporate-info/contact">Contact Us</a>
                        <a href="/car-insurance/reviews">Customer Reviews</a>
                        <a href="/careers">Careers</a>
                        <a href="/resources">Blog</a>
                    </div>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-column__header" data-column="customers">Customers</div>
                <div class="footer-column__links footer-column__links--collapsed" data-columnlink="customers">
                    <div class="fx fx-col">
                        <a href="/car-insurance/claims">Claims</a>
                        <a href="/car-insurance/claims/roadside-assistance">Roadside</a>
                        <a href="/car-insurance/discounts">Discounts</a>
                        <a href="/car-insurance/faqs">FAQs</a>
                    </div>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-column__header" data-column="site">Site Info</div>
                <div class="footer-column__links footer-column__links--collapsed" data-columnlink="site">
                    <div class="fx fx-col">
                        <a href="/privacy">Privacy and Security</a>
                        <a href="/terms-of-use">Terms of Use</a>
                        <a href="/sitemap">Site Map</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="footer__logo--bottom fx fc-a-center">
                <a href="/"><img alt="elephant insurance" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/footer_logo.png" /></a>
                <div class="ml-22 copyright">&copy; 2017 Elephant Insurance Services, LLC. All rights reserved.</div>
            </div>
            <div class="fx fc-a-center social-link-container">
                <a href="https://www.facebook.com/ElephantInsurance/"><img alt="facebook" class="social-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/facebook.svg"/></a>
                <a href="https://twitter.com/ElephantAutoIns?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img alt="twitter" class="social-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/twitter.svg" /></a>
                <a href="https://plus.google.com/+elephantinsurance"><img alt="google+" class="social-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/google.svg" /></a>
                <a href="https://www.youtube.com/user/ElephantInsurance"><img alt="youtube" class="social-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/youtube.svg" /></a>
            </div>
            <div class="copyright-mobile">
                &copy; 2017 Elephant Insurance Services, LLC. All rights reserved.
            </div>
        </div>
        <div align="right" id="siteSecure"> 
            <ul>
                 <!-- McAfee SECURE Engagement Trustmark for elephant.com --> <a target="_blank"
                                                                                     href="https://www.mcafeesecure.com/verify?host=elephant.com"><img
                    class="mfes-trustmark" src="//cdn.ywxi.net/meter/elephant.com/102.gif?w=90" width="90" height="37"
                    title="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams"
                    alt="McAfee SECURE sites help keep you safe from identity theft, credit card fraud, spyware, spam, viruses and online scams"
                    oncontextmenu="window.open('https://www.mcafeesecure.com/verify?host=elephant.com'); return false;"
                    style="border-width: 0px; border-style: solid;"></a>
                    <!-- End McAfee SECURE Engagement Trustmark for elephant.com --> </li>
                <script type="text/javascript" src="https://seal.websecurity.norton.com/getseal?host_name=www.elephant.com&amp;size=XS&amp;use_flash=NO&amp;use_transparent=NO&amp;lang=en"></script>
                <a href="http://www.symantec.com/ssl-certificates" target="_blank"  style="color:#000000; text-decoration:none; font:bold 7px verdana,sans-serif; letter-spacing:.5px; text-align:center; margin:0px; padding:0px;"></a></li>
                <img alt="BBB Acredited Business" src="https://d5prcm06amy2t.cloudfront.net/cms/images/bbb_logo.png">
                </li>
            </ul>
        </div>
    </div>


</div><!-- #page -->

<input id="hf_region" type="hidden" data-region="<?php echo do_shortcode( '[geoip-region]' );?>" />

<?php wp_footer(); ?>

		<script>

			var footerColHeader = document.getElementsByClassName("footer-column__header");
			var toggleFooterMenu = function() {
			    var column = this.getAttribute("data-column");

					if ( document.querySelectorAll("[data-columnlink="+ column +"]")[0].classList.contains("footer-column__links--collapsed") ) {
						document.querySelectorAll("[data-columnlink="+ column +"]")[0].classList.remove("footer-column__links--collapsed");
					} else {
						document.querySelectorAll("[data-columnlink="+ column +"]")[0].classList.add("footer-column__links--collapsed");
					}
			};

			for (var i = 0; i < footerColHeader.length; i++) {
			    footerColHeader[i].addEventListener('click', toggleFooterMenu, false);
			}



</script>


</body>
</html>
