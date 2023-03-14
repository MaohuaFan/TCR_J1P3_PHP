    <?php
    
        if(!empty($_GET['radio'])){ $selected = $_GET['radio'];}
        else{ $selected = '1';}
    ?>
    <form action="#" method="post">
        <label for="1">Color 1: <input type="radio" name="radio" value="1" id="1" checked></label>
        <label for="2">Color 2: <input type="radio" name="radio" value="2" id="2"></label>
        <label for="3">Color 3: <input type="radio" name="radio" value="3" id="3"></label><br>
        <input type="radio" name="a1" value="site2" onchange="showRadio()" /> Site 2 <?php echo ($selected == 'zbc' ? 'This was selected!' : '');?> </br>
        <input type="submit" name="submit" value="submit">
        </form><br>
    <?php
    echo"Echo: ";
    $radio = $_POST['radio'];
        if(isset($_POST['submit'])){
            switch($radio){
                case 1:
                    echo "Color 1";
                    break;
                case 2:
                    echo "Color 2";
                    break;
                case 3:
                    echo "Color 3";
                    break;
            }
        }
    ?>
<span class="r-text"><?php echo $selected;?></span>
<script>
    $('input[type=radio]').click(function(e) {//jQuery works on clicking radio box
        var value = $(this).val(); //Get the clicked checkbox value
        $('.r-text').html(value);
    });
</script>