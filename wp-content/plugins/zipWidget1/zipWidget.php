<?php
/**
 * Created by John Holloman.
 * Date: 7/9/2015
 * Time: 10:37 AM
 */
/*
Plugin Name: Zip Widget
Plugin URI:
Description: Zip-code widget sends customers to the appropriate quoting site while passing the zip-code.
Author: John Holloman
Version: 1.0
Author URI:
*/


//submit handler
if (isset($_POST['zipCode'])) {
    echo "<script>console.log( 'Submit Handler: Begin func' );</script>";
    
    $zipcode = new Zip_Processor(htmlspecialchars($_POST['zipCode']));
    $match = $zipcode->check_match();
    echo "<script>console.log( 'Submit Handler: IsMatch - " . $match . "' );</script>";
    if ($match) {
        $zipcode->process(htmlspecialchars($_POST['insuranceType']));
        echo "<script>console.log( 'Submit Handler: ZipCode Proccessed' );</script>";
    }
}

class Zip_Processor
{
    public $match;
    public $zip;
    public $destination;
    public $request;

    const ZIP_PATTERN = "/^\\d{5}(?:[-\\s]\\d{4})?$/";
    const LIFE_URL = "https://elephant.homesite.com/LifeDirectWeb/auth/zipcode/?zip=";
    const HOME_URL = "https://home.homesite.com/elephant/sales/index.htm?product=home&zip=";
    const CONDO_URL = "https://home.homesite.com/elephant/sales/index.htm?product=condo&zip=";
    const RENTERS_URL = "https://home.homesite.com/elephant/sales/index.htm?product=renter&zip=";
    const MOTORCYCLE_URL = "https://www.dairylandinsurance.com/start-quote?requestedQuoteType=Motorcycle&AOE=1173422&zip=";
    const HOME_URL2 = "https://uat.homesitep2.com/elephant/sales/index.htm?product=homeqa&zip=";
    const CONDO_URL2 = "https://uat.homesitep2.com/elephant/sales/index.htm?product=condoqa&zip=";
    const RENTERS_URL2 = "https://uat.homesitep2.com/elephant/sales/index.htm?product=renterqa&zip=";
    
    function __construct($zip_code)
    {
        $this->zip = $zip_code;
        $org = strtolower($_SERVER['SERVER_NAME']);
	$this->destination = $this->get_url_destination($org);
    }

	private function get_dest_host($org){
		return ($org == 'www.elephant.com' || $org == 'elephant.com') ? 'https://quotes.elephant.com' : 'https://e-quotes-qa1.dev-elephant.com/';
	}
	private function get_query_string(){
		$arr = explode("?",$_SERVER['REQUEST_URI']);
		if (count($arr) == 2){
			return "?".end($arr);
		}else{
			return "";
		}       
	}
	private function get_url_destination($org){
	    $host = $this->get_dest_host($org);
		$query = $this->get_query_string();
		return $host . $query . "/#/postal-landing/";
    }
	
    private function redirect($des, $zip)
    {
        header('Location:' . $des . $query_string . $zip);
        return exit;
    }

    function process($type)
    {   
        // echo "<script>console.log( 'Process Form: Is Production2 - " . $isProd . "' );</script>";
        // echo "<script>console.log( 'Process Form: Is Stage2 - " . $isStage . "' );</script>";
        // echo "<script>console.log( 'Process Form: Is Local2 - " . $isLocalhost . "' );</script>";
        switch ($type) {
            // WP prod
            case 'Home':
                $url = self::HOME_URL;
                break;
            case 'Life':
                $url = self::LIFE_URL;
                break;
            case 'Condo':
                $url = self::CONDO_URL;
                break;
            case 'Renters':
                $url = self::RENTERS_URL;
                break;
            case 'Motorcycle':
                $url = self::MOTORCYCLE_URL;
                break;
            default:
                $url = $this->destination;
                break;
            }

        $this->redirect($url, $this->zip);
    }

    function check_match()
    {
        return preg_match(self::ZIP_PATTERN, $this->zip) ? true : false;
    }
}

//Autozip class ends
function isStage(){
    $isStage = false; 
    if (function_exists('is_wpe_snapshot')){
        $isStage = is_wpe_snapshot();
        $isProd = is_wpe();
    }
    return $isStage;
}    

function isProd(){
    $isProd = false;
    if (function_exists('is_wpe')){
        $isStage = is_wpe_snapshot();
        $isProd = is_wpe();
    }
    return $isProd;
}    

function isLocalhost(){
    $isLocalhost = !(function_exists('is_wpe_snapshot'));
    $isProd = false;
    $isStage = false;
    return $isLocalhost;
}

// Creating the widget
class Zip_Widget extends WP_Widget
{
    public $idCounter;
    function Zip_Widget()
    {
        $widget_ops = array('classname' => 'Zip_Widget', 'description' => 'zip-code widget');
        $this->__construct('Zip_Widget', 'Zip Widget', $widget_ops);
        $this->idCounter = 0;
    }

