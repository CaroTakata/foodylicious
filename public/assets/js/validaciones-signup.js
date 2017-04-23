$(document).on('submit','#sign-up-form',function(event){
			var error = 0;
			
		   
			if ($('#signupusername').val().trim() === '') {
				error++;
			}
		   
		   
			if ($('#signupemail').val().trim() === '') {
				error++;
			}
		   
			if ($('#signuppassword').val().trim() === '') {
				error++;
			}
		   
    
            if ($('#signuppassword').val().length < 6) {
			     error = 100;
                $(".title-big-signup").notify("Oops! Tu contraseña debe de tener mínimo 6 dígitos", "error");
		    }
    
            if ($('#signuppassword').val().trim() === '') {
				error++;
			}
    
            if ($('#signup-label-birthdate').val().trim() === '') {
				error++;
			}
                
    
            if ( $("#signupgenero").val() == null) {
                    error++; 
            }
    
            if($("#signupavatar").val() == ''){
                error++;
            }
    
    
			   if(error == 100){
				event.preventDefault();                 
				} 
    
			if(error > 0 && error != 100){
				event.preventDefault();
                 $(".title-big-signup").notify("Oops! Debes de llenar todos los datos", "error");
				}
        
			
            
	});