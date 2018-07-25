<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @since 1.0.0
 */
get_header(); ?>

	<div class="container">
		<div class="row">
			<div id="primary" <?php bavotasan_primary_attr(); ?>>
    			<article id="post-0" class="post error404 not-found">
    				
    		    	<header>
    		    	   	<h1 class="entry-title taggedlink"><?php _e( 'Oh dear, we have come up empty.', 'arcade-child' ); ?></h1>
    		        </header>
    		        <div class="entry-content description">
    		            <p><?php _e( "We apologize that we could not find the page you requested. A link or bookmark may have taken you to a page that no longer exists. Use the quick links below or our search tool above to find what you're looking for.", 'arcade-child' ); ?></p>
    		        </div>
    		        
    		        <div class="QuickLinksSidebar"><?php _e( '<span class="QuickLinksSidebar-header">Quick Links</span> <ul class="QuickLinksSidebar-links"> <li><a href="https://quotes.elephant.com">Get a car insurance quote<br> </a></li> <li><a href="http://www.elephant.com/car-insurance/faqs/policy">Car insurance policy tips<br> </a></li> <li><a href="https://www.elephant.com/onlineclaims/verify.aspx">File a claim<br> </a></li> <li><a href="http://www.elephant.com/car-insurance/faqs">FAQs<br> </a></li> <li><a href="http://www.elephant.com/contact">Contact us<br> </a></li>  </ul>' ); ?></div>
    		    </article>
			</div>
			<div class="emptyTank"><img src="http://d5prcm06amy2t.cloudfront.net/wp-content/uploads/2016/02/09115609/empty-gas-tank.jpg" alt="empty gas tank"></div>
		</div>
	</div>

<?php get_footer(); ?>