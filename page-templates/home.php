<?php
/*
* Template Name: Home
* */

get_header();


$home_id = get_queried_object_id();

// Main banner
$hero_img   = rwmb_get_value('home_banner_image', [], $home_id);
$hero_title = rwmb_get_value('home_banner_title', [], $home_id);
$hero_desc  = rwmb_get_value('home_banner_desc',  [], $home_id);
$hero_btn_title = rwmb_get_value('home_banner_btn_title', [], $home_id);
$hero_btn_link = (int) rwmb_get_value('home_banner_btn_link',  [], $home_id);
$hero_btn_url = $hero_btn_link ? get_permalink($hero_btn_link) : '';

$hero_img_url = '';
if ($hero_img) {
    if (is_numeric($hero_img)) {
        $hero_img_url = wp_get_attachment_image_url((int)$hero_img, 'full');
    } elseif (is_array($hero_img) && isset($hero_img['ID'])) {
        $hero_img_url = wp_get_attachment_image_url((int)$hero_img['ID'], 'full');
    } elseif (is_array($hero_img) && isset($hero_img[0]['ID'])) {
        $hero_img_url = wp_get_attachment_image_url((int)$hero_img[0]['ID'], 'full');
    }
}

// Products section title
$products_title = rwmb_get_value('products_section_title', [], $home_id);

// Bottom banner
$bottom_img   = rwmb_get_value('home_bottom_banner_image', [], $home_id);
$bottom_t_raw = rwmb_get_value('home_bottom_banner_title', [], $home_id);
$bottom_desc  = rwmb_get_value('home_bottom_banner_desc',  [], $home_id);
$bottom_btn_title = rwmb_get_value('home_bottom_btn_title',    [], $home_id);
$bottom_btn_link = (int) rwmb_get_value('home_bottom_btn_link', [], $home_id);
$bottom_btn_url = $bottom_btn_link ? get_permalink($bottom_btn_link) : '';

$bottom_img_url = '';
if ($bottom_img) {
    if (is_numeric($bottom_img)) {
        $bottom_img_url = wp_get_attachment_image_url((int)$bottom_img, 'full');
    } elseif (is_array($bottom_img) && isset($bottom_img['ID'])) {
        $bottom_img_url = wp_get_attachment_image_url((int)$bottom_img['ID'], 'full');
    } elseif (is_array($bottom_img) && isset($bottom_img[0]['ID'])) {
        $bottom_img_url = wp_get_attachment_image_url((int)$bottom_img[0]['ID'], 'full');
    }
}

$bottom_title = '';
if (!empty($bottom_t_raw)) {
    $bottom_title = preg_replace_callback('/\[accent\](.+?)\[\/accent\]/u', function($m){
        return '<span class="text-connected">'.esc_html($m[1]).'</span>';
    }, $bottom_t_raw);
    $bottom_title = wp_kses($bottom_title, ['span' => ['class' => []]]);
}
?>

<section class="hero-section">
    <div class="container hero-div">
        <div class="hero-image">
            <?php if ($hero_img_url): ?>
                <img src="<?php echo esc_url($hero_img_url); ?>" alt="Main banner" class="img-fluid">
            <?php endif; ?>
            <div class="hero-text p-4">
                <h1><?php echo nl2br(esc_html($hero_title)); ?></h1>
                <p class="sub-text"><?php echo esc_html($hero_desc); ?></p>
                <a href="<?php echo esc_url($hero_btn_url); ?>" class="btn btn-explore"><?php echo esc_html($hero_btn_title); ?></a>
            </div>
        </div>
        <i class="esl-arrow-down esl-reg-4 arrow pt-5"></i>
    </div>
</section>
<section class="workbooks py-5">
    <div class="container">
        <div class="row input-search">
            <div class="text-center position-relative mb-4">
                <h2 class="mb-0"><?php echo esc_html($products_title) ?></h2>
                <div class="pos-btn"><a href="#SuggestModal" data-bs-toggle="modal" data-bs-target="#SuggestModal" class="btn btn-suggest">Suggest a topic!</a></div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="SuggestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5" id="exampleModalLabel">Suggest us your topic</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                    </div>
                </div>
            </div>

            <form class="search-bar d-flex justify-content-center" id="smart-search-input">
                <div class="input-group">
                <span class="input-group-text">
                    <i class="esl-search esl-reg"></i>
                </span>
                    <input type="search" class="form-control" placeholder="Search...">
                </div>
            </form>
        </div>

        <div class="row text-center">
            <?php
            $categories = get_terms([
                'taxonomy' => 'product_cat',
                'hide_empty' => true,
            ]);
            ?>
            <?php foreach ($categories as $category):?>
                <div class="container-home mb-5">
                    <h3><b><?= esc_html($category->name)?></b></h3>
                    <div class="swiper-wrapper-container position-relative">
                    <div class="swiper" id="swiper-<?php echo esc_attr($category->term_id); ?>">
                        <div class="swiper-wrapper d-flex align-items-stretch">
                            <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => get_theme_mod('products_per_category_slider', 5),
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'product_cat',
                                        'field'    => 'term_id',
                                        'terms'    => $category->term_id,
                                    ],
                                ],
                            );
                            $products = new WP_Query($args);

                            if ( $products->have_posts() ) :
                                while ( $products->have_posts() ) : $products->the_post();?>
                                    <div class="swiper-slide">
                                        <?php wc_get_template_part( 'content', 'product' ); ?>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata();?>
                            <?php else :?>
                                <p>No Products</p>
                            <?php endif;?>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    </div>
                    <div class="mt-2">
                        <a href="<?= esc_url( get_term_link( $category->term_id, 'product_cat' ) ) ?>" class="btn btn-more">More Workbooks</a>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</section>
<section class="connected-section position-relative text-center text-md-start">
    <div class="bg-image" style="background-image:url('<?php echo esc_url($bottom_img_url); ?>');">
        <div class="info-box p-4 p-md-4 d-flex ">
            <h2 class="mb-1 connected-title text-center">
                <?php echo $bottom_title; ?>
            </h2>
            <div class="underline mb-3 mx-auto mx-md-0"></div>
            <?php echo wp_kses_post(wpautop($bottom_desc)); ?>
            <a href="<?php echo esc_url($bottom_btn_url); ?>" class="mt-4 btn btn-learn px-4"><?php echo esc_html($bottom_btn_title); ?></a>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.swiper').forEach(container => {
            const swiper = new Swiper(container, {
                slidesPerView: 3,
                spaceBetween: 20,
                loop: true,
                slidesPerGroup: 1,
                navigation: {
                    nextEl: container.querySelector('.swiper-button-next'),
                    prevEl: container.querySelector('.swiper-button-prev'),
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 20,
                    },
                },
            });
        });
    });
</script>
<?php
get_footer();
?>

