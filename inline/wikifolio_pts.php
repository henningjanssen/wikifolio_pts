<?php
    /* (c) Henning Janßen */

    //$UserSites-Example:
    /*$UserSites = array(
            "Peter"=>"http://www.wikifolio.com/de/FADING",
            "Hans" => "http://www.wikifolio.com/de/FADING"
    );*/
    /* Return:
            array(
                    "Hans" => 3.111.255,
                    "Peter" => 5
            );
    */
    function wikifolio_get_points($UserSites)
    {
            if(!is_array($UserSites))
            {
                    return false;
            }

            $Points = array();
            $Class = "total-underlying-sum";

            foreach($UserSites as $Name => $Site)
            {
                    $Content = file_get_contents($Site);
                    $Begin = strpos($Content, ">", strpos($Content, $Class)) + 1;
                    if(!!$Begin)
                    {
                            $End = strpos($Content, "<", $Begin);
                            $Points[$Name] = str_replace(" ", "", substr($Content, $Begin, ($End-$Begin)));
                    }
            }
            return $Points;
    }