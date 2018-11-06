$(function() {
//$( document ).ready(function() {
$.getScript(base_url+'/bc/moment/min/moment.min.js', function() {        
$.getScript(base_url+'/bc/bootstrap-daterangepicker/daterangepicker.js', function() {
	//var $j = jQuery.noConflict();
    $('.timepicker').daterangepicker({
        timePicker: true,
        singleDatePicker: true,
        //timePickerIncrement: 30,
       //showDropdowns: true,
        locale: {
            format : 'h:mm A'
        //    format: 'DD/MM/YYYY h:mm A'
         //   format: 'DD/MM/YYYY'
         //   format: 'YYYY-MM-DD'   ///bisogna usare tipo di campo date
        }
    });
});
});
});