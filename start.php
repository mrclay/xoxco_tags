<?php

elgg_register_event_handler('init', 'system', 'xoxco_tags_init');

function xoxco_tags_init() {
	elgg_extend_view('css/elgg', 'xoxco_tags/css/elgg_after', 501);
	elgg_extend_view('css/admin', 'xoxco_tags/css/elgg_after', 501);

	elgg_define_js('jquery.tagsinput', array(
		'src' => '/mod/xoxco_tags/js/lib/jquery.tagsinput.min.js',
	));

	// Include the feature only if Elgg is displaying the tags input
	elgg_register_plugin_hook_handler('view', 'input/tags', function () {
		elgg_require_js('xoxco_tags');
	});
}