function modificarSelect(padre, hijo){    
                var list_select_id = padre;//'provincia'; //second select list ID, select padre
                var list_target_id = hijo;//'distrito'; //first select list ID, select hijo
                var initial_target_html = '<option value="">-----</option>'; //Initial prompt for target select
                
                $('#'+list_target_id).html(initial_target_html); //Give the target select the prompt option
                
                $('#'+list_select_id).change(function(e) {
                    //Grab the chosen value on first select list change
                    var selectvalue = $(this).val();

                    //Display 'loading' status in the target select list
                    $('#'+list_target_id).html('<option value="">Loading...</option>');

                    if (selectvalue == "") {
                        //Display initial prompt in target select if blank value selected
                       $('#'+list_target_id).html(initial_target_html);
                    } 
                    else {
                          //Make AJAX request, using the selected value as the GET
                        $.ajax({
                                //url: 'ajaxDistrito.php?svalue='+selectvalue,
                            type:"post",
                            url:"ajaxCall/ajaxSelect.php",
                            data:"svalue="+selectvalue,
                            data:"target="+list_target_id,
                            success: function(output) {$('#'+list_target_id).html(output);},
                            error: function (xhr, ajaxOptions, thrownError) {alert(xhr.status + " "+ thrownError);}
                        });
                    }
                });
             }