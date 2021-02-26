jQuery(document).ready( function($) {

    // Grab the .courses container
    var $container = $('.isotope-grid');

    var $courses = $($container).isotope({
        // options
        itemSelector: '.grid-item',
        layoutMode: 'fit-rows',
        percentPosition: true,
        masonry: {
            columnWidth: '.grid-item'
        }
    });

    // layout Isotope again after all images have loaded
    $courses.imagesLoaded( function() {
        $courses.isotope('layout');
    });

    // Sort based on various factors
    $('.sort-clear .sort').on('click', function() {
        if ( $(this).hasClass('checked')) {
            $(this).removeClass('checked');
            $container.isotope({ sortBy: 'original-order' } );
        } else {
            var sortValue = $(this).attr('data-sort-value');
            $container.isotope({ sortBy: sortValue });
            $(this).addClass('checked');
        }
    });
});
