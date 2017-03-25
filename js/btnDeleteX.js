$('.btn-danger').click(function() {
	//var id=$(this).attr('data-id');
	//var href=$(this).attr('data-href');
	//var token=$(this).attr('data-token');
	var id=$(this).data('id');
	var href=$(this).data('href');
	var token = $(this).data('token');
	swal({
	  title: "Sei Sicuro ?",
	  text: "di volere cancellare id ["+id+"]!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Si, cancella it!",
	  closeOnConfirm: false
	},
	function(){
		$.ajax({
		    url: href,
		    type: "DELETE",
		    data: {_method: 'delete',_token :token},
		    success: function (data) {
				console.log(data);
				//$("#task" + task_id).remove();
				//alert(data);
				swal("Deleted!", "Your imaginary file has been deleted.", "success");
				location.reload();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
            console.log('url : '+href);
            console.log('XMLHttpRequest');
            console.log(XMLHttpRequest);
            //alert(XMLHttpRequest.responseText);
            $('#div_debug').html(XMLHttpRequest.responseText);
            console.log('textStatus');
            console.log(textStatus);
            console.log('errorThrown');
            console.log(errorThrown);
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
        	}//end error
	    });
	}
	)//end swal

});//end click
