<?php declare(strict_types=1);

$services = [
    ['name' => 'MariaDB', 'process' => 'mysql'],
    ['name' => 'Redis', 'process' => 'redis-server'],
    ['name' => 'Postfix', 'process' => 'postfix'],    
];

/**
 * @param string 
 * @return bool
 */
function check_proccess_run(string $name) : bool 
{
    exec("pgrep $name", $output, $return);
    return ($return == 0) ? true : false;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <title>Server status</title>
</head>
<body>
<?php
if(!empty($services)):
    foreach($services as $service):
?>
    <div>
        <strong><?php echo $service['name'];?></strong> is <?php echo (check_proccess_run($service['process'])) ? '<span style="color:green">running</span>' : '<span style="color:red">stoped</span>';?>
    </div>
<?php
    endforeach;
endif;
?>
</body>
</html>
