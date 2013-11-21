$(document).ready(function() {

	$('#address').keyup(function(e) {
		var search = $('#address').val();
		$.post('/addrsearch', {search:search, _token:$('input[name=_token]').val()}, function(data) {

			$('#address_result').html(data);

		});
		e.preventDefault();
		return false;
	});

	$(".overlay").click(function(){
		$(".overlay").css('display','none');
		$("#results").css('display','none');
	});

	$("#keywords").focus(function(){
		$(".overlay").css('display','block');
		$("#results").css('display','block');
	});

});