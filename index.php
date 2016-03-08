<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/homepage.css">
    <title>The Candy Crew | candycrew.space</title>
</head>
<body>

<div class="jumbotron homepagejt">
    <div class="container">
        <h1>The Candy Crew</h1>
        <p>Exploring with Candy</p>
    </div>
</div>

<div class="container">
    <?php
    $multistream = 'http://multistre.am/';
    $channels = array('astromiko','syntheticeq','rewisiontv','suvwi_thal','cmdrraijiin','isokix','robbyxp1','iamotaku','mogriax');
    $callAPI = implode(",",$channels);
    $dataArray = json_decode(@file_get_contents('https://api.twitch.tv/kraken/streams?channel=' . $callAPI), true);

    foreach($dataArray['streams'] as $mydata){
        if($mydata['_id'] != null){
            $name      = $mydata['channel']['display_name'];
            $game      = $mydata['channel']['game'];
            $url       = $mydata['channel']['url'];
            $viewers   = $mydata['viewers'];
            $followers   = $mydata['channel']['followers'];
            $chan_views   = $mydata['channel']['views'];
            $title = $mydata['channel']['status'];
            $logo = $mydata['channel']['logo'];
            $uptime = @file_get_contents('https://decapi.me/twitch/uptime?channel=' . $mydata['channel']['name']);
            $multistream = $multistream . $name . "/"


            ?>

            <div class="panel panel-success">
                <div class="panel-heading" style="text-align: justify;"><p class="fa fa-twitch"></p> <?php echo $name ?> | <b><?= $title ?></b></div>
                <div class="panel-content">
                    <div class="container">

                        <div class="col-md-3">
                            <?php if($logo != null){ ?>
                                <img class="resize" src="<?= $logo ?>">
                            <?php } else { ?>
                                <img class="resize" src="http://www-cdn.jtvnw.net/images/xarth/404_user_600x600.png">
                            <?php } ?>

                        </div>
                        <div class="col-md-6">
                            <div class="stats">
                                <div style="text-align: center;"><i class="fa fa-gamepad"></i> Currently Playing: <b><?= $game ?></b><br></div>
                                <div style="text-align: center;"><i class="fa fa-user"></i> Viewers: <b><?= $viewers ?></b><br></div>
                                <div style="text-align: center;"><i class="fa fa-clock-o"></i> Uptime: <b><?= $uptime ?></b><br></div>
                                <div style="text-align: center;"><i class="fa fa-heart"></i> Followers: <b><?= $followers ?></b><br></div>
                                <div style="text-align: center;"><i class="fa fa-eye"></i> Channel Views: <b><?= $chan_views ?></b></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="btn-group buttons">
                               <a href="<?= $url ?>" class="btn btn-default btn-twitch"><i class="fa fa-twitch"></i> Watch <?= $name ?></a>
<!--                                <button type="button" class="btn btn-default disabled"><i class="fa fa-plus"></i></button>-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php
        }
    }
    ?>
    <div class="container">
        <div style="text-align: center;">
            <h3>Can't decide who to watch?</h3>
            <a href="<?= $multistream ?>" class="btn btn-default btn-twitch multi"><i class="fa fa-twitch"></i> Watch everyone on multistre.am</a>
        </div>
    </div>

</div>
</body>
</html>