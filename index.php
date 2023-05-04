
<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

   // var_dump($hotels);
   if(!empty($_GET['parking'])){
    $parking = $_GET['parking'];
    $filtered = [];
    foreach($hotels as $item){
        if($item['parking'] == $parking){
            $filtered[] = $item;
        }
    }
   } else{
    $filtered = $hotels;
   }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <select name="parking">
            <option value=""></option>
            <option value="true">Con parcheggio</option>
            <option value="false">Senza parcheggio</option>
        </select>
        <button type="submit">Filtra</button>
    </form>

    <ul>
        <?php for($i = 0; $i < count($filtered); $i++) { ?>
            <li>
                <?php echo $filtered[$i]['name'] ?> <br>
                <?php echo $filtered[$i]['parking'] ?> <br>
                 
            </li>
        <?php } ?>
    </ul>
</body>
</html>