<?php
    include './Core/Core.php';
    $POST = $_POST;
    $Core = new Core();
?>
<html>
<head>
    <title>HashDictionary</title>
</head>
    <fieldset>
        <legend>Encrypt</legend>
        <div class="encrypt">
            <form method="post">
                <label for="word-encrypt">Type a Word: </label>
                <input type="text" id="word-encrypt" name="word-encrypt">
                <button type="submit" name="send-encrypt">HaSh</button>
            </form>
            <?php
                if($POST) {
                    if (isset($POST['send-encrypt'])) {
                        if (empty($POST['word-encrypt'])){
                            echo "<p style='color: red'>Type a Word!!!!<p></p>";
                        } else{
                            $word = strtolower($POST['word-encrypt']);
                            for ($i = 0; $i < strlen($word); $i++) {
                                for ($j = 0; $j < count($Core->hashAlphabet); $j++) {
                                    if (md5($word[$i]) == $Core->hashAlphabet[$j]) {
                                        echo $Core->alphabet[$j], " - ", $Core->hashAlphabet[$j], "<br>";
                                    }
                                }
                            }
                        }
                    }
                }
            ?>
        </div>
    </fieldset>
    <fieldset>
        <legend>Decrypt</legend>
        <form method="post">
            <label for="word-decrypt">Type a Hash: </label>
            <input type="text" id="word-decrypt" name="word-decrypt">
            <button type="submit" name="send-decrypt">DeCrYpt</button>
            <?php
                if($POST){
                    if(isset($POST['send-decrypt'])){
                        if(empty($POST['word-decrypt'])){
                            echo "<p style='color: red'>Type a Word!!!!<p></p>";
                        }else{
                            $word = strtolower($POST['word-decrypt']);
                            for($i = 0; $i < strlen($word); $i++){
                                for($j = 0; $j < count($Core->alphabet); $j++){
                                    if($word == $Core->hashAlphabet[$j]){
                                        echo $Core->alphabet[$j];
                                    }
                                }
                            }
                        }
                    }
                }
            ?>
        </form>
    </fieldset>
</html>
