	//Function Password Change
    function checkPasswordMatch() {
        var password = $("#pass").val();
        var confirmPassword = $("#re_pass").val();
        if (password != confirmPassword){
            $("#CheckPasswordMatch").html("Passwords does not match!");
			$("#signup").attr("disabled", true);
		}else{
			$("#signup").attr("disabled", false);
			$("#CheckPasswordMatch").hide();
			
		}
        
    }
    $(document).ready(function () {
        $("#re_pass").blur(checkPasswordMatch);
		//Name Validation
	    $("#name").on("blur", function() {
			if (/\w+\s+\w+/.test($("#name").val())) {
				$("#error_name").hide();
			} else {
				$("#error_name").html("At least two string needed !");
			}
		});
		//Mobile validation
		$("#phone").on("blur", function() {
		   if(!$('#phone').val().match('[0-9]{10}'))  {
                $("#error_phone").html("Please put a Mobile Number !");
            }  
			else{
				$("#error_phone").hide();
			}
		});
		//Show password
		$('#show_password').click(function() {
			if ($('#re_pass').attr('type') == 'text') {
				$('#re_pass').attr('type', 'password');
			} else {
				$('#re_pass').attr('type', 'text');
			}
			if ($('#pass').attr('type') == 'text') {
				$('#pass').attr('type', 'password');
			} else {
				$('#pass').attr('type', 'text');
			}
		});
    });