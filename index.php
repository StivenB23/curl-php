<?php
require_once './app/classes/Products.php';

use App\classes\Products;

$curl = new Products();
$data = $curl->getAllProducts();
// var_dump($data);

// $curl = new Curl('https://fakestoreapi.com/products/');
// $data = [
//     "title" => "Camiseta",
//     "price" => 119.95,
//     "description" => "Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday",
//     "category" => "men's clothing",
//     "image" => "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg",
// ];
// $curl->init()->setOption(CURLOPT_POST, true)->buildQuery($data)->execute();
//  Iniciar session curl
// $sesion = curl_init(); 
// curl_setopt($sesion, CURLOPT_URL,'https://fakestoreapi.com/products/');
// curl_setopt($sesion, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($sesion);

// if (curl_errno($sesion)) echo curl_error($sesion);
// else $decoded = json_decode($response, true);
// var_dump($decoded);
// curl_close($sesion);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tienda</title>
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
    <link rel="stylesheet" href="./app/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-info">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Clothing store</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#items">Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contat</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <main>
        <div>
            <section class="welcome" id="#home">
                <div class="welcome-elements">
                    <div class="col-sm-6 ">
                        <div class="text-welcome ">
                            <div class="">
                                <h1 class="title-welcome">Clothing store</h1>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit error consectetur quis, distinctio ad quidem omnis iure impedit rerum neque!</p>
                                <div class="">
                                    <a class="redonded btn btn-info btn-lg " href="#items">Go Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <img class="m-3" src="./app/img/image-shopping.jpg" width="600" alt="">
                    </div>
                </div>
            </section>
            <section class="container" id="items">
                <div class="row">
                    <h3 class="fs-1">ITEMS</h3>
                    <hr>
                    <?php
                    foreach ($data as $index) {
                    ?>
                        <div class="col-sm-3 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img src="<?php echo $index['image'] ?>" height="350" class="card-img-top" alt="...">
                                <div class="card-body h-100">
                                    <h5 class="card-title"><?php echo (strlen($index['title']) > 30 ? substr($index['title'], 0, 30) . '...' : $index['title']) ?></h5>
                                    <h2 class="card-text fw-bold">$<?php echo $index['price'] ?></h2>
                                    <div class="text-center">
                                        <button data-bs-toggle="modal" data-bs-target="#item<?php echo $index['id'] ?>" class="btn btn-outline-primary">See more</button>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="item<?php echo $index['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $index['title'] ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="d-flex justify-center " >
                                                        <img class="ms-5 redonded text-center" src="<?php echo $index['image'] ?>" width="200" alt="">
                                                    </div>
                                                    <p><b>Price:</b> $<?php echo $index['price']?></p>
                                                    <p><b>Description:</b> <?php echo $index['description']?> </p>
                                                    <p><b>Category:</b> <?php echo $index['category']?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning">Add to card </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </section>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</body>

</html>