	$(document).ready(function() {
		$('#sync').click(function(){
			$('#status').empty();
			$('#status').css('display', 'inline');
			$('#status').html('<img src="/images/sync.gif"><img>');
		  	var entity = $(this).attr('data-entity');
		  	$.post('http://api-local.indiansuperleague.com/panel/sync', {"entity": entity}, function(data) {
				$('#status').empty();
				$('#status').text(data.response).fadeIn(100).delay(5000).fadeOut(500);
			});
		});
	});