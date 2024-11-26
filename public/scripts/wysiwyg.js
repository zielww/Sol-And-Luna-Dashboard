const quill = new Quill('#editor', {
    modules: {
        toolbar: [
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic', 'underline', 'strike', 'link', 'blockquote', { 'align': [] }],
        ],
    },
    theme: 'snow',
});

const editor = document.querySelector("#editor");
const textarea = document.querySelector("#description");

quill.on("text-change", function() {
    textarea.value = quill.root.innerHTML;
});