/**
 * Created by ali on 6/16/16.
 */
jQuery(document).ready(function(){
    $('.wu-autocomplete').attr('placeholder', 'Enter City Name');

    $('.wu-wrapper ').html(function (i, t) {
        return t.replace('The location could not be found.', '');
    });
    $('#table1').DataTable();
    $('.machinery, #machinery').DataTable();

// datatable placeholder
    $('div.dataTables_filter input').attr('placeholder', 'Search Any thing');


$('#addland').click(function () {
        $('#frontuserdata')[0].reset();
    $("#hidden_id").remove();
    });



});

$("#optlist").chosen();
$("#optlist2").chosen();


