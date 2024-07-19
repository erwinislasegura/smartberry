$(".tab-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "200",
    titleTemplate: '<span class="step">#index#</span> #title#',
    loadingTemplate: '<span class="step"></span> #text#',
    enableAllSteps: false, //HABILTAR TITULOS
    enableKeyNavigation: false, //FLECHA NAVEGACION
    enablePagination: true  ,    // PAGINACION
    enableFinishButton: false , //  EL BOTON FINISH
    enableCancelButton: false , //  EL BOTON CANCEL
    forceMoveForward: false ,  // PREVIENE SALTO DE ESTAPA
    labels: {
        cancel: "Cancelar",
        current: "Paso Actual:",
        pagination: "Paginas",
        finish: "Ultimo",
        next: "Siguiente",
        previous: "Anterior",
        loading: "Cargando ..."
    }
  
});

