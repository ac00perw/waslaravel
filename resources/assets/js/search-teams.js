$(function(){

function doSearch()
{
		var $term = $('#searchbox').val();
		var $team_type = $('#team_type').val();
		var $challenge_id = parseInt($('#challenge_id').val() );

		if ($term.length > 2 || $team_type !='any'){
			
			var url='/challenges/search/' +'?team_type='+$team_type+'&term='+$term+'&challenge_id='+$challenge_id;

			$.getJSON(url, function(data){
				$('.results').html(' ');
				$('.results').append("<h3>Found "+data.length+" teams.</h3>");
				for(var i=0;i<data.length;i++){
					
					var d=data[i];
					$('.results').append(
						'<div class="col-md-3">' + 
							"<img src=\""+d.avatar_path + "\"/>" +
							"<div class='team-name'>"+d.team_name+ "</div>" +
							"<div class='team-type'>"+d.team_type+ "</div>" +
							"<div class='team-location'>"+d.city +", "+ d.state+ "</div>"+
							'<div><a href="/challenges/prepareChallenge/'+ d.id +'?challenge='+ $challenge_id +'">Challenge</a></div>'+
						"</div>");
				}
			
			})
		}

}
	$('#team_type').change( doSearch );
	$('#searchbox').keyup( doSearch );

});