// declaration
 var url_add_file='../consume_php/addfile.php';
 var url_delete_file='../consume_php/delfile.php?id=';
 var url_redirect_to_show='showprod.php?id=';
 var method_post='POST';
 var method_get='GET';
 var alert_error='you have an error';
 var data_type_json='json';
 var class_hidden='hidden';
 var path_to_del_icon ='../img/del.png';
 var path_to_file_icon='../img/no_pic.jpg';
 var path_to_file='../upload/'
 // method to add file to product 
 $("#add_files").on('click', (function (e) {
	 // get the form
	var formData = new FormData($('#uploadForm')[0]);
	
    $.ajax({
        url: url_add_file,
        type: method_post,
		dataType: data_type_json,
        data: formData,
        async: false,
        success: function (data) {
					if (data.state==false)
					{	// if there is no insertion of file
						alert(alert_error);
					}
					else {
							// put file in the div
						$('#files').append('<div id="el_'+data.id+'" class="pic_styles"> '+
						'<img src="'+path_to_file_icon+'" ></img>'+
						'<div class="content_file">'+
						'<a href="'+path_to_file+data.uri+'">link</a>'+
						'<img src="'+path_to_del_icon+'" onclick="del_el('+data.id+')" />'+
						'</div></div>');
						 // return the number of file in database
						$('#nb_files').val(data.nb_files);
						//if there is two files 
						if (data.nb_files==2)
						{
							$('#add_files').addClass(class_hidden);
							$('#show_details').removeClass(class_hidden);
						}
					}
        },
        cache: false,
        contentType: false,
        processData: false
    });
            }));
			
			
			// method to redirect to show details
function redirect_to_product(id){
			// test
			if ($('#nb_files').val()==2)
			{	
				window.location=url_redirect_to_show+id;
			}
}


// function to delete file
function del_el(id)
{		
	  $.ajax({
        url:url_delete_file+id,
        type: method_get,
		dataType: data_type_json,
        async: false,
        success: function (data) {
			
					if (data.state==false)
					{
						alert(alert_error);
					}
					else {
						// delete file in div
						$('#el_'+id).remove();	
						var nb_data=$('#nb_files').val();
						// if there is two files so you should change button
						if (nb_data==2)
						{
							$('#show_details').addClass(class_hidden);
							$('#add_files').removeClass(class_hidden);
						}
						// decrement nb_of_files
						nb_data--;						
						$('#nb_files').val(nb_data);						
					}
        },
        cache: false,
        contentType: false,
        processData: false
    });

}			
 
			
