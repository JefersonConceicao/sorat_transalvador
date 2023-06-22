import { feedbackSwal } from "../../Utils";

$(() => {
    init();
})

const init = () => {
    $(".associarMenuGrupo").on('ifChanged', function(e){
        e.preventDefault();
        let url = route("grupos.toggleAssociarMenuGrupo", $(this).attr("id_grupo"));
        
        if(this.checked){
            requestToggleAssociarMenuGrupo(url, {
                idMenu: $(this).attr("id"),
                associar: 1
            })
        }else{
            requestToggleAssociarMenuGrupo(url, {
                idMenu: $(this).attr("id"),
                associar: 0
            })
        }
    }); 
}

const requestToggleAssociarMenuGrupo = (url, formData) => {
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        dataType: "JSON",
        success: function (response) {
        },
        error:function(){  
            feedbackSwal('error', 'Ocorreu um erro interno, tente novamente mais tarde');
        }
    });
}