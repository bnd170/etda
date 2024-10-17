document.addEventListener('orchid:quill', (event) => {
    event.detail.options.formats = [
        'bold', 'italic', 'underline', 'strike', 'blockquote', 'code-block',
        'list', 'bullet', 'indent', 'link', 'image', 'video',
        'align', 'header', 'size', 'clean', 'table', 'direction', 'script',
    ]
});
