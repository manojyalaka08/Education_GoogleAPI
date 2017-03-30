$(document).ready(function(){
var interval = setInterval(function(){
	$.ajax({
		url:'chat.php',
		success: function(data) {
		$('#messages').html(data);
		 $('#messages').scrollTop($('#messages')[0].scrollHeight);
		}
	});
},1000);
});
