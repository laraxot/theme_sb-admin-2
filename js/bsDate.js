$(function() {
//$( document ).ready(function() {
$.getScript(base_url+'/bc/moment/min/moment.min.js', function() {        
$.getScript(base_url+'/bc/bootstrap-daterangepicker/daterangepicker.js', function() {
	//var $j = jQuery.noConflict();
    $('.datepicker').daterangepicker({
        timePicker: false,
        singleDatePicker: true,
        //timePickerIncrement: 30,
       //showDropdowns: true,
        locale: {
        //    format: 'DD/MM/YYYY h:mm A'
         //   format: 'DD/MM/YYYY'
            format: 'YYYY-MM-DD'   ///bisogna usare tipo di campo date
        }
    });
});
});
});