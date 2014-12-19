$(document).ready(function() {
    $(".portfolioitemtooltip").hide();
    $(".portfolioitem").hover(
        function() {
            var currentID = $(this).attr('id');
            var currentID = currentID.replace("portfolioitem", "portfolioitemtooltip");
            if($("#"+currentID).is(":hidden")) {
				$("#"+currentID).show("slide", { direction: "down" });
			}
        },
        function() {
            var currentID = $(this).attr('id');
            var currentID = currentID.replace("portfolioitem", "portfolioitemtooltip");
            $("#"+currentID+"").hide("slide", { direction: "down" });
        }
    );
        
    $('a').each(function() {
		var a = new RegExp('/' + window.location.host + '/');
		if(!a.test(this.href)) {
			$(this).click(function(event) {
				event.preventDefault();
				event.stopPropagation();
				window.open(this.href, '_blank');
			});
		}
	});
	
	$("#thepixel").click(function() {
		window.location = "http://testing.koenvanzuijlen.com/"
	});
});