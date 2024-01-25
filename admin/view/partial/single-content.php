<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//print_r( $jobwpSingleContent );
foreach ( $jobwpSingleContent as $option_name => $option_value ) {
    if ( isset( $jobwpSingleContent[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="jobwp_single_content_settings_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-single-content-settings-form">
    <table class="jobwp-single-settings-table">
        <tr class="jobwp_single_title_tag">
            <th scope="row">
                <label for="jobwp_single_title_tag"><?php _e('Job Title Tag', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <select name="jobwp_single_title_tag">
                        <option value="h1" <?php echo ( 'h1' == $jobwp_single_title_tag ) ? 'selected' : ''; ?>>h1</option>
                        <option value="h2" <?php echo ( 'h2' == $jobwp_single_title_tag ) ? 'selected' : ''; ?>>h2</option>
                        <option value="h3" <?php echo ( 'h3' == $jobwp_single_title_tag ) ? 'selected' : ''; ?>>h3</option>
                        <option value="h4" <?php echo ( 'h4' == $jobwp_single_title_tag ) ? 'selected' : ''; ?>>h4</option>
                        <option value="h5" <?php echo ( 'h5' == $jobwp_single_title_tag ) ? 'selected' : ''; ?>>h5</option>
                        <option value="h6" <?php echo ( 'h6' == $jobwp_single_title_tag ) ? 'selected' : ''; ?>>h6</option>
                    </select>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_overview"><?php _e('Hide Overview', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_overview" class="jobwp_single_hide_overview" id="jobwp_single_hide_overview"
                    <?php echo $jobwp_single_hide_overview ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_overview_text" id="jobwp_single_overview_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_overview_text ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_vacancies"><?php _e('Hide No. of Vacancies', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_vacancies" class="jobwp_single_hide_vacancies" id="jobwp_single_hide_vacancies"
                    <?php echo $jobwp_single_hide_vacancies ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_vacancies_text" id="jobwp_single_vacancies_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_vacancies_text ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_skills"><?php _e('Hide Specific Skills', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_skills" class="jobwp_single_hide_skills" id="jobwp_single_hide_skills"
                    <?php echo $jobwp_single_hide_skills ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_skills_text" id="jobwp_single_skills_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_skills_text ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_responsible"><?php _e('Hide Responsible For', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_responsible" class="jobwp_single_hide_responsible" id="jobwp_single_hide_responsible"
                    <?php echo $jobwp_single_hide_responsible ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_responsible_text" id="jobwp_single_responsible_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_responsible_text ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_requirements"><?php _e('Hide Additional Requirements', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_requirements" class="jobwp_single_hide_requirements" id="jobwp_single_hide_requirements"
                    <?php echo $jobwp_single_hide_requirements ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_requirements_text" id="jobwp_single_requirements_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_requirements_text ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_job_type"><?php _e('Hide Job Nature', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_job_type" class="jobwp_single_hide_job_type" id="jobwp_single_hide_job_type"
                    <?php echo $jobwp_single_hide_job_type ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_job_type_text" id="jobwp_single_job_type_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_job_type_text ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_education"><?php _e('Hide Educational Requirements', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_education" class="jobwp_single_hide_education" id="jobwp_single_hide_education"
                    <?php echo $jobwp_single_hide_education ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_education_text" id="jobwp_single_education_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_education_text ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_experience"><?php _e('Hide Experience Requirements', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_experience" class="jobwp_single_hide_experience" id="jobwp_single_hide_experience"
                    <?php echo $jobwp_single_hide_experience ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_experience_text" id="jobwp_single_experience_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_experience_text ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_loc"><?php _e('Hide Job Location', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_loc" class="jobwp_single_hide_loc" id="jobwp_single_hide_loc"
                    <?php echo $jobwp_single_hide_loc ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_loc_text" id="jobwp_single_loc_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_loc_text ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_salary"><?php _e('Hide Salary', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_salary" class="jobwp_single_hide_salary" id="jobwp_single_hide_salary"
                    <?php echo $jobwp_single_hide_salary ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_salary_text" id="jobwp_single_salary_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_salary_text ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_benefit"><?php _e('Hide Other Benefits', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_benefit" class="jobwp_single_hide_benefit" id="jobwp_single_hide_benefit"
                    <?php echo $jobwp_single_hide_benefit ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_benefit_text" id="jobwp_single_benefit_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_benefit_text ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_single_hide_level"><?php _e('Hide Job Level', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_single_hide_level" class="jobwp_single_hide_level" id="jobwp_single_hide_level"
                    <?php echo $jobwp_single_hide_level ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_single_level_text" id="jobwp_single_level_text" class="regular-text" value="<?php esc_attr_e( $jobwp_single_level_text ); ?>" />
            </td>
        </tr>
        <tr><td colspan="4"><hr></td></tr>
        <tr>
            <th scope="row">
                <label for="jobwp_hide_apply_procedure"><?php _e('Hide Apply Procedure', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_apply_procedure" class="jobwp_hide_apply_procedure" id="jobwp_hide_apply_procedure"
                    <?php echo $jobwp_hide_apply_procedure ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Apply Procedure Title', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_apply_procedure_title" id="jobwp_apply_procedure_title" class="regular-text" value="<?php esc_attr_e( $jobwp_apply_procedure_title ); ?>" />
            </td>
        </tr>
        <tr>
            <th colspan="3" scope="row" style="text-align: right;">
                <label><?php _e('Apply Procedure Content', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="1">
                <textarea cols="40" style="min-height:100px;" name="jobwp_apply_procedure_content" class="regular-text" id="jobwp_apply_procedure_content"><?php esc_html_e( $jobwp_apply_procedure_content ); ?></textarea>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_hide_apply_button"><?php _e('Hide Apply Button', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_apply_button" class="jobwp_hide_apply_button" id="jobwp_hide_apply_button"
                    <?php echo $jobwp_hide_apply_button ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Apply Button Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_apply_button_text" id="jobwp_apply_button_text" class="regular-text" value="<?php esc_attr_e( $jobwp_apply_button_text ); ?>" />
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updateSingleContent" name="updateSingleContent" class="button button-primary jobwp-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', JOBWP_TXT_DOMAIN); ?>
        </button>
    </p>

</form>