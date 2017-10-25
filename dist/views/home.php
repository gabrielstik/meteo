<?php
  include 'views/actions/display.php';
?>
<div class="weather">
  <?php echo $howsentence; ?></span>
  <form class="city-form" method="post">
    <input autocomplete="off" type="text" id="city" name="city" class="city" value="<?php echo $place; ?>"></input>
    <input type="submit" id="subcity" name="subcity" class="subcity"></input>
  </form><br/>
  <?php //echo round($temp,$temp_round)."°C"; ?>
  <?php if (!empty($_POST['setLat']) || !empty($_POST['city'])) { ?>
  <?php } ?>
</div>

<form method="post" id="setLocation">
  <input type="hidden" name="setLat" id="setLat" class="setLat" value=""></input>
  <input type="hidden" name="setLon" id="setLon" class="setLon" value=""></input>
</form>
