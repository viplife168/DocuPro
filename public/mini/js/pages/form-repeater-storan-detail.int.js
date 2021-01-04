$(document).ready(function(){
    "use strict";
    $(".repeater").repeater({
        defaultValues:{
            "textarea-input":"foo","text-input":"bar","select-input":"B","checkbox-input":["A","B"],"radio-input":"B"
        },
        show:function(){
            $(this).slideDown()
        },
        hide:function(e){confirm("Are you sure you want to delete this element?")&&$(this).slideUp(e)},
        ready:function(e){}
    }),
    window.outerRepeater=$(".outer-repeater").repeater({
        defaultValues:{
            "text-input":"outer-default"
        },
        show:function(){
            console.log("outer show"),
            $(this).slideDown()
        },
        hide:function(e){
            console.log("outer delete"),
            $(this).slideUp(e)
        },
        repeaters:[{
            selector:".inner-repeater",defaultValues:{
                "inner-text-input":"inner-default"
            },
            show:function(){
                console.log("inner show"),
                $(this).slideDown()
            },
            hide:function(e){
                console.log("inner delete"),$(this).slideUp(e)
            }
        }]
    })
});
$(".repeater").keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        document.getElementById("btn-tambah").click();
        element = document.addfile.repeaters["file_number"][index].focus();
        return false;
    }
});
function set_focus(name)
{
    var node= document.getElementsByName(name);
    node.focus();
}

