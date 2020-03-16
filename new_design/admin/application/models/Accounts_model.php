<?php
class Accounts_model extends CI_Model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('general_library');
    }
//Ledger Transaction

function get_ledger_id($ref_table_id='',$ref_table_name='')
 {
 		$ledger_account_header=0;	
		$sql_led="select * 	from acc_group_ledgers where
		ref_table_name='".$ref_table_name."' and  ref_table_id=".$ref_table_id;			
		$rowledgers = $this->projectmodel->get_records_from_sql($sql_led);	
		foreach ($rowledgers as $rowledger)
		{ return $ledger_account_header=$rowledger->id; }
 
 }
 
function acc_tran_details($acc_tran_header_id='',$cr_ledger_account='',$dr_ledger_account='',$amount='',$matching_tran_id=1)
 {
 		    
			$save_dtl['acc_tran_header_id']=$acc_tran_header_id;
			$save_dtl['cr_ledger_account']=$cr_ledger_account;
			$save_dtl['dr_ledger_account']=$dr_ledger_account;
			$save_dtl['amount']=$amount;
			$save_dtl['matching_tran_id']=$matching_tran_id;
			
			$this->projectmodel->save_records_model('','acc_tran_details',$save_dtl);
			return $this->db->insert_id();
 
 }
 
 function ledger_transactions_delete($tran_table_id='',$TRAN_TYPE='')
 {
 		 
			if($TRAN_TYPE=='SALE' or $TRAN_TYPE=='PURCHASE' or $TRAN_TYPE=='PURCHASE_RTN' )//sell invoice section
			{
				
				   $acc_tran_details_id=$acc_tran_header_id=0;

					$sql_led="select * 	from acc_tran_header where
					tran_table_name='invoice_summary' and  
					tran_table_id=".$tran_table_id;			
					$rowledgers = $this->projectmodel->get_records_from_sql($sql_led);	
					foreach ($rowledgers as $rowledger)
					{ $acc_tran_header_id=$rowledger->id; }

					$sql_led="select * 	from acc_tran_details where
					acc_tran_header_id=".$acc_tran_header_id;			
					$rowledgers = $this->projectmodel->get_records_from_sql($sql_led);	
					foreach ($rowledgers as $rowledger)
					{ $acc_tran_details_id= $acc_tran_details_id.','.$rowledger->id; }
				
					$sql="delete from acc_tran_details_details  
					where acc_tran_details_id in (".$acc_tran_details_id.") ";
					$this->db->query($sql);

					$sql="delete from acc_tran_details  
					where acc_tran_header_id=".$acc_tran_header_id;
					$this->db->query($sql);
					
					$sql="delete from acc_tran_header  where id=".$acc_tran_header_id;
					$this->db->query($sql);
				
			}
			
			
 }

 function acc_tran_details_details($acc_tran_details_id,$TABLE_NAME,$TABLE_ID,$BILL_INSTRUMENT_NO,$AMOUNT,$STATUS,$OPERATION_TYPE)
 {

	$save_hdr['acc_tran_details_id']=$acc_tran_details_id;
	$save_hdr['TABLE_NAME']=$TABLE_NAME;
	$save_hdr['TABLE_ID']=$TABLE_ID;
	$save_hdr['BILL_INSTRUMENT_NO']=$BILL_INSTRUMENT_NO;
	$save_hdr['AMOUNT']=$AMOUNT;
	$save_hdr['STATUS']=$STATUS;
	$save_hdr['OPERATION_TYPE']=$OPERATION_TYPE;

	$this->projectmodel->save_records_model('','acc_tran_details_details',$save_hdr);

 }

