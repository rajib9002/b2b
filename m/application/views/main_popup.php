<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include_once 'shared/html_header.php'; ?>
    <body> 
        <?php
        if ($dir == '') {
            $dir = 'home';
        }
        if ($page == '') {
            $page = 'index';
        }
        include_once $dir . '/' . $page . '.php';
        ?>
    </body>
</html>