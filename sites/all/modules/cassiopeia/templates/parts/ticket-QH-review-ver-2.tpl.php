<?php
$html = $variables['html'];
$TotalPrice = $variables['TotalPrice'];
print($html);
?>
<?php

?>
<table>
    <tbody>
        <tr>
            <td><b>Tổng tiền:</b> </td>
            <td><?php echo number_format($TotalPrice,0,",",".") ?> đ</td>
        </tr>
    </tbody>
</table>
