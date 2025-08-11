<?php
/*
Template Name: Workbooks Page
*/
get_header();
?>

<section class="workbook-section mb-5">
    <div class="container-fluid">
        <?php
        $title      = rwmb_get_value( 'workbook_banner_title' );
        $text       = rwmb_get_value( 'workbook_banner_text' );
        $image      = rwmb_get_value( 'workbook_banner_image' );
        $image_url  = '';

        if ( ! empty( $image ) && is_array( $image ) && isset( $image['ID'] ) ) {
            $image_url = wp_get_attachment_image_url( $image['ID'], 'full' );
        }

        if ( $image_url || $title || $text ) :
            ?>
            <div class="mb-5">
                <div class="row g-0 align-items-stretch">
                    <div class="col-md-6 text-end">
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
    <section class="workbooks text-center py-5">
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
        <div class="container">
            <div class="row cardbody d-flex justify-content-center">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 6,
                );
                $products = new WP_Query($args);

                if ( $products->have_posts() ) :
                    while ( $products->have_posts() ) : $products->the_post();
                        wc_get_template_part( 'content', 'product' );
                    endwhile;
                    wp_reset_postdata();?>
                <?php else :?>
                    <p>No Products</p>
                <?php endif;
                ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>