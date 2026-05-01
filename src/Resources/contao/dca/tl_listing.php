<?php

use Contao\DataContainer;
use Contao\DC_Table;

$GLOBALS['TL_DCA']['tl_listing'] = array
(
	// Config
	'config' => array
	(
		'dataContainer'               => DC_Table::class,
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => DataContainer::MODE_SORTED,
			'fields'                  => array('approved ASC', 'tstamp DESC'),
			'panelLayout'             => 'search,filter,limit, sort',
            'flag'                    => DataContainer::SORT_INITIAL_LETTER_ASC
		),
		'label' => array
		(
            'fields'                  => array('approved', 'tstamp', 'country', 'state', 'first_name', 'last_name'),
            'label_callback'          => array('Bcs\Backend\ListingsBackend', 'addListingLabel')
		),
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => '{approved_legend},approved;{listing_legend},photo,first_name,last_name,phone,email_internal,email_public,website;{address_legend},address_1,address_2,city,state,zip,country;{service_area_legend}, service_area_worldwide, service_area_country, service_area_state, service_area_province;{details_legend},credentials,profession,remote_consultations,training_program,describe_practice;{specialties_legend},specialties_1,specialties_2,specialties_3,specialties_4;{practice_details_legend},language, practice_area;{provide_legend},provide_mms,provide_cas;{contact_legend},how_to_contact;{internal_legend},internal_notes,specific_services,date_created,date_approved;{publish_legend},published;'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'sorting' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default 0"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default 0"
		),
        'approved' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['approved'],
			'inputType'               => 'select',
            'filter'                  => true,
            'options'                 => array('approved' => 'Approved', 'unapproved' => 'Unapproved'),
            'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
            'sql'                     => array('type'=>'string', 'length'=>64, 'default'=>'')
		),
        'date_created' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['date_created'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'search'                  => true,
            'eval'                    => array('rgxp'=>'date', 'doNotCopy'=>true, 'tl_class'=>'w50'),
            'sql'                     => array('type'=>'string', 'length'=>128, 'unsigned'=>true, 'default'=>0)
		),
        'date_approved' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['date_approved'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'search'                  => true,
            'eval'                    => array('rgxp'=>'date', 'doNotCopy'=>true, 'tl_class'=>'w50'),
            'save_callback' => array
            (
                array('Bcs\Backend\ListingsBackend', 'getDateApproved')
            ),
            'sql'                     => array('type'=>'string', 'length'=>128, 'unsigned'=>true, 'default'=>0)
		),

        'first_name' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['first_name'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'flag'                    => DataContainer::SORT_INITIAL_LETTER_ASC,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'last_name' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['last_name'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'flag'                    => DataContainer::SORT_INITIAL_LETTER_ASC,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'credentials' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['credentials'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'phone' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['phone'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'email_internal' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['email_internal'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'email_public' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['email_public'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'website' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['website'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'photo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['photo'],
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'filesOnly'=>true, 'extensions'=>'%contao.image.valid_extensions%', 'mandatory'=>true),
			'sql'                     => array('type'=>'binary', 'length'=>16, 'fixed'=>true, 'notnull'=>false)
		),
        'address_1' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['adress_1'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'address_2' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['adress_2'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'country' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['country'],
			'inputType'               => 'select',
            'filter'                  => true,
            'options_callback'        => array('Bcs\Backend\ListingsBackend', 'optionsCountries'),
            'eval'                    => array('includeBlankOption'=>false, 'mandatory'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
            'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'state' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['state'],
			'inputType'               => 'select',
            'filter'                  => true,
            'options_callback'        => array('Bcs\Backend\ListingsBackend', 'optionsStates'),
            'eval'                    => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
            'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'city' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['city'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'zip' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['zip'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'how_to_contact' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['how_to_contact'],
			'inputType'               => 'checkbox',
            'options'                 => array('Office Address' => 'Office Address',  'Phone' => 'Phone',  'Email' => 'Email',  'Website' => 'Website'),
			'eval'                    => array('submitOnChange'=>false, 'mandatory'=>true, 'multiple'=>true, 'tl_class' => 'clr'),
			'sql'                     => array('type'=>'blob')
		),
        'service_area_worldwide' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['service_area_worldwide'],
			'filter'                  => true,
			'inputType'               => 'radio',
			'options'                 => array('yes' => 'Yes', 'no' => 'No'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>32, 'default'=>'')
		),
        'service_area_country' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['service_area_country'],
			'inputType'               => 'select',
            'filter'                  => true,
            'options_callback'        => array('Bcs\Backend\ListingsBackend', 'optionsServiceAreaCountry'),
            'eval'                    => array('includeBlankOption'=>false, 'multiple'=>true, 'mandatory'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
            'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'service_area_state' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['service_area_state'],
			'inputType'               => 'select',
            'filter'                  => true,
            'options_callback'        => array('Bcs\Backend\ListingsBackend', 'optionsServiceAreaStates'),
            'eval'                    => array('includeBlankOption'=>false, 'multiple'=>true, 'mandatory'=>false, 'chosen'=>true, 'tl_class'=>'w50'),
            'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'service_area_province' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['service_area_province'],
			'inputType'               => 'select',
            'filter'                  => true,
            'options_callback'        => array('Bcs\Backend\ListingsBackend', 'optionsServiceAreaProvinces'),
            'eval'                    => array('includeBlankOption'=>false, 'multiple'=>true, 'mandatory'=>false, 'chosen'=>true, 'tl_class'=>'w50'),
            'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'profession' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['profession'],
			'inputType'               => 'checkbox',
            'options_callback'        => array('Bcs\Backend\ListingsBackend', 'getProfessions'),
			'eval'                    => array('mandatory'=>true, 'multiple'=>true, 'tl_class' => 'clr'),
			'sql'                     => array('type'=>'blob')
		),
        'specialties_1' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['specialties_1'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'specialties_2' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['specialties_2'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'specialties_3' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['specialties_3'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'specialties_4' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['specialties_4'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'language' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['language'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'practice_area' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['practice_area'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>'')
		),
        'remote_consultations' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['remote_consultations'],
			'filter'                  => true,
			'inputType'               => 'radio',
			'options'                 => array('yes' => 'Yes', 'no' => 'No'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>32, 'default'=>'')
		),
        'provide_mms' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['provide_mms'],
			'filter'                  => true,
			'inputType'               => 'radio',
			'options'                 => array('yes' => 'Yes', 'no' => 'No'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>32, 'default'=>'')
		),
        'provide_cas' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['provide_cas'],
			'filter'                  => true,
			'inputType'               => 'radio',
			'options'                 => array('yes' => 'Yes', 'no' => 'No'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>32, 'default'=>'')
		),
        'training_program' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['training_program'],
			'filter'                  => true,
			'inputType'               => 'radio',
			'options'                 => array('yes' => 'Yes', 'no' => 'No'),
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>32, 'default'=>'')
		),
        'describe_practice' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['describe_practice'],
            'inputType'               => 'textarea',
            'exclude'                 => true,
            'search'                  => true,
            'eval'                    => array('mandatory' => true, 'tl_class'=>'clr'),
            'sql'                     => array('type'=>'string', 'length'=>1000)
		),
        'specific_services' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['specific_services'],
            'inputType'               => 'text',
            'exclude'                 => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string')
		),
        'internal_notes' => array
		(
            'label'                   => &$GLOBALS['TL_LANG']['tl_listing']['internal_notes'],
            'inputType'               => 'textarea',
            'exclude'                 => true,
            'search'                  => true,
            'eval'                    => array('rte' => 'tinyMCE', 'tl_class'=>'long'),
            'sql'                     => array('type'=>'string')
		),
        'published' => array
		(
            'label'                     => &$GLOBALS['TL_LANG']['tl_listing']['published'],
			'toggle'                  => true,
			'filter'                  => true,
			'flag'                    => DataContainer::SORT_INITIAL_LETTER_ASC,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true, 'submitOnChange'=>true),
			'sql'                     => array('type' => 'boolean', 'default' => false)
		)
	)
);
