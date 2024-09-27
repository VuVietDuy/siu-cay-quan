<?php
class BaseController {
    protected function render($view, $data = [])
    {
        /*
        Mảng data muốn truyền đến view
        Imports variables into the local symbol table from a array
        This function uses array keys as variable name and values as variable values.
        */
        extract($data);

        /*
        The `include` (or `require`) statement takes all the text/code/markup that exists in the specified file and copies it into the file that uses the include statement

        */
        
        ob_start();
        include "views/$view.php";
        $content = ob_get_clean();


        include('views/layouts/application.php');
    }
}
?>