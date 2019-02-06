$ = jQuery.noConflict();


$(document).ready(function() {

	$(document).on("click", ".headerOpenSearch", function() {
		event.preventDefault();
		if ($(".headerSearchInput").css("display") == "none") {
			$(".headerSearchInput").css("display", "block");
			$(".headerSearchInput input").focus();
		} else
			$(".headerSearchInput").css("display", "none");
	});
	$(document).on("click", ".headerCloseSearch", function() {
		hideHeaderSearch();
	});
	$(document).on("click",function(e) {
        //console.log(e.target);
        if (!$(e.target).hasClass('fa-search') && !$(e.target).hasClass('header-search-btn'))
            hideHeaderSearch();
	});

	function showHeaderSearch() {}

	function hideHeaderSearch() {
        event.preventDefault();
		$(".headerSearchInput").fadeOut("2000");
    }

});
