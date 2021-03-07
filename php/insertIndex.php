<?php

echo '<div class="gallery-upload">
        <form action="./websitegallery.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="filename" placeholder="File Name">
        <input type="text" name="filetitle" placeholder="Image Title">
        <input type="text" name="filedescription" placeholder="Description">
        <input type="file" name="file">
        <button type="submit" name="submit">Upload</button>
        </form>
        </div>';
