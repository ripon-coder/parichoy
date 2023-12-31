

(function ($) {
	"use strict";
	jQuery.fn.progressBar = function (options) {

		var defaults = {
			height: "30",
			backgroundColor: "#E0E0E0",
			barColor: "#F97352",
			targetBarColor: "#CCC",
			percentage: true,
			shadow: false,
			border: false,
			animation: false,
			animateTarget: false,
		};

		var settings = $.extend({}, defaults, options);

		return this.each(function () {
			var elem = $(this);
			$.fn.replaceProgressBar(elem, settings);
		});
	};

	$.fn.replaceProgressBar = function (item, settings) {
		var skill = item.text();
		var progress = item.data('width');
		var target = item.data('target');
		var bar_classes = ' ';
		var animation_class = '';
		var bar_styles = 'background-color:' + settings.backgroundColor + ';height:' + settings.height + 'px;';
		if (settings.shadow) {
			bar_classes += 'shadow';
		}
		if (settings.border) {
			bar_classes += ' border';
		}
		if (settings.animation) {
			animation_class = ' animate';
		}

		var overlay = '<div class="my_progressbar' + animation_class + '" data-width="' + progress + '">';
		overlay += '<p class="title">' + skill + '</p>';
		overlay += '<div class="bar-container' + bar_classes + '" style="' + bar_styles + '">';

		overlay += '<span class="backgroundBar"></span>';

		if (target) {
			if (settings.animateTarget) {
				overlay += '<span class="targetBar loader" style="width:' + target + '%;background-color:' + settings.targetBarColor + ';"></span>';
			} else {
				overlay += '<span class="targetBar" style="width:' + target + '%;background-color:' + settings.targetBarColor + ';"></span>';
			}
		}


		if (settings.animation) {
			overlay += '<span class="bar" style="background-color:' + settings.barColor + ';"></span>';
		} else {
			overlay += '<span class="bar" style="width:' + progress + '%;background-color:' + settings.barColor + ';"></span>';
		}

		if (settings.percentage) {
			overlay += '<span class="progress-percent" style="line-height:' + settings.height + 'px;">' + progress + '%</span>';
		}


		overlay += '</div></div>';


		$(item).replaceWith(overlay);

	};

	var animate = function () {

		var doc_height = $(window).height();

		$('.my_progressbar.animate').each(function () {
			var position = $(this).offset().top;

			if (($(window).scrollTop() + doc_height - 60) > position) {
				var progress = $(this).data('width') + "%";

				$(this).removeClass('animate');
				$(this).find('.bar').css('opacity', '0.1');

				$(this).find('.bar').animate({
					width: progress,
					opacity: 1
				}, 3000);
			}

		});

	};

	$(window).scroll(function () {

		if ($('.my_progressbar.animate').length < 1) {
			return;
		}

		animate();

	});


})(jQuery);

