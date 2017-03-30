$(document).ready(function(){
var interval = setInterval(function(){
	$.ajax({
		url:'onlinemembers.php',
		success: function(html) {
		$('#receiver').html(html);
		 }
	});
},2000);
});