function ledger_transactions($tran_table_id='',$TRAN_TYPE='')
 {
	$acc_tran_details_id=0;

	if($TRAN_TYPE=='SALE')//sell invoice section
	{	
		$this->ledger_transactions_delete($tran_table_id,$TRAN_TYPE);
		
		$save_hdr['tran_table_name']='invoice_summary';
		$save_hdr['tran_table_id']=$tran_table_id;
		
		$sqlfld="SELECT * FROM  invoice_summary where id=".$tran_table_id; 
		$fields = $this->projectmodel->get_records_from_sql($sqlfld);	
		foreach ($fields as $field)
		{	
			$tbl_party_id=$save_hdr['ledger_account_header']=$field->tbl_party_id;
			$save_hdr['tran_date']=$field->invoice_date;
			$save_hdr['tran_code']=$field->invoice_no;
			$save_hdr['TRAN_TYPE']='SALE';
			$AMOUNT=$field->grandtot;

			$this->projectmodel->save_records_model('','acc_tran_header',$save_hdr);
			$id_header=$this->db->insert_id();
			
			//DETAILS OF TRANSACTIONS
			$matching_tran_id=1;
			$amount=$field->total_amt-$field->tot_discount-$field->tot_cash_discount;
			$cr_ledger_account=323; //sales a/c
			$dr_ledger_account=$tbl_party_id; //stockist a/c sundry debtors
			if($amount>0)
			{
			$this->acc_tran_details($id_header,$cr_ledger_account,0,$amount,$matching_tran_id);
			$acc_tran_details_id=$this->acc_tran_details($id_header,0,$dr_ledger_account,$amount,$matching_tran_id);

			$this->acc_tran_details_details($acc_tran_details_id,$save_hdr['tran_table_name'],$save_hdr['tran_table_id'],$save_hdr['tran_code'],
			$AMOUNT,$save_hdr['TRAN_TYPE'],'PLUS');
			}
			
			$matching_tran_id=$matching_tran_id+1;			
			$amount=$field->interest_charge;
			$cr_ledger_account=95; //Interest Receive
			$dr_ledger_account=$tbl_party_id; //stockist a/c sundry debtors
			if($amount>0)
			{
			$this->acc_tran_details($id_header,$cr_ledger_account,0,$amount,$matching_tran_id);
			$this->acc_tran_details($id_header,0,$dr_ledger_account,$amount,$matching_tran_id);
			}
			
			$matching_tran_id=$matching_tran_id+1;					
			$amount=$field->freight_charge;
			$dr_ledger_account=94; //Freight Charge
			$cr_ledger_account=$tbl_party_id; //stockist a/c sundry debtors
			if($amount>0)
			{
			$this->acc_tran_details($id_header,$cr_ledger_account,0,$amount,$matching_tran_id);
			$this->acc_tran_details($id_header,0,$dr_ledger_account,$amount,$matching_tran_id);
			}
			

			$doc_commission=0;
			$records="SELECT sum(taxable_amt*doctor_commission_percentage/100) doc_commission FROM  invoice_details where  	invoice_summary_id=".$tran_table_id; 
			$records = $this->projectmodel->get_records_from_sql($records);	
			foreach ($records as $record)
			{$doc_commission=$record->doc_commission;}
				
			$amount=$doc_commission;
			$matching_tran_id=$matching_tran_id+1;				
			$dr_ledger_account=1814; //DOCTOR COMMISSION LEDGER
			$cr_ledger_account=$field->doctor_ledger_id; //DOCTOR LEDGER
			if($amount>0)
			{
			$this->acc_tran_details($id_header,$cr_ledger_account,0,$amount,$matching_tran_id);
			$this->acc_tran_details($id_header,0,$dr_ledger_account,$amount,$matching_tran_id);
			}

			//TAX SECTION
			$sql_vatper="select distinct(tax_ledger_id) tax_ledger_id
			from invoice_details where invoice_summary_id=".$tran_table_id."  ";
			$rowsql_vatper = $this->projectmodel->get_records_from_sql($sql_vatper);	
			foreach ($rowsql_vatper as $rows_vatper)
			{ 
				$tax_ledger_id=$rows_vatper->tax_ledger_id;	
				
				$taxamt=0;	
				$sql_vatamt="select sum(taxamt) taxamt
				from invoice_details where invoice_summary_id=".$tran_table_id." 
				and  tax_ledger_id=".$tax_ledger_id;
				$rowsql_vatamt = $this->projectmodel->get_records_from_sql($sql_vatamt);	
				foreach ($rowsql_vatamt as $rows_vatamt)
				{$taxamt=$rows_vatamt->taxamt;}
				
				$matching_tran_id=$matching_tran_id+1;		
				$amount=$taxamt;
				$dr_ledger_account=$tbl_party_id;
				$cr_ledger_account=$tax_ledger_id; 								
				if($amount>0)
				{
				$this->acc_tran_details($id_header,$cr_ledger_account,0,$amount,$matching_tran_id);
				$this->acc_tran_details($id_header,0,$dr_ledger_account,$amount,$matching_tran_id);
				}
			}
		
		
		}
	}
	//sell invoice section end
	
	//PURCHASE SECTION	
	if($TRAN_TYPE=='PURCHASE')//sell invoice section
	{	
		$this->ledger_transactions_delete($tran_table_id,$TRAN_TYPE);
		
		$save_hdr['tran_table_name']='invoice_summary';
		$save_hdr['tran_table_id']=$tran_table_id;
		
		$sqlfld="SELECT * FROM  invoice_summary where id=".$tran_table_id; 
		$fields = $this->projectmodel->get_records_from_sql($sqlfld);	
		foreach ($fields as $field)
		{				
			$tbl_party_id=$save_hdr['ledger_account_header']=$field->tbl_party_id;
			$save_hdr['tran_date']=$field->invoice_date;
			$save_hdr['tran_code']=$field->invoice_no;
			$save_hdr['TRAN_TYPE']='PURCHASE';
			$AMOUNT=$field->grandtot;

			$this->projectmodel->save_records_model('','acc_tran_header',$save_hdr);
			$id_header=$this->db->insert_id();
						
			//DETAILS OF TRANSACTIONS
			$matching_tran_id=0;
			$matching_tran_id=$matching_tran_id+1;		
			$amount=$field->total_amt-$field->tot_cash_discount-$field->tot_discount;
			$dr_ledger_account=322; //purchase ledger
			$cr_ledger_account=$tbl_party_id; // a/c sundry creditor
			if($amount>0)
			{
			
			$acc_tran_details_id=$this->acc_tran_details($id_header,$cr_ledger_account,0,$amount,$matching_tran_id);			
			$this->acc_tran_details_details($acc_tran_details_id,$save_hdr['tran_table_name'],$save_hdr['tran_table_id'],$save_hdr['tran_code'],
			$AMOUNT,$save_hdr['TRAN_TYPE'],'PLUS');

			$this->acc_tran_details($id_header,0,$dr_ledger_account,$amount,$matching_tran_id);
			}
			
			//TAX SECTION
			$sql_vatper="select distinct(tax_ledger_id) tax_ledger_id
			from invoice_details where invoice_summary_id=".$tran_table_id."  ";
			$rowsql_vatper = $this->projectmodel->get_records_from_sql($sql_vatper);	
			foreach ($rowsql_vatper as $rows_vatper)
			{ 
				$tax_ledger_id=$rows_vatper->tax_ledger_id;	
				
				$taxamt=0;	
				$sql_vatamt="select sum(taxamt) taxamt
				from invoice_details where invoice_summary_id=".$tran_table_id." 
				and  tax_ledger_id=".$tax_ledger_id;
				$rowsql_vatamt = $this->projectmodel->get_records_from_sql($sql_vatamt);	
				foreach ($rowsql_vatamt as $rows_vatamt)
				{$taxamt=$rows_vatamt->taxamt;}
				
				$matching_tran_id=$matching_tran_id+1;		
				$amount=$taxamt;
				$cr_ledger_account=$tbl_party_id;
				$dr_ledger_account=$tax_ledger_id; 								
				if($amount>0)
				{
				$this->acc_tran_details($id_header,$cr_ledger_account,0,$amount,$matching_tran_id);
				$this->acc_tran_details($id_header,0,$dr_ledger_account,$amount,$matching_tran_id);
				}
			}
			
		}
		
	}
	//PURCHASE SECTION END
	
	//PURCHASE SECTION	
	if($TRAN_TYPE=='PURCHASE_RTN')//sell invoice section
	{	
		$this->ledger_transactions_delete($tran_table_id,$TRAN_TYPE);
		
		$save_hdr['tran_table_name']='invoice_summary';
		$save_hdr['tran_table_id']=$tran_table_id;
		
		$sqlfld="SELECT * FROM  invoice_summary where id=".$tran_table_id; 
		$fields = $this->projectmodel->get_records_from_sql($sqlfld);	
		foreach ($fields as $field)
		{				
			$tbl_party_id=$save_hdr['ledger_account_header']=$field->tbl_party_id;
			$save_hdr['tran_date']=$field->invoice_date;
			$save_hdr['tran_code']=$field->invoice_no;
			$save_hdr['TRAN_TYPE']='PURCHASE_RTN';
			$AMOUNT=$field->grandtot;

			$this->projectmodel->save_records_model('','acc_tran_header',$save_hdr);
			$id_header=$this->db->insert_id();
						
			//DETAILS OF TRANSACTIONS
			$matching_tran_id=0;
			$amount=$field->total_amt-$field->tot_cash_discount-$field->tot_discount;
			$dr_ledger_account=322; //purchase ledger
			$cr_ledger_account=$tbl_party_id; // a/c sundry creditor
			if($amount>0)
			{
				$acc_tran_details_id=$this->acc_tran_details($id_header,$cr_ledger_account,0,$amount,$matching_tran_id);
				
				// $this->acc_tran_details_details($acc_tran_details_id,$save_hdr['tran_table_name'],$save_hdr['tran_table_id'],$save_hdr['tran_code'],
				// $AMOUNT,$save_hdr['TRAN_TYPE'],'MINUS');

				$this->acc_tran_details($id_header,0,$dr_ledger_account,$amount,$matching_tran_id);
			}
			
			//TAX SECTION
			$sql_vatper="select distinct(tax_ledger_id) tax_ledger_id
			from invoice_details where invoice_summary_id=".$tran_table_id."  ";
			$rowsql_vatper = $this->projectmodel->get_records_from_sql($sql_vatper);	
			foreach ($rowsql_vatper as $rows_vatper)
			{ 
				$tax_ledger_id=$rows_vatper->tax_ledger_id;	
				
				$taxamt=0;	
				$sql_vatamt="select sum(taxamt) taxamt
				from invoice_details where invoice_summary_id=".$tran_table_id." 
				and  tax_ledger_id=".$tax_ledger_id;
				$rowsql_vatamt = $this->projectmodel->get_records_from_sql($sql_vatamt);	
				foreach ($rowsql_vatamt as $rows_vatamt)
				{$taxamt=$rows_vatamt->taxamt;}
				
				$amount=$taxamt;
				$cr_ledger_account=$tbl_party_id;
				$dr_ledger_account=$tax_ledger_id; 								
				if($amount>0)
				{
				$matching_tran_id=$matching_tran_id+1;
				$this->acc_tran_details($id_header,$cr_ledger_account,0,$amount,$matching_tran_id);
				$this->acc_tran_details($id_header,0,$dr_ledger_account,$amount,$matching_tran_id);
				}
			}
			
		}
		
	}
	//PURCHASE SECTION END

	
}

