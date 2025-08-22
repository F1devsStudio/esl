<?php
/*
Template Name: About Page
*/
get_header();
?>

<section class="main-section">
    <div class="container">
        <?php
        // Meta Box
        $title      = rwmb_get_value( 'about_banner_title' );
        $text       = rwmb_get_value( 'about_banner_text' );
        $image      = rwmb_get_value( 'about_banner_image' );
        $image_url  = '';

        if ( ! empty( $image ) && is_array( $image ) && isset( $image['ID'] ) ) {
            $image_url = wp_get_attachment_image_url( $image['ID'], 'full' );
        }

        if ( $image_url || $title || $text ) :
            ?>
            <div class="mb-5">
                <div class="row g-0 align-items-stretch">
                    <div class="col-md-6">
                        <?php if ( $image_url ): ?>
                            <img src="<?php echo esc_url( $image_url ); ?>" class="img-fluid h-100 object-fit-cover" alt="Intro Image">
                        <?php endif; ?>
                    </div>
                    <div class="main-text col-md-6 d-flex align-items-center">
                        <div class="card-body w-100">
                            <?php if ( $title ): ?>
                                <h1 class="card-title pb-4">
                                    <?php echo nl2br( esc_html( $title ) ); ?>
                                </h1>
                            <?php endif; ?>
                            <?php if ( $text ): ?>
                                <?php echo wpautop( wp_kses_post( $text ) ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="all-section pt-5">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <?php
            $story_title = rwmb_get_value('our_story_title');
            $story_text  = rwmb_get_value('our_story_text');

            if ($story_title) : ?>
                <h2><?= esc_html($story_title); ?></h2>
            <?php endif; ?>

            <?php if ($story_text) : ?>
                <div class="text-block"><?= wp_kses_post(wpautop($story_text)); ?></div>
            <?php endif; ?>

            <?php
            $card_info_items = rwmb_get_value('card_info_items');

            if (!empty($card_info_items)) :
                foreach ($card_info_items as $card) :
                    $image          = $card['our_story_image']       ?? '';
                    $position_title = $card['our_story_position']    ?? '';
                    $name           = $card['our_story_name']        ?? '';
                    $social_icon    = $card['our_story_social_icon'] ?? '';
                    $social_url     = $card['our_story_social']      ?? '';

                    // Получаем URL изображения
                    $image_url = '';
                    if (!empty($image)) {
                        if (is_array($image)) {
                            if (isset($image['ID'])) {
                                $image_url = wp_get_attachment_image_url($image['ID'], 'full');
                            } elseif (isset($image['url'])) {
                                $image_url = $image['url'];
                            }
                        } elseif (is_numeric($image)) {
                            $image_url = wp_get_attachment_image_url($image, 'full');
                        } elseif (is_string($image)) {
                            $image_url = $image;
                        }
                    }

                    // Получаем URL иконки соцсети
                    $social_icon_url = '';
                    if (!empty($social_icon)) {
                        if (is_array($social_icon)) {
                            if (isset($social_icon['ID'])) {
                                $social_icon_url = wp_get_attachment_image_url($social_icon['ID'], 'full');
                            } elseif (isset($social_icon['url'])) {
                                $social_icon_url = $social_icon['url'];
                            }
                        } elseif (is_numeric($social_icon)) {
                            $social_icon_url = wp_get_attachment_image_url($social_icon, 'full');
                        } elseif (is_string($social_icon)) {
                            $social_icon_url = $social_icon;
                        }
                    }
                    ?>
                    <div class="col-md-4">
                        <div class="card">
                            <?php if ($image_url) : ?>
                                <img src="<?= esc_url($image_url); ?>" class="card-img-top" alt="<?= esc_attr($name); ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <?php if ($position_title) : ?>
                                    <p class="card-text-title mb-0"><?= esc_html($position_title); ?></p>
                                <?php endif; ?>
                                <?php if ($name) : ?>
                                    <p class="card-text-sub mb-0"><?= esc_html($name); ?></p>
                                <?php endif; ?>
                                <?php if ($social_url && $social_icon_url) : ?>
                                    <a href="<?= esc_url($social_url); ?>" target="_blank" rel="noopener noreferrer">
                                        <img src="<?= esc_url($social_icon_url); ?>" class="img-fluid pt-4" alt="Social Icon">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php
    $mission_title = rwmb_get_value('mission_title');
    $mission_text  = rwmb_get_value('mission_text');
    ?>

    <?php if ( $mission_title || $mission_text ): ?>
        <div class="container bg-block my-5 py-5">
            <?php if ( $mission_title ): ?>
                <h2 class="section-title"><?php echo esc_html($mission_title); ?></h2>
            <?php endif; ?>

            <?php if ( $mission_text ): ?>
                <div class="text-block">
                    <?php echo wp_kses_post( $mission_text ); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php
    $experience_title = rwmb_get_value('experience_title');
    $experience_text  = rwmb_get_value('experience_text');
    ?>

    <?php if ( $experience_title || $experience_text ): ?>
        <div class="container">
            <?php if ( $experience_title ): ?>
                <h2 class="section-title"><?php echo esc_html($experience_title); ?></h2>
            <?php endif; ?>

            <?php if ( $experience_text ): ?>
                <div class="text-block">
                    <?php echo wp_kses_post( $experience_text ); ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>


    <?php
    $offer_title = rwmb_get_value('offer_title');
    $offers = rwmb_get_value('offer_items');
    ?>

    <?php if ( !empty($offers) ): ?>
        <div class="container bg-block py-5">
            <?php if ( $offer_title ): ?>
                <h2 class="section-title"><?php echo esc_html($offer_title); ?></h2>
            <?php endif; ?>
            <div class="row text-start justify-content-center mt-4">
                <div class="col-md-8">
                    <?php foreach ($offers as $offer): ?>
                        <?php
                        $align_class = !empty($offer['offer_align_right']) ? 'justify-content-end' : '';
                        ?>
                        <div class="d-flex my-4 num-col <?php echo esc_attr($align_class); ?>">
                            <p class="numbers-text me-3"><?php echo esc_html($offer['offer_number']); ?></p>
                            <div>
                                <p class="title-block"><?php echo esc_html($offer['offer_title']); ?></p>
                                <p class="sub-block"><?php echo esc_html($offer['offer_text']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php
    $join_title       = rwmb_get_value('join_title');
    $join_text        = rwmb_get_value('join_text');
    $join_btn_text    = rwmb_get_value('join_button_text');
    $join_btn_page_id = rwmb_get_value('join_button_url');
    $join_btn_url     = $join_btn_page_id ? get_permalink($join_btn_page_id) : '';
    $join_final_text  = rwmb_get_value('join_final_text');
    ?>

    <?php if ( $join_title || $join_text || $join_btn_text || $join_final_text ): ?>
        <div class="container pt-5">
            <?php if ( $join_title ): ?>
                <h2 class="section-title"><?php echo esc_html($join_title); ?></h2>
            <?php endif; ?>

            <?php if ( $join_text ): ?>
                <div class="text-block"><?php echo wp_kses_post( wpautop( $join_text ) ); ?></div>
            <?php endif; ?>

            <?php if ( $join_btn_text && $join_btn_url ): ?>
                <div class="mt-4 btn-contact">
                    <a href="<?php echo esc_url($join_btn_url); ?>" class="btn-work-blog me-2">
                        <?php echo esc_html($join_btn_text); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ( $join_final_text ): ?>
                <p class="final-text"><?php echo esc_html($join_final_text); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</section>

<?php get_footer(); ?>
