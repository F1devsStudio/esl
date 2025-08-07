<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package F1devsesl
 */

get_header();
?>


<section class=" error d-flex align-items-center pb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 order-md-2">
                <div class="d-flex justify-content-center">
                    <img src="<?php echo get_template_directory_uri('')?>/assets/img/404.png" width="400px">
                </div>
            </div>
            <div class="col-md-6 text-center text-md-start ">
                <div class="oops mb-3">
                    <h2>Oops! That page can&rsquo;t be found.<br></h2>
                </div>
                <div class="text-error mb-3">
                    <h1 class="text-muted">Error 404</h1>
                </div>
                <div class="looking-text mb-5">
                    <p> The page you're looking for doesn't exist or has been moved.</p>
                </div>
                <div class="mb-5">
                    <a class="btn btn-go-home" href="<?php echo esc_url( home_url( '/' ) ); ?>" role="button">Back to homepage</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
