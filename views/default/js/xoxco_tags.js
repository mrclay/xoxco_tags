/**
 * Applies jQuery Tags Input Plugin on tag input fields
 */
define(function(require) {
	var $ = require('jquery');
	var tagsinput = require('jquery.tagsinput');

	var time = (new Date).getTime();
	var i = 0;

	var tidyTags = function(e){
		var tags = ($(e.target).val() + ',' + e.tags).split(',');
		var target = $(e.target);

		target.importTags('');

		for (var i = 0, z = tags.length; i < z; i++) {
			var tag = $.trim(tags[i]);
			if (!target.tagExist(tag)) {
				target.addTag(tag);
			}
		}

		$('#' + target[0].id + '_tag').trigger('focus');
	};

	$('.elgg-input-tags').each(function () {
		var self = this;

		if (! this.id) {
			this.id = 't' + time + '_' + i++;
		}

		$(this).tagsInput({
			width: '98%',
			height: 'auto',
			placeholderColor: '#999999',
			defaultText: (function () {
				return elgg.echo(self.name == 'categories' ? 'xoxco_tags:add_category' : 'xoxco_tags:add');
			})(),
			onAddTag: function (tag) {
				if (tag.indexOf(',') > 0) {
					tidyTags({target: this, tags: tag});
				}
			}
		});
	});
});

