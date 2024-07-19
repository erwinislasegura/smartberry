//[Data Table Javascript]

//Project:	Crypto Tokenizer UI Interface & Cryptocurrency Admin Template
//Primary use:   Used only for the Data Table

$(function () {
    "use strict";
    $('#modulo').DataTable({

        "scrollY": 450,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'responsive': false,
        'order': [
            [0, 'desc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        },
        "dom": 'Bfrtip',
        "buttons": ["excel"],
    });

    $('#resumen').DataTable({

        "scrollY": true,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': false,
        'autoWidth': true,
        'responsive': false,
        "pagingType": "full_numbers",
        'order': [
            [0, 'asc'], //desc ->descente asc -> ascedente
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        },
        "dom": 'Bfrtip',
        "buttons": ["excel"],
    });
    
    $('#stockmp').DataTable({

        "scrollY": true,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': false,
        'autoWidth': true,
        'responsive': false,
        "pagingType": "full_numbers",
        'order': [
            [0, 'asc'], //desc ->descente asc -> ascedente
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        },
        "dom": 'Bfrtip',
        "buttons": ["excel"],
    });




    $('#existencia').DataTable({
        "fixedHeader": true,
        "scrollY": 450,
        "scrollX": true,
        'paging': false,
        'lengthChange': true, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        "orderCellsTop": true,
        'info': true,
        'autoWidth': false,
        'responsive': false,        
        'order': [
            [0, 'desc'],
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        },
        "dom": 'Bfrtip',
        "buttons": ["excel"],
    });


        /* initComplete: function(){
             this.api().columns().every( function (d) {
                 var column = this;
                 var theadname = $('#hexistencia  th').eq([d]).text();
                 var select = $('<select class="form-control select2 "><option value="">'+theadname+'</option></select>').appendTo( $(column.footer())).on( 'change', function () {
                         var val = $.fn.dataTable.util.escapeRegex($(this).val());
                         column.search( val ? '^'+val+'$' : '', true, false ).draw();
                     } );

                     $(select).click(function(e){
                         e.stopPropagation();
                     });

                 column.data().unique().sort().each( function ( d, j ) {
                     var val = $.fn.dataTable.util.escapeRegex(d);
                     if (column.search() === "^" + val + "$") {
                         select.append('<option value="' + d + '" selected="selected">' + d.substr(0,30) + "</option>");
                     } else {
                         select.append('<option value="' + d + '">' + d + "</option>");
                     }
                 });
             });
         },
         */




    // $('#existencia thead tr').clone(true).appendTo('#existencia thead');
    $('#hexistencia tfoot #filtro th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" title="' + title + '" placeholder=" ' + title + '" />');
    });


    var table = $('#hexistencia').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every(function () {
                var that = this;

                $('input', this.footer()).on('keyup change clear', function () {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
        },
        "fixedHeader": true,
        "scrollY": 450,
        "scrollX": true,
        'paging': false,
        'lengthChange': true, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        "orderCellsTop": true,
        'info': true,
        'autoWidth': false,
        'responsive': false,        
        'order': [
            [0, 'desc'],
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        },
        "dom": 'Bfrtip',
        "buttons": ["excel"],
    }).buttons().container().appendTo('#existencia_wrapper .col-md-6:eq(0)');

;


    //LISTAR GENERAL REGISTROS
    $('#listar').DataTable({
        "scrollY": 450,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'responsive': false,
        'order': [
            [0, 'asc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });

    //LISTAR ACTIVIDAD USUARIO
    $('#listarActividad').DataTable({
        "scrollY": 440,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'responsive': false,
        'order': [
            [0, 'desc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });

    //LISTA DE SELECION DE EXISTENCIA PARA LOS MODULOS
    $('#selecionExistencia').DataTable({
        "scrollY": 400,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'responsive': false,
        'order': [
            [0, 'desc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });


    //DETALLE De REGISTROS
    //DETALLE SELECION REPALETIZAJE 
    $('#ingreso').DataTable({
        "scrollY": 400,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'responsive': false,
        'order': [
            [0, 'desc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });

    $('#salida').DataTable({
        "scrollY": 400,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'responsive': false,
        'order': [
            [0, 'desc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });

    //DETALLE De REGISTROS RECEPCION
    $('#detalle').DataTable({

        "scrollY": 300,
        "scrollX": true,
        'paging': false,
        'lengthChange': false, //ordernar por 10 25 100 500
        'searching': false, //buscador
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'responsive': false,
        'order': [
            [0, 'asc'], //desc ->descente asc -> ascedente
        ],
        "pagingType": "full_numbers",
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros Por Paginas",
            "zeroRecords": "No Se Han Encotrado Datos Registrados.",
            "info": "Mostrando  _START_-_END_ de _TOTAL_ Registros",
            //"info": "Mostrando Paginas _PAGE_ De _PAGES_  <br> _START_-_END_ de _TOTAL_ Registros",
            "infoEmpty": "Registros No Disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "first": "<i class='ti-angle-double-left'> </i>",
                "last": "<i class='ti-angle-double-right'> </i>",
                "next": "<i class='ti-angle-right'> </i>",
                "previous": "<i class='ti-angle-left'> </i>",
            },
        }
    });






}); // End of use strict