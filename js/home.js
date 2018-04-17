
$(document).ready(function (){
	
	$('#log_box').load('login_form.php');
	
	
	$('ul#log_reg li a').click(function (){
		
		var page = $(this).attr('href');
		
		$('#log_box').load( page + '.php');
		
		
		return false;
	});
	
	
});
