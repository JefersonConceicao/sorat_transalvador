$(() => {
    init();
});

const init = () => {

    $(".associarMenuUser").on('ifChanged', function(e){
        e.preventDefault();
        let url = route('user.toggleAssociacaoMenuUsuario', $(this).attr("id_user"));
        
        if(this.checked){
            requestToggleAssociarMenuUsuario(url, {
                idMenu: $(this).attr("id"),
                associar: 1
            })
        }else{
            requestToggleAssociarMenuUsuario(url, {
                idMenu: $(this).attr("id"),
                associar: 0
            })
        }
    }); 
}

const requestToggleAssociarMenuUsuario = (url, formData) => {
    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        dataType: "JSON",
        success: function (response) {
            console.log(response);
        }
    });
}