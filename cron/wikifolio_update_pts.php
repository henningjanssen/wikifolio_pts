<?php
	/* (c) Henning Janßen */
	$FContent = file_get_contents("URLs");
	$Class = "total-underlying-sum";
	$Points = "";
	$Linefeed = "\n";
	$Seperator = ";";
	$UserSites = array();
	
	$Cont = explode($Linefeed, str_replace("\r\n", "\n", $FContent));
	foreach($Cont as $C)
	{
		if(!!strpos($C, $Seperator))
		{
			$Name = substr($C, 0, strpos($C, $Seperator));
			$UserSites[$Name] = substr($C, strpos($C, $Seperator)+1);
		}
	}
	
	foreach($UserSites as $Name => $Site)
	{
            $Content = file_get_contents($Site);
            $Begin = strpos($Content, ">", strpos($Content, $Class)) + 1;
            if(!!$Begin)
            {
                $End = strpos($Content, "<", $Begin);
                $Points .= $Name.$Seperator.str_replace(array(" ", "\r\n", $Linefeed), "", substr($Content, $Begin, $End-$Begin)).$Linefeed;
            }
	}
	file_put_contents(__DIR__."/total.pts", $Points);