    function form($instance)
    {
        //WIDGET BACK-END SETTINGS
        $instance = wp_parse_args((array)$instance, array('css' => '', 'insurance_type' => '','header_text' => '', 'id' => rand(5, 250)));
        $isProd = isProd();
        $isStage = isStage();
        // $isLocalhost = isLocalhost();
        // echo "<script>console.log( 'In Method ' );</script>";   
        // echo "<script>console.log( 'Process Form: Is Production - " . $isProd . "' );</script>";
        // echo "<script>console.log( 'Process Form: Is Stage - " . $isStage. "' );</script>";
        // echo "<script>console.log( 'Process Form: Is Local - " . $isLocalhost. "' );</script>";

        //WP
        $optionsList = array('Auto', 'Home', 'Life', 'Condo', 'Renters', 'Motorcycle', 'Multi');
        $insuranceOptions = array();
        foreach ($optionsList as $value) {
            $test = $instance['insurance_type'] == $value ? 'selected="selected"' : '';
            array_push($insuranceOptions, '<option value="' . $value . '" ' . $test . '>' . $value . '</option>');
        }
        
        ?>
            <p>
                <span><strong>Type:</strong></span>
                <select name="<?php echo $this->get_field_name('insurance_type'); ?>">
                    <?php foreach ($insuranceOptions as $value) {
                        echo $value;
                    } ?>
                </select>
            </p>
            <p>
                <span><strong>Custom Header:</strong></span>
                <input name="<?php echo $this->get_field_name('header_text'); ?>" value="<?php echo $instance['header_text']; ?>" />
            </p>
            <p>
                <span><strong>Custom CSS:</strong></span>
                <textarea name="<?php echo $this->get_field_name('css'); ?>" rows="4" cols="50"><?php echo $instance['css']; ?>
                </textarea>
            </p>
        <?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['css'] = $new_instance['css'];
        $instance['header_text'] = $new_instance['header_text'];
        $instance['insurance_type'] = $new_instance['insurance_type'];
        $instance['id'] = $new_instance['id'];
        return $instance;
    }

    function widget($args, $instance)
    {
        $css = (empty($instance['css'])) ? '' : $instance['css'];
        $header_text = (empty($instance['header_text'])) ? '' : $instance['header_text'];
        $id = ++$this->idCounter; 
        $insurance_type = (empty($instance['insurance_type'])) ? 0 : $instance['insurance_type'];
		$org = strtolower($_SERVER['SERVER_NAME']);
		$host = ($org == 'www.elephant.com' || $org == 'elephant.com') ? 'https://quotes.elephant.com' : 'https://e-quotes-qa1.dev-elephant.com/';
		
        ?>
            <style>
                <?php echo $css;?>
            </style>
            <div class="mod zip-container <?php echo strtolower($insurance_type); ?>">
                <form method="post" id="zip-form<?php echo $id; ?>">
                    <div class="error-message" id="error-message<?php echo $id; ?>"></div>

                    <?php if(!empty($header_text)) : ?>
                        <div class="zip-header"><h3><?php echo $header_text;?></h3></div>
                    <?php endif; ?>

                    <input type="tel" id="zip<?php echo $id; ?>" name="zipCode" placeholder="Zip Code" maxlength="5" minlength="5">

                    <?php if ($insurance_type == 'Multi'): ?>
                        <select name="insuranceType">
                            <option value="Auto">Auto</option>
                            <option value="Home">Home</option>
                            <option value="Life">Life</option>
                            <option value="Renters">Renters</option>
                            <option value="Motorcycle">Motorcycle</option>
                            <option value="Condo">Condo</option>
                        </select>
                    <?php else: ?>
                        <input type="hidden" name="insuranceType" value="<?php echo $insurance_type; ?>"/>
                    <?php endif; ?>

                    <!-- <div id="quoteSubmit<?php echo $id; ?>" class="zip-btn" name="submit">Get a Quote</div> -->
                    <div id="quoteSubmit<?php echo $id; ?>" class="zip-btn">Get a Quote</div>
                </form>
                <?php if ($insurance_type !== 'Motorcycle'): ?>
                    <a id="quote-retrieve" href="<?php echo $host; ?>/#/quote-retrieve">Retrieve a saved auto quote</a>
                <?php endif; ?>
                
                <?php if ($insurance_type == 'Motorcycle'): ?>
                    <a id="quote-retrieve" href="https://www.dairylandinsurance.com/?action=RetrieveQuote&AOE=1173422">Retrieve a saved quote</a>
                <?php endif; ?>
            </div>
            <script>
                (function ($) {
                    var id = <?php echo $this->idCounter;?>;
                    var zip = $('#zip' + id);
                    var bt = $('#quoteSubmit' + id);
                    var rg = /^\d{5}(?:[-\s]\d{4})?$/;
                    var error = $('#error-message' + id);
                    bt.click(function () {
                        if (zip.val()) {
                            if (rg.test(zip.val())) {
                                $('#zip-form' + id).submit();
                            } else {
                                error.text('Please enter a valid zip code');
                            }
                        } else {
                            error.text('Please enter a zip code');
                        }
                    });

                    $('html').bind('keypress', function (e) {
                        if (e.keyCode == 13) {
                            e.preventDefault();
                        }
                    })
                })(jQuery)
            </script>
        <?php
    }
}

// Add class for Zip Widget
add_action('widgets_init', create_function('', 'return register_widget("Zip_Widget");'));