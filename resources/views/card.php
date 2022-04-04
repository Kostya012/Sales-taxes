<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/favicon_p.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css" />
    <title>Sales taxes</title>
</head>
<body>
    <h1>Sales taxes</h1>
    <div class="wrapper">
        <?php foreach ($data as $item): ?>
            <div class="item">
                <div class="container">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-8 cart">
                                <div class="title">
                                    <div class="row">
                                        <div class="col">
                                            <h4><b>Shopping Cart</b></h4>
                                        </div>
                                        <div class="col align-self-center text-right text-muted"><?= count($item) - 2 ?> items</div>
                                    </div>
                                </div>
                                <?php for ($i = 0; $i < count($item)-2; $i++) : ?>
                                    <div class="row border-top border-bottom">
                                        <div class="row main align-items-center">
                                            <div class="col-2"><img class="img-fluid" src="/img/<?= $item[$i]['img']; ?>"></div>
                                            <div class="col">
                                                <div class="row text-muted">ID <?= $item[$i]['id']; ?></div>
                                                <div class="row"><?= $item[$i]['name']; ?></div>
                                            </div>
                                            <div class="col"> <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a> </div>
                                            <div class="col">&euro; <?= $item[$i]['priceTaxes']; ?> <span class="close">&#10005;</span></div>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                                <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                            </div>
                            <div class="col-md-4 summary">
                                <div>
                                    <h5><b>Summary</b></h5>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col" style="padding-left:0;">Sales Taxes:</div>
                                    <div class="col text-right">&euro; 
                                        <?= $item['salesTaxes']; ?>
                                    </div>
                                </div>
                                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                    <div class="col">TOTAL:</div>
                                    <div class="col text-right">&euro; 
                                    <?= $item['total']; ?>
                                    </div>
                                </div> <button class="btn">CHECKOUT</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>