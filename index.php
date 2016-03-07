<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/homepage.css">

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
$channels = array('astromiko','syntheticeq','rewisiontv','suvwi_thal','cmdrraijiin','isokix');
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

        ?>

    <div class="panel panel-success">
        <div class="panel-heading" style="text-align: center;"><p class="fa fa-twitch"></p><a href="<?php echo $url ?>"> <?php echo $name ?></a></div>
        <div class="panel-content">
            <div class="container">
                <br>

                <div style="text-align: center;"><i class="fa fa-gamepad"></i> Currently Playing: <b><?= $game ?></b><br></div>
                <div style="text-align: center;"><i class="fa fa-user"></i> Viewers: <b><?= $viewers ?></b><br></div>
                <div style="text-align: center;"><i class="fa fa-heart"></i> Followers: <b><?= $followers ?></b><br></div>
                <div style="text-align: center;"><i class="fa fa-eye"></i> Channel Views: <b><?= $chan_views ?></b><br></div>


                <br>
            </div>
        </div>
    </div>

        <?php
    }
}
?>
</div>
</body>
</html>