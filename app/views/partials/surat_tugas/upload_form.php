<!-- upload_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Excel File</title>
</head>
<body>
    <h1>Upload Excel File</h1>
    <!-- <form action="<?php print_link("surat_tugas/upload?csrf_token=$csrf_token") ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file" required />
        <input type="submit" value="Upload" />
    </form>-->
    <form action="/surat_tugas/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".xlsx, .xls">
        <button type="submit">Upload</button>
    </form>
</body>
</html>
