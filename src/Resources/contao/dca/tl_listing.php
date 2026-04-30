<?php

$GLOBALS['TL_DCA']['tl_content'] = array
(
	// Config
	'config' => array
	(
		'dataContainer'               => DC_Table::class,
		'enableVersioning'            => true,
		'ctable'                      => array('tl_content'),
		'dynamicPtable'               => true,
		'markAsCopy'                  => 'headline',
		'onload_callback'             => array
		(
			array('tl_content', 'adjustDcaByType'),
			array('tl_content', 'showJsLibraryHint'),
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'tstamp' => 'index',
				'ptable,pid,invisible,start,stop' => 'index',
				'type' => 'index'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => DataContainer::MODE_PARENT,
			'fields'                  => array('sorting'),
			'panelLayout'             => 'search,filter,limit',
			'defaultSearchField'      => 'text',
			'headerFields'            => array('title', 'type', 'author', 'tstamp', 'start', 'stop'),
			'renderAsGrid'            => true,
			'limitHeight'             => 160
		),
		'label' => array
		(
			'fields'                  => array('type'),
			'format'                  => '%s',
		),
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => '{type_legend},type'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default 0"
		),
		'ptable' => array
		(
			'sql'                     => "varchar(64) COLLATE ascii_bin NOT NULL default 'tl_article'"
		),
		'sorting' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default 0"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default 0"
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
