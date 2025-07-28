<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package F1devsesl
 */

?>
<footer class="footer-section text-center">
    <div class="container py-5 bg">
        <h2 class="mb-3">LET'S STAY CONNECT<span>ED</span>!</h2>
        <div class="d-flex justify-content-center">
            <p class="mb-4 footer-text">
                Contact us to share your feedback, ask questions and suggest topics for new workbooks!
                We appreciate your ideas and engagement.
            </p>
        </div>
        <h5 class="text-start mb-3">We're CONNECT<span>ED</span>!</h5>
        <div class="contact-box mx-auto p-4">
            <div class="ampersand">
                <img src="<?= get_template_directory_uri() ?>/assets/img/logo/mini-logo-yellow.svg" alt="Connected Logo" height="100" class="logo-img">
            </div>
                <?= do_shortcode('[contact-form-7 id="1d7cbb2" title="leave us a message"]')?>
        </div>
        <p class="mt-5 small mb-0">&copy; 2025 by CONNECTED.</p>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
