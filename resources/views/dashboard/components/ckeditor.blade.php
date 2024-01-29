<script>
    var allEditors = document.querySelectorAll('.editor');
    for (var i = 0; i < allEditors.length; ++i) {
        CKEDITOR.replace(allEditors[i], {
            height: 400,
            baseFloatZIndex: 10005,
            removeButtons: 'PasteFromWord'
        });
    } 
</script>