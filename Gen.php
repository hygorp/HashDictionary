<?php
    include './Core/Core.php';
    $POST = $_POST;
?>
<html>
<head>
    <title>HashDictionary</title>
</head>
    <fieldset>
        <legend>Encrypt</legend>
        <div class="encrypt">
            <form method="post">
                <label for="word-encrypt">Type Word: </label>
                <input type="text" id="word-encrypt" name="word-encrypt">
                <button type="submit" name="send-encrypt">HaSh</button>
            </form>
            <?php
                if($POST){
                    if(isset($POST['send-encrypt'])){
                        if(empty($POST['word-encrypt'])){
                            echo "<p style='color: red'>Type a Word!!!!<p></p>";
                        }else{
                            $Core = new Core();
                            $word = $POST['word-encrypt'];

                            for($i = 0; $i < strlen($word); $i++){
                                for($j = 0; $j < count($Core->hashAlphabet); $j++){
                                    if(md5($word[$i]) == $Core->hashAlphabet[$j]){
                                        echo $Core->alphabet[$j]," - ", $Core->hashAlphabet[$j], "<br>";
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
            <label for="word-decrypt">Type a Word</label>
            <input type="text" id="word-decrypt" name="word-decrypt">
            <button type="submit" name="send-decrypt">HaSh</button>
        </form>
    </fieldset>
</html>
