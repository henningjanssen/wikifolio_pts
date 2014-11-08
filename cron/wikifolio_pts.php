<?php
    /* (c) Henning Janßen */

    function wikifolio_pts_get($Seperator = ";", $Linefeed = "\n")
    {
            if(!file_exists(__DIR__."/total.pts"))
            {
                    return false;
            }
            $Cont = file_get_contents(__DIR__."/total.pts");
            $Points = array();
            foreach(explode($Linefeed, $Cont) as $C)
            {
                    if(!!strpos($C, $Seperator))
                    {
                            $Points[substr($C, 0, strpos($C, $Seperator))] = substr($C, strpos($C, $Seperator)+1);
                    }
            }
            return count($Points) > 0 ? $Points : false;
    }