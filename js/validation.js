$(document).ready(function() {

$('#CustFirstName').blur(function() {
	var current 	=	$(this);
	var currentem	=	current.next('em');
    	if(current.val().length < 3){  
    	  	currentem.addClass('msgwrong').removeClass('msgcorrect');
     	return false;
    	} else {
    	  	currentem.addClass('msgcorrect').removeClass('msgwrong');
	     return true;  
    }
});

$('#CustLastName').blur(function() {
	var current 	=	$(this);
	var currentem	=	current.next('em');
    	if(current.val().length < 3){  
    	  	currentem.addClass('msgwrong').removeClass('msgcorrect');
     	return false;
    	} else {
    	  	currentem.addClass('msgcorrect').removeClass('msgwrong');
	     return true;  
    }
});

$('#CustEmail').blur(function() {
	console.log('In');
//	var emailRegex = '^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'; 
//	var test = $('#id').attr('value').match('emailRegex');
//	if (test) {console.log('true');} else{console.log('false');}
});

$('#CustPassword').blur(function() {
    console.log('In');
});

$('#repeat').blur(function() {
     var current    =    $(this);
     var currentem  =    current.next('em');
     if ($('#CustPassword').val() !== current.val()) { 
          currentem.addClass('msgwrong').removeClass('msgcorrect');
          return false;
     } else{
          currentem.addClass('msgcorrect').removeClass('msgwrong');
          return true;  
     };
});

});