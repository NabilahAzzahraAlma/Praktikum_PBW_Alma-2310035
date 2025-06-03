<?php
// Isi bagian ini dengan kode untuk mengecek apakah ada parameter 'id' di URL
// Jika ada, maka ambil data artikel berdasarkan ID tersebut
// dan tampilkan dalam form untuk diedit

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    // Isi bagian ini dengan kode PHP untuk menampilkan pesan error
                    
                    ?>
                    <div class="card border-0">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">

                                <h2>Edit Article</h2>
                                <a href="index.php" class="btn btn-primary">List Articles</a>
                            </div>
                        </div>
                        <div class="card-body">

                            // Ganti isi dari form action dengan URL yang sesuai untuk mengedit artikel
                            <form action="/*Tolong ganti aku*/" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?=  ?>">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="<?=  ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea name="content" id="content" class="form-control"><?=  ?></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" id="category" class="form-select">
                                        <option value="Programming" <?=  ?>>Programming</option>
                                        <option value="Business" <?=  ?>>Business</option>
                                        <option value="News" <?= ?>>News</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="thumbnail" class="Thumbnail">Thumbnail</label>
                                    <br>

                                    <img src="images/<?=  ?>" class="img-fluid img-thumbnail my-3"
                                        width="100">

                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">

                                </div>

                                <button type="submit" name="edit" class="btn btn-primary">Edit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
}
?>