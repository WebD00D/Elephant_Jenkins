<?php
/**
 * Template Name: Landing - Multi Car Home
 *
 * Description: New Multi Car version for home page.
 *
 * @since 1.0.0
 */
get_header(); ?>



<!--

CUSTOM FIELD LIST

- hero_title
- hero_mobile_title

- feature_one_title
- feature_one_copy

- feature_two_title
- feature_two_copy

- feature_three_title
- feature_three_copy

- insurance_type_headline
- home_insurance_copy
- renters_insurance_copy
- motorcycle_insurance_copy

- benefits_headline
- benefit_one_title
- benefit_one_copy
- benefit_two_title
- benefit_two_copy
- benefit_three_title
- benefit_three_copy
- benefit_four_title
- benefit_four_copy

- review_headline
- customer_one_review_copy
- customer_one_review_name
- customer_one_review_photo
- customer_two_review_copy
- customer_two_review_name
- customer_two_review_photo
- customer_three_review_copy
- customer_three_review_name
- customer_three_review_photo

- featured-blog-post  -> returns id

-->

<div class="elephant">

    <div class="hero">
        <div class="page-headline pageheadline-lg"><?php echo the_field('hero_title'); ?></div>
        <div class="page-headline pageheadline-sm"><?php echo the_field('hero_mobile_title'); ?></div>
        <div class="get-quote">
            <div class="input-wrap js_input-wrap__header">
                <img style="height:16px" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/zip_icon.png" />
                <input id="js_zipcode__header" type="tel" placeholder="Zip Code" />
            </div>
            <button id="js_get_quote__header">Let's get started</button>
            <!-- https://quotes.elephant.com/#/postal-landing/23233 -->
        </div>
        <div class="js_header_error error-box d-none">
            Please enter a valid zipcode
        </div>
        <div class="t-center--sm">
            <a class="retrieve-quote td-none" href="https://quotes.elephant.com/#/quote-retrieve">Retrieve <span>Saved Quote</span></a>
        </div>

        <div class="fx-centered--sm"><img class="absolute r-0 t-0 multi-car" src="<?php echo the_field('hero_image'); ?>" /></div>
    </div>


    <div class="features">
        <div class="feature-wrap">
            <img class="mb-20" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/bulk_icon.png" />
            <div class="feature-title mb-12"><?php echo the_field('feature_one_title'); ?></div>
            <div class="feature-copy">
                <?php echo the_field('feature_one_copy'); ?>
            </div>
        </div>
        <div class="feature-wrap">
            <img class="mb-20" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/better_rates_icon.png" />
            <div class="feature-title mb-12"><?php echo the_field('feature_two_title'); ?></div>
            <div class="feature-copy">
                <?php echo the_field('feature_two_copy'); ?>
            </div>
        </div>
        <div class="feature-wrap">
            <img class="mb-20" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/coverage_icon.png" />
            <div class="feature-title mb-12"><?php echo the_field('feature_three_title'); ?></div>
            <div class="feature-copy">
                <?php echo the_field('feature_three_copy'); ?>
            </div>
        </div>
    </div>

    <div class="w-100 fx fx-center mt-68 mb-162 mt-0-sm mb-96-sm">
        <a href="https://quotes.elephant.com/#/postal-code" class="safe-car-button td-none">Start Saving With Multi-Car</a>
    </div>

    <div class="w-100 fx fx-center mb-48 mb-22-sm">
        <div class="page-subheadline"><?php echo the_field('insurance_type_headline'); ?></div>
    </div>

</div> <!-- end Elephant container -->

<div class="insurance-type-wrapper">
    <div class="insurance-type insurance-type--home">
        <div class="fx fx-col insurance-type__content">
            <div class="insurance-type__header">Home</div>
            <div class="insurance-type__description"><?php echo the_field('home_insurance_copy'); ?></div>
            <a href="/homeowners-insurance"class="insurance-type__button" href="#">Learn More</a>
            <img class="insurance-type__image insurance-type__image--home" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/home_placeholder.png" />
        </div>
    </div>
    <div class="insurance-type insurance-type--renters">
    <div class="fx fx-col insurance-type__content">
            <div class="insurance-type__header">Renters</div>
            <div class="insurance-type__description"><?php echo the_field('renters_insurance_copy'); ?></div>
            <a href="/renters-insurance"  class="insurance-type__button" href="#">Learn More</a>
            <img class="insurance-type__image insurance-type__image--renters" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/renters.png" />
        </div>
    </div>
    <div class="insurance-type insurance-type--motorcycle">
        <div class="fx fx-col insurance-type__content">
            <div class="insurance-type__header">Motorcycle</div>
            <div class="insurance-type__description"><?php echo the_field('motorcycle_insurance_copy'); ?></div>
            <a href="/motorcycle-insurance" class="insurance-type__button" href="#">Learn More</a>
            <img class="insurance-type__image insurance-type__image--motorcycle" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/motorcycle.png" />
        </div>
    </div>
