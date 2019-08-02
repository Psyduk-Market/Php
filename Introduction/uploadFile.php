<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Form Upload</title>
</head>
<body>
    <h1>File Upload Form</h1>
    <p>
        Click the 'choose File' button to select a file to upload.
    </p>
    <form method="post" action="uploadFile.php" enctype="multipart/form-data">
        Select File: <input type="file" name="filename" size="10" />
        <input type="submit" value="Upload" />
    </form>

    <?php
        if($_FILES != null && ($_FILES["filename"]["type"] == "image/jpeg" ||
                $_FILES["filename"]["type"] == "image/gif" ||
                $_FILES["filename"]["type"] == "image/png" ||
                $_FILES["filename"]["type"] == "image/tiff"))
        {
            $name = $_FILES["filename"]["name"];
            move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
            echo "Uploaded image '$name'<br/><img src='$name'/>";
            echo "Image type";
        }
        else {
            echo "There is no file selected or not image type";
        }
    ?>
</body>
</html>