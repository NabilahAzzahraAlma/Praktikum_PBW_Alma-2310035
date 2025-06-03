<!DOCTYPE html>
<html lang="en">

<head>
    <title>Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <?php
                // Isi bagian ini dengan kode PHP untuk menampilkan pesan sukses
                // jika ada pesan yang dikirimkan melalui URL
                
                ?>
                <div class="card border-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h2>List Articles</h2>

                            // Ganti isi dari href dengan URL yang sesuai untuk menambahkan artikel (add)
                            <a href="/*Tolong ganti saya*/" class="btn btn-primary">Add Article</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>Thumbnail</th>
                                    <th>Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Isi bagian ini dengan kode PHP untuk mengambil data artikel dari database
                                // dan menampilkannya dalam tabel
                                // Pastikan Anda sudah menghubungkan ke database dengan benar
                                // dan sudah membuat tabel 'articles' dengan kolom yang sesuai
                                
                                    ?>
                                    <div class="alert alert-success my-4"><?= /* Tolong isi aku*/ ?></div>
                                    <?php
                                // Isi dengan penutup
                
                                    ?>
                                    <tr>
                                        <td><?=/* Tolong isi aku*/  ?></td>
                                        <td><?=/* Tolong isi aku*/   ?></td>
                                        <td><?=/* Tolong isi aku*/  ?></td>
                                        <td><?=/* Tolong isi aku*/  ?></td>
                                        <td>
                                            <img src="images/<?=/* Tolong isi aku*/  ?>" class="img-fluid img-thumbnail">
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="edit.php?id=<?= ?>" class="btn btn-warning mx-2">Edit</a>
                                                <a href="delete.php?id=<?= ?>" class="btn btn-danger mx-2">Delete</a>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                // Isi bagian ini dengan penutupan loop dan koneksi database
                                // Pastikan Anda sudah menutup koneksi database setelah selesai
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>