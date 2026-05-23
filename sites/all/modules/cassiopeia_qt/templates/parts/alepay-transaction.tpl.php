<?php _print_r($transaction); ?>
<table class="table table-hover table-stripped">
    <tr>
        <td>Mã giao dịch:</td>
        <td><?php echo $transaction->transactionCode; ?></td>
    </tr>
    <tr>
        <td>Mã giao dịch:</td>
        <td><?php echo $transaction->transactionCode; ?></td>
    </tr>
    <tr>
        <td>Tình trạng:</td>
        <td><?php echo $transaction->errorCode==0?"Thành công":"Thất bại"; ?></td>
    </tr>
</table>
