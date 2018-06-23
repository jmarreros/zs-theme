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

        $('.main-navigation').toggleClass('show-responsive');
        
    });


})( jQuery );