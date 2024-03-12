<?php 

function phone_btn_shortcode( $atts, $content = null  ) {
    extract( shortcode_atts( array(
        'class' => 'boxed-btn phone-btn',
    ), $atts) );

    $options = get_option('ppm_theme_options');
    $phone = $options['phone'];

    $html = '';
    if(!empty($phone)) {
        if($class == 'text-only') {
            $phone = preg_replace('/[^0-9]/', '', $phone);
            if (strlen($numbersOnly) == 10) {
                $phone += 1;
            }

            return $phone;
        } else {
            $html = '<a href="tel:'.$phone.'" class="'.$class.'">'.$phone.'</a>';
        }
    }
 
    return $html;
}   
add_shortcode('phone_btn', 'phone_btn_shortcode');