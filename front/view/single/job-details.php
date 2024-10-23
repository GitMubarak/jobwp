<?php
# Silence is golden.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="jobwp-single-area">
    <!-- Overview -->
    <?php
    if ( ! $jobwp_single_hide_overview ) {
        ?>
        <div class="content-row">
            <div class="left-cell">
                <h5 class="label"><?php esc_html_e( $jobwp_single_overview_text ); ?></h5>
            </div>
            <div class="right-cell text">
                <?php echo force_balance_tags( html_entity_decode( htmlentities( wpautop( $job_overview ) ) ) ); ?>
            </div>
            <div class="clear"></div>
        </div>
        <?php
    }
    ?>
    <!-- Vacancies -->
    <?php
    if ( ! $jobwp_single_hide_vacancies ) {

        if ( '' !== $bo_vacancies ) {
            ?>
            <div class="content-row">
                <div class="left-cell">
                    <h5 class="label"><?php esc_html_e( $jobwp_single_vacancies_text ); ?></h5>
                </div>
                <div class="right-cell text">
                    <?php esc_html_e( $bo_vacancies ); ?>
                </div>
                <div class="clear"></div>
            </div>
            <?php
        }
    }
    ?>
    <!-- Skills -->
    <?php
    if ( ! $jobwp_single_hide_skills ) {
        if ( ! empty( $bo_career_skills ) ) {
        ?>
        <div class="content-row">
            <div class="left-cell">
                <h5 class="label"><?php esc_html_e( $jobwp_single_skills_text ); ?></h5>
            </div>
            <div class="right-cell">
                <div class="custom-list text">
                    <?php echo wp_kses_post( $bo_career_skills ); ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        }
    }
    ?>
    <!-- Responsible -->
    <?php
    if ( ! $jobwp_single_hide_responsible ) {
        if ( ! empty( $bo_job_responsibilities ) ) {
        ?>
        <div class="content-row">
            <div class="left-cell">
                <h5 class="label"><?php esc_html_e( $jobwp_single_responsible_text ); ?></h5>
            </div>
            <div class="right-cell">
                <div class="custom-list text">
                    <?php echo wp_kses_post( $bo_job_responsibilities ); ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        }
    }
    ?>
    <!-- Additional -->
    <?php
    if ( ! $jobwp_single_hide_requirements ) {
        if ( ! empty( $bo_job_additional_requirements ) ) {
        ?>
        <div class="content-row">
            <div class="left-cell">
                <h5 class="label"><?php esc_html_e( $jobwp_single_requirements_text ); ?></h5>
            </div>
            <div class="right-cell">
                <div class="custom-list text">
                    <?php echo wp_kses_post( $bo_job_additional_requirements ); ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        }
    }
    ?>
    <!-- Job Nature -->
    <?php
    if ( ! $jobwp_single_hide_job_type ) {
        ?>
        <div class="content-row">
            <div class="left-cell">
                <h5 class="label"><?php esc_html_e( $jobwp_single_job_type_text ); ?></h5>
            </div>
            <div class="right-cell text">
                <?php
                // Job Nature
                if ( ! empty( $jobs_nature ) ) {
                    $jobs_nature_arr = array();
                    foreach( $jobs_nature as $nature ) {
                        $jobs_nature_arr[] = $nature->name . '';
                    }
                    echo implode( ', ', $jobs_nature_arr );   
                }
                ?>
            </div>
            <div class="clear"></div>
        </div>
        <?php
    }
    ?> 
    <!-- Educational -->
    <?php
    if ( ! $jobwp_single_hide_education ) {
        if ( ! empty( $jobwp_edu_req ) ) {
        ?>
        <div class="content-row">
            <div class="left-cell">
                <h5 class="label"><?php esc_html_e( $jobwp_single_education_text ); ?></h5>
            </div>
            <div class="right-cell text">
                <?php echo wp_kses_post( $jobwp_edu_req ); ?>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        }
    }
    ?>
    <!-- Experience -->
    <?php
    if ( ! $jobwp_single_hide_experience ) {

        if ( '' !== $bo_experience ) {
            ?>
            <div class="content-row">
                <div class="left-cell">
                    <h5 class="label"><?php esc_html_e( $jobwp_single_experience_text ); ?></h5>
                </div>
                <div class="right-cell text">
                    <?php esc_html_e( $bo_experience ); ?>
                </div>
                <div class="clear"></div>
            </div>
            <?php
        }
    }
    ?>
    <!-- Location -->
    <?php
    if ( ! $jobwp_single_hide_loc ) {
        if ( ! empty( $jobs_location ) ) {
        ?>
        <div class="content-row">
            <div class="left-cell">
                <h5 class="label"><?php esc_html_e( $jobwp_single_loc_text ); ?></h5>
            </div>
            <div class="right-cell text">
                <?php
                    $jobs_location_arr = array();
                    foreach( $jobs_location as $location ) {
                        $jobs_location_arr[] = $location->name . '';
                    }
                    echo implode( ', ', $jobs_location_arr );
                ?>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        }
    }
    ?>
    <!-- Salary -->
    <?php
    if ( ! $jobwp_single_hide_salary ) {
        if ( ! empty( $bo_job_salary ) ) {
        ?>
        <div class="content-row">
            <div class="left-cell">
                <h5 class="label"><?php esc_html_e( $jobwp_single_salary_text ); ?></h5>
            </div>
            <div class="right-cell">
                <div class="custom-list text">
                    <?php echo wp_kses_post( $bo_job_salary ); ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        }
    }
    ?>
    <!-- Other Benefits -->
    <?php
    if ( ! $jobwp_single_hide_benefit ) {
        if ( ! empty( $bo_other_benefits ) ) {
        ?>
        <div class="content-row">
            <div class="left-cell">
                <h5 class="label"><?php esc_html_e( $jobwp_single_benefit_text ); ?></h5>
            </div>
            <div class="right-cell">
                <div class="custom-list text">
                    <?php echo wp_kses_post( $bo_other_benefits ); ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <?php
        }
    }
    ?>
    <!-- Job Level -->
    <?php
    if ( ! $jobwp_single_hide_level ) {
        ?>
        <div class="content-row">
            <div class="left-cell padding-bottom-50">
                <h5 class="label"><?php esc_html_e( $jobwp_single_level_text ); ?></h5>
            </div>
            <div class="right-cell text">
                <?php
                if ( ! empty( $jobs_level ) ) {
                    $jobs_level_arr = array();
                    foreach( $jobs_level as $pos ) {
                        $jobs_level_arr[] = $pos->name . '';
                    }
                    echo implode( ', ', $jobs_level_arr );   
                }
                ?>
            </div>
            <div class="clear"></div>
        </div>
        <?php
    }
    ?>
</div>