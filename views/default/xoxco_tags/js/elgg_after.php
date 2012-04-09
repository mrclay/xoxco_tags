<?php if (0) { ?><script><?php } ?>

<?php readfile(dirname(dirname(dirname(dirname(__DIR__)))) . '/js/lib/jquery.tagsinput.min.js'); ?>

elgg.provide('elgg.tags');

elgg.tags.init = function() {
    var time = (new Date).getTime(),
        i = 0,
        tidyTags = function(e){
            var tags = ($(e.target).val() + ',' + e.tags).split(',');
            var target = $(e.target);
            target.importTags('');
            for(var i = 0, z = tags.length; i<z; i++){
                var tag = $.trim(tags[i]);
                if(!target.tagExist(tag)){
                    target.addTag(tag);
                }
            }
            $('#' + target[0].id + '_tag').trigger('focus');
        };
    $('.elgg-input-tags').each(function () {
        if (! this.id) {
            this.id = 't' + time + '_' + i++;
        }
    }).tagsInput({
        width: '98%',
        height: 'auto',
        placeholderColor:'#999999',
        defaultText:'add a tag (separate with commas)',
        onAddTag: function (tag) {
            if (tag.indexOf(',') > 0) {
                tidyTags({target: this, tags: tag});
            }
        }
    });
};

elgg.register_hook_handler('init', 'system', elgg.tags.init);