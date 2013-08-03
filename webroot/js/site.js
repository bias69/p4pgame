$(document).ready(function() {

	var fightData = {};

	var placeBet = function() {
		$.post('/place_bet',$('#bet-form').serialize(), function(data) {
			$('#place-bet-error').remove();
			var data = $.parseJSON(data);
			if(data.login) {
				$('<div id="place-bet-error" class="red">You have to sign in first!</div>').insertAfter('input[name=bet_ammount]');
			}
			else if(data.ammount) {
				$('<div id="place-bet-error" class="red">You don\'t have enough credits!</div>').insertAfter('input[name=bet_ammount]');
			}
			else if(data.success) {
				$('input[name=bet_ammount]').val('');
				$('#placeBet').modal('hide');
				var cloned = $('#place-bet-alert').clone();
				$('h2.text-center').before(cloned.append('You have successfully placed a bet!').show());
			}
			else {
				//console.log(data);
			}
		});
	};


	var fillFormData = function() {
		$('#event-info').remove();
		$('.modal-body').prepend(
			'<div id="event-info">' +
			'<p>Event:</p>' +
			'<p>' + fightData.event_name + '</p>' +
			'<p>You bet on:</p>' +
			'<p>' + fightData.bet_name + '</p>' +
			'</div>'
			);
		$('input[name=bet_id]').attr('value', fightData.bet_id);
	};

	$('#placeBet').on('hide', function() {
		$('input[name=bet_ammount]').val('');
		$('#place-bet-error').remove();
	});

	$('#place-bet').bind('click', placeBet);

	$('.bet-btn').bind('click', function() {
		var betBtn = $(this);
		fightData.event_name = betBtn.attr('event');
		fightData.bet_name = betBtn.attr('bet-name');
		fightData.bet_id = betBtn.attr('bet-id');
		fillFormData();
	});

	$('#place-bet-alert').hide();

});