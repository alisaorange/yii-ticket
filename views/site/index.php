<?php

/** @var yii\web\View $this */

$this->title = 'Kolosova Alisa';
?>
<h2>Lucky ticket</h2>
<p id="error">Only numbers. Exactly 6 characters long</p>

<form>
    <label for="min">N - from</label><br>
    <input minlength="6" maxlength="6" min="1" max="999999" type="number" id="min" name="min" placeholder="000001"><br>
    <label for="max">N - to</label><br>
    <input minlength="6" maxlength="6" min="1" max="999999" type="number" id="max" name="max" placeholder="999999"><br><br>
    <input onclick="calculate()" type="button" value="RUN">
</form>

<p>Number of tickets: <span id="result">XXX</span></p>
