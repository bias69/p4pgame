<!-- Modal -->
<div id="placeBet" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Place your bet</h3>
	</div>
	<div class="modal-body">
		<form id="bet-form">
			<label>Bet ammount</label>
			<input name="bet_ammount" type="number" placeholder="">
			<input name="bet_id" type="hidden" value="">
		</form>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary" id="place-bet">Place Bet</button>
	</div>
</div>
