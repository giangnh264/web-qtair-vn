<?php
$account = $variables['account'];
$pass = $variables['pass'];
?>
<table>
    <tr>
        <td>Mã đại lý:</td>
        <td><?php print($account->field_account_code['und'][0]['value']); ?></td>
    </tr>
    <tr>
        <td>Số điện thoại:</td>
        <td>".$account->name."</td>
    </tr>
    <tr>
        <td>Mật khẩu:</td>
        <td>".$pass."</td>
    </tr>
</table>";