    <!--
================================
Este archivo muestra un formulario que
se envía a subir.php, el cual guardará
los datos
================================
-->
    <form action="app/subir.php" method="post" enctype="multipart/form-data">
        <h1>Upload Image</h1>
        <div class="form-img">
            <input class="input-img" type="file" name="archive[]" id="archive[]" multiple="" required accept="image/x-png,image/gif,image/jpeg,image/jpg,image/tiff">
        </div>
        <div class="form-input">
            <label for="textoImg">Codigo</label>
            <input id="codigo" name="codigo" type="text" required>
            <input type="checkbox" name="visible" value="1" checked> Visible
        </div>
        <button type="submit" name="uploadBtn">Upload image</button>
    </form>