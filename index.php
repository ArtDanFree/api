<?php
require __DIR__ . '/autoload.php';


$api = new \App\ApiController();
$cities = $api->getCities();

if (!empty($_POST))
    $response = $api->addLead($_POST);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php if(!empty($response)):?>
<div class="container">
    <div class="alert alert-info text-center" role="alert">
        <strong><?php echo $response['message']?></strong>
    </div>
</div>
<?php endif;?>
<div class="container">
    <form id="form" action="/" method="POST">
        <div class="form-group">
            <label>Тип залога</label>
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="customControlValidation2"
                       name="collateral" value="0" required>
                <label class="custom-control-label" for="customControlValidation2">Недвижимость</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                <input type="radio" class="custom-control-input" id="customControlValidation3"
                       name="collateral" value="1" required>
                <label class="custom-control-label" for="customControlValidation3">Автомобиль</label>
            </div>
        </div>
        <div class="form-group">
            <label>Телефон:</label>
            <input name="phone" type="text" required class="phone form-control" placeholder="Телефон:">
        </div>
        <div class="form-group">
            <select id="add-lead-select" name="city_id" class="custom-select form-control-lg" required>
                <option value="">Город</option>
                <?php foreach($cities['cities'] as $city){?>
                    <option value="<?php echo $city['id'];?>"><?php echo $city['name'];?></option>
                <?php }; ?>
            </select>
        </div>
        <button type="submit" id="form-button" class="btn btn-warning btn-lg btn-block">Добавить</button>
    </form>
</div>
</body>
</html>
