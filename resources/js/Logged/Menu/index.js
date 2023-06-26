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

    $(".btnDeleteMenu").on("click", function(e){
        e.preventDefault();

        Swal.fire({
            title: "Tem certeza?",
            text: "Não vai ser possível reverter esta ação",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: 'Cancelar',
            confirmButtonText: "Sim, Excluir",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = route('menu.delete', $(this).attr("id"));        
            }
        });
    });

    $("#checkboxModulo").iCheck('update');
}

