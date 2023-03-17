<?php
    function test($choice, $model){
        if(!empty(isset($_POST['submit']))){
            switch($choice){
                case 1:
                    $paint = "Pearl White Multi-Coat";
                    echo '<br>';
                    echo '<img src="https://static-assets.tesla.com/configurator/compositor?context=design_studio_2&options=$MTS13,$PPSW,$WS90,$IBE00&view=FRONT34&model=ms&size=1920" alt="' . $model ." - ". $paint . '" width="50%">';
                    break;
                case 2:
                    $paint = "Solid Black";
                    echo '<br>';
                    echo '<img src="https://static-assets.tesla.com/configurator/compositor?context=design_studio_2&options=$MTS13,$PBSB,$WS90,$IBE00&view=FRONT34&model=ms&size=1920" alt="' . $model ." - ". $paint . '" width="50%">';
                    break;
                case 3:
                    $paint = "Midnight Silver Metallic";
                    echo '<br>';
                    echo '<img src="https://static-assets.tesla.com/configurator/compositor?context=design_studio_2&options=$MTS13,$PMNG,$WS91,$IBE00&view=SIDE&model=ms&size=1920" alt="' . $model ." - ". $paint . '" width="50%">';
                    break;
                case 4:
                    $paint = "Deep Blue Metallic";
                    echo '<br>';
                    echo '<img src="https://static-assets.tesla.com/configurator/compositor?context=design_studio_2&options=$MTS13,$PPSB,$WS91,$IBE00&view=SIDE&model=ms&size=1920" alt="' . $model ." - ". $paint . '" width="50%">';
                    break;
                case 5:
                    $paint = "Ultra Red";
                    echo '<br>';
                    echo '<img src="https://static-assets.tesla.com/configurator/compositor?context=design_studio_2&options=$MTS13,$PR01,$WS91,$IBE00&view=SIDE&model=ms&size=1920" alt="' . $model ." - ". $paint . '" width="50%">';
                    break;
                default: 
                    $paint = "Pearl White Multi-Coat";
                    echo '<br>';
                    echo '<img src="https://static-assets.tesla.com/configurator/compositor?context=design_studio_2&options=$MTS13,$PPSW,$WS90,$IBE00&view=FRONT34&model=ms&size=1920" alt="' . $model ." - ". $paint . '" width="50%">';
                    break;
                }
        }
    }
?>