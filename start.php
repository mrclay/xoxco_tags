<?php

elgg_register_event_handler('init', 'system', 'xoxco_tags_init');

function xoxco_tags_init() {
	elgg_extend_view('css/elgg', 'xoxco_tags/css/elgg_after', 501);
    elgg_extend_view('js/elgg', 'xoxco_tags/js/elgg_after', 501);
    elgg_extend_view('input/tags', 'xoxco_tags/input/tags_before', 499);
}