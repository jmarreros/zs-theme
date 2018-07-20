( function( $ ) {
    'use strict';


    // Search hide/show
    var link_search = $('.main-navigation .search-link');
    var input_search = $('.main-navigation .search-field');
    var form_search = $('.main-navigation .search-form');


    link_search.click( function( e ){
        e.preventDefault();

        if ( form_search.hasClass('show') ){

            if ( input_search.val() != '' ){
                form_search.submit();
            } else {
                input_search.animate( { width:'hide' }, 500, function(){
                    form_search.removeClass('show');
                })
            }

        } else {
            input_search.animate( { width:'show' }, 500, function(){
                form_search.addClass('show');
                input_search.focus();
            })
        }
    });

    input_search.focusout( function(){
        if ( form_search.hasClass('show') ){
            input_search.animate( { width:'hide' }, 500, function(){
                form_search.removeClass('show');
                input_search.val('');
            })
        }
    });


    // toogle icon menu
    $('.icon-menu').click( function ( e ){
        e.preventDefault();

        $('.site-header .wrap').toggleClass('show-responsive');

    });


    //Event widget
    $('.widget .vsel-content').each( function( index ){
        var devent = $(this).find('.vsel-meta-single-date');

        if ( devent.length ){
            var parts = devent.text().split(' ');
            //devent.remove();

            var devent = `
                            <div class="vsel-daynum">
                            <span class="vsel-day"> ${parts[0]} </span>
                            <span class="vsel-num"> ${parts[1]} </span>
                            <span class="vsel-year"> ${parts[2]} - ${parts[3].substring(2)} </span>
                            </div>
                            `;

            $(this).prepend( devent );


        }

        $(this).find('.vsel-image-info').appendTo( $(this).find('.vsel-meta') );


        var img_event = $(this).find('.vsel-image');

        if ( img_event.length ){
            var path = img_event.prop('src');
            img_event.wrap( "<a href='" + path + "' data-lightbox='img-event-" + index + "'></a>" );
        }

    });

    // Event widget click
    $('.widget .vsel-content').on('click', function( e ){
        if ( ! $(e.target).hasClass('vsel-image') ){
            var link_event = $(this).find('.vsel-meta-title a').attr('href');
            window.location.href = link_event;
        }
    });


    //Add target
    $('.widget_youtube-channel .ytc-lightbox').attr('target','_blank');



    //gallery in content
    $('.gallery .gallery-item a').each( function(index){

        // get img name
        var name_img = $(this).attr('href');
        name_img = name_img.substring(name_img.lastIndexOf('/') + 1, name_img.lastIndexOf('.'));

        $(this).attr('data-lightbox', 'galeria');
    });
    //data-lightbox="img-event-0"

})( jQuery );
