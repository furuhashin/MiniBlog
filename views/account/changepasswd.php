<?php $this->setLayoutVar('title','パスワードの変更') ?>
<h2>パスワードの変更</h2>

<form action="<?php echo $base_url; ?>/account/changepasswd" method="post">
    <input type="hidden" name="_token" value="<?php echo $this->escape($_token); ?>" />

    <?php if (isset($errors) && count($errors) > 0): ?>
        <?php echo $this->render('errors',array('errors' => $errors)); ?>
    <?php endif; ?>

    <table>
        <tbody>
        <tr>
            <th>新しいパスワード</th>
            <td>
                <input type="password" name="password" value="<?php echo $this->escape($password); ?>" />
            </td>
        </tr>
        <tr>
            <th>再度入力してください</th>
            <td>
                <input type="password" name="password1" value="<?php echo $this->escape($password1); ?>" />
            </td>
        </tr>
        </tbody>
    </table>

    <p>
        <input type="submit" value="パスワードを変更する" />
    </p>
</form>


