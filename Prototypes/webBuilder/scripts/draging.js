$(function () {
    $('#dump ').droppable({
        accept: '.item',
        drop: function (e, ui) {
            $(ui.draggable).remove();

        }

    });

    $(".drag").draggable({
        helper: "clone"
        // drag: function(){
        //     var offset = $(this).offset();
        //     var xPos = offset.left;
        //     var yPos = offset.top;
        // }
    });
    $('#page ').droppable({
        accept: '.drag',
        drop: function (e, ui) {
            $(ui.draggable).clone().appendTo($(this));

            $("#twoCollumns .drag").addClass("pos");
            $("#twoCollumns .drag").addClass("item");
            $(".item").removeClass("ui-draggable drag");

            $(".item").draggable({
                containment: "#twoCollumns",
                snap: "#page"

            });
        }
    })

});