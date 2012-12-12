<?php session_start();
$title="Your Orders at golfessentials.in";
 include 'header.php'; include_once 'functions.php'; ?>
  <div role="main" class="container_24">
          <div class="relative clearfix">
               <div class="sidemenu grid_4">
                    <ul>
                         <li><a href="<?php echo $men; ?>">Men<img src="img/plus.png" width="16" height="16" class="right"></a></li>
                         <li><a href="<?php echo $ladies; ?>">Ladies<img src="img/plus.png" width="16" height="16" class="right"></a></li>
                         <li><a href="<?php echo $juniors; ?>">Juniors<img src="img/plus.png" width="16" height="16" class="right"></a></li>
                         <li><a href="<?php echo $lefthanders; ?>" class="no-border">Left-handers<img src="img/plus.png" width="16" height="16" class="right"></a></li>
                    </ul>
               </div>
               <?php echo $sliders; ?>
              <a href="special" class="so" title="Contact us if you can’t find what you are looking for.">
                <img src="img/so.png" width="18" height="109" class="center_align">
                <img src="img/white_button.png" width="22" height="21" class="center_align">
              </a>
              <a href="feedback" class="f" title="Share your ideas, expectations and views with us.">
                <img src="img/f.png" width="14" height="78" class="center_align">
                <img src="img/white_button.png" width="22" height="21" class="center_align">
              </a>
          </div>
          <div id="products">
               <div class="account">
                    <?php
                         $orders=GetCustomerOrders();
                         if (!$orders) {
                              echo "<br><h3>Orders</h3><hr><br><p>You have no previous orders !</p>";
                         } elseif($orders) {
                              echo "<br><h3>Orders</h3><hr>";
                              foreach ($orders as $key1 => $value1) {
                                   echo "<table><tr><th>Invoice Number</th><th>Date</th><th>Status</th><th>Product</th><th>Quantity</th><th>Payment</th><th>Courier</th><th>Tracking No.</th></tr>";
                                   foreach ($orders[$key1]['details'] as $key2 => $value2) {
                                        echo "<tr>
                                        <td>".$orders[$key1]['invoice']."</td>
                                        <td>".$orders[$key1]['date']."</td>
                                        <td>".ucwords($orders[$key1]['status'])."</td>
                                        <td><a href=\"product?id=".$orders[$key1]['details'][$key2]['id']."\">".$orders[$key1]['details'][$key2]['prodname']."</a></td>
                                        <td>".$orders[$key1]['details'][$key2]['qty']."</td>
                                        <td>".$orders[$key1]['payment']."</td>";
                                        echo (is_null($orders[$key1]['details'][$key2]['courier'])) ? "<td>&nbsp;n/a&nbsp;</td>" : "<td>".$orders[$key1]['details'][$key2]['courier']."</td>" ;
                                        echo (is_null($orders[$key1]['details'][$key2]['courierno'])) ? "<td>&nbsp;n/a&nbsp;</td>" : "<td>".$orders[$key1]['details'][$key2]['courierno']."</td>" ;
                                        echo "</tr>";
                                   }
                                   echo "</table>";
                              }
                         }
                    ?>
               </div>
<?php include 'footer.php'; ?>
<!--
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.2.min.js"><\/script>')</script>

  <script src="js/plugins.js"></script>
-->
    <script type="text/javascript" src="js/libs/jquery-1.8.2.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/validation.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33105754-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>