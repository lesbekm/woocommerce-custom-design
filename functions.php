<?php

if (! defined('ABSPATH')) {
    exit;
}

function riverr_vivid_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('menus');
    add_theme_support('custom-logo', [
        'height'      => 120,
        'width'       => 120,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary' => 'Primary Menu',
    ]);
}
add_action('after_setup_theme', 'riverr_vivid_setup');

function riverr_vivid_enqueue(): void
{
    wp_enqueue_style('riverr-vivid-style', get_stylesheet_uri(), [], '1.1.0');
}
add_action('wp_enqueue_scripts', 'riverr_vivid_enqueue');

function riverr_vivid_customize_register(WP_Customize_Manager $wp_customize): void
{
    $sections = [
        'riverr_vivid_brand_section' => ['title' => 'Riverr Vivid: Marka', 'priority' => 30],
        'riverr_vivid_hero_section' => ['title' => 'Riverr Vivid: Hero', 'priority' => 31],
        'riverr_vivid_category_section' => ['title' => 'Riverr Vivid: Kategoriler', 'priority' => 32],
        'riverr_vivid_trust_section' => ['title' => 'Riverr Vivid: Guven', 'priority' => 33],
        'riverr_vivid_contact_section' => ['title' => 'Riverr Vivid: Iletisim', 'priority' => 34],
        'riverr_vivid_color_section' => ['title' => 'Riverr Vivid: Renkler', 'priority' => 35],
    ];

    foreach ($sections as $id => $section) {
        $wp_customize->add_section($id, $section);
    }

    $settings = [
        'riverr_vivid_brand_subtitle' => ['section' => 'riverr_vivid_brand_section', 'label' => 'Marka Alt Yazisi', 'default' => 'bright adult boutique', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_nav_note' => ['section' => 'riverr_vivid_brand_section', 'label' => 'Ust Not / Kisa Slogan', 'default' => 'Yeni sezon vitrini', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],

        'riverr_vivid_hero_badge' => ['section' => 'riverr_vivid_hero_section', 'label' => 'Hero Rozeti', 'default' => 'Yeni sezon vitrini', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_hero_title' => ['section' => 'riverr_vivid_hero_section', 'label' => 'Hero Basligi', 'default' => 'Daha canli, daha cekici, daha mobil bir vitrin.', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field'],
        'riverr_vivid_hero_text' => ['section' => 'riverr_vivid_hero_section', 'label' => 'Hero Aciklamasi', 'default' => 'Telefon ekraninda rahat dolasilan, masaustunde guclu gorunen ve ilk anda guven veren bir magaza deneyimi icin tasarlanmis yeni ana sayfa.', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field'],
        'riverr_vivid_primary_button_text' => ['section' => 'riverr_vivid_hero_section', 'label' => 'Birincil Buton Metni', 'default' => 'Simdi Alisverise Basla', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_primary_button_url' => ['section' => 'riverr_vivid_hero_section', 'label' => 'Birincil Buton Linki', 'default' => '', 'type' => 'url', 'sanitize' => 'esc_url_raw'],
        'riverr_vivid_secondary_button_text' => ['section' => 'riverr_vivid_hero_section', 'label' => 'Ikincil Buton Metni', 'default' => 'Hakkimizda', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_secondary_button_url' => ['section' => 'riverr_vivid_hero_section', 'label' => 'Ikincil Buton Linki', 'default' => '', 'type' => 'url', 'sanitize' => 'esc_url_raw'],

        'riverr_vivid_category_title' => ['section' => 'riverr_vivid_category_section', 'label' => 'Kategori Basligi', 'default' => 'Ana Kategoriler', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_category_note' => ['section' => 'riverr_vivid_category_section', 'label' => 'Kategori Aciklamasi', 'default' => 'Telefon ekraninda hizli secim icin one cikan kategoriler.', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field'],

        'riverr_vivid_trust_title' => ['section' => 'riverr_vivid_trust_section', 'label' => 'Guven Basligi', 'default' => 'Guvenli Alisveris', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_trust_note' => ['section' => 'riverr_vivid_trust_section', 'label' => 'Guven Aciklamasi', 'default' => 'Odeme, teslimat ve gizlilik tarafinda musteriye guven veren detaylar.', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field'],
        'riverr_vivid_trust_item_1' => ['section' => 'riverr_vivid_trust_section', 'label' => 'Guven Maddesi 1', 'default' => 'iyzico ile guvenli odeme', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_trust_item_2' => ['section' => 'riverr_vivid_trust_section', 'label' => 'Guven Maddesi 2', 'default' => 'SSL korumali alisveris', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_trust_item_3' => ['section' => 'riverr_vivid_trust_section', 'label' => 'Guven Maddesi 3', 'default' => 'Visa / MasterCard destegi', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_trust_item_4' => ['section' => 'riverr_vivid_trust_section', 'label' => 'Guven Maddesi 4', 'default' => 'Gizli paketleme', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_trust_item_5' => ['section' => 'riverr_vivid_trust_section', 'label' => 'Guven Maddesi 5', 'default' => 'Turkiye ici teslimat', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_trust_item_6' => ['section' => 'riverr_vivid_trust_section', 'label' => 'Guven Maddesi 6', 'default' => 'Hizli siparis sureci', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],

        'riverr_vivid_contact_title' => ['section' => 'riverr_vivid_contact_section', 'label' => 'Iletisim Basligi', 'default' => 'Bize Ulasin', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_contact_note' => ['section' => 'riverr_vivid_contact_section', 'label' => 'Iletisim Aciklamasi', 'default' => 'Musteri destegi ve siparis sorulari icin iletisim kanallarimiz.', 'type' => 'textarea', 'sanitize' => 'sanitize_textarea_field'],
        'riverr_vivid_whatsapp_number' => ['section' => 'riverr_vivid_contact_section', 'label' => 'WhatsApp Numarasi', 'default' => '', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_whatsapp_label' => ['section' => 'riverr_vivid_contact_section', 'label' => 'WhatsApp Buton Metni', 'default' => 'WhatsApp ile Yazin', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_contact_phone' => ['section' => 'riverr_vivid_contact_section', 'label' => 'Telefon', 'default' => '', 'type' => 'text', 'sanitize' => 'sanitize_text_field'],
        'riverr_vivid_contact_email' => ['section' => 'riverr_vivid_contact_section', 'label' => 'E-posta', 'default' => '', 'type' => 'email', 'sanitize' => 'sanitize_email'],

        'riverr_vivid_color_bg' => ['section' => 'riverr_vivid_color_section', 'label' => 'Arka Plan Temel Renk', 'default' => '#fff7f3', 'type' => 'color', 'sanitize' => 'sanitize_hex_color'],
        'riverr_vivid_color_accent' => ['section' => 'riverr_vivid_color_section', 'label' => 'Ana Vurgu Rengi', 'default' => '#ff4f87', 'type' => 'color', 'sanitize' => 'sanitize_hex_color'],
        'riverr_vivid_color_accent_2' => ['section' => 'riverr_vivid_color_section', 'label' => 'Ikinci Vurgu Rengi', 'default' => '#ff8a3d', 'type' => 'color', 'sanitize' => 'sanitize_hex_color'],
        'riverr_vivid_color_accent_3' => ['section' => 'riverr_vivid_color_section', 'label' => 'Parlama Rengi', 'default' => '#ffd76b', 'type' => 'color', 'sanitize' => 'sanitize_hex_color'],
        'riverr_vivid_color_text' => ['section' => 'riverr_vivid_color_section', 'label' => 'Metin Rengi', 'default' => '#1b1115', 'type' => 'color', 'sanitize' => 'sanitize_hex_color'],
    ];

    foreach ($settings as $id => $config) {
        $wp_customize->add_setting($id, [
            'default'           => $config['default'],
            'sanitize_callback' => $config['sanitize'],
            'transport'         => 'refresh',
        ]);

        $control_args = [
            'label'   => $config['label'],
            'section' => $config['section'],
        ];

        if ($config['type'] === 'color') {
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, $control_args));
        } else {
            $control_args['type'] = $config['type'];
            $wp_customize->add_control($id, $control_args);
        }
    }
}
add_action('customize_register', 'riverr_vivid_customize_register');

function riverr_vivid_customizer_css(): void
{
    $bg       = riverr_vivid_option('riverr_vivid_color_bg', '#fff7f3');
    $accent   = riverr_vivid_option('riverr_vivid_color_accent', '#ff4f87');
    $accent_2 = riverr_vivid_option('riverr_vivid_color_accent_2', '#ff8a3d');
    $accent_3 = riverr_vivid_option('riverr_vivid_color_accent_3', '#ffd76b');
    $text     = riverr_vivid_option('riverr_vivid_color_text', '#1b1115');
    ?>
    <style id="riverr-vivid-customizer-vars">
        :root{
            --rv-bg: <?php echo esc_html($bg); ?>;
            --rv-accent: <?php echo esc_html($accent); ?>;
            --rv-accent-2: <?php echo esc_html($accent_2); ?>;
            --rv-accent-3: <?php echo esc_html($accent_3); ?>;
            --rv-text: <?php echo esc_html($text); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'riverr_vivid_customizer_css');

function riverr_vivid_products_shortcode(string $shortcode): string
{
    if (! shortcode_exists('products')) {
        return '';
    }

    return do_shortcode($shortcode);
}

function riverr_vivid_category_url(string $slug): string
{
    $term = get_term_by('slug', $slug, 'product_cat');

    if (! $term || is_wp_error($term)) {
        return '#';
    }

    $link = get_term_link($term);

    return is_wp_error($link) ? '#' : $link;
}

function riverr_vivid_page_url(string $slug, string $fallback = '#'): string
{
    $page = get_page_by_path($slug);

    if (! $page) {
        return $fallback;
    }

    return get_permalink($page);
}

function riverr_vivid_shop_url(): string
{
    return get_post_type_archive_link('product') ?: home_url('/magaza/');
}

function riverr_vivid_category_or_shop(string $slug): string
{
    $url = riverr_vivid_category_url($slug);

    return $url === '#' ? riverr_vivid_shop_url() : $url;
}

function riverr_vivid_option(string $key, string $default = ''): string
{
    $value = get_theme_mod($key, $default);

    return is_string($value) && $value !== '' ? $value : $default;
}

function riverr_vivid_whatsapp_url(): string
{
    $raw = riverr_vivid_option('riverr_vivid_whatsapp_number');

    if ($raw === '') {
        return '';
    }

    $normalized = preg_replace('/\D+/', '', $raw);

    if (! $normalized) {
        return '';
    }

    return 'https://wa.me/' . $normalized;
}

function riverr_vivid_myaccount_url(): string
{
    if (function_exists('wc_get_page_permalink')) {
        $url = wc_get_page_permalink('myaccount');

        if ($url) {
            return $url;
        }
    }

    return home_url('/hesabim/');
}

function riverr_vivid_cart_url(): string
{
    if (function_exists('wc_get_cart_url')) {
        return wc_get_cart_url();
    }

    return home_url('/sepet/');
}

function riverr_vivid_cart_count(): int
{
    if (! function_exists('WC')) {
        return 0;
    }

    $woocommerce = WC();

    if (! $woocommerce || ! isset($woocommerce->cart)) {
        return 0;
    }

    return (int) $woocommerce->cart->get_cart_contents_count();
}
