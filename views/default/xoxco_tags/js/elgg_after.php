<?php if (0) { ?><script><?php } ?>

<?php readfile(dirname(dirname(dirname(dirname(__DIR__)))) . '/js/lib/jquery.tagsinput.min.js'); ?>

elgg.provide('elgg.tags');

elgg.tags.init = function() {
    var time = (new Date).getTime(),
        i = 0;
    $('.elgg-input-tags').each(function () {
        if (! this.id) {
            this.id = 't' + time + '_' + i++;
        }
    }).tagsInput({
        width: '98%',
        height: 'auto',
        placeholderColor:'#999999',
        defaultText:'add a tag (separate with commas)'
    });
};

elgg.register_hook_handler('init', 'system', elgg.tags.init);