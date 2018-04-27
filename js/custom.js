jQuery(document).ready(function($) {
 
    jQuery("#primaryPostForm").validate();

    /* Load More Post AJAX */
    var timesLoaded = 0;

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

    $(window).scroll(function() {
       if($(window).scrollTop() + $(window).height() == $(document).height() && timesLoaded < 4) {
        timesLoaded += 1;
        if(timesLoaded === 3) {
            $(".load").css("display", "flex");
        } 
           var that = $(this);
        var page = $(this).data('page');
        var newPage = page + 1;
        var ajaxUrl = $(this).data('url');

        // that.addClass('loading').find('.load-text').slideUp(320);

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
       }
    }.bind($(".load")));

});












