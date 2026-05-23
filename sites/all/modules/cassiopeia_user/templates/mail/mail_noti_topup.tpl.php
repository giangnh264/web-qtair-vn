<?php
global $user;
$data = $variables['data_topup'];
$tran_user_query = db_select("field_data_field_account_code","field_data_AG");
$tran_user_query -> fields("field_data_AG");
$tran_user_query->condition("entity_id", $data->uid,'=');
$datafill = $tran_user_query->execute()->fetchAssoc();
$dataBankquery = db_select("field_data_field_code","field_data_bank");
$dataBankquery -> fields("field_data_bank");
$dataBankquery->condition("entity_id",$data ->bank);
$dataBank = $dataBankquery->execute()->fetchAssoc();
?>
 <table width="100%" style="background: #E2E2E2;border-bottom: 3px solid #f3f3f3;">
<tbody>
<tr>
	<td valign="middle" style="width: 100px; padding: 5px ">Thời gian tạo: </td>
	<td style="padding:5px;"><b style="color:#2173F3;"><?php echo date("d/m/Y H:i",$data ->created);?></b></td>
</tr>
<tr>
	<td valign="middle" style="width: 100px; padding: 5px ">Mã đại lý: </td>
	<td style="padding:5px;"><b style="color:#2173F3;"><?php echo $datafill[field_account_code_value];?></b></td>
</tr>
<tr>
	<td valign="middle" style="width: 100px; padding: 5px ">Số tiền: </td>
	<td style="padding:5px;"><b style="color:#2173F3;"><?php echo number_format($data->amount,0,",",".");?></b></td>
</tr>
<tr>
	<td valign="middle" style="width: 100px; padding: 5px ">Ngân hàng: </td>
	<td style="padding:5px;"><b style="color:#2173F3;"><?php echo $dataBank[field_code_value];?></b></td>
</tr>
<tr>
	<td valign="middle" style="width: 100px; padding: 5px ">Nội dung: </td>
	<td style="padding:5px;"><b style="color:#2173F3;"><?php echo($data ->note);?></b></td>
</tr>
</tbody>
</table>