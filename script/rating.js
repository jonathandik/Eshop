$(document).ready(function() {
		
	$.each( $('.rating'), function(){ //retrieves vote when page is loading.
				
		var oneTimeId = $(this).attr("id"); //handle the rating class to retrieve the data related to this variable.
				
		post_data = {'oneTimeId':oneTimeId, 'vote':'checkVote'}; //The string is sent to the server.
				
		$.post('rating.php', post_data,  function(response) { //The required URL paramater specifies the requested URL.
				//call back function handle id in footer.php.		
				$('#'+oneTimeId+' .likeVotes').text(response.LIKEVOTE);  
				$('#'+oneTimeId+' .dislikeVotes').text(response.DISLIKEVOTE);
			},'json');
	});	
	
	/*by clicking on each button user vote will 
	   be retrieved and sent to rating.php via jQuery $.post() method.*/
	$(".rating .btnRating").click(function (e) {
	 			
		var btnClicked = $(this).children().attr('class'); //class name btnDislike or btnLike is retrieved.
			
		var oneTimeId 	= $(this).parent().attr("id"); //ID to be used only one is retrieved.
		
		if(btnClicked==='btnDislike') //determines that user dislikes the site.
		{			
			post_data = {'oneTimeId':oneTimeId, 'vote':'dislike'}; //The string is sent to the server.
						
			$.post('rating.php', post_data, function(data) { //The required URL paramater specifies the requested URL.
								
				$('#'+oneTimeId+' .dislikeVotes').text(data); //retrieve data from id element in footer.php.
										
				var msg=document.getElementById("getVote").innerHTML="Thank you for voting dear user."; //display a message by handling html<p id>.
			}).fail(function(err) {  //handle errors.
						
			var msg=document.getElementById("getVote").innerHTML=err.statusText; //display a message about the HTTP server handling again html<p id>.
			});
		}
		else if(btnClicked==='btnLike') //determines that user likes the site.
		{			
			post_data = {'oneTimeId':oneTimeId, 'vote':'like'}; //The string is sent to the server.
						
			$.post('rating.php', post_data, function(data) { //The required URL paramater specifies the requested URL.
							
				$('#'+oneTimeId+' .likeVotes').text(data); //retrieve data from id element in footer.php.
				
				var msg=document.getElementById("getVote").innerHTML="Thank you for voting dear user."; //display a message by handling html<p id>.
			}).fail(function(err) { 
			
			var msg=document.getElementById("getVote").innerHTML=err.statusText; //display a message about the HTTP server handling again html<p id>.
			});
		}		
	});			
});