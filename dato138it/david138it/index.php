<?php
$user = "tuser";
$password = "tpassword";
$database = "thost";
$table1 = "experience";
$table2 = "results";
echo '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>thost</title>
</head>
<body>
    <!--SECTIONS-->
    <!--CARDS-->
    <section>
        <div class="container">
            <div class="cards">
                <div class="card__content" id="page__fixed">
                    <h2 class="card_hidden" id="aboutMe" onclick="card__hidden(this)">Обо мне</h2>
                    <div style="display:none; text-align:left; &{head};">
                        <p>
                            <strong>Специальность:</strong> Город. Коротко обо мне.<br>
                            <strong>Навыки:</strong> Мои навыки.<br>
                            <strong>Обратная связь:</strong> почта, телеграм.<br>
                            <strong>Услуги:</strong><br>
                            # Мои услуги.
                        </p>
                    </div>
                </div>
                <div class="card__content" id="experience" style="text-align: left;">  
                    <p>Опыт работы / Образование</p>                  
                    <p class="card_hidden" onclick="card__hidden(this)">Show</p>
                    <div style="display:none;" style=&{head};>
                        <p>            
';
try {
    $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
    $query = $db->query("
        select * from $database.$table2 
        inner join $database.$table1 
        on $table1.experience_id=$table2.experienceId
        order by $table1.begin;
    ");
    foreach($query as $row) {
        echo '
        <strong>
        ' . $row['begin'] . ' -
        ' . $row['finish'] . ', </strong>
        ' . $row['place'] . ',
        ' . $row['specialization'] . '<br><strong>Дополнительная информация.</strong>
        ' . $row['content'] . '<br><strong>Достижения.</strong>
        ' . $row['progress'] . '<br>
        <br>
        ';
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
echo '
                        </p>
                    </div>
                </div>
            </div>  
        </div>
    </section> 
    <!-- JS -->
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
'
?>