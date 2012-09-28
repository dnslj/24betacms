(function($){
	$.fn.pagecontrol = function(options){
		if (this.length == 0) return this;
		
		var opts = $.extend({}, $.fn.pagecontrol.defaults, options || {});
		var tthis = this;
		
		function slideScreen()
		{
			var active = tthis.find('.beta-hottest-items.active');
			var next = active.next('.beta-hottest-items');
			if (next.length == 0)
				next = tthis.find('.beta-hottest-items').first();

			var nextIndex = tthis.find('.beta-hottest-items').index(next);
			switchToScreen(nextIndex);
		}

		function switchToScreen(index)
		{
			var activeItem = tthis.find('.beta-hottest-items.active');
			var nextItem = tthis.find('.beta-hottest-items').eq(index);

			activeItem.fadeOut('slow', function(){
			    $(this).removeClass('active');
			});
			nextItem.fadeIn('slow', function(){
			    $(this).addClass('active');
			});
			
			tthis.find('.page-nav a.active').removeClass('active');
			tthis.find('.page-nav a').eq(index).addClass('active');
		}
		
		var interval;
		function start()
		{
			interval = setInterval(slideScreen, opts.interval);
		}
		
		function stop()
		{
			if (interval) clearInterval(interval);
		}
		
		$(this).on('mouseenter', '.page-nav a', function(event){
			stop();
		});
		
		$(document).on('mouseleave', '.page-nav a', function(event){
			start();
		});
		
		$(document).on('click', '.page-nav a', function(event){
			event.preventDefault();
			var index = tthis.find('.page-nav a').index($(this));
			if (index < 0) return;

			var active = tthis.find('.beta-hottest-items.active');
			var activeIndex = tthis.find('.beta-hottest-items').index(active);
			if (index == activeIndex) return false;

			switchToScreen(index);
		});
		
		start();
		return this;
	};
	
	$.fn.pagecontrol.defaults = {
		interval: 5000
	};
})(jQuery);

