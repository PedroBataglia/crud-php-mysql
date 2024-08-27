<!-- Include stylesheet -->
<link href="">
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

<form method="post">
    <input
            name="titulo"
            type="text"
            value=""
            placeholder="insira o titulo...">
    <input
            name="descricao"
            type="text"
            value=""
            placeholder="insira a descrição...">
    <div id="editor">
     <p>Hello World!</p>
     <p>Some initial <strong>bold</strong> text</p>
      <p><br /></p>
    </div>
    <select name="tipo">
        <option>Video</option>
        <option>Artigo</option>
    </select>
    <!-- Create the editor container -->
    
    <button>Salvar</button>
</form>


<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  const quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>
