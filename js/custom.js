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
               if($(window).scrollTop() + $(window).height() == $(document).height() && timesLoaded < 4 && window.location.pathname == '/') {
                timesLoaded += 1;
                if(timesLoaded === 4) {
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

                        jQuery( document.body ).trigger( 'post-load' );


                    }
                });
               }
        }.bind($(".load")));

        jQuery( document.body ).on( 'post-load', function () {
                // New content has been added to the page.
                // console.log("POST LOAD TRIGGERED")
        } );


        $(".search-icon").on("click", function() {
            if($('.secondary-nav-search').hasClass('secondary-nav-search-visible')) {
                $(".secondary-nav-search").removeClass('secondary-nav-search-visible');
            } else {
                $('.secondary-nav-search').addClass('secondary-nav-search-visible')
                $(".secondary-nav-search").focus();
                $(".search-icon").addClass("search-icon-hidden");
                $(".search-times").removeClass("search-times-hidden");
                $(".search-times").addClass("search-times");
            }
        });

        $(".search-times").on("click", function() {
            $(".secondary-nav-search").removeClass("secondary-nav-search-visible");
            $(".search-times").addClass('search-times-hidden');
            $(".search-icon").removeClass("search-icon-hidden");
        });

        // $(".addtoany_share_save_container").prepend("SHARE: ");

        $(".code-block-1").append("<span class='close-ad'>X</span>");
        $(".close-ad").on("click", function() {
            $(".code-block-1").css("display", "none");
        });

    /* scroll functions */
    // var lastScroll = 0;
    // $(window).scroll(function() {
    //     var scroll = $(window).scrollTop();

    //     if(Math.abs(scroll - lastScroll) > $(window).height() * 0.1) {
    //         lastScroll = scroll;
    //         $('.page-limit').each(function(index) {

    //             if(isVisible($(this))) {
    //                 history.replaceState( null, null, $(this).attr("data-page") );
    //                 return (false);
    //             }

    //         });
    //     }
    // });

    // function isVisible(el) {
    //     var scrollPos = $(window).scrollTop();
    //     var windowHeight = $(window).height();
    //     var elTop = $(el).offset().top;
    //     var elHeight = $(el).height();
    //     var elBottom = elTop + elHeight;

    //     return ((elBottom - elHeight * 0.25 > scrollPos) && (elTop < (scrollPos + 0.5*windowHeight)));
    // }

    // $('.search-icon').on('click', function() {
    //     $(".secondary-nav-search").toggle('search-hidden');
    // });
});












