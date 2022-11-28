<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleD.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>

<?php include "header.php"; ?>

<body class="bg-secondary bg-gradient">
<h2 class="display-1 text-light">Overzichten</h2>
<div class="container bg-light rounded p-2">
    <h2>Mijn pagina's</h2>
    <table class="table table-striped table-hover">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Page image</th>
            <th scope="col">Page name</th>
            <th scope="col">Date Created</th>
            <th scope="col"></th>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td><img src="images/test-image.png" alt="" class="img-thumbnail" width="100px" height="auto"></td>
                <td>Movie</td>
                <td>00/00/0000</td>
                <td><button type="submit" class="btn btn-primary">Visit</button></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td><img src="images/test-image.png" alt="" class="img-thumbnail" width="100px" height="auto"></td>
                <td>Movie</td>
                <td>00/00/0000</td>
                <td><button type="submit" class="btn btn-primary">Visit</button></td>
            </tr>
        </tbody>
    </table>

    <h2>Mijn Bewerkingen</h2>
    <table class="table table-striped table-hover">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Page edited</th>
            <th scope="col">Edit date</th>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td><a href="#">Movie</a></td>
                <td>00/00/0000</td>
                <td><button type="submit" class="btn btn-primary">Visit</button></td>
            </tr>

        </tbody>
    </table>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<?php include "footer.php"; ?>

</html>