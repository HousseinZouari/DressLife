
 var error_class='errs';
function send_data()
{
	
			// at first value is true if there is any problem it returns false
			var is_valid=true;

			 // do the test for every input in the form (bust,waist,length_top_bottom,arm)
			
			if (test_element('bust_girth_id')==false)
			{is_valid=false;}
			 if (test_element('waist_id')==false)
					{is_valid=false;}
			 if (test_element('len_top_bot_id')==false)
					{is_valid=false;}
			 if (test_element('arm_cir_id')==false)
					{is_valid=false;}
			
		
	//submit the form if it is valid 		  
	return is_valid;
}

// test value if is null or not float
function test_element(id)
{   // conversion of , to .
	// because jquery return false if for example 12,5 but return true on 12.5
	var res = ($('#'+id).val().replace(",", "."));
	$('#'+id).val(res);
	
	if(!$.isNumeric(res)||($('#'+id).val()== ''))
	{
		$('#'+id).addClass(error_class);
		
		return false;
	}
	$('#'+id).removeClass(error_class);
	return true;
	
}



// onchange value to indicate if there is error
$('#bust_girth_id').on('change',function(){
	test_element('bust_girth_id');	
});

$('#waist_id').on('change',function(){
	test_element('waist_id');	
});

$('#arm_cir_id').on('change',function(){
	test_element('arm_cir_id');	
});

$('#len_top_bot_id').on('change',function(){
	test_element('len_top_bot_id');	
});


