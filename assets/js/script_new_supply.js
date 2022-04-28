(function($){
    $("#form_new_supply").submit(function(ev){
        ev.preventDefault();
        $.ajax({
            url:'Controller_nutritional_table/RegisterNewSupply',
            type:'POST',
            data:$(this).serialize(),
            succes: function(){

            },
            error:function(){

            },
        });
    });
})(jQuery)