function bill_wise_outstanding($TABLE_NAME='',$TABLE_ID='',$status='')
{
	
	$tot_due=$plus_amt=$minus_amt=0;

	$balancesheets="select sum(AMOUNT) plus_amt from acc_tran_details_details 
	where  TABLE_NAME='".$TABLE_NAME."' AND TABLE_ID='".$TABLE_ID."' and OPERATION_TYPE='PLUS' ";
	$balancesheets =$this->projectmodel->get_records_from_sql($balancesheets);
	foreach ($balancesheets as $balancesheet)
	{$plus_amt=$balancesheet->plus_amt;}

	$balancesheets="select sum(AMOUNT) minus_amt from acc_tran_details_details 
	where  TABLE_NAME='".$TABLE_NAME."' AND TABLE_ID='".$TABLE_ID."' and OPERATION_TYPE='MINUS' ";
	$balancesheets =$this->projectmodel->get_records_from_sql($balancesheets);
	foreach ($balancesheets as $balancesheet)
	{$minus_amt=$balancesheet->minus_amt;}

	$tot_due=$plus_amt-$minus_amt;

	if($status=='PLUS'){$tot_due=$plus_amt;}
	if($status=='MINUS'){$tot_due=$minus_amt;}

	return $tot_due;


}

function ledger_opening_balance($ledger_ac='',$from_date='',$ac_tran_type='CR')
{
	
	$FINAL_AC_TYPE='NA';
	$parent_id=0;
	
	$balancesheets="select * from acc_group_ledgers 
	where  id=".$ledger_ac." AND status='ACTIVE' order by acc_name";
	$balancesheets =$this->projectmodel->get_records_from_sql($balancesheets);
	foreach ($balancesheets as $balancesheet)
	{$parent_id=$balancesheet->parent_id;}
	
	$balancesheets="select * from acc_group_ledgers 
	where  id=".$parent_id." AND status='ACTIVE' order by acc_name";
	$balancesheets =$this->projectmodel->get_records_from_sql($balancesheets);
	foreach ($balancesheets as $balancesheet)
	{$FINAL_AC_TYPE=$balancesheet->FINAL_AC_TYPE;}
	
	
	$finyr=$this->general_library->get_fin_yr_yyyy($from_date);
	$finyr_start_date=substr($finyr,0,4).'-04-01';
	
	$cr_open_balance=$dr_open_balance=$TRAN_TYPE='CR';
	$OB_AMT=0;
	$sqlinv="select * from acc_group_ledgers where id=".$ledger_ac ;
	$ledger_names=$this->projectmodel->get_records_from_sql($sqlinv);
	foreach ($ledger_names as $ledger_name)
	{
		$TRAN_TYPE=$ledger_name->TRAN_TYPE;
		$OB_AMT=$ledger_name->OB_AMT;
	}
	if($TRAN_TYPE=='CR')
	{  
	   $cr_open_balance=$OB_AMT;
	   $dr_open_balance=0; 
	}
	else
	{    
		$cr_open_balance=0;
		$dr_open_balance=$OB_AMT;
	}

	if($FINAL_AC_TYPE<>'BALANCE_SHEET')
	{$cr_open_balance=$dr_open_balance=0;}
	
	$from_date=$this->general_library->get_date($from_date,-1,0,0);
	
	if($finyr_start_date>$from_date)
	{$from_date=$finyr_start_date;}
	
	//echo $FINAL_AC_TYPE;
	
	  $sqlinv="select sum(b.amount) amount
	from acc_tran_header a,acc_tran_details b 
	where a.id=b.acc_tran_header_id 
	and a.tran_date>='".$finyr_start_date."' and  a.tran_date<='".$from_date."' and b.cr_ledger_account=".$ledger_ac." ";
	$cr_ledger_accounts =$this->projectmodel->get_records_from_sql($sqlinv);
	foreach ($cr_ledger_accounts as $cr_ledger_account)
	{$cr_open_balance=$cr_open_balance+$cr_ledger_account->amount;}		
	
	  $sqlinv="select sum(b.amount) amount
	from acc_tran_header a,acc_tran_details b 
	where a.id=b.acc_tran_header_id 
	and a.tran_date>='".$finyr_start_date."' and  a.tran_date<='".$from_date."' and b.dr_ledger_account=".$ledger_ac." ";
	$cr_ledger_accounts =$this->projectmodel->get_records_from_sql($sqlinv);
	foreach ($cr_ledger_accounts as $cr_ledger_account)
	{$dr_open_balance=$dr_open_balance+$cr_ledger_account->amount;}		
	
	if($cr_open_balance<=$dr_open_balance)
	{
		$dr_open_balance=$dr_open_balance-$cr_open_balance;
		$cr_open_balance=0;
	}
	else
	{
		$cr_open_balance=$cr_open_balance-$dr_open_balance;
		$dr_open_balance=0;
	}
	
	
	
	
	if($ac_tran_type=='CR')
	{return $cr_open_balance;}
	else
	{return $dr_open_balance;}
	

}


