jQuery(document).ready(function ($) {
    //jullpage script
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

    // 3d animation on icon
    $(document).mousemove(function (event) {
        var cx = Math.ceil(window.innerWidth / 2.0),
        cy = Math.ceil(window.innerHeight / 2.0),
        dx = event.pageX - cx,
        dy = event.pageY - cy,
        tiltx = (dy / cy),
        tilty = -(dx / cx),
        radius = Math.sqrt(Math.pow(tiltx, 2) + Math.pow(tilty, 2)),
        degree = (radius * -45);

        $('.flipper').css('transform', 'rotate3d(' + tiltx + ', ' + tilty + ', 0, ' + degree + 'deg)');
    });

    $(document).mouseout(function () {
        $('.flipper').css('transform', 'none');
    });

});