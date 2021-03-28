<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css"
          type="text/css" rel="stylesheet"/>
</head>

<?php
$is_form_filled=FALSE;
if (isset($_REQUEST["name"]) and (isset($_REQUEST["section"])) and (isset($_REQUEST['card_number'])) and (isset($_REQUEST['card_type']))) {

    if (($_REQUEST['name'] != "") and ($_REQUEST["section"] != "") and ($_REQUEST['card_number'] != "") and ($_REQUEST['card_type'] != " ")){

        $file = 'suckers.txt';
        $content = file($file);
        $name = $_REQUEST['name'];
        $section = $_REQUEST['section'];
        $card_n = $_REQUEST['card_number'];
        $card_t = $_REQUEST['card_type'];
        $is_form_filled = TRUE;

        if ($is_form_filled == TRUE){

        $data = $_REQUEST["name"] . ";" . $_REQUEST["section"] . ";" . $_REQUEST["card_number"] . ";" . $_REQUEST["card_type"] . "\n";
        $f = fopen('suckers.txt', 'a');
        fwrite($f, $data);
        fclose($f);
}
?>
<body>
<h1>Thanks, sucker!</h1>

<p>Your information has been recorded.</p>

<dl>
    <dt>Name</dt>
    <dd><?= $_REQUEST["name"] ?></dd>

    <dt>Section</dt>
    <dd><?= $_REQUEST["section"] ?></dd>

    <dt>Credit Card</dt>
    <dd><?= $_REQUEST["card_number"] ?> (<?=$_REQUEST["card_type"]?>)</dd>
</dl>

<pre>
    <h2>Here are all suckers:</h2>
    <?= file_get_contents("suckers.txt"); ?>
</pre>

<?php } else {
    ?>
    <h1>Sorry</h1>
    <h3>There is already same data. <a href="buyagrade.html">Please try again</a></h3>
<?php }
} else { ?>

    <h1>Sorry</h1>
    <h3>Not all info were completed. <a href="buyagrade.html">Please try again</a></h3>
    <?php } ?>

</body>

</html>