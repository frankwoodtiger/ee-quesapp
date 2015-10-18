$(function() {
	var selectedChoice = "";
	var ques_id = $("#ques-id-container").data("quesId");
	console.log("$ques_id: " + ques_id);
	$("ol.answer-list li").on("click", buttonHandler);	
	
	$(document).on("click", ".button-submit",function() { 
		// alert(selectedChoice);
		$.ajax({
			url: 'ajaxCheckAns.php', // this is the PHP module that deals with checking answer by question id.
			type: 'post',
			data: {"ques_id": ques_id, "ans": selectedChoice},
			success: function(data, status) {
				console.log("$ques_id:" + ques_id + ", " + data);
				data = JSON.parse(data); // parse JSON string into JSON object
				if(data["correctness"] == "correct") {
					$(".question-wrapper").append("<br><p id=\"msg\">Correct!</p>");	
				}
				else if (data["correctness"] == "incorrect") {
					$(".question-wrapper").append("<br><p id=\"msg\">Incorrect! Correct answer is " + data["ans"] + ".</p>");	
				}
				
				$(".question-wrapper").fadeOut(3000, function() {
					 window.location.reload();
				});
			},
			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		});
	});
	
	// need to use $(document), otherwise wont work for dynamically created elements
	$(document).on("click", ".button-cancel", function() { 
		$(".button-submit, .button-cancel, #msg").fadeOut(500, function() {
			$("#buttons-msg-block").remove();
		});
		$("ol.answer-list li").css("background", "#fff");			
		$("ol.answer-list li").on("click", buttonHandler);
	});
	
	$(document).on("click", "#search-button", function() { 
		alert("search clicked");
	});
	
	function buttonHandler(e){
		$(e.target).css("background", "#BFDFFF"); // Highlight this choice
		selectedChoice = e.target.id; // This saved the choice (the id name) user made
		
		$("ol.answer-list li").off("click"); // Disable click for all choices			
		var submitbutton = "<a class=\"button-submit\" type=\"button\">Submit</a>"
		var cancelbutton = "<a class=\"button-cancel\" type=\"button\">Cancel</a>"
		// need div block to wrap around all things in order to remove them all, otherwise <br> and &nbsp will still be there
		$(".question-wrapper").append("<div id=\"buttons-msg-block\"><br>" + submitbutton + "&nbsp" + cancelbutton + "</div>");		
	}
});