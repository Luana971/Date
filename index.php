<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retour vers le futur</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <?php

    require_once ('TimeTravel.php');

    $start = new DateTime('31-12-1985');
    $end = new DateTime('now');
    $timeTravel = new TimeTravel($start, $end);
    $interval = new DateInterval('PT1000000000S');

    ?>
    <div class="container">
        <p class="text-center"><?= $timeTravel->findDate($interval); ?></p>
        <p class="text-center"><?= $timeTravel->getTravelInfo($start, $end); ?></p>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Steps</th>
                </tr>
            </thead>
                <?php

                $periods = $timeTravel->backToFutureStepByStep(new DateInterval('P1M1W1D'));
                foreach ($periods as $period) { ?>
            <tbody>
                <tr>
                    <td class="text-center"><?= $period; ?></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
</body>
</html>
