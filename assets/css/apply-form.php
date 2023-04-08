<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Silence is golden
if ( job_fs()->is_plan__premium_only('pro', true) ) {
?>
<style type="text/css">
  #jobwp-apply-form-modal {
    background: <?php esc_html_e( $jobwp_apply_form_bg_color ); ?>;
  }

  .jobwp-apply-title {
    color: <?php esc_html_e( $jobwp_apply_form_title_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_apply_form_title_font_size ); ?>px;
  }
</style>
<?php
}
?>