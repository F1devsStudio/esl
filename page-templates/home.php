<?php
/*
* Template Name: Main
* */

get_header();
?>
<section class="hero-section">
    <div class="container hero-div">
        <div class="hero-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/girl-student.avif" alt="Student" class="img-fluid">
            <div class="hero-text p-4">
                <h1>Welcome to <br><strong>ESL ConnectED</strong></h1>
                <p class="sub-text">How to make your teaching or learning experience memorable? Discover it with us!</p>
                <a href="#" class="btn btn-explore">Explore now</a>
            </div>
        </div>
        <i class="esl-arrow-down esl-reg-4 arrow pt-5"></i>
    </div>
</section>
<section class="workbooks text-center py-5 d-flex flex-column">
    <div class="container">
        <div class="input-search">
            <div class="d-flex justify-content-center align-items-center flex-wrap gap-2 mb-4">
                <h2 class="mb-0">Explore Our Workbooks</h2>
                <div class="position-relative pos-btn"><a href="#" class="btn btn-suggest">Suggest a topic!</a></div>
            </div>

            <form class="search-bar d-flex justify-content-center" id="smart-search-input">
                <div class="input-group">
                <span class="input-group-text">
                    <i class="esl-search esl-reg-1"></i>
                </span>
                    <input type="search" class="form-control" placeholder="Search...">
                </div>
            </form>
        </div>
    </div>
    <?php
    $categories = get_terms([
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
    ]);
    ?>
    <?php foreach ($categories as $category):?>
        <h2><?= esc_html($category->name)?></h2>
        <div class="container mb-5">
            <div class="swiper" id="swiper-<?php echo esc_attr($category->term_id); ?>">
                <div class="swiper-wrapper d-flex align-items-stretch">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => get_theme_mod('products_per_category', 2),
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
                    <?php endif;
                    ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="mt-4">
                <a href="<?= esc_url( home_url( '/workbooks/' ) ) ?>" class="btn btn-more">More Workbooks</a>
                <i class="esl-arrow-right esl-reg arrow"></i>
            </div>
        </div>
    <?php endforeach;?>
</section>
<section class="connected-section position-relative text-center text-md-start">
    <div class="bg-image">
        <div class="info-box p-4 p-md-4 d-flex ">
            <h2 class="mb-1 connected-title text-center">
                Find out more about CONNECT<span class="text-connected">ED</span>
            </h2>
            <div class="underline mb-3 mx-auto mx-md-0"></div>
            <ul class="mb-3 text-content">
                <li>Who stands behind CONNECTED?</li>
                <li>What are our values?</li>
                <li>How are we different?</li>
            </ul>
            <p class="mb-4 text-content">Explore, engage, and make the most of our community.</p>
            <a href="#" class="btn btn-learn px-4">Learn More</a>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.swiper').forEach(container => {
            const swiper = new Swiper(container, {
                slidesPerView: 3,
                spaceBetween: 20,
                slidesPerGroup: 1,
                navigation: {
                    nextEl: container.querySelector('.swiper-button-next'),
                    prevEl: container.querySelector('.swiper-button-prev'),
                },
                breakpoints: {
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

