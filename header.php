<?php
if (! defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="rv-site-shell">
    <div class="rv-wrap rv-header-wrap">
        <?php
        $header_categories = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'parent'     => 0,
            'number'     => 12,
            'orderby'    => 'name',
            'order'      => 'ASC',
        ]);
        ?>
        <header class="rv-header">
            <div class="rv-brand">
                <?php if (has_custom_logo()) : ?>
                    <div class="rv-logo"><?php the_custom_logo(); ?></div>
                <?php else : ?>
                    <div class="rv-mark">R</div>
                <?php endif; ?>
                <div>
                    <span class="rv-brand-title"><?php bloginfo('name'); ?></span>
                    <span class="rv-brand-sub"><?php echo esc_html(riverr_vivid_option('riverr_vivid_brand_subtitle', 'bright adult boutique')); ?></span>
                    <?php $nav_note = riverr_vivid_option('riverr_vivid_nav_note', 'mobile-first storefront'); ?>
                    <?php if ($nav_note !== '') : ?>
                        <span class="rv-brand-sub"><?php echo esc_html($nav_note); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="rv-header-actions">
                <a class="rv-header-action rv-header-action--account" href="<?php echo esc_url(riverr_vivid_myaccount_url()); ?>" aria-label="<?php echo esc_attr(is_user_logged_in() ? 'Hesabim' : 'Giris Yap'); ?>">
                    <span class="rv-header-action-icon" aria-hidden="true">👤</span>
                    <span class="rv-header-action-copy">
                        <strong><?php echo esc_html(is_user_logged_in() ? 'Hesabim' : 'Giris Yap'); ?></strong>
                        <span><?php echo esc_html(is_user_logged_in() ? 'Hesabini yonet' : 'Uye ol veya giris yap'); ?></span>
                    </span>
                </a>
                <a class="rv-header-action rv-header-action--cart" href="<?php echo esc_url(riverr_vivid_cart_url()); ?>" aria-label="Sepetim">
                    <span class="rv-header-action-icon" aria-hidden="true">🛒</span>
                    <span class="rv-header-action-copy">
                        <strong>Sepetim</strong>
                        <span><?php echo esc_html(riverr_vivid_cart_count() > 0 ? riverr_vivid_cart_count() . ' urun var' : 'Sepetini gor'); ?></span>
                    </span>
                    <?php if (riverr_vivid_cart_count() > 0) : ?>
                        <span class="rv-header-action-badge"><?php echo esc_html((string) riverr_vivid_cart_count()); ?></span>
                    <?php endif; ?>
                </a>
            </div>

            <nav class="rv-nav" aria-label="Primary Navigation">
                <a href="<?php echo esc_url(home_url('/')); ?>">Anasayfa</a>
                <a href="<?php echo esc_url(riverr_vivid_shop_url()); ?>">Tum Urunler</a>
                <?php if (! is_wp_error($header_categories) && ! empty($header_categories)) : ?>
                    <details class="rv-nav-dropdown">
                        <summary>Kategoriler</summary>
                        <div class="rv-nav-panel">
                            <?php foreach ($header_categories as $category) : ?>
                                <?php $category_link = get_term_link($category); ?>
                                <?php if (! is_wp_error($category_link)) : ?>
                                    <a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($category->name); ?></a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </details>
                <?php endif; ?>
                <a href="<?php echo esc_url(riverr_vivid_page_url('hakkimizda', home_url('/hakkimizda/'))); ?>">Hakkimizda</a>
            </nav>
        </header>
    </div>
