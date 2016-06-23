/**
 * Created by ali on 6/16/16.
 */
jQuery(document).ready(function(){
    $('.wu-autocomplete').attr('placeholder', 'Enter City Name');

    $('.wu-wrapper ').html(function (i, t) {
        return t.replace('The location could not be found.', '');
    });
    $('#table1').DataTable();
    $('#table2').DataTable();
// datatable placeholder
    $('div.dataTables_filter input').attr('placeholder', 'Search Any of the product,city,minimum rate,maximum rate تلاش کریں۔');

});

$("#optlist").chosen();
$("#optlist2").chosen();