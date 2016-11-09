jQuery(document).ready(function($) {
    $('#fullpage').fullpage({
        //Navigation
        //menu: '#menu-secondary',
        navigation: true,
        navigationPosition: 'left',
//        anchors:['about', 'contact', 'references'],
//        navigationTooltips: ['About', 'References', 'Contact'],
        showActiveTooltip: true,
        //Scrolling
        autoScrolling: false,
        fitToSection: false,
        //Design
//        paddingTop: '5em',
    });
});