jQuery(document).ready(function($) {
 
    jQuery("#primaryPostForm").validate();

    /* Load More Post AJAX */

    $('.load').on("click", function() {

    	var that = $(this);
    	var page = $(this).data('page');
    	var newPage = page + 1;
    	var ajaxUrl = $(this).data('url');

    	that.addClass('loading').find('.load-text').slideUp(320);

    	$.ajax({
    		url : ajaxUrl,
    		type: 'post',
    		data: {
    			page: page,
    			action: 'load_more'
    		},
    		error: function(err) {
    			console.log(err);
    		},
    		success: function(response) {
    			that.data('page', newPage);
    			$('.site-main').append(response);
    			that.removeClass('loading').find(".load-text").slideDown(320);
    		}
    	});

    }); 

    // $('.search-icon').on('click', function() {
    //     $(".secondary-nav-search").toggle('search-hidden');
    // });
});

