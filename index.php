

<?php






define('API_URL', 'https://whenisthenextmcufilm.com/api');

// $result = file_get_contents(API_URL);  //tambien sirve para un get 
// $popular_movies = json_decode($result, true);

//$ch = curls handler
$ch = curl_init(API_URL);
// queremos reciboir el resultado sin mostrar por pantall

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
#Ejecuta y guarda el resultado

$response = curl_exec($ch);

#response a json
$popular_movies = json_decode($response, true);

curl_close($ch);    
//var_dump($popular_movies);



// curl_setopt($ch, CURLOPT_HTTPHEADER, [
//     'Authorization: Bearer ' . API_KEY,
//     'Content-Type: application/json;charset=utf-8',
// ]);

// $response = curl_exec($ch);
// curl_close($ch);

// $popular_movies = json_decode($response, true);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">

</head>
<body>
    <main>
        <!-- <pre style="font-size:12px; overflow: scroll; height: 250px">
        //hp   var_dump($popular_movies);  ?>
        </pre>  -->
        <section>
            <img src="<?= $popular_movies["poster_url"]; ?>" alt="poster" style="width:200px; border-radius:16px;">
            <h2> <?= $popular_movies["title"] ?> </h2>
        </section> 
        <hgroup>
            <h1><?php echo $popular_movies["title"]; ?> se estrena <?php echo $popular_movies["days_until"]; ?> dias</h1>
            <h2>Fecha de estreno: <?= $popular_movies["release_date"]; ?></h2>
            <p>La siguiente es : <?= $popular_movies["following_production"]["title"]; ?></p>
        </hgroup>
    </main>

    
</body>

<style >
    body{
        display: grid;
        place-content: center;
    }
</style>
    

</html>







