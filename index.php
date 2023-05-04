
<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4,
            'image' => 'https://images.trvl-media.com/lodging/75000000/74530000/74521200/74521177/04cb547d.jpg?impolicy=resizecrop&rw=500&ra=fit'
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2,
            'image' => 'https://s.joinup.ee/uploads/hotel/58180/gallery/original/Nautilux-Rethymno-by-Mage-Hotels-4.jpg'
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1,
            'image' => 'https://images.trvl-media.com/lodging/75000000/74530000/74521200/74521177/04cb547d.jpg?impolicy=resizecrop&rw=500&ra=fit'
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5,
            'image' => 'https://nautilux-by-mage-hotels.rethymnohotels.net/data/Imgs/OriginalPhoto/13634/1363480/1363480805/img-nautilux-by-mage-hotels-rethymno-crete-2.JPEG'
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50,
            'image' => 'https://ak-d.tripcdn.com/images/022191200095k2q83CE8C_R_960_660_R5_D.jpg'
        ],


    ];

   // var_dump($hotels);
   
     
   $show = true;
   if(!empty($_GET['parking']) && !empty($_GET['rating'])){
    $show = true;
    $filtered = [];
        if($_GET['parking'] == 'false') {
            foreach($hotels as $item) {
                if($item['parking'] == false && $item['vote'] == $_GET['rating']) {
                    $filtered[] = $item;
                }
                }
            
        } elseif ($_GET['parking'] == 'true'){
            foreach($hotels as $item) {
                if($item['parking'] == true && $item['vote'] == $_GET['rating']) {
                    $filtered[] = $item;
                }
                }
        }  

    } elseif(!empty($_GET['parking']) && empty($_GET['rating'])){
        if($_GET['parking'] == 'false') {
            foreach($hotels as $item) {
                if($item['parking'] == false ) {
                    $filtered[] = $item;
                }
                }
            
        } elseif ($_GET['parking'] == 'true'){
            foreach($hotels as $item) {
                if($item['parking'] == true) {
                    $filtered[] = $item;
                }
                }
        } 
         
    } elseif(empty($_GET['parking']) && !empty($_GET['rating'])){
        
            foreach($hotels as $item) {
                if($item['vote'] == $_GET['rating'] ) {
                    $filtered[] = $item;
                }
                }
         
         
    } else{
        $filtered = $hotels;
    }
    if(count($filtered) < 1){
        $show = false;
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css">
<title>Document</title>
<style>
    select{
        width: 150px !important;
    }
</style>

</head>
<body>

 <section class="container">
    <div class="mt-5 mb-4">
        <div class="text-center mb-5">
            <h1 class="text-dark">Cerca l'Hotel che fa per te</h1>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <div class="d-flex">
            <select name="parking" class="form-select me-2">
                <option value=""></option>
                <option value="true">Con parcheggio</option>
                <option value="false">Senza parcheggio</option>
            </select>
            <select name="rating" class="form-select me-2">
                <option value=""></option>
                   <?php for($i = 1; $i <= 5; $i++) { ?>
                       <option value="<?php echo $i?>"><?php echo $i?></option>
                   <?php } ?>
            </select>
            <button type="submit" class="btn bg-primary text-white">Filtra</button>
        </div>
        </form>
    </div>
        <?php if($show): ?>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Parcheggio</th>
                            <th scope="col">Stelle</th>
                            <th scope="col">Distanza dal centro</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php for($i = 0; $i < count($filtered); $i++) { ?>
                            <tr>
                                <td><?php echo $filtered[$i]['name'] ?></td>
                                <td><?php echo $filtered[$i]['description'] ?></td>  
                                <td><?php echo $filtered[$i]['parking'] ?></td>
                                <td><?php echo $filtered[$i]['vote'] ?></td>  
                                <td><?php echo $filtered[$i]['distance_to_center'] ?></td>  
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div>
                <div>
                    <div class="text-center mt-5 mb-4">
                        <h2 class="text-dark">I tuoi risultati</h2>
                    </div>
                </div>
                <div class="row">
                  <?php for($i = 0; $i < count($filtered); $i++) { ?>
                    <div class="col-12 col-md-6 col-lg-4 pt-2 pb-3">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo $filtered[$i]['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $filtered[$i]['name'] ?></h5>
                                <p class="card-text m-0 mb-3"><?php echo $filtered[$i]['description'] ?></p>
                                <div class="d-flex">
                                    <p class="m-0 me-2 fw-bold">Parcheggio:</p>
                                    <?php if($filtered[$i]['parking']): ?>
                                        <p class="card-text m-0 ms-2">Si</p>
                                        <?php else: ?>
                                            <p class="card-text m-0 ms-2">No</p>
                                            <?php endif; ?>
                                </div>
                                <div>
                                    <div class="d-flex">
                                        <p class="m-0 fw-bold">Voto:</p>
                                        <p class="card-text m-0 ms-2"><?php echo $filtered[$i]['vote'] ?></p>
                                    </div>
                                    <div class="d-flex">
                                        <p class="m-0 fw-bold">Km dal centro:</p>
                                        <p class="card-text m-0 ms-2"><?php echo $filtered[$i]['distance_to_center'] ?></p>
                                    </div>

                                </div>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary">Visita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                </div>
            </div>
        <?php else: ?>
            <div class="bg-danger-subtle rounded-1 p-3 text-center">
                <p class="text-danger m-0">Nessun valore corrisponde alla ricerca</p>
            </div>
        <?php endif; ?>
 </section>


 
     
</body>
</html>