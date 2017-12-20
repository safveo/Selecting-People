$(document).ready(function () {

    //Script activation Desactivation
    $(".active-row").click(function () {
        var parent = $(this);
        var id = $(this).attr('id');
        var path = $(this).attr('data-path');
        var source = $(this).attr('data-basepath');
        var $row = $(this).closest('tr');
        var info = $(this).attr('message');

        $("#active.modal-block .modal-text").html("<p> Êtes-vous sûr de vouloir changer l'état " + info + "</p>");

        $.magnificPopup.open({
            items: {
                src: $("#active.modal-block"),
                type: 'inline'
            },
            preloader: false,
            modal: true,
            callbacks: {
                change: function () {

                },
                close: function () {
                    $("#activeConfirm").off('click');

                }
            }
        });
        $("#activeConfirm").on('click', function (e) {
            e.preventDefault();
            $("#active.modal-block .modal-text").html('<p style="text-align:center"><img src="' + source + '/bundles/front/images/ajax-loader.gif" /></p>');
            $.ajax({
                type: "POST",
                url: path,
                data: {id: id},
                beforeSend: function () {
                    $("#activeConfirm").hide();
                    $("#activeCancel").hide();
                },
                success: function (data) {
                    /** changer l'image (icon activer) */
                    $("#activeCancel").text('OK');
                    if (data == 'active') {
                        $("#active.modal-block .modal-text").html('<p style="text-align:center">Etat modifié </p>');
                        $("#activeCancel").show();
                        parent.html(' <button class="btn btn-success"><i class="fa fa-check"></i></button>')
                    }
                    else if (data == 'desactive') {
                        $("#active.modal-block .modal-text").html('<p style="text-align:center">Etat modifié  </p>');
                        $("#activeCancel").show();
                        parent.html('<button class="btn btn-icon waves-effect waves-light btn-danger m-b-5"><i class="fa fa-remove"></i></button>')
                    }
                    /** message d'erreur  */
                    else {
                        $(this).parent(".edit-row").html('<p style="text-align:center">' + data + '</p>');
                        $("#activeCancel").show();

                    }
                },
                complete: function () {
                    //$.magnificPopup.close();
                }
            });


        });
    });
    $("#activeCancel").on('click', function (e) {
        e.preventDefault();
        $("#activeCancel").text('Non');
        $("#activeConfirm").show();
        $("#active.modal-block .modal-text").html("<p> Êtes-vous sûr de vouloir changer l'état </p>");
        $.magnificPopup.close();
    });
    $("#active .close").on('click', function (e) {
        e.preventDefault();
        $("#activeConfirm").show();
        $("#active.modal-block .modal-text").html("<p> Êtes-vous sûr de vouloir changer l'état </p>");
        $.magnificPopup.close();
    });




    //Script Remove
    $(".remove-row").on('click', function (e) {
        e.preventDefault();
        var parent = $(this);
        var id = $(this).attr('id');
        var path = $(this).attr('data-path');
        var source = $(this).attr('data-basepath');
        var $row = $(this).closest('tr');
        var info = $(this).attr('message');
        var element = $(this).parents("#element" + id);
        var parent = $(this).parents(".list-unstyled");
        $("#delete.modal-block .modal-text").html('<p>Êtes-vous sûr de vouloir supprimer ' + info + '</p>');
        var targetElem = $(this).parents('.taskboard-box').find('.label-info');
        var targetElem2 = $(this).parents('.taskboard-box').find('.list-unstyled');
        var test = 0;
        $.magnificPopup.open({
            items: {
                src: $("#delete.modal-block"),

                type: 'inline'
            },
            preloader: false,
            modal: true,
            callbacks: {
                change: function () {

                },
                close: function () {
                    $('#deleteConfirm').off('click');

                }
            }
        });
        $("#deleteConfirm").on('click', function (e) {


            e.preventDefault();
            $("#delete.modal-block .modal-text").html('<p style="text-align:center"><img src="' + source + '/bundles/front/images/ajax-loader.gif" /></p>');
            $.ajax({
                type: "POST",
                url: path,
                data: {id: id},
                beforeSend: function () {
                    $("#deleteCancel").hide();
                    $("#deleteConfirm").hide();
                },
                success: function (data) {
                    /** changer l'image (icon activer) */
                    if (data == 'deleted') {

                        test =1;

                        if (element.attr('class') == 'member') {

                        }
                        else {

                        }

                         element.remove();
                        $("#delete.modal-block .modal-text").html('<p style="text-align:center">Suppression terminée </p>');
                        $("#deleteCancel").text('OK');
                        $("#deleteCancel").show();
                        $row.remove();

                    }
                    /** message d'erreur  */
                    else {
                        $("#delete.modal-block .modal-text").html('<p style="text-align:center">' + data + '</p>');
                        $("#deleteCancel").text('OK');
                        $("#deleteCancel").show();
                    }





                },
                complete: function () {

                    var numberPost = parseInt(targetElem.html());
                    console.log(targetElem2);
                    console.log(numberPost);
                    if (numberPost > 1 && test == 1) {

                        targetElem.html(numberPost - 1);
                    }else{
                        var html = '<li><div class="card-box kanban-box empty"><div><span class="empty">Aucun élément à afficher</span></div></div></li>';
                        targetElem2.append(html);
                        targetElem.html(numberPost - 1);
                    }



                }
            });


        });
    });
    $("#deleteCancel").on('click', function (e) {
        e.preventDefault();
        $(this).text('Non');
        $("#deleteConfirm").show();
        $("#delete.modal-block .modal-text").html('<p>Êtes-vous sûr de vouloir supprimer </p>');
        $.magnificPopup.close();
    });
    $("#delete .close").on('click', function (e) {
        e.preventDefault();
        $("#deleteConfirm").show();
        $("#delete.modal-block .modal-text").html('<p>Êtes-vous sûr de vouloir supprimer </p>');
        $.magnificPopup.close();
    });
    $("#add-match").click(function () {

        $.magnificPopup.open({
            items: {
                src: $("#add-match.modal-block"),
                type: 'inline'
            },
            preloader: false,
            modal: true,
            callbacks: {
                change: function () {

                },
                close: function () {
                }
            }
        });
    });
    $("#add-match .close").on('click', function (e) {
        e.preventDefault();
        $.magnificPopup.close();
    });

});
/** Tooltip **/
$(function () {
    $('[data-toggle="tooltip"]').tooltip();

});
