$( document ).ready(function()
{
    $(".button-collapse").sideNav();
    $(".dropdown-button").dropdown();
    $(".slider").slider({full_width:true});
    $("select").material_select('destroy');
    $('select').material_select();
    $('.modal').modal();
    $('#textarea1').val('New Text');
    $('#textarea1').trigger('autoresize');
    Materialize.updateTextFields();
    M.AutoInit();
});

// $('.datepicker').pickadate({
//     selectMonths: true, // Creates a dropdown to control month
//     selectYears: 15, // Creates a dropdown of 15 years to control year,
//     today: 'Today',
//     clear: 'Clear',
//     close: 'Ok',
//     closeOnSelect: false, // Close upon selecting a date,
//     //	container: undefined, // ex. 'body' will append picker to body
// });

// function sliderPrev(){
//     $('.slider').slider('pause');
//     $('.slider').slider('prev');
// }
//
// function sliderNext(){
//     $('.slider').slider('pause');
//     $('.slider').slider('next');
// }

// $ ().direcaoImagem ({
//     return rand(0, 2),
// });
