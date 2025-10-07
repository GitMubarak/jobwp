<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Single Content Settings
*/
trait Jobwp_Single_Content_Settings 
{
    protected $fields, $settings, $options;

    protected function jobwp_set_single_content_settings( $post ) {

        $this->fields   = $this->jobwp_single_content_option_fileds();

        $this->options  = $this->jobwp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'jobwp_single_content', $this->options, $post );

        return update_option( 'jobwp_single_content', serialize( $this->settings ) );

    }

    function jobwp_get_single_content_settings() {

        $this->fields   = $this->jobwp_single_content_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('jobwp_single_content') ) );
        
        return $this->jobwp_build_get_settings_options( $this->fields, $this->settings );
	}

    function get_single_items_order() {

        //Use delete_option to reset the sorting
        //delete_option('jobwp_single_item_order_list');

        if ( get_option( 'jobwp_single_item_order_list' ) ) {

            $singleItems = get_option( 'jobwp_single_item_order_list' );

        } else {

            $singleItems = ['Overview', 'NoOfVacancies', 'Skills', 'ResponsibleFor', 'AdditionalRequirements', 'JobNature', 'EducationalRequirements', 
                                'ExperienceRequirements', 'Location', 'Salary', 'Benefits', 'Level'];
        }

        return apply_filters( 'jobwp_single_item_order_list', $singleItems );
    }

    protected function jobwp_single_content_option_fileds() {

        return [
            [
                'name'      => 'jobwp_single_hide_overview',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_overview_text',
                'type'      => 'text',
                'default'   => 'Overview',
            ],
            [
                'name'      => 'jobwp_single_hide_vacancies',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_vacancies_text',
                'type'      => 'text',
                'default'   => 'No. of Vacancies',
            ],
            [
                'name'      => 'jobwp_single_hide_skills',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_skills_text',
                'type'      => 'text',
                'default'   => 'Specific Skills',
            ],
            [
                'name'      => 'jobwp_single_hide_responsible',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_responsible_text',
                'type'      => 'text',
                'default'   => 'Responsible For',
            ],
            [
                'name'      => 'jobwp_single_hide_requirements',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_requirements_text',
                'type'      => 'text',
                'default'   => 'Additional Requirements',
            ],
            [
                'name'      => 'jobwp_single_hide_job_type',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_job_type_text',
                'type'      => 'text',
                'default'   => 'Job Nature',
            ],
            [
                'name'      => 'jobwp_single_hide_education',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_education_text',
                'type'      => 'text',
                'default'   => 'Educational Requirements',
            ],
            [
                'name'      => 'jobwp_single_hide_experience',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_experience_text',
                'type'      => 'text',
                'default'   => 'Experience Requirements',
            ],
            [
                'name'      => 'jobwp_single_hide_loc',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_loc_text',
                'type'      => 'text',
                'default'   => 'Job Location',
            ],
            [
                'name'      => 'jobwp_single_hide_salary',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_salary_text',
                'type'      => 'text',
                'default'   => 'Salary',
            ],
            [
                'name'      => 'jobwp_single_hide_benefit',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_benefit_text',
                'type'      => 'text',
                'default'   => 'Other Benefits',
            ],
            [
                'name'      => 'jobwp_single_hide_level',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_level_text',
                'type'      => 'text',
                'default'   => 'Job Level',
            ],
            [
                'name'      => 'jobwp_hide_apply_procedure',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_apply_procedure_title',
                'type'      => 'text',
                'default'   => 'How to Apply',
            ],
            [
                'name'      => 'jobwp_apply_procedure_content',
                'type'      => 'kses_post',
                'default'   => 'Interested candidates can send their resumes to career@your-domain.com mentioning "Job Title" in the subject line.',
            ],
            [
                'name'      => 'jobwp_hide_apply_button',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_apply_button_text',
                'type'      => 'text',
                'default'   => 'Apply Online',
            ],
            [
                'name'      => 'jobwp_single_title_tag',
                'type'      => 'text',
                'default'   => 'h2',
            ],
            [
                'name'      => 'jobwp_single_display_company_name',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_single_display_company_logo',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_hide_share_on',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_share_on_text',
                'type'      => 'text',
                'default'   => 'Share On',
            ],
            [
                'name'      => 'jobwp_single_layout',
                'type'      => 'string',
                'default'   => 'horizontal',
            ],
        ];
    }
}