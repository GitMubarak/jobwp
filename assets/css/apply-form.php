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

  .jobwp-field-row label {
    color: <?php esc_html_e( $jobwp_apply_form_label_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_apply_form_label_font_size ); ?>px;
  }

  .jobwp-field-row input[type="email"],
  .jobwp-field-row input[type="text"],
  .jobwp-field-row textarea {
    color: <?php esc_html_e( $jobwp_apply_form_input_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_apply_form_input_font_size ); ?>px;
    background: <?php esc_html_e( $jobwp_apply_form_input_bg_color ); ?>;
    border: 1px solid <?php esc_html_e( $jobwp_apply_form_input_border_color ); ?>;
  }

  #jobwp_apply_btn {
    background: <?php esc_html_e( $jobwp_apply_form_btn_bg_color ); ?>;
    color: <?php esc_html_e( $jobwp_apply_form_btn_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_apply_form_btn_font_size ); ?>px;
  }

  #jobwp_apply_btn:hover {
    background: <?php esc_html_e( $jobwp_apply_form_btn_hvr_bg_color ); ?>;
    color: <?php esc_html_e( $jobwp_apply_form_btn_hvr_font_color ); ?>;
  }
</style>
<?php
}
?>