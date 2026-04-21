<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();

$primary_url   = riverr_vivid_option('riverr_vivid_primary_button_url', '');
$secondary_url = riverr_vivid_option('riverr_vivid_secondary_button_url', '');
$primary_url   = $primary_url !== '' ? $primary_url : riverr_vivid_shop_url();
$secondary_url = $secondary_url !== '' ? $secondary_url : home_url('/hakkimizda/');
$trust_items   = array_filter(array(
    riverr_vivid_option('riverr_vivid_trust_item_1', 'iyzico ile guvenli odeme'),
    riverr_vivid_option('riverr_vivid_trust_item_2', 'SSL korumali alisveris'),
    riverr_vivid_option('riverr_vivid_trust_item_3', 'Visa / MasterCard destegi'),
    riverr_vivid_option('riverr_vivid_trust_item_4', 'Gizli paketleme'),
    riverr_vivid_option('riverr_vivid_trust_item_5', 'Turkiye ici teslimat'),
    riverr_vivid_option('riverr_vivid_trust_item_6', 'Hizli siparis sureci'),
));
?>
<main class="rv-main">
    <div class="rv-wrap">
        <section class="rv-hero rv-section">
            <div class="rv-hero-grid">
                <div class="rv-hero-copy">
                    <span class="rv-pill"><?php echo esc_html(riverr_vivid_option('riverr_vivid_hero_badge', 'Yeni sezon vitrini')); ?></span>
                    <h1><?php echo esc_html(riverr_vivid_option('riverr_vivid_hero_title', 'Daha canli, daha cekici, daha mobil bir vitrin.')); ?></h1>
                    <p><?php echo esc_html(riverr_vivid_option('riverr_vivid_hero_text', 'Telefon ekraninda rahat dolasilan, masaustunde guclu gorunen ve ilk anda guven veren bir magaza deneyimi icin tasarlanmis yeni ana sayfa.')); ?></p>
                    <div class="rv-hero-actions">
                        <a class="rv-btn" href="<?php echo esc_url($primary_url); ?>"><?php echo esc_html(riverr_vivid_option('riverr_vivid_primary_button_text', 'Simdi Alisverise Basla')); ?></a>
                        <a class="rv-btn-secondary" href="<?php echo esc_url($secondary_url); ?>"><?php echo esc_html(riverr_vivid_option('riverr_vivid_secondary_button_text', 'Hakkimizda')); ?></a>
                    </div>
                </div>

                <div class="rv-hero-art" aria-hidden="true">
                    <div class="rv-float-card one"></div>
                    <div class="rv-float-card two"></div>
                    <div class="rv-float-card three"></div>
                    <div class="rv-float-card four"></div>
                </div>
            </div>
        </section>

        <section class="rv-section rv-split">
            <div class="rv-card rv-category-panel">
                <div class="rv-section-head">
                    <h2 class="rv-section-title"><?php echo esc_html(riverr_vivid_option('riverr_vivid_category_title', 'Ana Kategoriler')); ?></h2>
                    <p class="rv-section-note"><?php echo esc_html(riverr_vivid_option('riverr_vivid_category_note', 'Telefon ekraninda hizli secim icin one cikan kategoriler.')); ?></p>
                </div>
                <div class="rv-category-grid">
                    <a href="<?php echo esc_url(riverr_vivid_category_or_shop('vibrator')); ?>">Vibratorler</a>
                    <a href="<?php echo esc_url(riverr_vivid_shop_url()); ?>">Realistik Seriler</a>
                    <a href="<?php echo esc_url(riverr_vivid_category_or_shop('masturbator')); ?>">Masturbator</a>
                    <a href="<?php echo esc_url(riverr_vivid_category_or_shop('sprey-jel')); ?>">Sprey ve Jeller</a>
                    <a href="<?php echo esc_url(riverr_vivid_category_or_shop('fantezi-urunler')); ?>">Fantezi Urunler</a>
                    <a href="<?php echo esc_url(riverr_vivid_shop_url()); ?>">Kayganlastiricilar</a>
                    <a href="<?php echo esc_url(riverr_vivid_shop_url()); ?>">Masaj Urunleri</a>
                    <a href="<?php echo esc_url(riverr_vivid_category_or_shop('aksesuar')); ?>">Aksesuarlar</a>
                </div>
            </div>

            <div class="rv-card rv-trust">
                <div class="rv-section-head">
                    <h2 class="rv-section-title"><?php echo esc_html(riverr_vivid_option('riverr_vivid_trust_title', 'Guvenli Alisveris')); ?></h2>
                    <p class="rv-section-note"><?php echo esc_html(riverr_vivid_option('riverr_vivid_trust_note', 'Odeme, teslimat ve gizlilik tarafinda musteriye guven veren detaylar.')); ?></p>
                </div>
                <div class="rv-trust-grid">
                    <?php foreach ($trust_items as $trust_item) : ?>
                        <div class="rv-trust-item"><?php echo esc_html($trust_item); ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="rv-section rv-card">
            <div class="rv-section-head">
                <h2 class="rv-section-title">Cok Satanlar</h2>
                <p class="rv-section-note">Ilk ekrandan sonra hemen satin alma odakli urun seckisi.</p>
            </div>
            <div class="rv-shop-section">
                <?php echo riverr_vivid_products_shortcode('[products limit="4" columns="4" visibility="featured"]'); ?>
            </div>
        </section>

        <section class="rv-section rv-card">
            <div class="rv-section-head">
                <h2 class="rv-section-title">Yeni Gelenler</h2>
                <p class="rv-section-note">Daha yeni urunleri one cikaran ikinci ticari band.</p>
            </div>
            <div class="rv-shop-section">
                <?php echo riverr_vivid_products_shortcode('[products limit="4" columns="4" orderby="date" order="DESC"]'); ?>
            </div>
        </section>

        <?php
        $whatsapp = riverr_vivid_whatsapp_url();
        $phone    = riverr_vivid_option('riverr_vivid_contact_phone');
        $email    = riverr_vivid_option('riverr_vivid_contact_email');
        if ($whatsapp !== '' || $phone !== '' || $email !== '') :
        ?>
            <section class="rv-section rv-card rv-contact-strip">
                <div class="rv-section-head">
                    <h2 class="rv-section-title"><?php echo esc_html(riverr_vivid_option('riverr_vivid_contact_title', 'Bize Ulasin')); ?></h2>
                    <p class="rv-section-note"><?php echo esc_html(riverr_vivid_option('riverr_vivid_contact_note', 'Musteri destegi ve siparis sorulari icin iletisim kanallarimiz.')); ?></p>
                </div>
                <div class="rv-contact-grid">
                    <?php if ($whatsapp !== '') : ?>
                        <a class="rv-contact-item" href="<?php echo esc_url($whatsapp); ?>" target="_blank" rel="noopener noreferrer">
                            <strong>WhatsApp</strong>
                            <span><?php echo esc_html(riverr_vivid_option('riverr_vivid_whatsapp_label', 'WhatsApp ile Yazin')); ?></span>
                        </a>
                    <?php endif; ?>
                    <?php if ($phone !== '') : ?>
                        <a class="rv-contact-item" href="<?php echo esc_url('tel:' . preg_replace('/\s+/', '', $phone)); ?>">
                            <strong>Telefon</strong>
                            <span><?php echo esc_html($phone); ?></span>
                        </a>
                    <?php endif; ?>
                    <?php if ($email !== '') : ?>
                        <a class="rv-contact-item" href="<?php echo esc_url('mailto:' . $email); ?>">
                            <strong>E-posta</strong>
                            <span><?php echo esc_html($email); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
