$ = jQuery.noConflict();


$(document).ready(function() {



	$(".headerOpenSearch").on("click" , function() {
		if ($(".headerSearchDiv").css("display") == "none") {
			$(".headerSearchDiv").css("display", "block");
			$(".headerSearchDiv input").focus();
		} else
			$(".headerSearchDiv").css("display", "none");
		event.preventDefault();
	});
	$(".headerCloseSearch").on("click", function() {
		hideHeaderSearch();
	});
	// click outside of the form
	$(document).on("click", function(e) {
		//console.log(e.target);
		if (!$(e.target).hasClass('headerSearchIcon') && !$(e.target).hasClass('headerOpenSearch') &&
			!$(e.target).hasClass('header-search-btn') && !$(e.target).hasClass('headerSearchForm') &&
			!$(e.target).hasClass('headerSearchFormInput')){
				hideHeaderSearch();
			}
	});

	function showHeaderSearch() {}

	function hideHeaderSearch() {
		$(".headerSearchDiv").fadeOut("2000");
	}

});
