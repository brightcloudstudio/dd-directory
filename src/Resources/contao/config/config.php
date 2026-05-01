<?php

use Contao\System;

/* Back end modules */
$GLOBALS['BE_MOD']['content']['listings'] = array(
	'tables' => array('tl_listing'),
	'icon'   => 'system/modules/contao_directory/assets/icons/location.png',
	'exportListings' => array('Bcs\Backend\ListingsBackend', 'exportListings')
);

/* Front end modules */
$GLOBALS['FE_MOD']['contao_directory']['directory_list'] 	= 'Bcs\Module\DirectoryList';

/* Models */
$GLOBALS['TL_MODELS']['tl_listing'] = 'Bcs\Model\Listing';

/* Add Backend CSS to style Reviewed and Unreviewed */
$request = System::getContainer()->get('request_stack')->getCurrentRequest();
if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request))
{
	$GLOBALS['TL_CSS'][]					= 'system/modules/contao_directory/assets/css/contao_directory_backend.css';
}
