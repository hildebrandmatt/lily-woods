jQuery(document).ready( function($) {

    $('.isotope-full-grid').isotope({
        // options
        itemSelector: '.grid-item',
        percentPosition: true,
        layoutMode: 'packery',
        packery: {
            gutter: 5,
            columnWidth: 50,
        },
        sortBy: 'random'
    });

    $('.isotope-half-grid').isotope({
        // options
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        percentPosition: true,
        layoutMode: 'packery',
        packery: {
            gutter: 5,
            columnWidth: 50,
        },
        sortBy: 'random'
    });

    $('.isotope-stories-grid').isotope({
        // options
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
        percentPosition: true,
        layoutMode: 'packery',
        packery: {
            gutter: 5,
            columnWidth: 50,
        },
        sortBy: 'random'
    });
});
