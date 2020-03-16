<div>
<table>
<tr>
<th width="135">Purchase Id</th>
<th width="194">Purchase Date Time</th>
<th width="163">Product </th>
<th width="103">Quantity</th>
<th width="105">Price</th>
</tr>

<? $id=$this->session->userdata('id');	$name=$this->session->userdata('name'); ?>
<?
				$sql1="SELECT a.purchase_id,a.pur_date,c.product_name,c.product_code,b.quantity,b.grand_total
				FROM purchase_summary a,purchase_details b,product c where b.purchase_id=a.id and a.custid='$id' and c.id=b.product_id order by a.pur_date,a.purchase_id "; 
				$list=$this->projectmodel->get_records_from_sql($sql1);	
				foreach ($list as $row){  
?>
<tr>
<td><? echo $row->purchase_id;?></td>
<td><? echo $row->pur_date;?></td>
<td><? echo $row->product_name.' '.$row->product_code;?></td>
<td><? echo $row->quantity;?></td>
<td><? echo $row->grand_total;?></td>
</tr>
<? } ?>
</table>
</div>
