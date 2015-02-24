$(document).ready(function(){
	$('#msgSuccessAddTask').fadeOut();
	$('#msgErrorAddTask').fadeOut();
	$('#formAddTask').on('submit', function(){
		$.post(
			$(this).prop('action'),
			{
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "content": $( '#content' ).val()
            },
            function(data) {
            	//return console.log(data['status']);
                if(data['status']) return $('#msgSuccessAddTask').fadeIn();
                else return $('#msgErrorAddTask').fadeIn();
            },
            'json'
			);
		return false;
	});
});