</div>

<a href="/insurance" class="insurance-type__full-list">View the full list of <span>Insurance Types</span></a>
<div class="elephant">
    <div class="benefits">
        <div class="fx fx-col">
            <div class="benefits__title mt-16"><?php echo the_field('benefits_headline'); ?></div>
            <div class="benefits__hr"></div>
        </div>
        <div class="fx fx-col">
            <div class="fx mb-68 mb-0--sm fx-col--sm">
                <div class="fx fx-col fx-start mb-40--sm">
                    <img class="benefit__image" style="height: 35px;" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/flexible_coverage.png" />
                    <div class="benefit__title"><?php echo the_field('benefit_one_title'); ?></div>
                    <div class="benefit__copy"><?php echo the_field('benefit_one_copy'); ?></div>
                </div>
                <div class="fx fx-col fx-start ml-80 ml-0--sm mb-40--sm">
                    <img class="benefit__image" style="height: 35px;" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/trusted_icon.png" />
                    <div class="benefit__title"><?php echo the_field('benefit_two_title'); ?></div>
                    <div class="benefit__copy"><?php echo the_field('benefit_two_copy'); ?></div>
                </div>
            </div>
            <div class="fx fx-col--sm">
                <div class="fx fx-col fx-start mb-40--sm">
                <img class="benefit__image" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/24_7_icon.png" />
                    <div class="benefit__title"><?php echo the_field('benefit_three_title'); ?></div>
                    <div class="benefit__copy"><?php echo the_field('benefit_three_copy'); ?></div>
                </div>
                <div class="fx fx-col fx-start ml-80 ml-0--sm mb-40--sm">
                <img class="benefit__image" style="height: 30px;" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/reward_icon.png" />
                    <div class="benefit__title"><?php echo the_field('benefit_four_title'); ?></div>
                    <div class="benefit__copy"><?php echo the_field('benefit_four_copy'); ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 fx fx-center mt-68 mb-148 mt-20--sm mb-80--sm ">
        <a href="/about" class="safe-car-button td-none">Learn More About Us</a>
    </div>

</div> <!-- end elephant container 2 -->

<div class="bg-light-blue" >
<div class="w-100 fx fx-center pt-140 pt-70--sm">
        <div class="reviews-headline"><?php echo the_field('review_headline'); ?></div>
    </div>

    <div class="relative">


        <img class=" carousel-arrow carousel-arrow--previous js_review-arrow-previous carousel-arrow--disabled" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/arrow_icon.png" />
        <img class=" carousel-arrow carousel-arrow--next js_review-arrow-next" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/arrow_icon.png" />

        <div class="reviews-container">

            <div>
                <div class="reviews-product">
                    <div class="review__stars">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/star.png" />
                    </div>
                    <div class="review__copy"><?php echo the_field('customer_one_review_copy'); ?></div>
                    <div class="review__customer">
                        <img src="<?php echo the_field('customer_one_review_photo'); ?>" />
                        <div><?php echo the_field('customer_one_review_name'); ?></div>
                    </div>
                </div>
            </div>



            <div>
                <div class="reviews-product">
                    <div class="review__stars">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/star.png" />
                    </div>
                    <div class="review__copy"><?php echo the_field('customer_three_review_copy'); ?></div>
                    <div class="review__customer">
                        <img src="<?php echo the_field('customer_three_review_photo'); ?>" />
                        <div><?php echo the_field('customer_three_review_name'); ?></div>
                    </div>
                </div>
            </div>


            <div>
                <div class="reviews-product">
                    <div class="review__stars">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/star.png" />
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/library/images/star.png" />
                    </div>
                    <div class="review__copy"><?php echo the_field('customer_two_review_copy'); ?></div>
                    <div class="review__customer">
                        <img src="<?php echo the_field('customer_two_review_photo'); ?>" />
                        <div><?php echo the_field('customer_two_review_name'); ?></div>
                    </div>
                </div>
            </div>

        <div> <!-- End reviews-container -->

    </div>

    </div>

     <div class="w-100 fx fx-center">
            <a href="/car-insurance/reviews" class="reviews__full-list">View all <span>Reviews</span></a>
    </div>
</div>



</div>

