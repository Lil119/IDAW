<?php
            function convert_format_date ($date)
            {
                $tab_date=explode("/",$date);
                $tab_date[2]="20".$tab_date[2];
                return $tab_date[0]."-".$tab_date[1]."-".$tab_date[2];
            }
            echo convert_format_date(date("d/m/y"))."<br>";

            function convert_format_heure ($heure,$min)
            {
                return (String)((int)$heure + 2)."H".$min;
            }
            echo convert_format_heure(date("H"),date("i"))."<br>";

            $tab = array(1,2,3,4,5,6);
            function avg ($tab){
                $sum=0;
                for( $i = 0 ; $i<count($tab) ; $i++){
                    $sum+=$tab[$i];
                }
                return $sum/count($tab);
            }
            echo "moyenne = ".avg($tab)."<br>";

?>