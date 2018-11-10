<?php
if (isset($_SESSION['mensaje'])) {
                            $color="text-danger";
                            if ((isset($_SESSION['tm'])) and ($_SESSION['tm']==1)) $color="text-success";
                            echo "<h4 class='text-center ".$color."'>";
                            echo $_SESSION['mensaje'];
                            unset($_SESSION['mensaje']);
                            unset($_SESSION['tm']);
                            echo "</h4>";
                          }
 ?>