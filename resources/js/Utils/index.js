$(() => {
    init();
})

const init = () => {
    initSelect2();
    loadModal();
}   

const initSelect2 = () => {
    $('.select2').select2({
        theme: 'classic',
        width: '100%',
    });
}


const loadModal = () => {

}
