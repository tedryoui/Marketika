document.addEventListener("DOMContentLoaded", function(){
    var _FORM = document.querySelector("#form");
    var _name = document.querySelector("#name");
    var _email = document.querySelector("#email");

	_FORM.addEventListener("submit", (e) => {
		e.preventDefault();

		if(isNotEmpty(email)) {
			$.ajax({
				url: '../php/sendMail.php',
				type: 'POST',
				dataType: 'json',
				data: {
					name: $(_name).val(),
					email: $(_email).val(),
				}, 
				success: function(response) {
					_FORM.reset();
				}
			});
		}
	});

	function isNotEmpty(input) {
		if($(input).val()=="") {
			return false;
		}
		else 
			return true;
	}
});