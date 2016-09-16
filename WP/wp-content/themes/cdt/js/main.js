console.log('%c Developed by Armin Kardovic ', 'background: #222; color: #bada55; font-size: 30px;');
(function($) {
    $(document).ready(function() {

        $('.slider-content').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
			arrows: true,
			autoplay: true,
			prevArrow: '<span class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true" style="font-size: 50px;margin-right: 15px;margin-top: 12px;color: #FFF;"></i></span>',
			nextArrow: '<span class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true" style="font-size: 50px;margin-right: 15px;margin-top: 12px;color: #FFF;"></i></span>',
			appendArrows: $('.slider-arrows .wrapper'),
			appendDots: $('.slider-arrows .wrapper'),
			infinite: true
        });
		
		$('.anim-to, .anim-lo, .anim-ro, .anim-o, .anim-lr, .anim-tor').viewportChecker({
            classToAdd: 'showed',
            offset: 0
        });

        var menu = $("#mobile-menu-off").mmenu({
            offCanvas: {
                position: "right",
                zposition: "front"
            }
        });

        var api = menu.data("mmenu");
        $(".mm-title").click(function() {
            api.close();
        });

        $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function() {
            $(this).toggleClass('open');
            if ($(this).hasClass('open')) {
                api.open();
            } else {
                api.close();
            }
        });
        
		if(api) {
			api.bind('closed', function() {
				$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').removeClass("open");
			});
		}
        
		var isOnBottom = false;
		$(window).scroll(function() {
		   if($(window).scrollTop() + $(window).height() == $(document).height()) {
			   if(isOnBottom == false){
				   $('.anim-to, .anim-lo, .anim-ro, .anim-o, .anim-lr, .anim-tor').addClass("showed");
			   }
		   }
		});

		var $table = $('table.tablesorter-bootstrap'),
			process = false;

		if($table) {
				$('.error').click(function(){
				  $.tablesorter.showError( $table, 'This is the error row');
				});

				$('.process').click(function(){
				  process = !process;
				  $.tablesorter.isProcessing( $table, process );
				});

				$('.sortable').click(function(){
				  $table
					.find('.tablesorter-header:last').toggleClass('sorter-false')
					.trigger('update');
				});

				if(typeof $table.tablesorter === 'function') {
						$table
						  .tablesorter({
							widthFixed: true,
							widgets : [ 'zebra', 'columns', "filter" ]
						   })
						  .tablesorterPager({
							// target the pager markup - see the HTML block below
								container: $("#tab-sort-pager")
						});
				}//end if is function
		}
    });
})(jQuery);
