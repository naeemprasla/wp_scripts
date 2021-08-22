<?php
function vcsite_settings_customize_register($wp_customize)
{
    // Settings-------------------------
    $wp_customize->add_section(
        'vcsite_settings_option',
        array(
            'title'       => __('VC Setting', 'vc-site-settings'),
            'priority'    => 200,
            'capability'  => 'edit_theme_options',
            'description' => __('Customize Theme Options', 'vc-site-settings'),
        )
    );


    $socialMedia = array(
        'Facebook' => 'fb',
        'Twitter' => 'tw',
        'LinkedIn' => 'ln',
        'Instagram' => 'in',
        'Youtube' => 'yt',
    );
    foreach ($socialMedia as $key => $valu) {
        $wp_customize->add_setting('social_media_' . $valu, array('default' => 'https://'));
        $wp_customize->add_control('link_textbox_' . $valu, array(
            'label'      => __($key . ' Link', 'vc-site-settings'),
            'description' => __('Get Value by get_theme_mod(\'social_media_' . $valu . '\');', 'vc-site-settings'),
            'section'    => 'vcsite_settings_option',
            'settings'   => 'social_media_' . $valu,
        ));
    }

    $wp_customize->add_setting('copyright_text_setting', array('default' => 'Site Name &copy; | All Rights Reserved'));
    $wp_customize->add_control('copyright_text', array(
        'label'      => __('Copyright Text', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'copyright_text_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'copyright_text_setting',
    ));
    $wp_customize->add_setting('phone_text_setting', array('default' => '+00 000 000000'));
    $wp_customize->add_control('phone_text', array(
        'label'      => __('Phone Number', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'phone_text_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'phone_text_setting',
    ));
    $wp_customize->add_setting('fax_text_setting', array('default' => '+00 000 000000'));
    $wp_customize->add_control('fax_text', array(
        'label'      => __('FAX Number', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'fax_text_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'fax_text_setting',
    ));
    $wp_customize->add_setting('emailid_text_setting', array('default' => 'admin@domainname.com'));
    $wp_customize->add_control('emailid_text', array(
        'label'      => __('Email Address', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'emailid_text_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'emailid_text_setting',
    ));
    $wp_customize->add_setting('address_text_setting', array('default' => 'house no , road , city , country , zip'));
    $wp_customize->add_control('address_text', array(
        'label'      => __('Business Address', 'vc-site-settings'),
        'description' => __('Get Value by get_theme_mod(\'address_text_setting\');', 'vc-site-settings'),
        'section'    => 'vcsite_settings_option',
        'settings'   => 'address_text_setting',
    ));
    // Settings-------------------------
}
add_action('customize_register', 'vcsite_settings_customize_register');
