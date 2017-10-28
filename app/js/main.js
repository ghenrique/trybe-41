// App global variable
window.app = window.app || {};

(function($) {

    // Variables 

    var $document = $(document),
        $window   = $(window),
        $body     = $('body'),
        $selectorOpenModal = $('.js-openModal'),
        $selectorCloseModal = $('.js-closeModal'),
        $modal = $('.modal'),
        modalActiveClass = 'modal--active',
        bodyLock = 'body-lock';



    /*
        Loaded document
    */

    $document.ready( function() {
        
        $selectorOpenModal.on( 'click', function(e) {
            e.preventDefault();
            $modal.addClass(modalActiveClass);
            $body.addClass( bodyLock );
        });

        $selectorCloseModal.on( 'click', function(e) {
            e.preventDefault();
            $modal.removeClass(modalActiveClass);
            $body.removeClass( bodyLock );
        });

    });


})(jQuery);