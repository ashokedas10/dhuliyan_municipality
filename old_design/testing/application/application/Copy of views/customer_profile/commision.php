<? $id=$this->session->userdata('id');	$name=$this->session->userdata('name');  $rank=$this->session->userdata('rank'); ?>
<?
$sql1="select comission,rank from tbl_agent_comm where rank=".$rank;
$sql2="select b.subcat_name,a.product_name,a.product_code,a.amount,a.agent_comm_amt from product a,subcategory b where a.subcat_id=b.id";
$list1=$this->projectmodel->get_records_from_sql($sql1);	
$list2=$this->projectmodel->get_records_from_sql($sql2);
?>


<div>
<table>
<tr>
<th width="127">Product id </th>
<th width="152">Product code </th>
<th width="115">Price</th>
<th width="129">Commision (%)  </th>
<th width="153">Commision Value</th>
</tr>

<div>
<?	
foreach ($list1 as $row1){  
	foreach ($list2 as $row2){  
		$commision=($row2->amount*$row1->comission)/100;		
?>
<tr>
<td ><? echo $row2->product_name; ?></td>
<td><? echo $row2->product_code; ?></td>
<td><? echo $row2->amount; ?></td>
<td><? echo $row1->comission; ?></td>
<td><? echo $commision; ?></td>
</tr>
<? } } ?>
</div>
</table>
</div>