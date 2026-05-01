<?php

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
            'sql'                     => array('type'=>'integer', 'unsigned'=>true, 'default'=>0)
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
            'sql'                     => array('type'=>'integer', 'unsigned'=>true, 'default'=>0)
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






        


        
        
        'title' => array
		(
			'sorting'                 => true,
			'flag'                    => DataContainer::SORT_INITIAL_LETTER_ASC,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => array('type'=>'string', 'length'=>255, 'default'=>''),
		),





        
	)
);
