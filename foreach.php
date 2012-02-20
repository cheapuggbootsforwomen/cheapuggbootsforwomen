<?php
$help =<<< EOS
Foreach -- Foreach every line of a string and do something
	Usage: Foreach <do something> [split regex pattern]
	split regex pattern default is "/\\r?\\n/"
	do something has some variable
	\$i index of line
	\$n line number
	\$l line content
	
	ie: C:\>dir /b|foreach "echo File \${n}: \$l\\n"
		File 1: Program Files
		File 2: Program Files (x86)
		File 3: Users
		File 4: Windows
EOS;
if(!isset($_SERVER['argv'][1])) die($help);
if(!isset($_SERVER['argv'][2])||empty($_SERVER['argv'][2])) $_SERVER['argv'][2] = '/\r?\n/';
$lines = preg_split($_SERVER['argv'][2],trim(file_get_contents('php://stdin')));
foreach($lines as $i => $l){
	$n = $i+1;
	system(eval('return "'.$_SERVER['argv'][1].'";'));
}