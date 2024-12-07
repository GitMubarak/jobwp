<?php
# Silence is golden.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="circulr-details-bottom-email">
    <?php
    if ( ! $jobwp_hide_apply_procedure ) {
        ?>
        <h3 class="wpsd-read-before-apply"><?php esc_html_e( $jobwp_apply_procedure_title ); ?></h3>
        <span class="wpsd-read-before-apply-border">&nbsp;</span>
        <?php
        if ( '' != $jobwp_apply_procedure_content ) {
            ?>
            <p class="apply-to-email">
                <?php echo wp_kses_post( $jobwp_apply_procedure_content ); ?>
            </p>
            <?php
        }
    }

    if ( ! $jobwp_hide_apply_button ) {

        if ( 'on' === $jobwp_ext_apply_now_url ) {

            if ( '' !== $jobwp_application_url ) {
                ?>
                <a href="<?php echo esc_url( $jobwp_application_url ); ?>" class="jobwp-primary-button" target="_blank"><?php esc_html_e( $jobwp_apply_button_text ); ?></a>
                <?php
            } else {
                ?>
                <a href="#" class="jobwp-trigger-link jobwp-primary-button"><?php esc_html_e( $jobwp_apply_button_text ); ?></a>
                <?php
            }
        } else {

            if ( $jobwp_allow_login_apply ) {

                if ( is_user_logged_in() ) {
                    ?>
                    <a href="#" class="jobwp-trigger-link jobwp-primary-button"><?php esc_html_e( $jobwp_apply_button_text ); ?></a>
                    <?php
                } else {
                    ?>
                    <a href="<?php echo esc_url( home_url( '/wp-login.php' ) ); ?>" class="jobwp-primary-button"><?php esc_html_e( $jobwp_apply_button_text ); ?></a>
                    <?php
                }
            } else {
                ?>
                <a href="#" class="jobwp-trigger-link jobwp-primary-button"><?php esc_html_e( $jobwp_apply_button_text ); ?></a>
                <?php
            }
        }
    }
    ?>
</div>