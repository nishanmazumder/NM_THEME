<?php

/**
 * Functions
 * @package NM_THEME
 */

//Theme URL
if (!defined('NM_DIR_PATH')) {
   define('NM_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('NM_DIR_URI')) {
   define('NM_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('NM_STYLE_URI')) {
   define('NM_STYLE_URI', untrailingslashit(get_stylesheet_uri()));
}

//Autoload
require_once NM_DIR_PATH . '/vendor/autoload.php';

//Theme Bootstrap
nm_theme_get_instance();
function nm_theme_get_instance()
{
   \NM_THEME\Classes\NM_THEME::get_instance();
}

//Template Functions
require_once NM_DIR_PATH . '/inc/template-functions.php';

//Template Tags
require_once NM_DIR_PATH . '/inc/template-tags.php';

//Woocommerce
if(class_exists('Woocommerce')){
   require_once NM_DIR_PATH . '/inc/woocommerce.php';
}

/**
 * Load Require plugin by TGM
 */
require_once NM_DIR_PATH . '/inc/tgm-activation.php';
require_once NM_DIR_PATH . '/inc/tgm-config.php';

/**
 * ACF
 */

// if ( is_plugin_active('advanced-custom-fields') ) {
//    // do something
// }

// Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
//     return false;
// }


// Minimum CSS to remove +/- default buttons on input field type number
add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
    ?>
    <style>
    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
        display: none;
        margin: 0;
    }
    .quantity input.qty {
        appearance: textfield;
        -webkit-appearance: none;
        -moz-appearance: textfield;
    }
    </style>
    <?php
}


add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}


// Extend Register form
function wooc_extra_register_fields() {?>
    <p class="form-row form-row-wide">
    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
    <p class="form-row form-row-wide">
    <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
    <div class="clear"></div>
    <?php
}
add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

/**
* register fields Validating.
*/
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
   if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
          $validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
   }
   if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
          $validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
   }
      return $validation_errors;
}
add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );

add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );

function bbloomer_save_name_fields( $customer_id ) {
 if ( isset( $_POST['billing_first_name'] ) ) {
     update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
     update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
 }
 if ( isset( $_POST['billing_last_name'] ) ) {
     update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
     update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
 }

 if ( isset( $_POST['billing_first_name'] ) && isset( $_POST['billing_last_name'] ) ) {

     if ( !empty( $_POST['billing_first_name'] ) && !empty( $_POST['billing_last_name'] ) ) {

         $display_name = sanitize_text_field( $_POST['billing_first_name'] ) . ' ' . sanitize_text_field( $_POST['billing_last_name'] );
         wp_update_user( array( 'ID' => $customer_id, 'display_name' => $display_name ) );
     }

 }

}
