<?php
/*
Plugin Name: Loan calculator
Plugin URI: https://volkan.co.ke
description: >-blah blah blah
a plugin to create a simple interest calculato
Version: 1.2
Author: Volkan
Author URI: https://volkan.co.ke
License: GPL2
 */

if (!defined('ABSPATH')) {
	exit;
}

//add the javascript and css to display the calculator

function my_javascripts() {
	wp_enqueue_style('CalculatorCSS', plugin_dir_url(__FILE__).'css/style.css');

	wp_enqueue_script( 'Javascript',
	                      'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',
	                      '3.2.1',
	                      true);

	wp_enqueue_script('SlickJS',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js',
		array('jquery'),
		'1.12.1',
		true);

	wp_enqueue_script('CalculatorJs',
		plugin_dir_url(__FILE__).'js/calculator.js',
		array('jquery'),
		'1.0',
		true);
}
add_action('wp_enqueue_scripts', 'my_javascripts');

//[calculaotr] is the shortcode
function calculator_function($atts) {
	$displayCalculator = '<div class="simple-interest">
	<h2>Simple Interest Calculator</h2>
	<form id="calculate">
		<label for="principal" class="principal">
			<span>
				<i class="fa fa-usd" aria-hidden="true"></i>
			</span>
			<input id="principal" type="text" placeholder="Loan Amount" />
		</label>

		<label for="rate" class="rate">
			<span class="percent">
				%
			</span>
			<input id="rate" type="text" placeholder="Interest Rate" />
		</label> 

		<label for="time">
			<span>
				<i class="fa fa-clock-o" aria-hidden="true"></i>
			</span>
			<input id="time" type="number" placeholder="Months to Repay" />
		</label>

		<button class="button" type="submit">Submit</button>
	</form>
	
	<div class="results hide">
		<div class="monthly-payment">
			<span>Monthly Payment</span>
			<span id="payment"></span>
		</div>
		<div class="total-interest">
			<span>Total Interest</span>
			<span id="interest"></span>
		</div>
		<div class="total-amount">
			<span>Total Amount</span>
			<span id="total"></span>
		</div>
	</div>
</div>
   ';
	return $displayCalculator;
}
add_shortcode('calculator', 'calculator_function');
?>