function bill_wise_due($invoice_id='')
{
	$tot_payment=0;	
	$balancesheets="select sum(AMOUNT) tot_payment from acc_tran_details_details where  bill_id=".$invoice_id." ";
	$balancesheets =$this->projectmodel->get_records_from_sql($balancesheets);
	foreach ($balancesheets as $balancesheet)
	{$tot_payment=$balancesheet->tot_payment;}
	
	return $tot_payment;
}


function ledger_master_create($ref_table_name='',$ref_table_id='',$parent_id='',$TRAN_TYPE='')
{
	//TALLY LEDGER MASTER DETAILS	
	//https://teachoo.com/725/228/Tally-Ledger-Groups-List-(Ledger-under-Which-Head-or-Group-in-Accounts)/category/Ledger-Creation-and-Alteration/
	
	
			$id='';
			echo $sqlfld="SELECT id  FROM  acc_group_ledgers where 	ref_table_name='".$ref_table_name."' and ref_table_id=".$ref_table_id;
			
			$fields = $this->projectmodel->get_records_from_sql($sqlfld);	
			foreach ($fields as $field)
			{$id=$field->id;}
			
			
			$sqlfld="SELECT * FROM  acc_group_ledgers 		where id=".$parent_id;
			$fields = $this->projectmodel->get_records_from_sql($sqlfld);	
			foreach ($fields as $field)
			{
			$save_ledger['VOUCHER_TYPE']=$field->VOUCHER_TYPE;
			$save_ledger['acc_nature']=$field->acc_nature;
			}
			
			 $sqlfld="SELECT * FROM  ".$ref_table_name." where id=".$ref_table_id;
			$fields = $this->projectmodel->get_records_from_sql($sqlfld);	
			foreach ($fields as $field)
			{
			
			if($ref_table_name=='tbl_party')
			{
			$save_ledger['acc_name']=$field->party_name;
			}
			
			if($ref_table_name=='doctor_mstr')
			{
				 $save_ledger['acc_name']=$field->name;
			}
			
			}
			
			$save_ledger['parent_id']=$parent_id;
			$save_ledger['acc_type']='LEDGER';
			$save_ledger['EDIT_STATUS']='NO';			
			$save_ledger['ref_table_name']=$ref_table_name;
			$save_ledger['ref_table_id']=$ref_table_id;
			
			
			$this->projectmodel->save_records_model($id,'acc_group_ledgers',$save_ledger);	
}

function batch_wise_product_available($batchno=0,$product_id=0)
{
	$AVAILABLE_QTY=$OPEN_BALANCE=$PURCHASEQNTY=$SALEQNTY=$PURCHASE_RTN=$SALE_RTN=0;

	$sqlqty="select SUM(qnty) qnty from invoice_details where product_id=".$product_id." 
	and batchno='".$batchno."' and status='OPEN_BALANCE' ";
	$avlqty = $this->projectmodel->get_records_from_sql($sqlqty);
	foreach ($avlqty as $rowq){	
	$OPEN_BALANCE=$rowq->qnty;
	}

	//purchase
	$sqlqty="select SUM(qnty) qnty from invoice_details where product_id=".$product_id." 
	and batchno='".$batchno."' and status='PURCHASE' ";
	$avlqty = $this->projectmodel->get_records_from_sql($sqlqty);
	foreach ($avlqty as $rowq){	
	$PURCHASEQNTY=$rowq->qnty;
	}
	//sale
	$sqlqty="select SUM(qnty) qnty from invoice_details where product_id=".$product_id." 
	and batchno='".$batchno."' and status='SALE' ";
	$avlqty = $this->projectmodel->get_records_from_sql($sqlqty);
	foreach ($avlqty as $rowq){	
	$SALEQNTY=$rowq->qnty;
	}
	//PURCHASE RETURN
	$sqlqty="select SUM(qnty) qnty from invoice_details where product_id=".$product_id." 
	and batchno='".$batchno."' and status='PURCHASE_RTN' ";
	$avlqty = $this->projectmodel->get_records_from_sql($sqlqty);
	foreach ($avlqty as $rowq){	
	$PURCHASE_RTN=$rowq->qnty;
	}
	//SALE RETURN
	$sqlqty="select SUM(qnty) qnty from invoice_details where product_id=".$product_id." 
	and batchno='".$batchno."' and status='SALE_RTN' ";
	$avlqty = $this->projectmodel->get_records_from_sql($sqlqty);
	foreach ($avlqty as $rowq){	
	$SALE_RTN=$rowq->qnty;
	}
	
	$AVAILABLE_QTY=$OPEN_BALANCE+$PURCHASEQNTY-$SALEQNTY-$PURCHASE_RTN+$SALE_RTN;
	return $AVAILABLE_QTY;
}





