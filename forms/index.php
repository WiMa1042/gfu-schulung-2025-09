<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
echo '<pre>' .print_r($_GET, true).'</pre>';
?>
<div class="connect-form">
    <?php
    if(filter_has_var(INPUT_GET, 'errors')){
        $errors = filter_input(INPUT_GET, 'errors', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    }
    ?>
    <h1>Kontaktformular</h1>
    <form action="submit.php" method="post">
        <table class="connect-form-table">
            <tr <?php if(isset($errors['first_name'])){ echo 'class="error"';}?>>
                <td class="text"  id="first-name-text" ><label for="first-name">Vorname:</label></td>
                <td>
                    <input type="text" class="oneline-input" name="vorname" id="first-name" value="<?php echo filter_input(INPUT_GET,'first_name');?>" />
                    <?php
                         if(isset($errors['first_name'])){
                             echo '<span class="error-box">'. htmlspecialchars($errors['first_name']).'</span>';
                         }
                    ?>
                </td>
            </tr>
            <tr <?php if(isset($errors['last_name'])){ echo 'class="error"';}?>>
                <td class="text"><label for="last-name">Nachname:</label></td>
                <td>
                    <input type="text" class="oneline-input" name="nachname" id="last-name" value="<?php echo filter_input(INPUT_GET,'last_name');?>"/>
                    <?php
                    if(isset($errors['last_name'])){
                        echo '<span class="error-box">'. htmlspecialchars($errors['last_name']).'</span>';
                    }
                    ?>
                </td>
            </tr>
            <tr <?php if(isset($errors['email'])){ echo 'class="error"';}?>>
                <td class="text"><label for="mail">E-Mail:</label></td>
                <td>
                    <input type="text" class="oneline-input" name="email" id="mail" value="<?php echo filter_input(INPUT_GET,'email');?>"/>
                    <?php
                    if(isset($errors['email'])){
                        echo '<span class="error-box">'. htmlspecialchars($errors['email']).'</span>';
                    }
                    ?>
                </td>
            </tr>
            <tr <?php if(isset($errors['message'])){ echo 'class="error"';}?>>
                <td class="text"><label for="msg">Nachricht:</label></td>
                <td>
                    <textarea name="nachricht" id="msg"><?php echo filter_input(INPUT_GET,'message');?></textarea>
                    <?php
                    if(isset($errors['message'])){
                        echo '<span class="error-box">'. htmlspecialchars($errors['message']).'</span>';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Absenden" id="submit-btn"  /></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
