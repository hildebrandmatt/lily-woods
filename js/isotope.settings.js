jQuery(document).ready( function($) {

    $('.isotope-grid').isotope({
        // options
        itemSelector: '.grid-item',
        percentPosition: true,
        layoutMode: 'packery',
        packery: {
            gutter: 5,
        },
        sortBy: 'random'
    });

    $('.isotope-set-grid').isotope({
        // options
        itemSelector: '.grid-item',
        percentPosition: true,
        layoutMode: 'packery',
        packery: {
            gutter: 5,
        }
    });

    $('.isotope-stories-grid').isotope({
        // options
        itemSelector: '.grid-item',
        percentPosition: true,
        layoutMode: 'packery',
        packery: {
            gutter: 15,
        },
    });
});