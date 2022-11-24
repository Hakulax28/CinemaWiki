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
<header class="p-3 text-bg-dark">
   <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
         <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
               <use xlink:href="#bootstrap"></use>
            </svg>
         </a>
         <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 text-secondary">Hoofdpagina</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
            <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
            <li><a href="faq.php" class="nav-link px-2 text-white">FAQs</a></li>
            <li><a href="overons.php" class="nav-link px-2 text-white">Over ons</a></li>
         </ul>

         <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
            <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
         </form>

         <div class="text-end">
            <button onclick="document.location='inloggen.php'" type="button" class="btn btn-outline-light me-2">Inloggen</button>
            <button onclick="document.location='registreer.php'" type="button" class="btn btn-warning">Registreren</button>
         </div>
      </div>
   </div>
</header>

<body class="bg-secondary bg-gradient">
    <div class="container">
        <div class="d-flex flex-column mb-3 mt-3 bg-light bg-gradient rounded">
            <div class="p-2 col justify-content-start d-flex align-items-center">
               <img src="images/test-image.png" alt="" width="100px" height="100px" class="rounded">
               <h2 class="p-2">(Username) has edited (Page) with (Text)</h2>
            </div>
        </div>
   
        <div class="d-flex flex-column mb-3 mt-3 bg-light bg-gradient rounded">
            <div class="p-2 col justify-content-start d-flex align-items-center">
               <img src="images/test-image.png" alt="" width="100px" height="100px" class="rounded">
               <h2 class="p-2">(Username) has edited (Page) with (Text)</h2>
            </div>
        </div>
   
        <div class="d-flex flex-column mb-3 mt-3 bg-light bg-gradient rounded">
            <div class="p-2 col justify-content-start d-flex align-items-center">
               <img src="images/test-image.png" alt="" width="100px" height="100px" class="rounded">
               <h2 class="p-2">(Username) has edited (Page) with (Text)</h2>
            </div>
        </div>
   
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<footer class="footer mt-auto py-3 bg-light">
   <div class="container">
      <span class="text-muted">Gemaakt door Cho Lommerse en Daniel Garcia Espinales.</span>
   </div>
</footer>

</html>