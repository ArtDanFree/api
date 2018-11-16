<?php
require __DIR__ . '/autoload.php';

$accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBkOWJlOTQzZjI5YTQ5NTI1M2QzMDE5NDA0YjY5MjNjY2IwNjU2MzJkNDM1NWViMWI5Y2Y1ZjYwMWZkZGRhNGY0NjlmYjgxNzYwNmJjM2FiIn0.eyJhdWQiOiIxIiwianRpIjoiMGQ5YmU5NDNmMjlhNDk1MjUzZDMwMTk0MDRiNjkyM2NjYjA2NTYzMmQ0MzU1ZWIxYjljZjVmNjAxZmRkZGE0ZjQ2OWZiODE3NjA2YmMzYWIiLCJpYXQiOjE1NDIzNjE2NDQsIm5iZiI6MTU0MjM2MTY0NCwiZXhwIjoxNTczODk3NjQ0LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.hSXcLF6O4keXQQI5lO7SBwkrRaTXBewx_oAHobFBKVIeY9nObU7BA6_feB5g9G9r24-dbwAJkbMWmL4ATBSODPwr1jelevWgixazbwserzSEjcy8SE8Swuu28U0G7m0nTrQN96vgbRJd5Y4j7X4t4cWDnHogBB0PlFquJoTvp1mqjdMI8uxGf_1sU-TkLru8tTcX6khKFcenidRKlklZp-RH4Ip6pXBbZHZeHIsV2B8g1kYjgLYocouwTFdLCy8mmBBRauWuBEq8o-VNVeQ9b_Lpa6_NzBCs-W4c1jRooZh2osbkYe5gUFmqnAMRbGy2vnKoMkbtIp8f6lwwLNviRSTJ20wgcA1L4C8Jn9c0uA7dJFhMEzdVEVqMPvJ-AyR58WGW1vk3qyyPDbA1qVZrdgVp2uuAocMf-mwd6O574J-fAecBMS6anz22BUfV2Ee39LUOXY2_S8YomqDE2pRs2_lOHljU_l7ols7qewVdiAf9Zv9Uc6p-pjPaWbkM9jCKQcb4_ufX3K2RWDEdAqjeD5AdgDO324cYXc76bIFSOytAM8e44-Ud8rpqAPzkHo_olzXaxh7BeQvWMIZTnczS87GSo6vHOhIL4p3ZrEPF_F6lld6rprxlWfDg0ejxE_0qgrqtyTvXyOHtdVQVmSXwL0iG4knk3ldewsQofE4l7tw';

$api = new \App\ApiController($accessToken);
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
