<?php
// add unique page settings:
$page_title = 'Your Dashboard';
$page_tips = 'Here\'s an overview of your account. Look for help tips on every page.';
$page_data = array();

$page_request = new CASHRequest(
	array(
		'cash_request_type' => 'asset', 
		'cash_action' => 'getanalytics',
		'analtyics_type' => 'mostaccessed',
		'user_id' => getPersistentData('cash_effective_user')
	)
);
$page_data['asset_mostaccessed'] = $page_request->response['payload'];

$page_request = new CASHRequest(
	array(
		'cash_request_type' => 'asset', 
		'cash_action' => 'getanalytics',
		'analtyics_type' => 'recentlyadded',
		'user_id' => getPersistentData('cash_effective_user')
	)
);
$page_data['asset_recentlyadded'] = $page_request->response['payload'];

$page_request = new CASHRequest(
	array(
		'cash_request_type' => 'element', 
		'cash_action' => 'getanalytics',
		'analtyics_type' => 'mostactive',
		'user_id' => getPersistentData('cash_effective_user')
	)
);
$page_data['element_mostactive'] = $page_request->response['payload'];

$page_request = new CASHRequest(
	array(
		'cash_request_type' => 'element', 
		'cash_action' => 'getanalytics',
		'analtyics_type' => 'recentlyadded',
		'user_id' => getPersistentData('cash_effective_user')
	)
);
$page_data['element_recentlyadded'] = $page_request->response['payload'];

$page_request = new CASHRequest(
	array(
		'cash_request_type' => 'element', 
		'cash_action' => 'getelementsforuser',
		'user_id' => getPersistentData('cash_effective_user')
	)
);
$page_data['element_active_count'] = count($page_data['element_mostactive']);
$page_data['element_inactive_count'] = count($page_request->response['payload']) - $page_data['element_active_count'];
?>