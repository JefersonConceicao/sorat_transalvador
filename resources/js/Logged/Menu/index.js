$(() => {
    init();
})

const init = () => {
    $("#checkboxModulo").on("ifChanged", function(e){     
        if(this.checked){
        
            $("#column_input_controller").fadeOut();
            $("#column_input_action").fadeOut();
            $("#column_url_externa").fadeIn();

            $("#column_input_controller").find('select').attr("disabled", true);
            $("#column_input_action").find('input').attr("disabled", true);
        }else{
            $("#column_input_controller").fadeIn();
            $("#column_input_action").fadeIn();
            $("#column_url_externa").fadeOut();

            $("#column_input_controller").find('select').removeAttr("disabled");
            $("#column_input_action").find('input').removeAttr("disabled");
        }
    });

    $("#checkboxModulo").iCheck('update');
}