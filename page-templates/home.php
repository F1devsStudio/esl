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
<section class="workbooks text-center py-5">
    <div class="container">
        <div class="input-search">
            <div class="d-flex justify-content-center align-items-center flex-wrap gap-2 mb-4">
                <h2 class="mb-0">Explore Our Workbooks</h2>
                <div class="position-relative pos-btn"><a href="#" class="btn btn-suggest">Suggest a topic!</a></div>
            </div>

            <form class="search-bar d-flex justify-content-center">
                <div class="input-group">
                <span class="input-group-text">
                    <i class="esl-search esl-reg-1"></i>
                </span>
                    <input type="search" class="form-control" placeholder="Search...">
                </div>
            </form>
        </div>
    </div>
    <div class="row cardbody">
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
            <div class="mt-4">
                <a href="#" class="btn btn-more">More Workbooks</a>
                <i class="esl-arrow-right esl-reg arrow"></i>
            </div>
        <?php else :?>
            <p>No Products</p>
        <?php endif;
        ?>
    </div>
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
<?php
get_footer();
?>

