$(function() {
//$( document ).ready(function() {
$.getScript(base_url+'/bc/geocomplete/jquery.geocomplete.js', function() {
	$(".geocomplete").geocomplete({
     // map: ".map_canvas",
      details: "form",
      types: ["geocode", "establishment"],
    });
	
});//end getscript
});//end ready