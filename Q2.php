<?php
$pythonScript = 'Script.py';
$pythonScript = escapeshellcmd($pythonScript);
$command = "python $pythonScript";
$output = shell_exec($command);
if ($output !== null) {
     echo $output;
} else {
echo "Error executing Python script.\n";
}
?>