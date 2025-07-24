<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Listing Content Settings
*/
trait Jobwp_Listing_Content_Settings 
{
    protected $fields, $settings, $options;

    protected function jobwp_set_listing_content_settings( $post ) {

        $this->fields   = $this->jobwp_listing_content_option_fileds();

        $this->options  = $this->jobwp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'jobwp_listing_content', $this->options, $post );

        return update_option( 'jobwp_listing_content', serialize( $this->settings ) );

    }

    function jobwp_get_listing_content_settings() {

        $this->fields   = $this->jobwp_listing_content_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('jobwp_listing_content') ) );
        
        return $this->jobwp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function jobwp_listing_content_option_fileds() {

        return [
            [
                'name'      => 'jobwp_list_display_overview',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_overview_length',
                'type'      => 'number',
                'default'   => 30,
            ],
            [
                'name'      => 'jobwp_list_display_experience',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_exp_lbl_txt',
                'type'      => 'text',
                'default'   => 'Experience',
            ],
            [
                'name'      => 'jobwp_list_display_deadline',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_deadline_lbl_txt',
                'type'      => 'text',
                'default'   => 'Deadline',
            ],
            [
                'name'      => 'jobwp_list_display_location',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_loc_lbl_txt',
                'type'      => 'text',
                'default'   => 'Location',
            ],
            [
                'name'      => 'jobwp_list_display_jtype',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_job_type_lbl_txt',
                'type'      => 'text',
                'default'   => 'Job Type',
            ],
            [
                'name'      => 'jobwp_hide_total_jobs_found',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_display_company_name',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_display_company_logo',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_display_listing_icon',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_display_listing_read_more',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_listing_read_more_txt',
                'type'      => 'text',
                'default'   => 'Read More',
            ],
            [
                'name'      => 'jobwp_total_jobs_found_lbl_txt',
                'type'      => 'text',
                'default'   => 'Jobs Found',
            ],
            [
                'name'      => 'jobwp_list_display_salary',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_salary_lbl_txt',
                'type'      => 'text',
                'default'   => 'Salary',
            ],
            [
                'name'      => 'jobwp_list_display_responsibility',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_respo_lbl_txt',
                'type'      => 'text',
                'default'   => 'Responsibility',
            ],
            [
                'name'      => 'jobwp_list_display_vacancy',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_vacancy_lbl_txt',
                'type'      => 'text',
                'default'   => 'Vacancy',
            ],
            [
                'name'      => 'jobwp_list_title_length',
                'type'      => 'number',
                'default'   => 10,
            ],
            [
                'name'      => 'jobwp_hide_pagination',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_display_publish_date',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_publish_date_lbl_txt',
                'type'      => 'text',
                'default'   => 'Publishing Date',
            ],
            [
                'name'      => 'jobwp_list_exp_order',
                'type'      => 'number',
                'default'   => 1,
            ],
            [
                'name'      => 'jobwp_list_deadline_order',
                'type'      => 'number',
                'default'   => 2,
            ],
            [
                'name'      => 'jobwp_list_loc_order',
                'type'      => 'number',
                'default'   => 3,
            ],
            [
                'name'      => 'jobwp_list_jobtype_order',
                'type'      => 'number',
                'default'   => 4,
            ],
            [
                'name'      => 'jobwp_list_salary_order',
                'type'      => 'number',
                'default'   => 5,
            ],
            [
                'name'      => 'jobwp_list_role_order',
                'type'      => 'number',
                'default'   => 6,
            ],
            [
                'name'      => 'jobwp_list_vacancy_order',
                'type'      => 'number',
                'default'   => 7,
            ],
            [
                'name'      => 'jobwp_list_pdate_order',
                'type'      => 'number',
                'default'   => 8,
            ],
        ];
    }
}