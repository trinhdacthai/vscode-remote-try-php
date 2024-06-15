function get_designation(department_id,route,designation_id=null,old_designation=null){
      var department =  $(department_id).val();
    $.ajax({
        'url': route+'/'+department,
        'type': 'GET',
        success: function(response){ // What to do if we succeed
            console.log(response['data']);
            $(designation_id).empty();
            if(response['data'].length ==0){
                $(designation_id).append('<option value="">Không có dữ liệu<option>');
                return ;
            }
            $.each(response['data'],function (index){
                var selected ='';
                if(old_designation == response['data'][index].id) {
                    selected = 'selected';
                }
                $(designation_id).append('<option '+selected+' value="'+response['data'][index].id+'">'+response['data'][index].name+'<option>');
            });
        },
        error: function(response){
            alert('Error'+response);
        }



    });

}