function all_mis_report($REPORT_NAME,$param_array)
{
	$rsval=array();
	$tranlink=ADMIN_BASE_URL.'Accounts_controller/all_mis_reports/';
	//print_r($param_array);
	//echo $param_array['fromdate'].' todate::'.$param_array['todate'];

	if($REPORT_NAME=='PRODUCT_GROUP')
	{
		
		$mainindx=0;
		$whr='id >0';
		$rsval=$this->projectmodel->GetMultipleVal('*','productmstr',$whr,' productname');
		$group1_cnt=sizeof($rsval);	 
		return $rsval;	

	}
	
	if($REPORT_NAME=='PRODUCT_BATCH') 
	{
		
		$mainindx=0;
		$records="select batchno,exp_monyr,mfg_monyr  from invoice_details where 	product_id=".$param_array['param1']." group by batchno,exp_monyr,mfg_monyr";
		$records = $this->projectmodel->get_records_from_sql($records);	
		foreach ($records as $records)
		{
			$opening_amount=0;
			//$rsval[$mainindx]['id']=$records->id;
			$rsval[$mainindx]['batchno']=$records->batchno; 
			$rsval[$mainindx]['exp_monyr']=$records->exp_monyr; 
			$rsval[$mainindx]['mfg_monyr']=$records->mfg_monyr; 
			$rsval[$mainindx]['total_purchase']=$rsval[$mainindx]['total_sale']=
			$rsval[$mainindx]['TOTAL_SELL_RTN']=$rsval[$mainindx]['TOTAL_PRUCHAR_RTN']=$rsval[$mainindx]['tot_sample']=0;
		
			//and exp_monyr='".$records->exp_monyr."' and mfg_monyr='".$records->mfg_monyr."'
			$products = "select sum(qnty) totqnty from invoice_details where 
			product_id=".$param_array['param1']." and 	batchno='".$records->batchno."'  and status='PURCHASE' " ;				
			$products = $this->projectmodel->get_records_from_sql($products);
			if(count($products)>0){foreach ($products as $product){$rsval[$mainindx]['total_purchase']=$product->totqnty;	}}

			$products = "select sum(qnty) totqnty from invoice_details where 
			product_id=".$param_array['param1']." and 	batchno='".$records->batchno."' and status='SALE' " ;				
			$products = $this->projectmodel->get_records_from_sql($products);
			if(count($products)>0){foreach ($products as $product){$rsval[$mainindx]['total_sale']=$product->totqnty;	}}

			$products = "select sum(qnty) totqnty from invoice_details where 
			product_id=".$param_array['param1']." and 	batchno='".$records->batchno."' 	 and status='SALE_RTN' " ;				
			$products = $this->projectmodel->get_records_from_sql($products);
			if(count($products)>0){foreach ($products as $product){$rsval[$mainindx]['TOTAL_SELL_RTN']=$product->totqnty;}}

			$products = "select sum(qnty) totqnty from invoice_details where 
			product_id=".$param_array['param1']." and 	batchno='".$records->batchno."' and status='PRUCHAR_RTN' " ;				
			$products = $this->projectmodel->get_records_from_sql($products);
			if(count($products)>0){foreach ($products as $product){$rsval[$mainindx]['TOTAL_PRUCHAR_RTN']=$product->totqnty;}}

			// $products = "select sum(totqnty) totqnty from sample_tran_details where product_id=".$param_array['param1']." and 
			// batchno='".$records->batchno."'  and  status='SAMPLE_RCV' " ;
			// $products = $this->projectmodel->get_records_from_sql($products);
			// if(count($products)>0){foreach ($products as $product){$rsval[$mainindx]['tot_sample']= $product->totqnty;}}

			$qnty_available=$rsval[$mainindx]['total_available_qnty']=
			$rsval[$mainindx]['total_purchase']-$rsval[$mainindx]['total_sale']+
			$rsval[$mainindx]['TOTAL_SELL_RTN']-$rsval[$mainindx]['TOTAL_PRUCHAR_RTN']-$rsval[$mainindx]['tot_sample'];

			//$rate=$rsval[$mainindx]['rate']=$this->projectmodel->GetSingleVal('sell_price','productmstr',' id='.$param_array['param1']); 
			$whr="product_id=".$param_array['param1']." and 	batchno='".$records->batchno."'  and status='PURCHASE' ";
			$rate=$rsval[$mainindx]['rate']=$this->projectmodel->GetSingleVal('mrp','invoice_details',$whr);
			$rsval[$mainindx]['total_amt']=$qnty_available*$rate;
			
			$rsval[$mainindx]['href']=$tranlink.'PRODUCT_BATCH_TRANSACTIONS/'.$param_array['param1'].'/'.$records->batchno;				

			$rsval[$mainindx]['qnty_available']=$qnty_available;
			$rsval[$mainindx]['rate']=$rate;	
			$rsval[$mainindx]['total']=$qnty_available*$rate;				
			
			$mainindx=$mainindx+1;
		}

		return $rsval;			
	}

	if($REPORT_NAME=='PRODUCT_BATCH_TRANSACTIONS') 
	{
		//delete invalid	
		$status='';
		$inv_detail_id='';
		$mfg_monyr='';
		$exp_monyr='';
		$totqnty='';
	
		$records="select id,invoice_summary_id from invoice_details  ";
		$records = 	$this->projectmodel->get_records_from_sql($records);
		foreach ($records as $record)
		{	
			$dlts="select count(*) cnt from invoice_summary where id=".$record->invoice_summary_id;
			$dlts = 	$this->projectmodel->get_records_from_sql($dlts);
			foreach ($dlts as $dlt)
			{	
				if($dlt->cnt==0)
				{
					//echo 'Invalid sale detail id :'.$record->id.' | summary id :'.$record->invoice_summary_id.'<br>';
					$this->db->Query("delete from invoice_details where invoice_summary_id=".$record->invoice_summary_id);
				}
			}			
		}
	
		//delete invalid
		
			$mainindx=$balance=0;
			$records="select a.id,a.tbl_party_id,a.status,a.invoice_no,a.invoice_date ,b.qnty
			from invoice_summary a,invoice_details b where a.id=b.invoice_summary_id and 
			b.product_id=".$param_array['param1']."  and b.batchno='".$param_array['param2']."' order by a.invoice_date,a.id";
			$records = $this->projectmodel->get_records_from_sql($records);
			foreach ($records as $key=>$record)
			{ 
			
				$rsval[$mainindx]['invoice_no']=$record->invoice_no; 
				$rsval[$mainindx]['invoice_date']=$record->invoice_date; 
				$rsval[$mainindx]['party_name']=$this->projectmodel->GetSingleVal('acc_name','acc_group_ledgers',' id='.$record->tbl_party_id); 
				$rsval[$mainindx]['qnty']=$record->qnty; 
				$rsval[$mainindx]['status']=$record->status; 
				if($record->status=='PURCHASE' 	or $record->status=='SALE_RTN' or $record->status=='OPEN_BALANCE')
				{$balance=$balance+$record->qnty;}
				if($record->status=='SALE')
				{$balance=$balance-$record->qnty;}
				$rsval[$mainindx]['balance']=$balance;

				$rsval[$mainindx]['href']='';
				$mainindx=$mainindx+1;
			}
			return $rsval;		
	}

	if($REPORT_NAME=='EXPIRY_REGISTER')
	{
			
		$mainindx=0;	
		$trandate=$this->general_library->get_date($param_array['todate'],0,1,0);
		$trandate=substr($trandate,0,7).'-01';

		$whr=" EXPIRY_DATE<'$trandate' and  qty_available>0 and (status='PURCHASE' ) ";
		$rsval=$this->projectmodel->GetMultipleVal('*','invoice_details',$whr);
		$group1_cnt=sizeof($rsval);	

		for($cnt=0;$cnt<$group1_cnt;$cnt++)
		{
			$rsval[$cnt]['href']='';
			$rsval[$cnt]['product_name']=$this->projectmodel->GetSingleVal('productname','productmstr',' id='.$rsval[$cnt]['product_id']); 
			$rsval[$cnt]['total_amt']=$rsval[$cnt]['qty_available']*$rsval[$cnt]['mrp'];	
		}
		
		// $records="select a.*,b.productname from  invoice_details a,productmstr b  where 
		// a.EXPIRY_DATE<'$trandate' and  a.qty_available>0 and (a.status='PURCHASE' or a.status='OPEN_BALANCE') and a.product_id=b.id	 ";
		// $records = $this->projectmodel->get_records_from_sql($records);	
		// foreach ($records as $records)
		// {
		// 	$opening_amount=0;
		// 	$PURCHASEID=$rsval[$mainindx]['id']=$records->id;
		// 	//$rsval[$mainindx]['product_name']=$this->projectmodel->GetSingleVal('productname','productmstr',' id='.$records->product_id);  
		// 	$mainindx=$mainindx+1;
		// }
		return $rsval;		

	}
	
	
	if($REPORT_NAME=='PRODUCT_TRANSACTIONS') 
	{
		//delete invalid	
		$status='';
		$inv_detail_id='';
		$mfg_monyr='';
		$exp_monyr='';
		$totqnty='';
				
		//delete invalid
		
			$mainindx=$balance=0;
			$records="select a.id,a.tbl_party_id,a.status,a.invoice_no,a.invoice_date ,b.totqnty
			from invoice_summary a,invoice_details b where a.id=b.invoice_summary_id and 
			b.product_id=".$param_array['param1']."  and b.status='".$param_array['param2']."' order by a.invoice_date,a.id";
			$records = $this->projectmodel->get_records_from_sql($records);
			foreach ($records as $key=>$record)
			{ 
			
				$rsval[$mainindx]['invoice_no']=$record->invoice_no; 
				$rsval[$mainindx]['invoice_date']=$record->invoice_date; 
				$rsval[$mainindx]['party_name']=$this->projectmodel->GetSingleVal('retail_name','stockist',' id='.$record->tbl_party_id); 
				$rsval[$mainindx]['qnty']=$record->totqnty; 
				$rsval[$mainindx]['status']=$record->status; 
				if($record->status=='PURCHASE' 	or $record->status=='SELL_RTN')
				{$balance=$balance+$record->totqnty;}
				if($record->status=='SELL')
				{$balance=$balance-$record->totqnty;}
				$rsval[$mainindx]['balance']=$balance;

				$rsval[$mainindx]['href']='';
				$mainindx=$mainindx+1;
			}
			
			
			$records="select a.id,a.tbl_party_id,a.status,a.invoice_no,a.invoice_date ,b.totqnty
			from sample_tran_summary a,sample_tran_details b where a.id=b.invoice_summary_id and 
			b.product_id=".$param_array['param1']."   and b.status='SAMPLE_RCV' order by a.invoice_date,a.id";
			$records = $this->projectmodel->get_records_from_sql($records);
			foreach ($records as $key=>$record)
			{ 
			
				$rsval[$mainindx]['invoice_no']=$record->invoice_no; 
				$rsval[$mainindx]['invoice_date']=$record->invoice_date; 
				$rsval[$mainindx]['party_name']=$this->projectmodel->GetSingleVal('retail_name','stockist',' id='.$record->tbl_party_id); 
				$rsval[$mainindx]['qnty']=$record->totqnty; 
				$rsval[$mainindx]['status']=$record->status; 
				$balance=$balance-$record->totqnty;
				$rsval[$mainindx]['balance']=$balance;

				$rsval[$mainindx]['href']='';
				$mainindx=$mainindx+1;
			}

			return $rsval;		
	}

	if($REPORT_NAME=='GST_REPORT') 
	{
		//delete invalid	
		$status='';
		$inv_detail_id='';
		$mfg_monyr='';
		$exp_monyr='';
		$totqnty='';
		
		
			$mainindx=$balance=0;
			$records="select * 	from invoice_summary where  invoice_date  
			between '".$param_array['fromdate']."' and '".$param_array['todate']."' and status='SELL' order by invoice_date,id";
			$records = $this->projectmodel->get_records_from_sql($records);
			foreach ($records as $key=>$record)
			{ 
			
				$rsval[$mainindx]['invoice_no']=$record->invoice_no; 
				$rsval[$mainindx]['invoice_date']=$record->invoice_date; 
				$rsval[$mainindx]['party_name']=$this->projectmodel->GetSingleVal('retail_name','stockist',' id='.$record->tbl_party_id); 
				$rsval[$mainindx]['GSTNO']=$this->projectmodel->GetSingleVal('GSTNO','stockist',' id='.$record->tbl_party_id); 
				$rsval[$mainindx]['destination']=$record->destination; 
				
				//12% gst section
				$details = "select sum(taxable_amt) taxable_amt,sum(cgst_amt) cgst_amt,sum(sgst_amt) sgst_amt,sum(igst_amt) igst_amt from invoice_details 
				where  vat_ledger_id=266 and invoice_summary_id=".$record->id ;
				$details = $this->projectmodel->get_records_from_sql($details);
				if(count($details)>0){foreach ($details as $detail)
				{
					
					$rsval[$mainindx]['taxable_amt_12']=$detail->taxable_amt; 
					$rsval[$mainindx]['CGST_12']=$detail->cgst_amt; 
					$rsval[$mainindx]['SGST_12']=$detail->sgst_amt; 
					$rsval[$mainindx]['IGST_12']=$detail->igst_amt; 
					$rsval[$mainindx]['amount_with_tax_12']=$detail->taxable_amt+$detail->cgst_amt+$detail->sgst_amt+$detail->igst_amt; 					
				}}

				//18% gst section
				$details = "select sum(taxable_amt) taxable_amt,sum(cgst_amt) cgst_amt,sum(sgst_amt) sgst_amt,sum(igst_amt) igst_amt from 
				invoice_details where  vat_ledger_id=267 and invoice_summary_id=".$record->id ;
				$details = $this->projectmodel->get_records_from_sql($details);
				if(count($details)>0){foreach ($details as $detail)
				{
					
					$rsval[$mainindx]['taxable_amt_18']=$detail->taxable_amt; 
					$rsval[$mainindx]['CGST_18']=$detail->cgst_amt; 
					$rsval[$mainindx]['SGST_18']=$detail->sgst_amt; 
					$rsval[$mainindx]['IGST_18']=$detail->igst_amt; 
					$rsval[$mainindx]['amount_with_tax_18']=$detail->taxable_amt+$detail->cgst_amt+$detail->sgst_amt+$detail->igst_amt; 					
				}}

				$rsval[$mainindx]['freegoods']=0;
				$details = "select sum(freeqty*srate) freegoods_amt from invoice_details where   invoice_summary_id=".$record->id ;
				$details = $this->projectmodel->get_records_from_sql($details);
				if(count($details)>0){foreach ($details as $detail)
				{
					$rsval[$mainindx]['freegoods']=$detail->freegoods_amt; 
				}}
				
				
				$rsval[$mainindx]['interest_charge']=$record->interest_charge; 
				$rsval[$mainindx]['delivery_charge']=$record->freight_charge; 
				$rsval[$mainindx]['cash_discount']=$record->tot_cash_discount; 
				$rsval[$mainindx]['round_off']=$record->rndoff; 
				$rsval[$mainindx]['grand_total']=$record->grandtot; 


				$rsval[$mainindx]['href']='';
				$mainindx=$mainindx+1;
			}

			return $rsval;		
	}


			if($REPORT_NAME=='GENERAL_LEDGER')
			{
				//LEFT SECTION
				$mainindx=0;
				$ledger_ac=$param_array['ledger_ac'];
				$fromdate=$param_array['fromdate'];
				$todate=$param_array['todate'];
				$cr_open_balance=$dr_open_balance=0;
				if($ledger_ac>0)
				{
					
					$cr_open_balance=$this->ledger_opening_balance($ledger_ac,$fromdate,'CR');	
					$dr_open_balance=$this->ledger_opening_balance($ledger_ac,$fromdate,'DR');				
	
					if($cr_open_balance>0 || $dr_open_balance>0)
					{
						$rsval[$mainindx]['href']='';
						$rsval[$mainindx]['tran_date']=$fromdate;
						$rsval[$mainindx]['tran_type']='';
						$rsval[$mainindx]['tran_code']='';
						$rsval[$mainindx]['id']=0;
						$rsval[$mainindx]['particular']='Opening Balance';
						$rsval[$mainindx]['debit_amount']=$cr_open_balance;
						$rsval[$mainindx]['credit_amount']=$dr_open_balance ;	
						$mainindx=$mainindx+1;
					}
	
					$records="select a.id hdr_id,a.tran_table_id,b.id dtl_id, a.tran_code,a.tran_date,b.amount,b.cr_ledger_account,b.dr_ledger_account,
					a.comment,a.TRAN_TYPE,b.matching_tran_id from acc_tran_header a,acc_tran_details b 
					where a.id=b.acc_tran_header_id  and a.tran_date between '".$fromdate."' and '".$todate."' 
					and (b.cr_ledger_account=".$ledger_ac."  or b.dr_ledger_account=".$ledger_ac.") order by a.tran_date";						
					$records = $this->projectmodel->get_records_from_sql($records);	
					foreach ($records as $record)
					{								
		
						$credit_amount=$debit_amount=$opening_amount=0;
		
						$hdr_id=$record->hdr_id;
						$dtl_id=$record->dtl_id;
						$matching_tran_id=$record->matching_tran_id;
						
						$href=ADMIN_BASE_URL.'Accounts_controller/load_form_report/';

						// if($record->TRAN_TYPE=='PURCHASE')
						// {$rsval[$mainindx]['href']=$rsval[$mainindx]['href'].'Purchase/'.$record->tran_table_id;}
						// if($record->TRAN_TYPE=='FREIGHT')
						// {$rsval[$mainindx]['href']=$rsval[$mainindx]['href'].'Service_purchase/'.$record->tran_table_id;}
						// if($record->TRAN_TYPE=='SALE')
						// {$rsval[$mainindx]['href']=$rsval[$mainindx]['href'].'sale_entry/'.$record->tran_table_id;}
						// if($record->TRAN_TYPE=='PAYMENT')
						// {$rsval[$mainindx]['href']=$rsval[$mainindx]['href'].'AccountsPayment/'.$record->hdr_id;}
						// if($record->TRAN_TYPE=='RECEIVE')
						// {$rsval[$mainindx]['href']=$rsval[$mainindx]['href'].'AccountsReceive/'.$record->hdr_id;}
						// if($record->TRAN_TYPE=='JOURNAL')
						// {$rsval[$mainindx]['href']=$rsval[$mainindx]['href'].'AccountsJournal/'.$record->hdr_id;}
						// if($record->TRAN_TYPE=='CONTRA')
						// {$rsval[$mainindx]['href']=$rsval[$mainindx]['href'].'AccountsContra/'.$record->hdr_id;}
						
						// $rsval[$mainindx]['tran_date']=$record->tran_date;
						// $rsval[$mainindx]['tran_type']=$record->TRAN_TYPE;
						// $rsval[$mainindx]['tran_code']=$record->tran_code;

						$rsval[$mainindx]['details'][0]['particular']='';						
						$rsval[$mainindx]['details'][0]['qnty']='';
						$rsval[$mainindx]['details'][0]['rate']='';
						$rsval[$mainindx]['details'][0]['total']=''; 
						$rsval[$mainindx]['details'][0]['crdr']=''; 
						
						
						
						if($record->cr_ledger_account==$ledger_ac)
						{
							$credit_amount=$record->amount;
		
							$whr="  acc_tran_header_id=".$hdr_id." and matching_tran_id=".$matching_tran_id." and  dr_ledger_account>0 ";
							$rs=$this->projectmodel->GetMultipleVal('*','acc_tran_details',	$whr,'id ASC ');
							$json_array_count=sizeof($rs);	 
							for($fieldIndex=0;$fieldIndex<$json_array_count;$fieldIndex++)
							{	
								
								
								if($record->TRAN_TYPE=='PURCHASE')
								{$rsval[$mainindx]['href']=$href.'Purchase/'.$record->tran_table_id;}
								if($record->TRAN_TYPE=='FREIGHT')
								{$rsval[$mainindx]['href']=$href.'Service_purchase/'.$record->tran_table_id;}
								if($record->TRAN_TYPE=='SALE')
								{$rsval[$mainindx]['href']=$href.'sale_entry/'.$record->tran_table_id;}
								if($record->TRAN_TYPE=='PAYMENT')
								{$rsval[$mainindx]['href']=$href.'AccountsPayment/'.$record->hdr_id;}
								if($record->TRAN_TYPE=='RECEIVE')
								{$rsval[$mainindx]['href']=$href.'AccountsReceive/'.$record->hdr_id;}
								if($record->TRAN_TYPE=='JOURNAL')
								{$rsval[$mainindx]['href']=$href.'AccountsJournal/'.$record->hdr_id;}
								if($record->TRAN_TYPE=='CONTRA')
								{$rsval[$mainindx]['href']=$href.'AccountsContra/'.$record->hdr_id;}
								
								$rsval[$mainindx]['tran_date']=$record->tran_date;
								$rsval[$mainindx]['tran_type']=$record->TRAN_TYPE;
								$rsval[$mainindx]['tran_code']=$record->tran_code;

								$rsval[$mainindx]['id']=$record->hdr_id;
								$rsval[$mainindx]['particular']=$this->projectmodel->GetSingleVal('acc_name','acc_group_ledgers',' id='.$rs[$fieldIndex]['dr_ledger_account']); 		
								
								$parentid=$this->projectmodel->GetSingleVal('parent_id','acc_group_ledgers',' id='.$rs[$fieldIndex]['dr_ledger_account']); 
								if($record->TRAN_TYPE=='PURCHASE' && $parentid==14)
								{
									$dtl_records="select * from invoice_details where invoice_summary_id=".$record->tran_table_id;						
									$dtl_records = $this->projectmodel->get_records_from_sql($dtl_records);	
									foreach ($dtl_records as $key=>$dtl_record)
									{	
										$rsval[$mainindx]['details'][$key]['particular']=
										$parentid.$this->projectmodel->GetSingleVal('productname','productmstr',' id='.$dtl_record->product_id);
										$rsval[$mainindx]['details'][$key]['qnty']=$dtl_record->qnty.' '.
										$this->projectmodel->GetSingleVal('unit_name','unit_master',' id='.$dtl_record->unit_type_id); ;
										$rsval[$mainindx]['details'][$key]['rate']=$dtl_record->rate;
										$rsval[$mainindx]['details'][$key]['total']=$dtl_record->subtotal; 
										if($record->cr_ledger_account==$ledger_ac){$rsval[$mainindx]['details'][$key]['crdr']='Cr';}
										else {$rsval[$mainindx]['details'][$key]['crdr']='Dr'; }
									}

								}
								

								$debit_amount=$rs[$fieldIndex]['amount'];				
								if($credit_amount<=$debit_amount)
								{$rsval[$mainindx]['debit_amount']=$credit_amount;}
								else
								{$rsval[$mainindx]['debit_amount']=$debit_amount;}							
								$rsval[$mainindx]['credit_amount']='';	
								$mainindx=$mainindx+1;
							}
		
						}
		
						if($record->dr_ledger_account==$ledger_ac)
						{
							$debit_amount=$record->amount;
		
							$whr=" acc_tran_header_id=".$hdr_id." and matching_tran_id=".$matching_tran_id." and cr_ledger_account>0 ";
							$rs=$this->projectmodel->GetMultipleVal('*','acc_tran_details',	$whr,'id ASC ');
							$json_array_count=sizeof($rs);	 
							for($fieldIndex=0;$fieldIndex<$json_array_count;$fieldIndex++)
							{
		
								if($record->TRAN_TYPE=='PURCHASE')
								{$rsval[$mainindx]['href']=$href.'Purchase/'.$record->tran_table_id;}
								if($record->TRAN_TYPE=='FREIGHT')
								{$rsval[$mainindx]['href']=$href.'Service_purchase/'.$record->tran_table_id;}
								if($record->TRAN_TYPE=='SALE')
								{$rsval[$mainindx]['href']=$href.'sale_entry/'.$record->tran_table_id;}
								if($record->TRAN_TYPE=='PAYMENT')
								{$rsval[$mainindx]['href']=$href.'AccountsPayment/'.$record->hdr_id;}
								if($record->TRAN_TYPE=='RECEIVE')
								{$rsval[$mainindx]['href']=$href.'AccountsReceive/'.$record->hdr_id;}
								if($record->TRAN_TYPE=='JOURNAL')
								{$rsval[$mainindx]['href']=$href.'AccountsJournal/'.$record->hdr_id;}
								if($record->TRAN_TYPE=='CONTRA')
								{$rsval[$mainindx]['href']=$href.'AccountsContra/'.$record->hdr_id;}
								
								$rsval[$mainindx]['tran_date']=$record->tran_date;
								$rsval[$mainindx]['tran_type']=$record->TRAN_TYPE;
								$rsval[$mainindx]['tran_code']=$record->tran_code;
								
								$rsval[$mainindx]['id']=$record->hdr_id;
								$rsval[$mainindx]['particular']=$this->projectmodel->GetSingleVal('acc_name','acc_group_ledgers',' id='.$rs[$fieldIndex]['cr_ledger_account']); 						
								
								$parentid=$this->projectmodel->GetSingleVal('parent_id','acc_group_ledgers',' id='.$rs[$fieldIndex]['cr_ledger_account']); 							
								if($record->TRAN_TYPE=='SALE' && $parentid==15)
								{
									$dtl_records="select * from invoice_details where invoice_summary_id=".$record->tran_table_id;						
									$dtl_records = $this->projectmodel->get_records_from_sql($dtl_records);	
									foreach ($dtl_records as $key=>$dtl_record)
									{	
										$rsval[$mainindx]['details'][$key]['particular']=
										$this->projectmodel->GetSingleVal('productname','productmstr',' id='.$dtl_record->product_id);
										$rsval[$mainindx]['details'][$key]['qnty']=$dtl_record->qnty.' '.$this->projectmodel->GetSingleVal('unit_name','unit_master',' id='.$dtl_record->unit_type_id); ;
										$rsval[$mainindx]['details'][$key]['rate']=$dtl_record->rate;
										$rsval[$mainindx]['details'][$key]['total']=$dtl_record->subtotal; 
										if($record->cr_ledger_account==$ledger_ac){$rsval[$mainindx]['details'][$key]['crdr']='Cr';}
										else {$rsval[$mainindx]['details'][$key]['crdr']='Dr'; }
									}
								}

								$credit_amount=$rs[$fieldIndex]['amount'];						
								if($debit_amount<=$credit_amount)
								{$rsval[$mainindx]['credit_amount']=$debit_amount;}
								else
								{$rsval[$mainindx]['credit_amount']=$credit_amount;}
								$rsval[$mainindx]['debit_amount']='';	
								$mainindx=$mainindx+1;
							}
		
						}							
						
						
					}
	
					return $rsval;
				}
			}

	if($REPORT_NAME=='DOCTOR_COMMISSION_SUMMARY') 
	{
		//print_r($param_array);
		return $this->all_mis_report('GENERAL_LEDGER',$param_array);
	}
	


}




}
?>