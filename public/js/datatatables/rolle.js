$(document).ready(function() {
    $('#datatable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "http://localhost/BackEnd/oldshop/public/Role/indexjson"
    } );
} );