$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

$(function() {
    $(".date-picker").datepicker({
      dateFormat: "yy-mm-dd",
    }).val(1);
    
    $('.tooltip').tooltipster();
    
    $("#regForm").validate();
    
    $(document).on("click",".report-item",function(){
        $(".active-db").removeClass('active-db');
        $(this).children("span").addClass('active-db');
        $(".report-title").html(' : <b>'+$(this).text()+'</b>');
    });
    
    $(document).scroll(function() {
		var scroll	=	$(window).scrollTop();
		var height	=	200;

		if( scroll >= height ) {
			$('.main-logo').addClass("navbar-fixed-top").delay( 500 ).fadeIn();
		}
		else if(scroll == 0) {
			$('.main-logo').removeClass("navbar-fixed-top");
		}
    });
});

function getCSVData(){
    var csv_value=$('#csv-table').table2CSV({delivery:'value'});
    $("#csv_text").val(csv_value);
}