<?php

        // Featured Blog

        $postId = get_field('featured_blog_post');

        $imageUrl = get_the_post_thumbnail_url($postId);
        $imageTitle = get_the_title($postId);

        $postCategories = wp_get_post_categories($postId);
        $cats = array();

        foreach( $postCategories as $c ) {
            $cat = get_category($c);
            $cat;
            $cats[] =  $cat->name;
        }

        $categoryStr = implode(", ", $cats);

        $the_date = get_the_date( 'Y-m-d', $postId );

        $now = new DateTime;
        $ago = new DateTime($the_date);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );


        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        $newDate = $string ? implode(', ', $string) . ' ago' : 'just now';

    ?>

    <div class="featured-blog__container">
        <div class="featured-blog__image" style="background-image:url(<?php echo $imageUrl; ?>)"></div>
        <div class="featured-blog__content">
            <div class="featured-blog__title"><?php echo $imageTitle ?></div>
            <a href="<?php echo get_permalink($postId); ?>" class="safe-car-button safe-car-button--sm td-none">Read More</a>
            <div class="featured-blog__meta">
                <div class="featured-blog__date"><?php echo $newDate; ?></div>
                <div class="featured-blog__seperator">&#8226;</div>
                <div class="featured-blog__tags"><?php echo $categoryStr; ?></div>
            </div>
        </div>
    </div>

    <div class="elephant">

    <div class="join-the-herd">
        <div class="join-the-herd__subtitle">JOIN THE HERD</div>
        <div class="join-the-herd__title">Let's get started</div>
        <div class="get-quote">
            <div class="input-wrap input-wrap--sm js_input-wrap__footer">
                <img style="height:16px" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/zip_icon.png" />
                <input id="js_zipcode__footer" type="tel" placeholder="Zip Code" />
            </div>
            <button id="js_get_quote__footer" class="btn-sm">Quote Now</button>
        </div>
        <div class="js_footer_error error-box d-none">
            Please enter a valid zipcode
        </div>

    </div>

</div>

<div class="reviews__full-list">Availability varies by state and eligibility requirements</div>

<?php get_footer(); ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>

    $(document).ready(function(){

        var minWindowWidth = 940;

        setCarouselState();

        $(window).on("resize",function(){
            setCarouselState()
        })

        $(".js_review-arrow-next").click(function() {

            $(".reviews-container").slick('slickNext');
        })

        $(".js_review-arrow-previous").click(function(){
            $(".reviews-container").slick('slickPrev');
        })


        $('.reviews-container').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            console.log('next slide', nextSlide);
            if ( nextSlide == 0 ) {
                $(".js_review-arrow-previous").addClass("carousel-arrow--disabled");
            } else {
                $(".js_review-arrow-previous").removeClass("carousel-arrow--disabled");
            }

            if ( nextSlide == 2 ) {
                $(".js_review-arrow-next").addClass("carousel-arrow--disabled");
            } else {
                $(".js_review-arrow-next").removeClass("carousel-arrow--disabled");
            }

        });

        function setCarouselState() {
            if ( $(window).width() <= minWindowWidth ) {
                if ( !$(".reviews-container").hasClass("slick-initialized") ) {
                    initCarousel();
                }

            } else {
                if ( $(".reviews-container").hasClass("slick-initialized") ) {
                    destroyCarousel();
                }

            }
        }

        function initCarousel() {

            $(".reviews-container").slick({
                arrows: false,
                slidesToShow: 1,
                infinite: false,
                mobileFirst: true
            })

            $(".reviews-container").slick('slickRemove', 3);
        }

        function destroyCarousel() {
            $(".reviews-container").slick('unslick');
        }


        $("#js_get_quote__header").click(function() {
           var zipcode = $("#js_zipcode__header").val();
           if ( !isZipEmpty(zipcode) ) {
               window.location.href = "https://quotes.elephant.com/#/postal-landing/" + zipcode;
               return;
           }
           // show error in header
           $(".js_header_error").removeClass("d-none");
           $(".js_input-wrap__header").addClass("zip-error")

        })

        $("#js_get_quote__footer").click(function() {
            var zipcode = $("#js_zipcode__footer").val();
            if ( !isZipEmpty(zipcode) ) {
                window.location.href = "https://quotes.elephant.com/#/postal-landing/" + zipcode;
                return;
            }
            // show error
            $(".js_footer_error").removeClass("d-none");
            $(".js_input-wrap__footer").addClass("zip-error")


        })

        // https://quotes.elephant.com/#/postal-landing/23233

        function isZipEmpty(zip) {

            if ( $.trim(zip).length > 0 ) {
                return false;
            }
            return true;

        }

    })

</script>
