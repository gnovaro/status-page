<?php declare(strict_types=1);

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

<div>
    <strong>MySQL/MariaDB</strong> is <?php echo (check_proccess_run('mysql')) ? '<span style="color:green">running</span>' : '<span style="color:red">stoped</span>';?>
</div>

<div>
    <strong>Redis</strong> is <?php echo (check_proccess_run('redis-server')) ? '<span style="color:green">running</span>' : '<span style="color:red">stoped</span>';?>
</div>