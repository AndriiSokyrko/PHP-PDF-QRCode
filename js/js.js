/**
 * Created by user on 02.02.2019.
 */
$(document).ready(function(){
    $("#block_simple").css({'display': 'block'});
    $("#block_notsimple").css({'display': 'none'});

    if (window.location.href=='http://demopdf/#block_notsimple'
        || window.location.href=='http://demopdf/index.php#block_notsimple') {
        $("#block_simple").css({'display': 'hide'});
        $("#block_notsimple").css({'display': 'block'});
    };
    // $("[name *= 'main_Index']").on('change', function () {
    //     alert();
    //     var red="block_notsimple"
    //     window.location.href(" http://DemoPDF/index.php/#"+red);
    // })
    
   if ($("#gener").val()=='true'){
       $("#block_simple").css({'display': 'none'});
    };


    $("#simple").on('click', function (e) {
        $("#notsimple").parent().addClass('active');
        $("#simple").parent().removeClass('active');
        // $("#block_simple").addClass('class_show');
        $("#block_simple").css({'display': 'block'})
        // $("#block_notsimple").removeClass('class_show');
        // $("#block_notsimple").addClass('class_hide');
        $("#block_notsimple").css({'display': 'none'});

    });
    $("#notsimple").on('click', function (e) {

        $("#simple").parent().addClass('active');
        $("#notsimple").parent().removeClass('active');
        // $("#block_notsimple").addClass('class_show');
        $("#block_notsimple").css({'display': 'block'})
        // $("#block_simple").removeClass('class_show');
        // $("#block_simple").addClass('class_hide');
        $("#block_simple").css({'display': 'none'});

    });
    
});