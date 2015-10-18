$(document).on("click", ".button-clear-session", function() { 
	$.ajax({
		url: 'clearSession.php', // this is the PHP module that deals with checking answer by question id.
		type: 'post',
		success: function(data, status) {
			window.location.reload();
		},
		error: function(xhr, desc, err) {
			console.log(xhr);
			console.log("Details: " + desc + "\nError:" + err);
		}
	});
});