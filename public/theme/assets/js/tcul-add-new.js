function newForm(entity, entity_field_name){
    $('#new-form-modal').modal('show');
    $('#entity').val(entity);
    $('#entity_field_name').val(entity_field_name);
    $.ajax({
        url: "/admin/"+entity+"/ajax/create",
        type: 'GET',
        success: function(response){
            $('#new-form-modal-body').html(response);
            $('#'+entity+'_cancel').hide();
            $('.'+entity+'-add-new').hide();
            // alert(entity);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(xhr.responseJSON.message,'');
            $.each(xhr.responseJSON.errors, function(key,value) {
                $('#'+key+'-error').html(value);
            });
            $('html, body').animate({
                scrollTop: $('#'+Object.keys(xhr.responseJSON.errors)[0]+'-error').offset().top - 200
            }, 500);
        }
    });
}

$(document).on('hidden.bs.modal', '#new-form-modal', function (event) {
    entity = $('#entity').val();
    entity_field_name = $('#entity_field_name').val();
    entity_field_value = $('#entity_field_value').val();
    entity_field_label = $('#entity_field_label').val();
    if(entity_field_name != "" && entity_field_value != ""){
        $('select[name="'+entity_field_name+'"]').append('<option value="'+entity_field_value+'" selected>'+entity_field_label+'</option>').trigger('change');
        $('#entity_field_name').val('');
        $('#entity_field_value').val('');
        $('#entity_field_label').val('');
    }
});

