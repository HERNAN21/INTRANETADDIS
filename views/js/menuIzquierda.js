$(document).ready(function() {
    $('.dd-list li:has(ul)').click(function(e) {
        e.preventDefault();

        if ($(this).hasClass('activado')) {
        	$(this).removeClass('activado');
        	$(this).children('ul').slideUp();
        } else {
            $('.dd-list li ul').slideUp();
            $('.dd-list li').removeClass('activado');
            $(this).addClass('activado');
            $(this).children('ul').slideDown();
        }
    });
    $('.dd-list li ul li a').click(function(){
    	window.location.href = $(this).attr("href");
    });
});
