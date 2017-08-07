'use strict';
$(function () {
    $('#table-actorsview').DataTable({
		  "columns": [ 
		    null,
		    null,
		    { "width": "50%" },
		    { "width": "10%" }
		  ]
		} );
    $('#table-categoriesview, #table-langsview').DataTable({
		  "columns": [ 
		    null,
		    null, 
		    { "width": "10%" }
		  ]
		} ); 
    $('#table-directorsview').DataTable({
		  "columns": [ 
		    null,
		    null, 
		    null, 
		    { "width": "20%" }
		  ]
		} );
    $('#table-prodagentview').DataTable({
		  "columns": [ 
		    null,
		    null, 
		    null,
		    null, 
		    { "width": "10%" }
		  ]
		} );
    $('#table-payplansview').DataTable({
        "columns": [
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            { "width": "10%" }
        ]
    } );
}); 