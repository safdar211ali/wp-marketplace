/**
 * Created by ali on 6/16/16.
 */
jQuery(document).ready(function () {
    $('.wu-autocomplete').attr('placeholder', 'Enter City Name');

    $('.wu-wrapper ').html(function (i, t) {
        return t.replace('The location could not be found.', '');
    });

    $('#table1').DataTable({
        "iDisplayLength": 15,
        "aLengthMenu": [[10, 15, 25, 35, 50, 100, -1], [10, 15, 25, 35, 50, 100, "All"]]
    });

    $('.machinery, #machinery').DataTable({
        "iDisplayLength": 15,
        "aLengthMenu": [[10, 15, 25, 35, 50, 100, -1], [10, 15, 25, 35, 50, 100, "All"]]
    });



// datatable placeholder
    $('div.dataTables_filter input').attr('placeholder', 'Search Any thing');


    $('#addland').click(function () {
        $('#frontuserdata')[0].reset();
        $("#hidden_id").remove();
    });

    $("#optlist").chosen();
    $("#optlist2").chosen();

});



