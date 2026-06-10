<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<table class="form-table">
    <tr class="jobwp_company">
        <th scope="row">
            <label for="jobwp_company"><?php _e('Select Company', 'jobwp'); ?></label>
        </th>
        <td>
            <?php
            if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                ?>
                <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                <?php
            }

            if ( job_fs()->is_plan__premium_only('pro', true) ) {

                $companies = get_terms( array( 'taxonomy' => 'job_company', 'hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC',  'parent' => 0 ) );
                ?>
                <select name="jobwp_company">
                    <option value=""><?php _e('Select a Company', 'jobwp'); ?></option>
                    <?php
                    if ( count($companies) > 0 ) {
                        foreach( $companies as $company ) {
                            ?>
                            <option value="<?php esc_attr_e( $company->name ); ?>" <?php echo ( $jobwp_company == $company->name ) ? 'selected' : ''; ?>><?php esc_html_e( $company->name ); ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <?php
            }
            ?>
        </td>
    </tr>
    <tr class="jobwp_experience">
        <th scope="row">
            <label for="jobwp_experience"><?php _e('Year of Experience', 'jobwp'); ?></label>
        </th>
        <td>
            <input type="text" name="jobwp_experience" value="<?php esc_attr_e( $jobwp_experience ); ?>" class="regular-text">
        </td>
    </tr>
    <tr class="jobwp_vacancies">
        <th scope="row">
            <label for="jobwp_vacancies"><?php _e('No. of Vacancies', 'jobwp'); ?></label>
        </th>
        <td>
            <input type="number" min="1" max="20" step="1" name="jobwp_vacancies" value="<?php echo esc_attr( $jobwp_vacancies ); ?>" class="regular-text">
        </td>
    </tr>
    <tr class="jobwp_deadline">
        <th scope="row">
            <label for="jobwp_deadline"><?php _e('Deadline', 'jobwp'); ?></label>
        </th>
        <td>
            <input type="text" name="jobwp_deadline" id="jobwp_deadline" value="<?php esc_attr_e( $jobwp_deadline ); ?>" class="medium-text" readonly>
        </td>
    </tr>
    <tr class="jobwp_application_url">
        <th scope="row">
            <label for="jobwp_application_url"><?php _e('External Apply Now URL', 'jobwp'); ?></label>
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
                <input type="text" name="jobwp_application_url" id="jobwp_application_url" value="<?php esc_attr_e( $jobwp_application_url ); ?>" class="large-text">
                <?php
            }
            ?>
        </td>
    </tr>
    <tr class="jobwp_is_featured_job">
        <th scope="row">
            <label for="jobwp_is_featured_job"><?php _e('Featured Job', 'jobwp'); ?></label>
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
                <input type="checkbox" name="jobwp_is_featured_job" class="jobwp_is_featured_job" id="jobwp_is_featured_job" <?php echo $jobwp_is_featured_job ? 'checked' : ''; ?>>
                <?php
            }
            ?>
        </td>
    </tr>
    <tr class="jobwp_base_salary">
        <th scope="row">
            <label for="jobwp_base_salary"><?php _e('Base Salary', 'jobwp'); ?></label>
        </th>
        <td>
            <?php _e('Min Salary', 'jobwp'); ?>&nbsp;
            <input type="number" min="0" max="9999999999" name="jobwp_base_salary_min" value="<?php esc_attr_e( $jobwp_base_salary_min ); ?>" class="medium-text">
            &nbsp;&nbsp;
            <?php _e('Max Salary', 'jobwp'); ?>&nbsp;
            <input type="number" min="0" max="9999999999" name="jobwp_base_salary_max" value="<?php esc_attr_e( $jobwp_base_salary_max ); ?>" class="medium-text">
            &nbsp;&nbsp;
            <?php _e('Currency', 'jobwp'); ?>&nbsp;
            <select name="jobwp_base_salary_currency" id="jobwp_base_salary_currency" class="small-text">
                <?php
                $jobwpCurrency = $this->hm_get_all_currency();
                foreach ( $jobwpCurrency as $curr ) { 
                    ?>
                    <option value="<?php esc_attr_e( $curr->abbreviation ); ?>" <?php selected( $jobwp_base_salary_currency, $curr->abbreviation ); ?> >
                        <?php esc_html_e( $curr->abbreviation ); ?>
                    </option>
                    <?php
                } 
                ?>
            </select>
            &nbsp;&nbsp;
            <?php _e('Schedule', 'jobwp'); ?>&nbsp;
            <select name="jobwp_base_salary_time" class="medium-text">
                <option value="HOUR" <?php selected( $jobwp_base_salary_time, 'HOUR' ); ?>><?php _e('Hourly', 'jobwp'); ?></option>
                <option value="DAY" <?php selected( $jobwp_base_salary_time, 'DAY' ); ?>><?php _e('Daily', 'jobwp'); ?></option>
                <option value="WEEK" <?php selected( $jobwp_base_salary_time, 'WEEK' ); ?>><?php _e('Weekly', 'jobwp'); ?></option>
                <option value="MONTH" <?php selected( $jobwp_base_salary_time, 'MONTH' ); ?>><?php _e('Monthly', 'jobwp'); ?></option>
                <option value="YEAR" <?php selected( $jobwp_base_salary_time, 'YEAR' ); ?>><?php _e('Yearly', 'jobwp'); ?></option>
            </select>
        </td>
    </tr>
    <tr class="jobwp_status">
        <th scope="row">
            <label for="jobwp_status"><?php _e('Status', 'jobwp'); ?></label>
        </th>
        <td>
            <input type="radio" name="jobwp_status" class="jobwp_status" id="jobwp_status_active" value="active" <?php echo ( 'inactive' !== esc_attr( $jobwp_status ) ) ? 'checked' : ''; ?> >
            <label for="jobwp_status_active"><span></span><?php _e( 'Active', 'jobwp' ); ?></label>
            &nbsp;&nbsp;
            <input type="radio" name="jobwp_status" class="jobwp_status" id="jobwp_status_inactive" value="inactive" <?php echo ( 'inactive' === esc_attr( $jobwp_status ) ) ? 'checked' : ''; ?> >
            <label for="jobwp_status_inactive"><span></span><?php _e( 'Inactive', 'jobwp' ); ?></label>
        </td>
    </tr>
</table>