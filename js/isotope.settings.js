jQuery(document).ready( function($) {

    $('.isotope-full-grid').isotope({
        // options
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
            columnWidth: '.grid-item'
        },
        sortBy: 'random'
    });

    $('.isotope-half-grid').isotope({
        // options
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        percentPosition: true,
        masonry: {
            columnWidth: 50
        },
        sortBy: 'random'
    });

    $('.isotope-stories-grid').isotope({
        // options
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        percentPosition: true,
        masonry: {
            columnWidth: '.grid-item'
        },
        sortBy: 'random'
    });
});
