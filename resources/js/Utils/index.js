import Swal from 'sweetalert2'

$(() => {
    init();
})

const init = () => {
    initSelect2();
    setupAjax();
    loadModal();
}   


const setupAjax = () => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

const initSelect2 = () => {
    $('.select2').select2({
        theme: 'classic',
        width: '100%',
    });
}

const loadModal = () => {

}

export const feedbackSwal = (type, message) => {
    return Swal.fire({
        icon: type == "success" ? "success" : "error",
        title: type == "success" ? 'Sucesso!' : 'Ops... algo deu errado.',
        text: message,
        confirmButtonText: 'Ok, fechar',
    });
}


