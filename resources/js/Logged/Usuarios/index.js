import { feedbackSwal } from "../../Utils";

$(() => {
    init();
});

const init = () => {
    $(".btnInativarUsuario").on("click", function (e) {
        e.preventDefault();
        
        let url = route("user.toggleStatus", $(this).attr("id"));

        Swal.fire({
            title: "Tem certeza?",
            text: "Não vai ser possível reverter esta ação",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: 'Cancelar',
            confirmButtonText: "Sim, inativar",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
               requestToggleStatusUsuarios(url, { inativar: true });
            }
        });
    });

    $(".btnAtivarUsuario").on("click", function (e) {
        e.preventDefault();
        
        let url = route("user.toggleStatus", $(this).attr("id"));
        requestToggleStatusUsuarios(url, { ativar: true });    
    });
};

const requestToggleStatusUsuarios = (url, formData) => {
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        dataType: "JSON",
        success: function (response) {
            feedbackSwal(
                response.ok ? "success" : "error", 
                response.ok ? 'Registro atualizado com sucesso!' : 'Não foi possível atualizar o registro'
            ).then(result => {
                if(result.isConfirmed){
                    location.reload();
                }
            });
        },
    })
};
