<?php
/** 
 * ez-Tizes the setup arg for WebDevStudio's plugin CMB2 (custom metaboxes and fields).
 *
 * Allows for the adding of validation args to the CMB2 setup array, as well as some other necessary (if not #BadAss) ez magic. 
 *
 * PHP version 5.3
 *
 * LICENSE: TODO
 *
 * @package WPezClasses
 * @author Mark Simchock <mark.simchock@alchemyunited.com>
 * @since 0.5.1
 * @license TODO
 */
 
/**
 * == Change Log == 
 *
 * == 0.5.0 - Mon 1 Dec 2014 ==
 * --- Pop the champagne!
 */
 
/**
 * == TODO == 
 *
 *
 */

// No WP? Die! Now!!
if (!defined('ABSPATH')) {
	header( 'HTTP/1.0 403 Forbidden' );
    die();
}

if ( ! class_exists('Class_WP_ezClasses_Templates_CMB2_Slider_1') ) {
  class Class_WP_ezClasses_Templates_CMB2_Slider_1 extends Class_WP_ezClasses_Admin_CMB2_Setup_1{
    
	public function __construct() {
	  parent::__construct();
	}
			
	/**
	 *
	 */	
	public function cmb2_todo(){
	
	  $arr_todo = array(
	    'prefix'						=> '_ez_slider_1_',  // you can also pass this in via the arr_args
		'post_types'					=> array( 'TODO' ),	
		'localization_domain'			=> 'TODO',
		'priority'						=> 10,
		);
		
	  return $arr_todo;
	}
	
/**
 * ================ THIS IS WHERE YOUR MAGIC HAPPENS =========================================
 */

	/**
	 * The metabox "meta control center". 
	 *
	 * Note the 'active' arg for simple on/off of a given meta box. You can also switch the 
	 * methods for 'meta' and 'fields'. This ideally make it easier to reuse meta boxes and 
	 * fields from a library and not recode all the time.
	 *
	 * Finally you can also define the prefix here. This prefix will overide any others. 
	 * That said, in theory you could make this prefix blank ('') and define the prefix 
	 * on a field by field basis when you define the fields. If ya want. I guess :)
	 */
	public function metabox_active(){
	
	  $arr_metabox_active = array(
	  
		'ez_slider_1' => array(
		  'active'	=> true,
		  'meta'	=> 'ez_slider_1_meta',
		  'fields'	=> 'ez_slider_1_fields',
											// no prefix here, then use the "global" default
		  ),
	  );
	  return  $arr_metabox_active;
	} 
	
	/**
	 * The meta for the meta box gets "decoupled" from the fields.
	 */
	 
	public function ez_slider_1_meta(){
	
	  $mb_meta = array(
	    'cmb2' => array(
		  'id'           	=> 'ez-slider',
		  'title'			=> 'ezSlider',
		  'post_types' 		=> $this->_arr_post_types,
		  'context'       	=> 'normal',
		  'priority'      	=> 'high',
		  'layout'			=> 'col_two', 	// NEW & IMPROVED - this will be mapped to CMB2's 'show_names'		  
		  'cmb_styles' 		=> true, 		// false to disable the CMB stylesheet
		  )
		);
	  return $mb_meta;
	}
		
	/**
	 * Aside for creating a slightly smoother and more logically structured CMB2 setup 
	 * workflow, it is now possible to build a library of fields / groups of fields and 
	 * then be able to reuse them "on demand." 
	 *
	 * Yes, in theory this is also possible with plain ol' CMB2. But that mindset is baked
	 * into this classes. Validation is also part of the fun & games now. 
	 */
	 
	public function ez_slider_1_fields(){
	
	  $mb_fields = array(
	  
	    'ezs1_f100' => array(
		  'active' => true, 	// NEW - not found in (nor actually used by) CMB2
		  'cmb2'	=> array(	// NEW (KINDA) - the cmb2 stuff gets its own spot. 
		    'label' => 'Sort Order',
		//	'desc' => 'TODO field description (optional)',
			'name'   => 'date_sort',
			'type' => 'text_date_timestamp',
			),
		  ),
	  
	    'ezs1_f200' => array(
		  'active' => true, 	// NEW - not found in (nor actually used by) CMB2
		  'cmb2'	=> array(	// NEW (KINDA) - the cmb2 stuff gets its own spot. 
		    'label' => 'Slide Image',
		//	'desc' => 'TODO', // 'File type: jpg. Dimensions should be square and no smaller than 450 x 450.',
			'name'   => 'slide_image',
			'type' => 'file',
			),
		  ),
	  
	    'ezs1_f300' => array(
		  'active' => true, 	// NEW - not found in (nor actually used by) CMB2
		  'cmb2'	=> array(	// NEW (KINDA) - the cmb2 stuff gets its own spot. 
		    'label' => 'Slide Title',
		//	'desc' => 'TODO field description (optional)',
			'name'   => 'slide_title',
			'type' => 'text',
			),
		  ),
		  
	    'ezs1_f400' => array(
		  'active' => true, 	// NEW - not found in (nor actually used by) CMB2
		  'cmb2'	=> array(	// NEW (KINDA) - the cmb2 stuff gets its own spot. 
		    'label' => '"The Pitch"',
		//	'desc' => 'TODO field description (optional)',
			'name'   => 'slide_pitch',
			'type' => 'textarea_small',
			),
		  ),
		  
	    'ezs1_f500' => array(
		  'active' => true, 	// NEW - not found in (nor actually used by) CMB2
		  'cmb2'	=> array(	// NEW (KINDA) - the cmb2 stuff gets its own spot. 
		    'label' => 'Call to Action',
		//	'desc' => 'TODO field description (optional)',
			'name'   => 'slide_cta',
			'type' => 'text',
			),
		  ),
		  
	    'ezs1_f600' => array(
		  'active' => true, 	// NEW - not found in (nor actually used by) CMB2
		  'cmb2'	=> array(	// NEW (KINDA) - the cmb2 stuff gets its own spot. 
		    'label' => 'Call to Action URL',
		//	'desc' => 'TODO field description (optional)',
			'name'   => 'slide_cta_url',
			'type' => 'text_url',
			),
		  ),
		  
		  
		);
	
	  $str_this_method = __FUNCTION__;
	  $str_this_method = $str_this_method . '_ezfilter';
	  if (method_exists($this, $str_this_method)){
	    $mb_fields = $this->$str_this_method($mb_fields);
	  }
	  
	  return $mb_fields;
	}
	
	/**
	 * Add, for example, your desc's here
	 */
	public function ez_slider_1_fields_ezfilter($arr_args = array()){
	
	  return $arr_args;
	}

	
/**
 * ================ THAT'S IT - MAGIC COMPLETE =========================================
 */	
	
  }
} 

/**
 * And this is how you instantiate: 
 */
//$obj_instantiate = Class_WP_ezClasses_Templates_CMB2_Slider_1::ez_new();
