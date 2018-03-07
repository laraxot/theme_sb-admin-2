$(function() {
//$( document ).ready(function() {
$.getScript(base_url+'/theme/bc/geocomplete/jquery.geocomplete.min.js', function() {
	$(".geocomplete").geocomplete({
     // map: ".map_canvas",
      details: "form",
      types: ["geocode", "establishment"],
    });
	
});//end getscript
});//end ready