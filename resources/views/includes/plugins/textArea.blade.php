
@for($text = 1; $text < 20; $text++)
    <script>
        tinymce.init({
            selector: "textarea#text{{$text}}",
            height: 300,
            plugins: 'autolink charmap link lists',
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | lists bullist numlist outdent indent | link image",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Span Text', inline: 'span'},
                {title: 'header 1', block: 'h1'},
                {title: 'header 2', block: 'h2'},
                {title: 'header 3', block: 'h3'},
                {title: 'header 4', block: 'h4'},
                {title: 'header 5', block: 'h5'},
                {title: 'header 6', block: 'h6'},
                {title: 'Paragraphs', inline: 'p'},
            ]
        });
    </script>

@endfor

