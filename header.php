<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <link rel="stylesheet" href="StyleC.css">
   <title>Document</title>
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

<body class="text-center"><br>