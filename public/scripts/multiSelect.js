let select = new TomSelect("#select-tags", {
    sortField: 'text',
    plugins: ['remove_button'],
    create: true,
    onItemAdd: function () {
        this.setTextboxValue('');
        this.refreshOptions();
    },
    render: {
        option: function (data, escape) {
            return '<div class="d-flex ml-2 text-sm"><span>' + escape(data.value) + '</span></div>';
        },
        item: function (data, escape) {
            return '<div class="item border rounded-md bg-white border-neutral-800">' + escape(data.value) + '</div>';
        }
    },
});

document.querySelector("#category").value = select.getValue().toString();
document.querySelector("#select-tags").addEventListener('change', () => {
    document.querySelector("#category").value = select.getValue().toString();
});