//CRUD VIDEO
// https://www.youtube.com/watch?v=DB-kVs76XZ4
//https://www.codeproject.com/Tips/872181/CRUD-in-Angular-js
//https://github.com/chieffancypants/angular-hotkeys/ 
//http://www.codexworld.com/angularjs-crud-operations-php-mysql/
'use strict';
var domain_name="http://localhost/Subhojit_DEPAK_BHUIYA/homeopathi/";
//var domain_name="http://adequatesolutions.co.in/homeopathi/";


//************************ACCOUNT RECEIVE START*****************************************//
var app = angular.module('Accounts',['GeneralServices']);


//************************ACCOUNT PURCHASE START*****************************************//
app.controller('PurchaseEntry',['$scope','$rootScope','$http','PurchaseEntry',
function($scope,$rootScope,$http,PurchaseEntry,userPersistenceService){
	"use strict";

	//$scope.appState='EMIPAYMENT';
	//var domain_name="http://localhost/abir_das_unitedlab/SATNAM/";	
	var BaseUrl=domain_name+"Accounts_controller/AccountsTransactions/PurchaseEntry/";
		$scope.tran_date=$rootScope.tran_date;

		$rootScope.search = function(searchelement){
		
		$scope.SEARCHTYPE='PRODUCT';
		$rootScope.searchelement=searchelement;
		$rootScope.suggestions = [];
		$rootScope.searchItems=[];
		//console.log($rootScope.searchelement);
		PurchaseEntry.list_items($rootScope.searchelement,$scope.trantype);
		$rootScope.searchItems.sort();	
		var myMaxSuggestionListLength = 0;
		for(var i=0; i<$rootScope.searchItems.length; i++){
			var searchItemsSmallLetters = angular.uppercase($rootScope.searchItems[i]);
			var searchTextSmallLetters = angular.uppercase($scope[$rootScope.searchelement]);
			if( searchItemsSmallLetters.indexOf(searchTextSmallLetters) !== -1){
				$rootScope.suggestions.push(searchItemsSmallLetters);
				myMaxSuggestionListLength += 1;
				if(myMaxSuggestionListLength === 400){
					break;
				}
			}
		}
	};
	
	$rootScope.$watch('selectedIndex',function(val){		
		if(val !== -1) {
			$scope[$rootScope.searchelement] =
			$rootScope.suggestions[$rootScope.selectedIndex];
		}
	});		
	$rootScope.checkKeyDown = function(event){
		console.log(event.keyCode);

		if(event.keyCode === 40){//down key, increment selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex+1 < $rootScope.suggestions.length){
				$rootScope.selectedIndex++;
			}else{
				$rootScope.selectedIndex = 0;
			}
		}else if(event.keyCode === 38){ //up key, decrement selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex-1 >= 0){
				$rootScope.selectedIndex--;
			}else{
				$rootScope.selectedIndex = $rootScope.suggestions.length-1;
			}
		}
		else if(event.keyCode === 13){ //enter key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			//console.log($rootScope.selectedIndex);
			event.preventDefault();			
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];
			$rootScope.selectedIndex = -1;
		}
		else if(event.keyCode === 9){ //enter tab key
			//console.log($rootScope.selectedIndex);
			if($rootScope.selectedIndex>-1){
				$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			}			

		}else if(event.keyCode === 27){ //ESC key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			console.log($rootScope.selectedIndex);
			event.preventDefault();
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];
			$rootScope.selectedIndex = -1;
		}else{
			$rootScope.search();	
		}
	};
	
	//ClickOutSide
	var exclude1 = document.getElementById($rootScope.searchelement);
	$rootScope.hideMenu = function($event){
		$rootScope.search();
		//make a condition for every object you wat to exclude
		if($event.target !== exclude1) {
			$rootScope.searchItems=[];
			$rootScope.suggestions = [];
			$rootScope.selectedIndex = -1;
		}
	};
	//======================================
	
	//Function To Call on ng-keyup
	$rootScope.checkKeyUp = function(event){ 
		if(event.keyCode !== 8 || event.keyCode !== 46){//delete or backspace
			if($scope[$rootScope.searchelement] === ""){
				$rootScope.suggestions = [];
				$rootScope.searchItems=[];
				$rootScope.selectedIndex = -1;
			}
		}
	};
	//======================================
	//List Item Events
	//Function To Call on ng-click
	$rootScope.AssignValueAndHide = function(index){
	$scope[$rootScope.searchelement]= $rootScope.suggestions[index];

		if($rootScope.searchelement=='tbl_party_id_name')
		{
			var str=$scope.tbl_party_id_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"tbl_party_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['tbl_party_id']=value.id;  //ACTUAL ID
					$scope['tbl_party_id_name']=value.name; // NAME 					
				});
			});
		}
		if($rootScope.searchelement=='product_id_name')
		{
			var str=$scope.product_id_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"product_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['product_id']=value.id;  //ACTUAL ID
					$scope['product_id_name']=value.name; // NAME 	
					$scope['tax_ledger_id']=value.tax_ledger_id; // NAME 	
					$scope['tax_per']=value.tax_per; // NAME 															
				});
			});
		}
			
		 $rootScope.suggestions=[];
		 $rootScope.searchItems=[];
		 $rootScope.selectedIndex = -1;
	};
	//===================END SEARCH SECTION =========================================

	//=========batch wise search=====================

	$rootScope.search_batch = function(searchelement){	
		$scope.SEARCHTYPE='BATCH';		
		$rootScope.searchelement=searchelement;
		$rootScope.suggestions_batch = [];
		$rootScope.searchItems=[];

		var data_link=BaseUrl+"batchno/"+$scope.product_id;
		console.log(data_link);			
		$http.get(data_link)
		.then(function(response) {
		$rootScope.suggestions_batch=response.data	;
		});			

	};
	
	$rootScope.$watch('selectedIndex_batch',function(val){		
		if(val !== -1) {	
			$scope['batchno'] =
			$rootScope.suggestions_batch[$rootScope.selectedIndex_batch].batchno;		
		}
	});		

	$rootScope.checkKeyDown_batch = function(event){
		if(event.keyCode === 40){//down key, increment selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex_batch+1 < $rootScope.suggestions_batch.length){
				$rootScope.selectedIndex_batch++;
			}else{
				$rootScope.selectedIndex_batch = 0;
			}
		
		}else if(event.keyCode === 38){ //up key, decrement selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex_batch-1 >= 0){
				$rootScope.selectedIndex_batch--;
			}else{
				$rootScope.selectedIndex_batch = $rootScope.suggestions_batch.length-1;
			}
		}
		else if(event.keyCode === 13){ //enter key, empty suggestions array
			$rootScope.AssignValueAndHide_batch($rootScope.selectedIndex_batch);
			//console.log($rootScope.selectedIndex);
			event.preventDefault();			
			$rootScope.suggestions_batch = [];
			$rootScope.searchItems=[];		
			$rootScope.selectedIndex_batch = -1;
		}
		else if(event.keyCode === 9){ //enter tab key
			//console.log($rootScope.selectedIndex);
			if($rootScope.selectedIndex_batch>-1){
				$rootScope.AssignValueAndHide_batch($rootScope.selectedIndex_batch);
			}			

		}else if(event.keyCode === 27){ //ESC key, empty suggestions array
			$rootScope.AssignValueAndHide_batch($rootScope.selectedIndex_batch);			
			event.preventDefault();
			$rootScope.suggestions_batch = [];
			$rootScope.searchItems=[];		
			$rootScope.selectedIndex_batch = -1;
		}else{
			$rootScope.search_batch();	
		}
	};
	
	//ClickOutSide
	var exclude1 = document.getElementById($rootScope.batchno);
	$rootScope.hideMenu = function($event){
		$rootScope.search();
		//make a condition for every object you wat to exclude
		if($event.target !== exclude1) {
			$rootScope.searchItems=[];
			$rootScope.suggestions_batch = [];			
			$rootScope.selectedIndex_batch = -1;
		}
	};
	//======================================
	
	//Function To Call on ng-keyup
	$rootScope.checkKeyUp_batch = function(event){ 
		if(event.keyCode !== 8 || event.keyCode !== 46){//delete or backspace
			if($scope[$rootScope.searchelement] === ""){
				$rootScope.suggestions_batch = [];
				$rootScope.searchItems=[];			
				$rootScope.selectedIndex_batch = -1;
			}
		}
	};
	//======================================
	//List Item Events
	//Function To Call on ng-click
	$rootScope.AssignValueAndHide_batch = function(index)
	{

	$scope[$rootScope.searchelement]= $rootScope.suggestions_batch[index].batchno;
		//console.log($rootScope.suggestions_batch[index].exp_monyr);
		
	$scope['exp_monyr']=$rootScope.suggestions_batch[index].exp_monyr;  
	$scope['mfg_monyr']=$rootScope.suggestions_batch[index].mfg_monyr; 
	//$scope['rate']=$rootScope.suggestions_batch[index].rate; 
	$scope['rate']=$rootScope.suggestions_batch[index].rate; 
	$scope['srate']=$rootScope.suggestions_batch[index].srate; 
	$scope['mrp']=$rootScope.suggestions_batch[index].mrp; 
	$scope['ptr']=$rootScope.suggestions_batch[index].ptr; 
	$scope['AVAILABLE_QTY']=$rootScope.suggestions_batch[index].AVAILABLE_QTY; 
	
	$rootScope.suggestions_batch=[];
		 $rootScope.searchItems=[];		
		 $rootScope.selectedIndex = -1;
	};
	//===================END batch SEARCH SECTION =========================================






	$scope.savedata=function(){
		var data_link=BaseUrl+"SAVE";
		var success={};
		console.log('$scope.id_detail'+$scope.id_detail)
		var data_save = {
			'id_header': $scope.get_set_value($scope.id_header,'num','SETVALUE'),
			'id_detail': $scope.get_set_value($scope.id_detail,'num','SETVALUE'),
			'product_id': $scope.get_set_value($scope.product_id,'num','SETVALUE'),
			'tbl_party_id': $scope.get_set_value($scope.tbl_party_id,'num','SETVALUE'),
			'invoice_date': $scope.get_set_value($scope.invoice_date,'str','SETVALUE'),
			'challan_no': $scope.get_set_value($scope.challan_no,'str','SETVALUE'),
			'challan_date': $scope.get_set_value($scope.challan_date,'str','SETVALUE'),
			'tbl_party_id_name': $scope.get_set_value($scope.tbl_party_id_name,'str','SETVALUE'),
			'comment': $scope.get_set_value($scope.comment,'str','SETVALUE'),
			'product_id_name': $scope.get_set_value($scope.product_id_name,'str','SETVALUE'),
			'batchno': $scope.get_set_value($scope.batchno,'str','SETVALUE'),
			'qnty': $scope.get_set_value($scope.qnty,'num','SETVALUE'),
			'exp_monyr': $scope.get_set_value($scope.exp_monyr,'str','SETVALUE'),
			'mfg_monyr': $scope.get_set_value($scope.mfg_monyr,'str','SETVALUE'),
			'rate': $scope.get_set_value($scope.rate,'num','SETVALUE'),
			'mrp': $scope.get_set_value($scope.mrp,'num','SETVALUE'),
			'ptr': $scope.get_set_value($scope.ptr,'num','SETVALUE'),
			'srate': $scope.get_set_value($scope.srate,'num','SETVALUE'),
			'tax_per': $scope.get_set_value($scope.tax_per,'num','SETVALUE'),	
			'disc_per': $scope.get_set_value($scope.disc_per,'num','SETVALUE'),	
			'tax_ledger_id': $scope.get_set_value($scope.tax_ledger_id,'num','SETVALUE')								
		};	
	
		var config = {headers : 
			{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'	}
		}
		//$http.post(data_link, data,config)
		$http.post(data_link,data_save,config)
		.then (function success(response){
			console.log('ID HEADER '+response.data.id_header);
			$scope.get_set_value(response.data,'','REFRESH');
			document.getElementById('product_id_name').focus();
		},
		function error(response){
			$scope.errorMessage = 'Error adding user!';
			$scope.message = '';
	  });

	}
	
	$scope.get_set_value=
	function(datavalue,datatype,operation)
	{
		if(operation=='SETVALUE')
		{
			if(angular.isUndefined(datavalue)==true)
			{
				if(datatype=='num')
				{return 0;}
				if(datatype=='str')
				{return '';}		
			}
			else
			{return datavalue;}
		}
		if(operation=='DRCRCHECKING')
		{
			var savestatus='OK';
						
			if($scope.invoice_date == null || $scope.invoice_date === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER INVOICE DATE';
			document.getElementById('invoice_date').focus();
			}
			if($scope.tbl_party_id == '0')			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER PARTY';
			document.getElementById('tbl_party_id_name').focus();
			}

			if($scope.product_id == '0')			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER PRODUCT';
			document.getElementById('product_id_name').focus();
			}
		
			if(savestatus=='OK')
			{
				$scope.savedata();
				$scope.savemsg='Receord Has been saved Successfully!';
			}
		}
		if(operation=='REFRESH')
		{		
			//HEADER SECTION
			$scope.id_header=datavalue.id_header;
			$scope.invoice_no=datavalue.invoice_no;
			$scope.invoice_date=datavalue.invoice_date;
			$scope.challan_no=datavalue.challan_no;
			$scope.challan_date=datavalue.challan_date;
			$scope.tbl_party_id_name=datavalue.tbl_party_id_name;
			$scope.tbl_party_id=datavalue.tbl_party_id;
			$scope.comment=datavalue.comment;

			//DETAIL SECTION
			$scope.id_detail='';	
			$scope.product_id_name='';			
			$scope.product_id=$scope.batchno=$scope.qnty='';
			$scope.exp_monyr=$scope.mfg_monyr=$scope.rate='';
			$scope.mrp=$scope.ptr=$scope.srate=$scope.tax_per='';
			$scope.tax_ledger_id=$scope.disc_per='';

			//data list
			 var data_link=BaseUrl+"DTLLIST/"+$scope.id_header;
			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});
			
			//$scope.consignment_value();
			//$scope.GetAllConsignment($scope.startdate,$scope.enddate);

		}
		if(operation=='NEWENTRY')
		{		
			
			//HEADER SECTION
			$scope.id_header='';
			$scope.invoice_no='';
			$scope.invoice_date='';
			$scope.challan_no='';
			$scope.challan_date='';
			$scope.tbl_party_id_name='';
			$scope.tbl_party_id='';
			$scope.comment='';
			
			//DETAIL SECTION
			$scope.id_detail='';	
			$scope.product_id_name='';			
			$scope.product_id=$scope.batchno=$scope.qnty='';
			$scope.exp_monyr=$scope.mfg_monyr=$scope.rate='';
			$scope.mrp=$scope.ptr=$scope.srate=$scope.tax_per='';
			$scope.tax_ledger_id=$scope.disc_per='';
			//data list
			 var data_link=BaseUrl+"DTLLIST/"+0;
			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});

			 document.getElementById('invoice_date').focus();
		}
		if(operation=='VIEWDTL')
		{	
			var data_link=BaseUrl+"VIEWDTL/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){
					$scope['id_detail']=value.id;  
					$scope['product_id_name']=value.product_id_name;  
					$scope['product_id']=value.product_id;  					
					$scope['batchno']=value.batchno;  
					$scope['qnty']=value.qnty;  
					$scope['exp_monyr']=value.exp_monyr;  
					$scope['mfg_monyr']=value.mfg_monyr; 
					$scope['rate']=value.rate;
					$scope['mrp']=value.mrp;	
					$scope['ptr']=value.ptr;
					$scope['srate']=value.srate;
					$scope['tax_per']=value.tax_per;
					$scope['tax_ledger_id']=value.tax_ledger_id;
					$scope['disc_per']=value.disc_per;
					
				});			
				
			});
		}

		if(operation=='VIEWALLVALUE')
		{	
			var data_link=BaseUrl+"DTLLIST/"+datavalue;
			$http.get(data_link).then(function(response) 
			{$scope.listOfDetails=response.data;});

			var data_link=BaseUrl+"VIEWALLVALUE/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){

					$scope['id_header']=value.id_header;  					
					$scope['invoice_no']=value.invoice_no;  
					$scope['invoice_date']=value.invoice_date;  
					$scope['challan_no']=value.challan_no;  
					$scope['challan_date']=value.challan_date;  
					$scope['tbl_party_id_name']=value.tbl_party_id_name;  
					$scope['tbl_party_id']=value.tbl_party_id;								
					$scope['comment']=value.comment;
				});	
				
			});		
	
		}

	}
	
	$scope.GetAllList=function(fromdate,todate){
			//var BaseUrl=domain_name+"Primary_sale_controller/ConsignmentList/";
			//data list GetAllConsignment			
			var data_link=BaseUrl+'GetAllList/PAYMENT/-/-/'+fromdate+'/'+todate;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{$scope.ListOfTransactions=response.data;});
	}
	
	$scope.print_barcode = function(id_header) 
	{ 
		var BaseUrl=domain_name+"Project_controller/print_all/";
		var data_link=BaseUrl+id_header;
		window.popup(data_link); 
	};

}]);

//************************ACCOUNT PURCHASE END*****************************************//



app.controller('AccountsReceive',['$scope','$rootScope','$http','AccountsReceive',
function($scope,$rootScope,$http,AccountsReceive){
	"use strict";
	
	//var domain_name="http://localhost/abir_das_unitedlab/SATNAM/";	
	var BaseUrl=domain_name+"Accounts_controller/AccountsTransactions/AccountsReceive/";

		$rootScope.search = function(searchelement){
		$rootScope.searchelement=searchelement;
		$rootScope.suggestions = [];
		$rootScope.searchItems=[];
		//console.log($rootScope.searchelement);
		AccountsReceive.list_items($rootScope.searchelement,$scope.trantype);
		//AccountsReceive.list_items($rootScope.searchelement);
		$rootScope.searchItems.sort();	
		var myMaxSuggestionListLength = 0;
		for(var i=0; i<$rootScope.searchItems.length; i++){
			var searchItemsSmallLetters = angular.uppercase($rootScope.searchItems[i]);
			var searchTextSmallLetters = angular.uppercase($scope[$rootScope.searchelement]);
			if( searchItemsSmallLetters.indexOf(searchTextSmallLetters) !== -1){
				$rootScope.suggestions.push(searchItemsSmallLetters);
				myMaxSuggestionListLength += 1;
				if(myMaxSuggestionListLength === 12){
					break;
				}
			}
		}
	};
	
	$rootScope.$watch('selectedIndex',function(val){		
		if(val !== -1) {
			$scope[$rootScope.searchelement] =
			$rootScope.suggestions[$rootScope.selectedIndex];
		}
	});		
	$rootScope.checkKeyDown = function(event){
		console.log(event.keyCode);

		if(event.keyCode === 40){//down key, increment selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex+1 < $rootScope.suggestions.length){
				$rootScope.selectedIndex++;
			}else{
				$rootScope.selectedIndex = 0;
			}
		}else if(event.keyCode === 38){ //up key, decrement selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex-1 >= 0){
				$rootScope.selectedIndex--;
			}else{
				$rootScope.selectedIndex = $rootScope.suggestions.length-1;
			}
		}
		else if(event.keyCode === 13){ //enter key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			//console.log($rootScope.selectedIndex);
			event.preventDefault();			
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];
			$rootScope.selectedIndex = -1;
		}
		else if(event.keyCode === 9){ //enter tab key
			//console.log($rootScope.selectedIndex);
			if($rootScope.selectedIndex>-1){
				$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			}			

		}else if(event.keyCode === 27){ //ESC key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			console.log($rootScope.selectedIndex);
			event.preventDefault();
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];
			$rootScope.selectedIndex = -1;
		}else{
			$rootScope.search();	
		}
	};
	
	//ClickOutSide
	var exclude1 = document.getElementById($rootScope.searchelement);
	$rootScope.hideMenu = function($event){
		$rootScope.search();
		//make a condition for every object you wat to exclude
		if($event.target !== exclude1) {
			$rootScope.searchItems=[];
			$rootScope.suggestions = [];
			$rootScope.selectedIndex = -1;
		}
	};
	//======================================
	
	//Function To Call on ng-keyup
	$rootScope.checkKeyUp = function(event){ 
		if(event.keyCode !== 8 || event.keyCode !== 46){//delete or backspace
			if($scope[$rootScope.searchelement] === ""){
				$rootScope.suggestions = [];
				$rootScope.searchItems=[];
				$rootScope.selectedIndex = -1;
			}
		}
	};
	//======================================
	//List Item Events
	//Function To Call on ng-click
	$rootScope.AssignValueAndHide = function(index){
	$scope[$rootScope.searchelement]= $rootScope.suggestions[index];

		if($rootScope.searchelement=='employee_name')
		{
			var str=$scope.employee_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"employee_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['employee_id']=value.id;  //ACTUAL ID
					$scope['employee_name']=value.name; // NAME 					
				});
			});
		}
		if($rootScope.searchelement=='dr_ledger_account_name')
		{
			var str=$scope.dr_ledger_account_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"dr_ledger_account/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['dr_ledger_account']=value.id;  //ACTUAL ID
					$scope['dr_ledger_account_name']=value.name; // NAME 
					$scope['DrAcBalance']=value.balance;										
				});
			});
		}
		if($rootScope.searchelement=='cr_ledger_account_name')
		{
			var str=$scope.cr_ledger_account_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"cr_ledger_account/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['cr_ledger_account']=value.id;  //ACTUAL ID
					$scope['cr_ledger_account_name']=value.name; // NAME 
					$scope['CrAcBalance']=value.balance;				
				});
			});
		}

		if($rootScope.searchelement=='truck_no')
		{
			var str=$scope.truck_no;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"truck_no_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['truck_id']=value.id;  //ACTUAL ID
					$scope['truck_no']=value.name; // NAME 
								
				});
			});
		}		

		if($rootScope.searchelement=='trip_no')
		{
			var str=$scope.trip_no;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"trip_no_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['tripId']=value.id;  //ACTUAL ID
					$scope['trip_no']=value.name;  //ACTUAL ID
				});
			});
		}		

		 $rootScope.suggestions=[];
		 $rootScope.searchItems=[];
		 $rootScope.selectedIndex = -1;
	};
	//===================END SEARCH SECTION =========================================

	$scope.savedata=function(){
		var data_link=BaseUrl+"SAVE";
		var success={};

		console.log('$scope.comment'+$scope.comment);

		var data_save = {
			'id_header': $scope.get_set_value($scope.id_header,'num','SETVALUE'),
			'id_detail': $scope.get_set_value($scope.id_detail,'num','SETVALUE'),
			'cr_ledger_account': $scope.get_set_value($scope.cr_ledger_account,'num','SETVALUE'),
			'dr_ledger_account': $scope.get_set_value($scope.dr_ledger_account,'num','SETVALUE'),
			'employee_id': $scope.get_set_value($scope.employee_id,'num','SETVALUE'),
			'tran_code': $scope.get_set_value($scope.tran_code,'str','SETVALUE'),
			'tran_date': $scope.get_set_value($scope.tran_date,'str','SETVALUE'),
			'employee_name': $scope.get_set_value($scope.employee_name,'str','SETVALUE'),
			'office_name': $scope.get_set_value($scope.office_name,'str','SETVALUE'),
			'dr_ledger_account_name': $scope.get_set_value($scope.dr_ledger_account_name,'str','SETVALUE'),
			'debit_amount': $scope.get_set_value($scope.debit_amount,'num','SETVALUE'),
			'cr_ledger_account_name': $scope.get_set_value($scope.cr_ledger_account_name,'str','SETVALUE'),
			'credit_amount': $scope.get_set_value($scope.credit_amount,'num','SETVALUE'),
			'truck_no': $scope.get_set_value($scope.truck_no,'str','SETVALUE'),
			'truck_id': $scope.get_set_value($scope.truck_id,'num','SETVALUE'),
			'transaction_details': $scope.get_set_value($scope.transaction_details,'str','SETVALUE'),	
			'tripId': $scope.get_set_value($scope.tripId,'num','SETVALUE'),
			'trantype': $scope.get_set_value($scope.trantype,'str','SETVALUE')		
		};	
	
		var config = {headers : 
			{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'	}
		}
		//$http.post(data_link, data,config)
		$http.post(data_link,data_save,config)
		.then (function success(response){
			console.log('response.data.id_header'+response.data.id_header);
			$scope.get_set_value(response.data,'','REFRESH');
			document.getElementById('dr_ledger_account_name').focus();
		},
		function error(response){
			$scope.errorMessage = 'Error adding user!';
			$scope.message = '';
	  });

	}
	
	$scope.get_set_value=
	function(datavalue,datatype,operation)
	{
		if(operation=='SETVALUE')
		{
			if(angular.isUndefined(datavalue)==true)
			{
				if(datatype=='num')
				{return 0;}
				if(datatype=='str')
				{return '';}		
			}
			else
			{return datavalue;}
		}
		if(operation=='DRCRCHECKING')
		{
			
			var savestatus='OK';
						
			if($scope.tran_date == null || $scope.tran_date === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER TRAN DATE';
			document.getElementById('tran_date').focus();
			}

			if($scope.dr_ledger_account == '0')			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER DEBIT A/C';
			document.getElementById('dr_ledger_account_name').focus();
			}
			if($scope.debit_amount == null || $scope.debit_amount === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER DEBIT AMOUNT';
			document.getElementById('debit_amount').focus();
			}

			if($scope.cr_ledger_account =='0')			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER CREDIT A/C';
			document.getElementById('cr_ledger_account_name').focus();
			}
			if($scope.credit_amount == null || $scope.credit_amount === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER CREDIT AMOUNT';
			document.getElementById('trantype').focus();
			}
					

			if(Number($scope.debit_amount)!=Number($scope.credit_amount) && savestatus=='OK')
			{	
				savestatus='NOTOK';
				$scope.savemsg='Debit and Credit Amount must be same';
			}
		
			if(savestatus=='OK')
			{
				$scope.savedata();
				$scope.savemsg='Receord Has been saved Successfully!';
			}
						
		}
		if(operation=='REFRESH')
		{		
			//console.log('datavalue.id_header '+datavalue.id_header);
		
			$scope.id_header=datavalue.id_header;
			$scope.employee_id=datavalue.employee_id;
			$scope.tran_code=datavalue.tran_code;
			$scope.tran_date=datavalue.tran_date;
			$scope.office_name=datavalue.office_name;
			$scope.comment=datavalue.comment;
			$scope.id_detail='';
			$scope.cr_ledger_account=$scope.dr_ledger_account=$scope.dr_ledger_account_name='';
			$scope.debit_amount=$scope.cr_ledger_account_name=$scope.credit_amount='';
			$scope.truck_id=$scope.truck_no='';

			//data list
			 var data_link=BaseUrl+"DTLLIST/"+$scope.id_header;
			 console.log(data_link);

			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});
			
			//$scope.consignment_value();
			//$scope.GetAllConsignment($scope.startdate,$scope.enddate);

		}
		if(operation=='NEWENTRY')
		{		
			$scope.id_header='';
			$scope.employee_id='';
			$scope.tran_code='';
			$scope.tran_date='';
			$scope.office_name='';
			$scope.comment='';
			$scope.id_detail='';
			$scope.cr_ledger_account=$scope.dr_ledger_account=$scope.dr_ledger_account_name='';
			$scope.debit_amount=$scope.cr_ledger_account_name=$scope.credit_amount='';
			$scope.truck_id=$scope.truck_no='';
			$scope.transaction_details='';

			//data list
			 var data_link=BaseUrl+"DTLLIST/"+0;
			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});

			 document.getElementById('tran_code').focus();
		}
		if(operation=='VIEWDTL')
		{	
			var data_link=BaseUrl+"VIEWDTL/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){
					$scope['id_detail']=value.id;  
					$scope['dr_ledger_account']=value.dr_ledger_account;  
					$scope['cr_ledger_account']=value.cr_ledger_account;  					
					$scope['dr_ledger_account_name']=value.dr_ledger_account_name;  
					$scope['cr_ledger_account_name']=value.cr_ledger_account_name;  
					$scope['dr_ledger_account']=value.dr_ledger_account;  
					$scope['cr_ledger_account_name']=value.cr_ledger_account_name; 
					$scope['debit_amount']=value.debit_amount;
					$scope['credit_amount']=value.credit_amount;
					$scope['employee_name']=value.employee_name;
					$scope['employee_id']=value.employee_id;
					$scope['office_name']=value.office_name;					
					$scope['transaction_details']=value.transaction_details;
					

				});			
				
			});
		}

		if(operation=='VIEWALLVALUE')
		{	
			var data_link=BaseUrl+"DTLLIST/"+datavalue;
			$http.get(data_link).then(function(response) 
			{$scope.listOfDetails=response.data;});

			var data_link=BaseUrl+"VIEWALLVALUE/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){
					$scope['id_header']=value.id_header;  					
					$scope['tran_code']=value.tran_code;  
					$scope['tran_date']=value.tran_date;					
					$scope['comment']=value.comment;
				});	
				
			});		
	
		}

	}
	
	$scope.GetAllList=function(fromdate,todate){
			//var BaseUrl=domain_name+"Primary_sale_controller/ConsignmentList/";
			//data list GetAllConsignment			
			var data_link=BaseUrl+'GetAllList/RECEIVE/-/-/'+fromdate+'/'+todate;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{$scope.ListOfTransactions=response.data;});
	}
	
	$scope.print_consignment = function() 
	{ 
		var data_link=domain_name+"Primary_sale_controller/builty_print/print_builty/"+$scope.id_header;
		window.popup(data_link); 
	};
	


	
	

}]);

//************************ACCOUNT RECEIVE END*****************************************//

//************************ACCOUNT PAYMENT START*****************************************//
//var app = angular.module('AccountsPayment',['GeneralServices']);
app.controller('AccountsPayment',['$scope','$rootScope','$http','AccountsPayment',
function($scope,$rootScope,$http,AccountsReceive){
	"use strict";

	//$scope.appState='EMIPAYMENT';
	//var domain_name="http://localhost/abir_das_unitedlab/SATNAM/";	
	var BaseUrl=domain_name+"Accounts_controller/AccountsTransactions/AccountsPayment/";
		$scope.tran_date=$rootScope.tran_date;

		$rootScope.search = function(searchelement){
		$rootScope.searchelement=searchelement;
		$rootScope.suggestions = [];
		$rootScope.searchItems=[];
		//console.log($rootScope.searchelement);
		AccountsReceive.list_items($rootScope.searchelement,$scope.trantype);
		$rootScope.searchItems.sort();	
		var myMaxSuggestionListLength = 0;
		for(var i=0; i<$rootScope.searchItems.length; i++){
			var searchItemsSmallLetters = angular.uppercase($rootScope.searchItems[i]);
			var searchTextSmallLetters = angular.uppercase($scope[$rootScope.searchelement]);
			if( searchItemsSmallLetters.indexOf(searchTextSmallLetters) !== -1){
				$rootScope.suggestions.push(searchItemsSmallLetters);
				myMaxSuggestionListLength += 1;
				if(myMaxSuggestionListLength === 12){
					break;
				}
			}
		}
	};
	
	$rootScope.$watch('selectedIndex',function(val){		
		if(val !== -1) {
			$scope[$rootScope.searchelement] =
			$rootScope.suggestions[$rootScope.selectedIndex];
		}
	});		
	$rootScope.checkKeyDown = function(event){
		console.log(event.keyCode);

		if(event.keyCode === 40){//down key, increment selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex+1 < $rootScope.suggestions.length){
				$rootScope.selectedIndex++;
			}else{
				$rootScope.selectedIndex = 0;
			}
		}else if(event.keyCode === 38){ //up key, decrement selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex-1 >= 0){
				$rootScope.selectedIndex--;
			}else{
				$rootScope.selectedIndex = $rootScope.suggestions.length-1;
			}
		}
		else if(event.keyCode === 13){ //enter key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			//console.log($rootScope.selectedIndex);
			event.preventDefault();			
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];
			$rootScope.selectedIndex = -1;
		}
		else if(event.keyCode === 9){ //enter tab key
			//console.log($rootScope.selectedIndex);
			if($rootScope.selectedIndex>-1){
				$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			}			

		}else if(event.keyCode === 27){ //ESC key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			console.log($rootScope.selectedIndex);
			event.preventDefault();
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];
			$rootScope.selectedIndex = -1;
		}else{
			$rootScope.search();	
		}
	};
	
	//ClickOutSide
	var exclude1 = document.getElementById($rootScope.searchelement);
	$rootScope.hideMenu = function($event){
		$rootScope.search();
		//make a condition for every object you wat to exclude
		if($event.target !== exclude1) {
			$rootScope.searchItems=[];
			$rootScope.suggestions = [];
			$rootScope.selectedIndex = -1;
		}
	};
	//======================================
	
	//Function To Call on ng-keyup
	$rootScope.checkKeyUp = function(event){ 
		if(event.keyCode !== 8 || event.keyCode !== 46){//delete or backspace
			if($scope[$rootScope.searchelement] === ""){
				$rootScope.suggestions = [];
				$rootScope.searchItems=[];
				$rootScope.selectedIndex = -1;
			}
		}
	};
	//======================================
	//List Item Events
	//Function To Call on ng-click
	$rootScope.AssignValueAndHide = function(index){
	$scope[$rootScope.searchelement]= $rootScope.suggestions[index];

		if($rootScope.searchelement=='employee_name')
		{
			var str=$scope.employee_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"employee_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['employee_id']=value.id;  //ACTUAL ID
					$scope['employee_name']=value.name; // NAME 					
				});
			});
		}
		if($rootScope.searchelement=='dr_ledger_account_name')
		{
			var str=$scope.dr_ledger_account_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"dr_ledger_account/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['dr_ledger_account']=value.id;  //ACTUAL ID
					$scope['dr_ledger_account_name']=value.name; // NAME 
					$scope['DrAcBalance']=value.balance;										
				});
			});
		}
		if($rootScope.searchelement=='cr_ledger_account_name')
		{
			var str=$scope.cr_ledger_account_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"cr_ledger_account/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['cr_ledger_account']=value.id;  //ACTUAL ID
					$scope['cr_ledger_account_name']=value.name; // NAME 
					$scope['CrAcBalance']=value.balance;				
				});
			});
		}

		if($rootScope.searchelement=='truck_no')
		{
			var str=$scope.truck_no;
			var trantype=$scope.trantype;
			var tran_date=$scope.tran_date;

			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"truck_no_id/"+id+"/"+trantype+"/-/"+tran_date;					
			console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['truck_id']=value.id;  //ACTUAL ID
					$scope['truck_no']=value.name; 
					$scope['employee_id']=value.driver_id; 
					$scope['employee_name']=value.drledger_name; 
					$scope['tripId']=value.tripId; 
					$scope['trantype_msg']=value.trantype_msg;													
				});
			});
		}		

		 $rootScope.suggestions=[];
		 $rootScope.searchItems=[];
		 $rootScope.selectedIndex = -1;
	};
	//===================END SEARCH SECTION =========================================

	$scope.savedata=function(){
		var data_link=BaseUrl+"SAVE";
		var success={};
		var data_save = {
			'id_header': $scope.get_set_value($scope.id_header,'num','SETVALUE'),
			'id_detail': $scope.get_set_value($scope.id_detail,'str','SETVALUE'),
			'cr_ledger_account': $scope.get_set_value($scope.cr_ledger_account,'num','SETVALUE'),
			'dr_ledger_account': $scope.get_set_value($scope.dr_ledger_account,'num','SETVALUE'),
			'employee_id': $scope.get_set_value($scope.employee_id,'num','SETVALUE'),
			'tran_code': $scope.get_set_value($scope.tran_code,'str','SETVALUE'),
			'tran_date': $scope.get_set_value($scope.tran_date,'str','SETVALUE'),
			'employee_name': $scope.get_set_value($scope.employee_name,'str','SETVALUE'),
			'office_name': $scope.get_set_value($scope.office_name,'str','SETVALUE'),
			'dr_ledger_account_name': $scope.get_set_value($scope.dr_ledger_account_name,'str','SETVALUE'),
			'debit_amount': $scope.get_set_value($scope.debit_amount,'num','SETVALUE'),
			'cr_ledger_account_name': $scope.get_set_value($scope.cr_ledger_account_name,'str','SETVALUE'),
			'credit_amount': $scope.get_set_value($scope.credit_amount,'num','SETVALUE'),
			'truck_no': $scope.get_set_value($scope.truck_no,'str','SETVALUE'),
			'truck_id': $scope.get_set_value($scope.truck_id,'num','SETVALUE'),
			'transaction_details': $scope.get_set_value($scope.transaction_details,'str','SETVALUE'),
			'dsl_qnty': $scope.get_set_value($scope.dsl_qnty,'num','SETVALUE'),
			'dsl_rate': $scope.get_set_value($scope.dsl_rate,'num','SETVALUE'),
			'trip_cashamt': $scope.get_set_value($scope.trip_cashamt,'num','SETVALUE'),
			'tripId': $scope.get_set_value($scope.tripId,'num','SETVALUE'),
			'trantype': $scope.get_set_value($scope.trantype,'str','SETVALUE')
									
		};	
	
		var config = {headers : 
			{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'	}
		}
		//$http.post(data_link, data,config)
		$http.post(data_link,data_save,config)
		.then (function success(response){
			console.log(response.data.id_header);
			$scope.get_set_value(response.data,'','REFRESH');
			document.getElementById('dr_ledger_account_name').focus();
		},
		function error(response){
			$scope.errorMessage = 'Error adding user!';
			$scope.message = '';
	  });

	}
	
	$scope.get_set_value=
	function(datavalue,datatype,operation)
	{
		if(operation=='SETVALUE')
		{
			if(angular.isUndefined(datavalue)==true)
			{
				if(datatype=='num')
				{return 0;}
				if(datatype=='str')
				{return '';}		
			}
			else
			{return datavalue;}
		}
		if(operation=='DRCRCHECKING')
		{
			var savestatus='OK';
			
			if($scope.trantype == null || $scope.trantype === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER TRAN TYPE';
			document.getElementById('trantype').focus();
			}
			if($scope.tran_date == null || $scope.tran_date === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER TRAN DATE';
			document.getElementById('tran_date').focus();
			}
			if($scope.dr_ledger_account == '0')			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER DEBIT A/C';
			document.getElementById('dr_ledger_account_name').focus();
			}
			if($scope.debit_amount == null || $scope.debit_amount === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER DEBIT AMOUNT';
			document.getElementById('debit_amount').focus();
			}
			if($scope.cr_ledger_account =='0')			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER CREDIT A/C';
			document.getElementById('cr_ledger_account_name').focus();
			}
			if($scope.credit_amount == null || $scope.credit_amount === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER CREDIT AMOUNT';
			document.getElementById('trantype').focus();
			}
			if($scope.trantype == null || $scope.trantype === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER TRAN TYPE';
			document.getElementById('trantype').focus();
			}
			if($scope.trantype == null || $scope.trantype === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER TRAN TYPE';
			document.getElementById('trantype').focus();
			}



			if(Number($scope.debit_amount)!=Number($scope.credit_amount) && savestatus=='OK')
			{	
				savestatus='NOTOK';
				$scope.savemsg='Debit and Credit Amount must be same';
			}
			
			if($scope.trantype=='TRIPHSD' && savestatus=='OK')
			{
				var triphsd=Number($scope.dsl_qnty)*Number($scope.dsl_rate)+
				Number($scope.trip_cashamt);
				console.log(triphsd);
				if(Number(triphsd)!=Number($scope.debit_amount))
				{	
					savestatus='NOTOK';
					$scope.savemsg='HSD DETAIL VALUE NOT MATCH WITH DEBIT AND CREDIT AMOUNT';
				}
			}
		
			if(savestatus=='OK')
			{
				$scope.savedata();
				$scope.savemsg='Receord Has been saved Successfully!';
			}
		}
		if(operation=='REFRESH')
		{		
			$scope.id_header=datavalue.id_header;
			$scope.employee_id=0;
			$scope.tran_code='';
			$scope.tran_date=datavalue.tran_date;
			$scope.office_name='';
			$scope.comment=datavalue.comment;
			$scope.id_detail='';
			$scope.cr_ledger_account=$scope.dr_ledger_account=$scope.dr_ledger_account_name='';
			$scope.debit_amount=$scope.cr_ledger_account_name=$scope.credit_amount='';
			$scope.truck_id=$scope.truck_no=$scope.employee_name='';
			$scope.dsl_qnty=$scope.dsl_rate=$scope.trip_cashamt=0;

			//data list
			 var data_link=BaseUrl+"DTLLIST/"+$scope.id_header;
			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});
			
			//$scope.consignment_value();
			//$scope.GetAllConsignment($scope.startdate,$scope.enddate);

		}
		if(operation=='NEWENTRY')
		{		
			$scope.id_header='';
			$scope.employee_id='';
			$scope.tran_code='';
			$scope.tran_date='';
			$scope.office_name='';
			$scope.comment='';
			$scope.id_detail='';
			$scope.cr_ledger_account=$scope.dr_ledger_account=$scope.dr_ledger_account_name='';
			$scope.debit_amount=$scope.cr_ledger_account_name=$scope.credit_amount='';
			$scope.truck_id=$scope.truck_no='';
			$scope.transaction_details='';

			//data list
			 var data_link=BaseUrl+"DTLLIST/"+0;
			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});

			 document.getElementById('tran_code').focus();
		}
		if(operation=='VIEWDTL')
		{	
			var data_link=BaseUrl+"VIEWDTL/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){
					$scope['id_detail']=value.id;  
					$scope['dr_ledger_account']=value.dr_ledger_account;  
					$scope['cr_ledger_account']=value.cr_ledger_account;  					
					$scope['dr_ledger_account_name']=value.dr_ledger_account_name;  
					$scope['cr_ledger_account_name']=value.cr_ledger_account_name;  
					$scope['dr_ledger_account']=value.dr_ledger_account;  
					$scope['cr_ledger_account_name']=value.cr_ledger_account_name; 
					$scope['debit_amount']=value.debit_amount;
					$scope['credit_amount']=value.credit_amount;
					$scope['employee_name']=value.employee_name;
					$scope['employee_id']=value.employee_id;
					$scope['office_name']=value.office_name;
					$scope['trantype']=value.trantype;

					$scope['transaction_details']=value.transaction_details;		
					

				});			
				
			});
		}

		if(operation=='VIEWALLVALUE')
		{	
			var data_link=BaseUrl+"DTLLIST/"+datavalue;
			$http.get(data_link).then(function(response) 
			{$scope.listOfDetails=response.data;});

			var data_link=BaseUrl+"VIEWALLVALUE/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){
					$scope['id_header']=value.id_header;  					
					$scope['tran_code']=value.tran_code;  
					$scope['tran_date']=value.tran_date;					
					$scope['comment']=value.comment;
				});	
				
			});		
	
		}

	}
	
	$scope.GetAllList=function(fromdate,todate){
			//var BaseUrl=domain_name+"Primary_sale_controller/ConsignmentList/";
			//data list GetAllConsignment			
			var data_link=BaseUrl+'GetAllList/PAYMENT/-/-/'+fromdate+'/'+todate;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{$scope.ListOfTransactions=response.data;});
	}
	
	$scope.print_consignment = function() 
	{ 
		var data_link=domain_name+"Primary_sale_controller/builty_print/print_builty/"+$scope.id_header;
		window.popup(data_link); 
	};

}]);

//************************ACCOUNT PAYMENT END*****************************************//


//************************ACCOUNT JOURNAL START*****************************************//
app.controller('AccountsJournal',['$scope','$rootScope','$http','AccountsJournal',
function($scope,$rootScope,$http,AccountsReceive){
	"use strict";
	
	//var domain_name="http://localhost/abir_das_unitedlab/SATNAM/";	
	var BaseUrl=domain_name+"Accounts_controller/AccountsTransactions/AccountsJournal/";

		$rootScope.search = function(searchelement){
		$rootScope.searchelement=searchelement;
		$rootScope.suggestions = [];
		$rootScope.searchItems=[];
		console.log($rootScope.searchelement);
		AccountsReceive.list_items($rootScope.searchelement);
		$rootScope.searchItems.sort();	
		var myMaxSuggestionListLength = 0;
		for(var i=0; i<$rootScope.searchItems.length; i++){
			var searchItemsSmallLetters = angular.uppercase($rootScope.searchItems[i]);
			var searchTextSmallLetters = angular.uppercase($scope[$rootScope.searchelement]);
			if( searchItemsSmallLetters.indexOf(searchTextSmallLetters) !== -1){
				$rootScope.suggestions.push(searchItemsSmallLetters);
				myMaxSuggestionListLength += 1;
				if(myMaxSuggestionListLength === 12){
					break;
				}
			}
		}
	};
	
	$rootScope.$watch('selectedIndex',function(val){		
		if(val !== -1) {
			$scope[$rootScope.searchelement] =
			$rootScope.suggestions[$rootScope.selectedIndex];
		}
	});		
	$rootScope.checkKeyDown = function(event){
		console.log(event.keyCode);

		if(event.keyCode === 40){//down key, increment selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex+1 < $rootScope.suggestions.length){
				$rootScope.selectedIndex++;
			}else{
				$rootScope.selectedIndex = 0;
			}
		}else if(event.keyCode === 38){ //up key, decrement selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex-1 >= 0){
				$rootScope.selectedIndex--;
			}else{
				$rootScope.selectedIndex = $rootScope.suggestions.length-1;
			}
		}
		else if(event.keyCode === 13){ //enter key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			//console.log($rootScope.selectedIndex);
			event.preventDefault();			
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];
			$rootScope.selectedIndex = -1;
		}
		else if(event.keyCode === 9){ //enter tab key
			//console.log($rootScope.selectedIndex);
			if($rootScope.selectedIndex>-1){
				$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			}			

		}else if(event.keyCode === 27){ //ESC key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			console.log($rootScope.selectedIndex);
			event.preventDefault();
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];
			$rootScope.selectedIndex = -1;
		}else{
			$rootScope.search();	
		}
	};
	
	//ClickOutSide
	var exclude1 = document.getElementById($rootScope.searchelement);
	$rootScope.hideMenu = function($event){
		$rootScope.search();
		//make a condition for every object you wat to exclude
		if($event.target !== exclude1) {
			$rootScope.searchItems=[];
			$rootScope.suggestions = [];
			$rootScope.selectedIndex = -1;
		}
	};
	//======================================
	
	//Function To Call on ng-keyup
	$rootScope.checkKeyUp = function(event){ 
		if(event.keyCode !== 8 || event.keyCode !== 46){//delete or backspace
			if($scope[$rootScope.searchelement] === ""){
				$rootScope.suggestions = [];
				$rootScope.searchItems=[];
				$rootScope.selectedIndex = -1;
			}
		}
	};
	//======================================
	//List Item Events
	//Function To Call on ng-click
	$rootScope.AssignValueAndHide = function(index){
	$scope[$rootScope.searchelement]= $rootScope.suggestions[index];

		if($rootScope.searchelement=='employee_name')
		{
			var str=$scope.employee_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"employee_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['employee_id']=value.id;  //ACTUAL ID
					$scope['employee_name']=value.name; // NAME 					
				});
			});
		}
		if($rootScope.searchelement=='dr_ledger_account_name')
		{
			var str=$scope.dr_ledger_account_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"dr_ledger_account/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['dr_ledger_account']=value.id;  //ACTUAL ID
					$scope['dr_ledger_account_name']=value.name; // NAME 
					$scope['DrAcBalance']=value.balance;										
				});
			});
		}
		if($rootScope.searchelement=='cr_ledger_account_name')
		{
			var str=$scope.cr_ledger_account_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"cr_ledger_account/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['cr_ledger_account']=value.id;  //ACTUAL ID
					$scope['cr_ledger_account_name']=value.name; // NAME 
					$scope['CrAcBalance']=value.balance;				
				});
			});
		}

		if($rootScope.searchelement=='truck_no')
		{
			var str=$scope.truck_no;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"truck_no_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['truck_id']=value.id;  //ACTUAL ID
					$scope['truck_no']=value.name; // NAME 
								
				});
			});
		}		

		 $rootScope.suggestions=[];
		 $rootScope.searchItems=[];
		 $rootScope.selectedIndex = -1;
	};
	//===================END SEARCH SECTION =========================================

	$scope.savedata=function(){
		var data_link=BaseUrl+"SAVE";
		var success={};
		var data_save = {
			'id_header': $scope.get_set_value($scope.id_header,'num','SETVALUE'),
			'id_detail': $scope.get_set_value($scope.id_detail,'str','SETVALUE'),
			'cr_ledger_account': $scope.get_set_value($scope.cr_ledger_account,'num','SETVALUE'),
			'dr_ledger_account': $scope.get_set_value($scope.dr_ledger_account,'num','SETVALUE'),
			'employee_id': $scope.get_set_value($scope.employee_id,'num','SETVALUE'),
			'tran_code': $scope.get_set_value($scope.tran_code,'str','SETVALUE'),
			'tran_date': $scope.get_set_value($scope.tran_date,'str','SETVALUE'),
			'employee_name': $scope.get_set_value($scope.employee_name,'str','SETVALUE'),
			'office_name': $scope.get_set_value($scope.office_name,'str','SETVALUE'),
			'dr_ledger_account_name': $scope.get_set_value($scope.dr_ledger_account_name,'str','SETVALUE'),
			'debit_amount': $scope.get_set_value($scope.debit_amount,'num','SETVALUE'),
			'cr_ledger_account_name': $scope.get_set_value($scope.cr_ledger_account_name,'str','SETVALUE'),
			'credit_amount': $scope.get_set_value($scope.credit_amount,'num','SETVALUE'),
			'truck_no': $scope.get_set_value($scope.truck_no,'str','SETVALUE'),
			'truck_id': $scope.get_set_value($scope.truck_id,'num','SETVALUE'),
			'transaction_details': $scope.get_set_value($scope.transaction_details,'str','SETVALUE')			
		};	
	
		var config = {headers : 
			{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'	}
		}
		//$http.post(data_link, data,config)
		$http.post(data_link,data_save,config)
		.then (function success(response){
			console.log(response.data.id_header);
			$scope.get_set_value(response.data,'','REFRESH');
			document.getElementById('dr_ledger_account_name').focus();
		},
		function error(response){
			$scope.errorMessage = 'Error adding user!';
			$scope.message = '';
	  });

	}
	
	$scope.get_set_value=
	function(datavalue,datatype,operation)
	{
		if(operation=='SETVALUE')
		{
			if(angular.isUndefined(datavalue)==true)
			{
				if(datatype=='num')
				{return 0;}
				if(datatype=='str')
				{return '';}		
			}
			else
			{return datavalue;}
		}
		if(operation=='DRCRCHECKING')
		{
			if(Number($scope.debit_amount)==Number($scope.credit_amount))
			{ $scope.savedata();
				$scope.savemsg='Receord Has been saved Successfully!';
			}
			else
			{$scope.savemsg='Debit and Credit Amount must be same';}
		}
		if(operation=='REFRESH')
		{		
			$scope.id_header=datavalue.id_header;
			$scope.employee_id=datavalue.employee_id;
			$scope.tran_code=datavalue.tran_code;
			$scope.tran_date=datavalue.tran_date;
			$scope.office_name=datavalue.office_name;
			$scope.comment=datavalue.comment;
			$scope.id_detail='';
			$scope.cr_ledger_account=$scope.dr_ledger_account=$scope.dr_ledger_account_name='';
			$scope.debit_amount=$scope.cr_ledger_account_name=$scope.credit_amount='';
			$scope.truck_id=$scope.truck_no='';

			//data list
			 var data_link=BaseUrl+"DTLLIST/"+$scope.id_header;
			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});
			
			//$scope.consignment_value();
			//$scope.GetAllConsignment($scope.startdate,$scope.enddate);

		}
		if(operation=='NEWENTRY')
		{		
			$scope.id_header='';
			$scope.employee_id='';
			$scope.tran_code='';
			$scope.tran_date='';
			$scope.office_name='';
			$scope.comment='';
			$scope.id_detail='';
			$scope.cr_ledger_account=$scope.dr_ledger_account=$scope.dr_ledger_account_name='';
			$scope.debit_amount=$scope.cr_ledger_account_name=$scope.credit_amount='';
			$scope.truck_id=$scope.truck_no='';
			$scope.transaction_details='';

			//data list
			 var data_link=BaseUrl+"DTLLIST/"+0;
			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});

			 document.getElementById('tran_code').focus();
		}
		if(operation=='VIEWDTL')
		{	
			var data_link=BaseUrl+"VIEWDTL/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){
					$scope['id_detail']=value.id;  
					$scope['dr_ledger_account']=value.dr_ledger_account;  
					$scope['cr_ledger_account']=value.cr_ledger_account;  					
					$scope['dr_ledger_account_name']=value.dr_ledger_account_name;  
					$scope['cr_ledger_account_name']=value.cr_ledger_account_name;  
					$scope['dr_ledger_account']=value.dr_ledger_account;  
					$scope['cr_ledger_account_name']=value.cr_ledger_account_name; 
					$scope['debit_amount']=value.debit_amount;
					$scope['credit_amount']=value.credit_amount;
					$scope['employee_name']=value.employee_name;
					$scope['employee_id']=value.employee_id;
					$scope['office_name']=value.office_name;
					$scope['transaction_details']=value.transaction_details;	

				});			
				
			});
		}

		if(operation=='VIEWALLVALUE')
		{	
			var data_link=BaseUrl+"DTLLIST/"+datavalue;
			$http.get(data_link).then(function(response) 
			{$scope.listOfDetails=response.data;});

			var data_link=BaseUrl+"VIEWALLVALUE/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){
					$scope['id_header']=value.id_header;  					
					$scope['tran_code']=value.tran_code;  
					$scope['tran_date']=value.tran_date;					
					$scope['comment']=value.comment;
				});	
				
			});		
	
		}

	}
	
	$scope.GetAllList=function(fromdate,todate){
			//var BaseUrl=domain_name+"Primary_sale_controller/ConsignmentList/";
			//data list GetAllConsignment			
			var data_link=BaseUrl+'GetAllList/JOURNAL/-/-/'+fromdate+'/'+todate;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{$scope.ListOfTransactions=response.data;});
	}
	
	$scope.print_consignment = function() 
	{ 
		var data_link=domain_name+"Primary_sale_controller/builty_print/print_builty/"+$scope.id_header;
		window.popup(data_link); 
	};

}]);

//************************ACCOUNT JOURNAL END*****************************************//


//************************ACCOUNT CONTRA START*****************************************//

app.controller('AccountsContra',['$scope','$rootScope','$http','AccountsContra',
function($scope,$rootScope,$http,AccountsReceive){
	"use strict";
	
	//var domain_name="http://localhost/abir_das_unitedlab/SATNAM/";	
	var BaseUrl=domain_name+"Accounts_controller/AccountsTransactions/AccountsContra/";

		$rootScope.search = function(searchelement){
		$rootScope.searchelement=searchelement;
		$rootScope.suggestions = [];
		$rootScope.searchItems=[];
		console.log($rootScope.searchelement);
		AccountsReceive.list_items($rootScope.searchelement);
		$rootScope.searchItems.sort();	
		var myMaxSuggestionListLength = 0;
		for(var i=0; i<$rootScope.searchItems.length; i++){
			var searchItemsSmallLetters = angular.uppercase($rootScope.searchItems[i]);
			var searchTextSmallLetters = angular.uppercase($scope[$rootScope.searchelement]);
			if( searchItemsSmallLetters.indexOf(searchTextSmallLetters) !== -1){
				$rootScope.suggestions.push(searchItemsSmallLetters);
				myMaxSuggestionListLength += 1;
				if(myMaxSuggestionListLength === 12){
					break;
				}
			}
		}
	};
	
	$rootScope.$watch('selectedIndex',function(val){		
		if(val !== -1) {
			$scope[$rootScope.searchelement] =
			$rootScope.suggestions[$rootScope.selectedIndex];
		}
	});		
	$rootScope.checkKeyDown = function(event){
		console.log(event.keyCode);

		if(event.keyCode === 40){//down key, increment selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex+1 < $rootScope.suggestions.length){
				$rootScope.selectedIndex++;
			}else{
				$rootScope.selectedIndex = 0;
			}
		}else if(event.keyCode === 38){ //up key, decrement selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex-1 >= 0){
				$rootScope.selectedIndex--;
			}else{
				$rootScope.selectedIndex = $rootScope.suggestions.length-1;
			}
		}
		else if(event.keyCode === 13){ //enter key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			//console.log($rootScope.selectedIndex);
			event.preventDefault();			
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];
			$rootScope.selectedIndex = -1;
		}
		else if(event.keyCode === 9){ //enter tab key
			//console.log($rootScope.selectedIndex);
			if($rootScope.selectedIndex>-1){
				$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			}			

		}else if(event.keyCode === 27){ //ESC key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			console.log($rootScope.selectedIndex);
			event.preventDefault();
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];
			$rootScope.selectedIndex = -1;
		}else{
			$rootScope.search();	
		}
	};
	
	//ClickOutSide
	var exclude1 = document.getElementById($rootScope.searchelement);
	$rootScope.hideMenu = function($event){
		$rootScope.search();
		//make a condition for every object you wat to exclude
		if($event.target !== exclude1) {
			$rootScope.searchItems=[];
			$rootScope.suggestions = [];
			$rootScope.selectedIndex = -1;
		}
	};
	//======================================
	
	//Function To Call on ng-keyup
	$rootScope.checkKeyUp = function(event){ 
		if(event.keyCode !== 8 || event.keyCode !== 46){//delete or backspace
			if($scope[$rootScope.searchelement] === ""){
				$rootScope.suggestions = [];
				$rootScope.searchItems=[];
				$rootScope.selectedIndex = -1;
			}
		}
	};
	//======================================
	//List Item Events
	//Function To Call on ng-click
	$rootScope.AssignValueAndHide = function(index){
	$scope[$rootScope.searchelement]= $rootScope.suggestions[index];

		if($rootScope.searchelement=='employee_name')
		{
			var str=$scope.employee_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"employee_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['employee_id']=value.id;  //ACTUAL ID
					$scope['employee_name']=value.name; // NAME 					
				});
			});
		}
		if($rootScope.searchelement=='dr_ledger_account_name')
		{
			var str=$scope.dr_ledger_account_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"dr_ledger_account/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['dr_ledger_account']=value.id;  //ACTUAL ID
					$scope['dr_ledger_account_name']=value.name; // NAME 
					$scope['DrAcBalance']=value.balance;										
				});
			});
		}
		if($rootScope.searchelement=='cr_ledger_account_name')
		{
			var str=$scope.cr_ledger_account_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"cr_ledger_account/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['cr_ledger_account']=value.id;  //ACTUAL ID
					$scope['cr_ledger_account_name']=value.name; // NAME 
					$scope['CrAcBalance']=value.balance;				
				});
			});
		}

		if($rootScope.searchelement=='truck_no')
		{
			var str=$scope.truck_no;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"truck_no_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['truck_id']=value.id;  //ACTUAL ID
					$scope['truck_no']=value.name; // NAME 
								
				});
			});
		}		

		 $rootScope.suggestions=[];
		 $rootScope.searchItems=[];
		 $rootScope.selectedIndex = -1;
	};
	//===================END SEARCH SECTION =========================================

	$scope.savedata=function(){
		var data_link=BaseUrl+"SAVE";
		var success={};
		var data_save = {
			'id_header': $scope.get_set_value($scope.id_header,'num','SETVALUE'),
			'id_detail': $scope.get_set_value($scope.id_detail,'str','SETVALUE'),
			'cr_ledger_account': $scope.get_set_value($scope.cr_ledger_account,'num','SETVALUE'),
			'dr_ledger_account': $scope.get_set_value($scope.dr_ledger_account,'num','SETVALUE'),
			'employee_id': $scope.get_set_value($scope.employee_id,'num','SETVALUE'),
			'tran_code': $scope.get_set_value($scope.tran_code,'str','SETVALUE'),
			'tran_date': $scope.get_set_value($scope.tran_date,'str','SETVALUE'),
			'employee_name': $scope.get_set_value($scope.employee_name,'str','SETVALUE'),
			'office_name': $scope.get_set_value($scope.office_name,'str','SETVALUE'),
			'dr_ledger_account_name': $scope.get_set_value($scope.dr_ledger_account_name,'str','SETVALUE'),
			'debit_amount': $scope.get_set_value($scope.debit_amount,'num','SETVALUE'),
			'cr_ledger_account_name': $scope.get_set_value($scope.cr_ledger_account_name,'str','SETVALUE'),
			'credit_amount': $scope.get_set_value($scope.credit_amount,'num','SETVALUE'),
			'truck_no': $scope.get_set_value($scope.truck_no,'str','SETVALUE'),
			'truck_id': $scope.get_set_value($scope.truck_id,'num','SETVALUE'),
			'transaction_details': $scope.get_set_value($scope.transaction_details,'str','SETVALUE')			
		};	
	
		var config = {headers : 
			{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'	}
		}
		//$http.post(data_link, data,config)
		$http.post(data_link,data_save,config)
		.then (function success(response){
			console.log(response.data.id_header);
			$scope.get_set_value(response.data,'','REFRESH');
			document.getElementById('dr_ledger_account_name').focus();
		},
		function error(response){
			$scope.errorMessage = 'Error adding user!';
			$scope.message = '';
	  });

	}
	
	$scope.get_set_value=
	function(datavalue,datatype,operation)
	{
		if(operation=='SETVALUE')
		{
			if(angular.isUndefined(datavalue)==true)
			{
				if(datatype=='num')
				{return 0;}
				if(datatype=='str')
				{return '';}		
			}
			else
			{return datavalue;}
		}
		if(operation=='DRCRCHECKING')
		{
			if(Number($scope.debit_amount)==Number($scope.credit_amount))
			{ $scope.savedata();
				$scope.savemsg='Receord Has been saved Successfully!';
			}
			else
			{$scope.savemsg='Debit and Credit Amount must be same';}
		}
		if(operation=='REFRESH')
		{		
			$scope.id_header=datavalue.id_header;
			$scope.employee_id=datavalue.employee_id;
			$scope.tran_code=datavalue.tran_code;
			$scope.tran_date=datavalue.tran_date;
			$scope.office_name=datavalue.office_name;
			$scope.comment=datavalue.comment;
			$scope.id_detail='';
			$scope.cr_ledger_account=$scope.dr_ledger_account=$scope.dr_ledger_account_name='';
			$scope.debit_amount=$scope.cr_ledger_account_name=$scope.credit_amount='';
			$scope.truck_id=$scope.truck_no='';

			//data list
			 var data_link=BaseUrl+"DTLLIST/"+$scope.id_header;
			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});
			
			//$scope.consignment_value();
			//$scope.GetAllConsignment($scope.startdate,$scope.enddate);

		}
		if(operation=='NEWENTRY')
		{		
			$scope.id_header='';
			$scope.employee_id='';
			$scope.tran_code='';
			$scope.tran_date='';
			$scope.office_name='';
			$scope.comment='';
			$scope.id_detail='';
			$scope.cr_ledger_account=$scope.dr_ledger_account=$scope.dr_ledger_account_name='';
			$scope.debit_amount=$scope.cr_ledger_account_name=$scope.credit_amount='';
			$scope.truck_id=$scope.truck_no='';
			$scope.transaction_details='';
			
			//data list
			 var data_link=BaseUrl+"DTLLIST/"+0;
			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});

			 document.getElementById('tran_code').focus();
		}
		if(operation=='VIEWDTL')
		{	
			var data_link=BaseUrl+"VIEWDTL/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){
					$scope['id_detail']=value.id;  
					$scope['dr_ledger_account']=value.dr_ledger_account;  
					$scope['cr_ledger_account']=value.cr_ledger_account;  					
					$scope['dr_ledger_account_name']=value.dr_ledger_account_name;  
					$scope['cr_ledger_account_name']=value.cr_ledger_account_name;  
					$scope['dr_ledger_account']=value.dr_ledger_account;  
					$scope['cr_ledger_account_name']=value.cr_ledger_account_name; 
					$scope['debit_amount']=value.debit_amount;
					$scope['credit_amount']=value.credit_amount;
					$scope['employee_name']=value.employee_name;
					$scope['employee_id']=value.employee_id;
					$scope['office_name']=value.office_name;
					$scope['transaction_details']=value.transaction_details;	

				});			
				
			});
		}

		if(operation=='VIEWALLVALUE')
		{	
			var data_link=BaseUrl+"DTLLIST/"+datavalue;
			$http.get(data_link).then(function(response) 
			{$scope.listOfDetails=response.data;});

			var data_link=BaseUrl+"VIEWALLVALUE/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){
					$scope['id_header']=value.id_header;  					
					$scope['tran_code']=value.tran_code;  
					$scope['tran_date']=value.tran_date;					
					$scope['comment']=value.comment;
				});	
				
			});		
	
		}

	}
	
	$scope.GetAllList=function(fromdate,todate){
			//var BaseUrl=domain_name+"Primary_sale_controller/ConsignmentList/";
			//data list GetAllConsignment			
			var data_link=BaseUrl+'GetAllList/CONTRA/-/-/'+fromdate+'/'+todate;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{$scope.ListOfTransactions=response.data;});
	}
	
	$scope.print_consignment = function() 
	{ 
		var data_link=domain_name+"Primary_sale_controller/builty_print/print_builty/"+$scope.id_header;
		window.popup(data_link); 
	};

}]);

//************************ACCOUNT CONTRA END*****************************************//





//************************ACCOUNT PURCHASE START*****************************************//
app.controller('Sale_test',['$scope','$rootScope','$http','Sale_test',
function($scope,$rootScope,$http,Sale_test){
	"use strict";

	//$scope.appState='EMIPAYMENT';
	//var domain_name="http://localhost/abir_das_unitedlab/SATNAM/";	
	var BaseUrl=domain_name+"Accounts_controller/AccountsTransactions/SaleEntry/";
		$scope.tran_date=$rootScope.tran_date;


		$rootScope.search = function(searchelement){			
		$rootScope.searchelement=searchelement;
		$rootScope.suggestions = [];
		$rootScope.searchItems=[];
		//console.log($rootScope.searchelement);		
		Sale_test.list_items($rootScope.searchelement,$scope.product_id);

		$rootScope.searchItems.sort();	
		var myMaxSuggestionListLength = 0;
		for(var i=0; i<$rootScope.searchItems.length; i++){
			var searchItemsSmallLetters = angular.uppercase($rootScope.searchItems[i]);
			var searchTextSmallLetters = angular.uppercase($scope[$rootScope.searchelement]);
			if( searchItemsSmallLetters.indexOf(searchTextSmallLetters) !== -1){
				$rootScope.suggestions.push(searchItemsSmallLetters);
				myMaxSuggestionListLength += 1;
				if(myMaxSuggestionListLength === 12)
				{break;}
			}
		}
	};
	
	$rootScope.$watch('selectedIndex',function(val){		
		if(val !== -1) {					
			$scope[$rootScope.searchelement] =
			$rootScope.suggestions[$rootScope.selectedIndex];		
		}
	});		

	$rootScope.checkKeyDown = function(event){
		if(event.keyCode === 40){//down key, increment selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex+1 < $rootScope.suggestions.length){
				$rootScope.selectedIndex++;
			}else{
				$rootScope.selectedIndex = 0;
			}
		
		}else if(event.keyCode === 38){ //up key, decrement selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex-1 >= 0){
				$rootScope.selectedIndex--;
			}else{
				$rootScope.selectedIndex = $rootScope.suggestions.length-1;
			}
		}
		else if(event.keyCode === 13){ //enter key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			//console.log($rootScope.selectedIndex);
			event.preventDefault();			
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];		
			$rootScope.selectedIndex = -1;
		}
		else if(event.keyCode === 9){ //enter tab key
			//console.log($rootScope.selectedIndex);
			if($rootScope.selectedIndex>-1){
				$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			}			

		}else if(event.keyCode === 27){ //ESC key, empty suggestions array
			$rootScope.AssignValueAndHide($rootScope.selectedIndex);
			console.log($rootScope.selectedIndex);
			event.preventDefault();
			$rootScope.suggestions = [];
			$rootScope.searchItems=[];		
			$rootScope.selectedIndex = -1;
		}else{
			$rootScope.search();	
		}
	};
	
	//ClickOutSide
	var exclude1 = document.getElementById($rootScope.searchelement);
	$rootScope.hideMenu = function($event){
		$rootScope.search();
		//make a condition for every object you wat to exclude
		if($event.target !== exclude1) {
			$rootScope.searchItems=[];
			$rootScope.suggestions = [];			
			$rootScope.selectedIndex = -1;
		}
	};
	//======================================
	
	//Function To Call on ng-keyup
	$rootScope.checkKeyUp = function(event){ 
		if(event.keyCode !== 8 || event.keyCode !== 46){//delete or backspace
			if($scope[$rootScope.searchelement] === ""){
				$rootScope.suggestions = [];
				$rootScope.searchItems=[];			
				$rootScope.selectedIndex = -1;
			}
		}
	};
	//======================================
	//List Item Events
	//Function To Call on ng-click
	$rootScope.AssignValueAndHide = function(index){
	$scope[$rootScope.searchelement]= $rootScope.suggestions[index];

		if($rootScope.searchelement=='doctor_ledger_id_name')
		{
			var str=$scope.doctor_ledger_id_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"doctor_ledger_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['doctor_ledger_id']=value.id;  //ACTUAL ID
					$scope['doctor_ledger_id_name']=value.name; // NAME 					
				});
			});
		}

		if($rootScope.searchelement=='tbl_party_id_name')
		{
			var str=$scope.tbl_party_id_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"tbl_party_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['tbl_party_id']=value.id;  //ACTUAL ID
					$scope['tbl_party_id_name']=value.name; // NAME 					
				});
			});
		}
		

		if($rootScope.searchelement=='product_id_name')
		{
			var str=$scope.product_id_name;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"product_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['product_id']=value.id;  //ACTUAL ID
					$scope['product_id_name']=value.name; // NAME 	
					$scope['tax_ledger_id']=value.tax_ledger_id; // NAME 	
					$scope['tax_per']=value.tax_per; // NAME 															
				});
			});
		}

		if($rootScope.searchelement=='product_id_name_mixer')
		{
			var str=$scope.product_id_name_mixer;
			var id=str.substring(str.lastIndexOf("#")+1,str.lastIndexOf(")"));	
			var data_link=BaseUrl+"product_id/"+id;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['product_id']=value.id;  //ACTUAL ID
					$scope['product_id_name_mixer']=value.name; // NAME 	
					$scope['tax_ledger_id']=value.tax_ledger_id; // NAME 	
					$scope['tax_per']=value.tax_per; // NAME 	
					$scope['TRANTYPE']='MIXER'; // NAME 
																			
				});
			});
		}

		if($rootScope.searchelement=='batchno')
		{			
			var data_link=BaseUrl+"BATCH_DETAILS/"+$scope.product_id+"/"+$scope.batchno;					
			//console.log(data_link);					
			$http.get(data_link).then(function(response){
				angular.forEach(response.data,function(value,key){
					$scope['exp_monyr']=value.exp_monyr;  
					$scope['mfg_monyr']=value.mfg_monyr; 
					$scope['rate']=value.rate; 
					$scope['srate']=value.srate; 
					$scope['mrp']=value.mrp; 
					$scope['ptr']=value.ptr; 
					$scope['AVAILABLE_QTY']=value.AVAILABLE_QTY; 
																	
				});
			});
		}
			
		 $rootScope.suggestions=[];
		 $rootScope.searchItems=[];		
		 $rootScope.selectedIndex = -1;
	};
	//===================END SEARCH SECTION =========================================

	$rootScope.search_batch = function(searchelement){			
		$rootScope.searchelement=searchelement;
		$rootScope.suggestions_batch = [];
		$rootScope.searchItems=[];

		var data_link=BaseUrl+"batchno/"+$scope.product_id;
		console.log(data_link);			
		$http.get(data_link)
		.then(function(response) {
		$rootScope.suggestions_batch=response.data	;
		});			

	};
	
	$rootScope.$watch('selectedIndex_batch',function(val){		
		if(val !== -1) {	
			$scope['batchno'] =
			$rootScope.suggestions_batch[$rootScope.selectedIndex_batch].batchno;		
		}
	});		

	$rootScope.checkKeyDown_batch = function(event){
		if(event.keyCode === 40){//down key, increment selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex_batch+1 < $rootScope.suggestions_batch.length){
				$rootScope.selectedIndex_batch++;
			}else{
				$rootScope.selectedIndex_batch = 0;
			}
		
		}else if(event.keyCode === 38){ //up key, decrement selectedIndex
			event.preventDefault();
			if($rootScope.selectedIndex_batch-1 >= 0){
				$rootScope.selectedIndex_batch--;
			}else{
				$rootScope.selectedIndex_batch = $rootScope.suggestions_batch.length-1;
			}
		}
		else if(event.keyCode === 13){ //enter key, empty suggestions array
			$rootScope.AssignValueAndHide_batch($rootScope.selectedIndex_batch);
			//console.log($rootScope.selectedIndex);
			event.preventDefault();			
			$rootScope.suggestions_batch = [];
			$rootScope.searchItems=[];		
			$rootScope.selectedIndex_batch = -1;
		}
		else if(event.keyCode === 9){ //enter tab key
			//console.log($rootScope.selectedIndex);
			if($rootScope.selectedIndex_batch>-1){
				$rootScope.AssignValueAndHide_batch($rootScope.selectedIndex_batch);
			}			

		}else if(event.keyCode === 27){ //ESC key, empty suggestions array
			$rootScope.AssignValueAndHide_batch($rootScope.selectedIndex_batch);			
			event.preventDefault();
			$rootScope.suggestions_batch = [];
			$rootScope.searchItems=[];		
			$rootScope.selectedIndex_batch = -1;
		}else{
			$rootScope.search_batch();	
		}
	};
	
	//ClickOutSide
	var exclude1 = document.getElementById($rootScope.batchno);
	$rootScope.hideMenu = function($event){
		$rootScope.search();
		//make a condition for every object you wat to exclude
		if($event.target !== exclude1) {
			$rootScope.searchItems=[];
			$rootScope.suggestions_batch = [];			
			$rootScope.selectedIndex_batch = -1;
		}
	};
	//======================================
	
	//Function To Call on ng-keyup
	$rootScope.checkKeyUp_batch = function(event){ 
		if(event.keyCode !== 8 || event.keyCode !== 46){//delete or backspace
			if($scope[$rootScope.searchelement] === ""){
				$rootScope.suggestions_batch = [];
				$rootScope.searchItems=[];			
				$rootScope.selectedIndex_batch = -1;
			}
		}
	};
	//======================================
	//List Item Events
	//Function To Call on ng-click
	$rootScope.AssignValueAndHide_batch = function(index)
	{

	$scope[$rootScope.searchelement]= $rootScope.suggestions_batch[index].batchno;
		//console.log($rootScope.suggestions_batch[index].exp_monyr);

	$scope['exp_monyr']=$rootScope.suggestions_batch[index].exp_monyr;  
	$scope['mfg_monyr']=$rootScope.suggestions_batch[index].mfg_monyr; 
	//$scope['rate']=$rootScope.suggestions_batch[index].rate; 
	$scope['rate']=$rootScope.suggestions_batch[index].srate; 
	$scope['srate']=$rootScope.suggestions_batch[index].srate; 
	$scope['mrp']=$rootScope.suggestions_batch[index].mrp; 
	$scope['ptr']=$rootScope.suggestions_batch[index].ptr; 
	$scope['AVAILABLE_QTY']=$rootScope.suggestions_batch[index].AVAILABLE_QTY; 
	
	$rootScope.suggestions_batch=[];
		 $rootScope.searchItems=[];		
		 $rootScope.selectedIndex = -1;
	};
	//===================END batch SEARCH SECTION =========================================


	$scope.savedata=function()
	{
		console.log('$scope.MIX_RAW_LINK_ID'+$scope.MIX_RAW_LINK_ID+
	    '$scope.RELATED_TO_MIXER'+$scope.RELATED_TO_MIXER+
	    '$scope.product_id'+$scope.product_id);
		
		
		var data_link=BaseUrl+"SAVE";
		var success={};		
		var data_save = {
			'id_header': $scope.get_set_value($scope.id_header,'num','SETVALUE'),
			'id_detail': $scope.get_set_value($scope.id_detail,'num','SETVALUE'),
			'doctor_ledger_id': $scope.get_set_value($scope.doctor_ledger_id,'num','SETVALUE'),
			'product_id': $scope.get_set_value($scope.product_id,'num','SETVALUE'),
			'MIX_RAW_LINK_ID': $scope.get_set_value($scope.MIX_RAW_LINK_ID,'num','SETVALUE'),
			'RELATED_TO_MIXER': $scope.get_set_value($scope.RELATED_TO_MIXER,'str','SETVALUE'),	
			'product_name_mixture': $scope.get_set_value($scope.product_name_mixture,'str','SETVALUE'),
			'batchno_mixture': $scope.get_set_value($scope.batchno_mixture,'str','SETVALUE'),
			'qnty_mixture': $scope.get_set_value($scope.qnty_mixture,'num','SETVALUE'),
			'rate_mixture': $scope.get_set_value($scope.rate_mixture,'num','SETVALUE'),
			'mfg_monyr_mixture': $scope.get_set_value($scope.mfg_monyr_mixture,'str','SETVALUE'),
			'exp_monyr_mixture': $scope.get_set_value($scope.exp_monyr_mixture,'str','SETVALUE'),		
			'tbl_party_id': $scope.get_set_value($scope.tbl_party_id,'num','SETVALUE'),
			'invoice_date': $scope.get_set_value($scope.invoice_date,'str','SETVALUE'),
			'challan_no': $scope.get_set_value($scope.challan_no,'str','SETVALUE'),
			'challan_date': $scope.get_set_value($scope.challan_date,'str','SETVALUE'),
			'tbl_party_id_name': $scope.get_set_value($scope.tbl_party_id_name,'str','SETVALUE'),
			'comment': $scope.get_set_value($scope.comment,'str','SETVALUE'),
			'product_id_name': $scope.get_set_value($scope.product_id_name,'str','SETVALUE'),
			'batchno': $scope.get_set_value($scope.batchno,'str','SETVALUE'),
			'qnty': $scope.get_set_value($scope.qnty,'num','SETVALUE'),
			'exp_monyr': $scope.get_set_value($scope.exp_monyr,'str','SETVALUE'),
			'mfg_monyr': $scope.get_set_value($scope.mfg_monyr,'str','SETVALUE'),
			'rate': $scope.get_set_value($scope.rate,'num','SETVALUE'),
			'mrp': $scope.get_set_value($scope.mrp,'num','SETVALUE'),
			'ptr': $scope.get_set_value($scope.ptr,'num','SETVALUE'),
			'srate': $scope.get_set_value($scope.srate,'num','SETVALUE'),
			'tax_per': $scope.get_set_value($scope.tax_per,'num','SETVALUE'),	
			'disc_per': $scope.get_set_value($scope.disc_per,'num','SETVALUE'),	
			'tax_ledger_id': $scope.get_set_value($scope.tax_ledger_id,'num','SETVALUE')								
		};	
	
		var config = {headers : 
			{'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'	}
		}
		//$http.post(data_link, data,config)
		$http.post(data_link,data_save,config)
		.then (function success(response){
			console.log('ID HEADER '+response.data.id_header);
			$scope.get_set_value(response.data,'','REFRESH');
			document.getElementById('product_id_name').focus();
		},
		function error(response){
			$scope.errorMessage = 'Error adding user!';
			$scope.message = '';
	  });

	}
	


	$scope.get_set_value=
	function(datavalue,datatype,operation)
	{
		if(operation=='SETVALUE')
		{
			if(angular.isUndefined(datavalue)==true)
			{
				if(datatype=='num')
				{return 0;}
				if(datatype=='str')
				{return '';}		
			}
			else
			{return datavalue;}
		}
		if(operation=='DRCRCHECKING')
		{
			var savestatus='OK';
						
			if($scope.invoice_date == null || $scope.invoice_date === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER INVOICE DATE';
			document.getElementById('invoice_date').focus();
			}
			if($scope.tbl_party_id == '0')			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER PARTY';
			document.getElementById('tbl_party_id_name').focus();
			}

			if($scope.product_id == '0')			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER PRODUCT';
			document.getElementById('product_id_name').focus();
			}
		
			if(savestatus=='OK')
			{
			
				$scope.product_name_mixture='NA';
				$scope.batchno_mixture='NA';
				$scope.qnty_mixture=0;
				$scope.rate_mixture=0;
				$scope.mfg_monyr_mixture='NA';
				$scope.exp_monyr_mixture='NA';

				$scope.MIX_RAW_LINK_ID=0;
				$scope.RELATED_TO_MIXER='NO';
				$scope.savedata();
				$scope.savemsg='Receord Has been saved Successfully!';
			}
		}

		if(operation=='ADDMIXTURE')
		{
			var savestatus='OK';
									
			if($scope.product_id == '0')			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER PRODUCT';
			document.getElementById('product_id_name').focus();
			}

			if($scope.invoice_date == null || $scope.invoice_date === "")			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER INVOICE DATE';
			document.getElementById('invoice_date').focus();
			}

			if($scope.tbl_party_id == '0')			
			{
			savestatus='NOTOK';$scope.savemsg='ENTER PARTY';
			document.getElementById('tbl_party_id_name').focus();
			}
		
			if(savestatus=='OK')
			{
				//$scope.savedata_mixture();
				$scope.RELATED_TO_MIXER='YES';
				$scope.savedata();	
				
				$scope.savemsg='Receord Has been saved Successfully!';
			}
		}

		if(operation=='RESET_MIXER_PAGE')
		{
			$scope.id_detail='';
			$scope.MIX_RAW_LINK_ID='';
		}

		
		if(operation=='REFRESH')
		{		
			//HEADER SECTION

			$scope.id_header=datavalue.id_header;
		  //console.log('After save id_header :'+$scope.id_header)
			$scope.invoice_no=datavalue.invoice_no;
			$scope.invoice_date=datavalue.invoice_date;
			$scope.challan_no=datavalue.challan_no;
			$scope.challan_date=datavalue.challan_date;
			$scope.tbl_party_id_name=datavalue.tbl_party_id_name;
			$scope.tbl_party_id=datavalue.tbl_party_id;
			$scope.comment=datavalue.comment;
			$scope.MIX_RAW_LINK_ID=datavalue.MIX_RAW_LINK_ID;

			
			//DETAIL SECTION
			$scope.id_detail='';	
			$scope.product_id_name='';			
			$scope.product_id=$scope.batchno=$scope.qnty='';
			$scope.exp_monyr=$scope.mfg_monyr=$scope.rate='';
			$scope.mrp=$scope.ptr=$scope.srate=$scope.tax_per='';
			$scope.tax_ledger_id=$scope.disc_per='';

			//data list
			 var data_link=BaseUrl+"DTLLIST/"+$scope.id_header;
			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});

			 var data_link=BaseUrl+"DTLLISTMIX/"+$scope.MIX_RAW_LINK_ID;
			 console.log(data_link);
			$http.get(data_link).then(function(response) 
			{$scope.listOfDetails_mix=response.data;});
			
			//$scope.consignment_value();
			//$scope.GetAllConsignment($scope.startdate,$scope.enddate);

		}
		if(operation=='NEWENTRY')
		{		
			
			//HEADER SECTION
			$scope.id_header='';
			$scope.invoice_no='';
			$scope.invoice_date='';
			$scope.challan_no='';
			$scope.challan_date='';
			$scope.tbl_party_id_name='';
			$scope.tbl_party_id='';
			$scope.comment='';
			
			//DETAIL SECTION
			$scope.id_detail='';	
			$scope.product_id_name='';			
			$scope.product_id=$scope.batchno=$scope.qnty='';
			$scope.exp_monyr=$scope.mfg_monyr=$scope.rate='';
			$scope.mrp=$scope.ptr=$scope.srate=$scope.tax_per='';
			$scope.tax_ledger_id=$scope.disc_per='';
			//data list
			 var data_link=BaseUrl+"DTLLIST/"+0;
			 $http.get(data_link).then(function(response) 
			 {$scope.listOfDetails=response.data;});

			 document.getElementById('invoice_date').focus();
		}

		if(operation=='VIEWDTL')
		{	
			var data_link=BaseUrl+"VIEWDTL/"+datavalue;
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){
					$scope['id_detail']=value.id;  
					$scope['product_id_name']=value.product_id_name;  
					$scope['product_id_name_mixer']=value.product_id_name;  					
					$scope['product_id']=value.product_id;  					
					$scope['batchno']=value.batchno;  
					$scope['qnty']=value.qnty;  
					$scope['exp_monyr']=value.exp_monyr;  
					$scope['mfg_monyr']=value.mfg_monyr; 
					$scope['rate']=value.rate;
					$scope['mrp']=value.mrp;	
					$scope['ptr']=value.ptr;
					$scope['srate']=value.srate;
					$scope['tax_per']=value.tax_per;
					$scope['tax_ledger_id']=value.tax_ledger_id;
					$scope['disc_per']=value.disc_per;
				
				});			
				
			});
				
		}

		if(operation=='VIEWDTLMIX')
		{	
			
			$scope['product_id_name']='';  
			$scope['product_id_name_mixer']='';  					
			$scope['product_id']='0';   					
			$scope['batchno']='';  
			$scope['qnty']=='';  
			$scope['exp_monyr']='';  
			$scope['mfg_monyr']='';  
			$scope['rate']='';  
			$scope['mrp']='';  	
			$scope['ptr']='';  
			$scope['srate']='';  
			$scope['tax_per']='';  
			$scope['tax_ledger_id']='';  
			$scope['disc_per']='';  
			$scope['id_detail']='';

			var data_link=BaseUrl+"DTLLISTMIX/"+datavalue;
			$http.get(data_link).then(function(response) 
			{$scope.listOfDetails_mix=response.data;});
			
			var data_link=BaseUrl+"VIEWDTL/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){
					//$scope['id_detail']=value.id;  
					$scope['product_name_mixture']=value.product_id_name; 
					$scope['batchno_mixture']=value.batchno;  
					$scope['qnty_mixture']=value.qnty;  
					$scope['rate_mixture']=value.rate;
					$scope['exp_monyr_mixture']=value.exp_monyr;  
					$scope['mfg_monyr_mixture']=value.mfg_monyr; 
					$scope['MIX_RAW_LINK_ID']=value.id; 
				});			
				
			});
		}

		

		if(operation=='VIEWALLVALUE')
		{	
			var data_link=BaseUrl+"DTLLIST/"+datavalue;
			$http.get(data_link).then(function(response) 
			{$scope.listOfDetails=response.data;});

			var data_link=BaseUrl+"VIEWALLVALUE/"+datavalue;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				angular.forEach(response.data,function(value,key){

					$scope['id_header']=value.id_header;  					
					$scope['invoice_no']=value.invoice_no;  
					$scope['invoice_date']=value.invoice_date;  
					$scope['challan_no']=value.challan_no;  
					$scope['challan_date']=value.challan_date;  
					$scope['tbl_party_id_name']=value.tbl_party_id_name;  
					$scope['tbl_party_id']=value.tbl_party_id;		
					
					$scope['doctor_ledger_id_name']=value.doctor_ledger_id_name;  
					$scope['doctor_ledger_id']=value.doctor_ledger_id;	

					$scope['comment']=value.comment;
				});	
				
			});		
	
		}

	}
	
	$scope.barcode_value=function(barcodefrom,event){

		if(event.keyCode === 13){

			if(barcodefrom=='barcode')
			{	
				var str=$scope.barcode;
				var strid =str.split("|");
			}
			if(barcodefrom=='barcodemix')
			{	
				var str=$scope.barcodemix;
				var strid =str.split("|");
			}
			if(barcodefrom=='billbarcode')
			{	
				var str=$scope.billbarcode;
				var strid =str.split("|");			
				$scope.get_set_value(strid[0],'','VIEWALLVALUE')		
			}

			$scope.barcodemix=$scope.barcode=$scope.billbarcode='';

			if(barcodefrom=='barcode' || barcodefrom=='barcodemix')
			{
				var data_link=BaseUrl+"VIEWDTL/"+strid[0];
				console.log(data_link);
				$http.get(data_link).then(function(response) 
				{
						angular.forEach(response.data,function(value,key){
						$scope['id_detail']=value.id;  
						$scope['product_id_name']=value.product_id_name;  
						$scope['product_id_name_mixer']=value.product_id_name;  					
						$scope['product_id']=value.product_id;  					
						$scope['batchno']=value.batchno;  
						$scope['qnty']=value.qnty;  
						$scope['exp_monyr']=value.exp_monyr;  
						$scope['mfg_monyr']=value.mfg_monyr; 
						$scope['rate']=value.srate;
						$scope['mrp']=value.mrp;	
						$scope['ptr']=value.ptr;
						$scope['srate']=value.srate;
						$scope['tax_per']=value.tax_per;
						$scope['tax_ledger_id']=value.tax_ledger_id;
						$scope['disc_per']=value.disc_per;
					
					});			
					
				});
			}

			if(barcodefrom=='billbarcode')
			{
				var data_link=BaseUrl+"DTLLIST/"+strid[0];
				$http.get(data_link).then(function(response) 
				{$scope.listOfDetails=response.data;});

				var data_link=BaseUrl+"VIEWALLVALUE/"+strid[0];
				console.log(data_link);
				$http.get(data_link).then(function(response) 
				{
					angular.forEach(response.data,function(value,key){

						$scope['id_header']=value.id_header;  					
						$scope['invoice_no']=value.invoice_no;  
						$scope['invoice_date']=value.invoice_date;  
						$scope['challan_no']=value.challan_no;  
						$scope['challan_date']=value.challan_date;  
						$scope['tbl_party_id_name']=value.tbl_party_id_name;  
						$scope['tbl_party_id']=value.tbl_party_id;							
						$scope['doctor_ledger_id_name']=value.doctor_ledger_id_name;  
						$scope['doctor_ledger_id']=value.doctor_ledger_id;	
						$scope['comment']=value.comment;
					});	
					
				});		

			}

		}

	};

	$scope.GetAllList=function(fromdate,todate){
			//var BaseUrl=domain_name+"Primary_sale_controller/ConsignmentList/";
			//data list GetAllConsignment			
			var data_link=BaseUrl+'GetAllList/PAYMENT/-/-/'+fromdate+'/'+todate;
			console.log(data_link);
			$http.get(data_link).then(function(response) 
			{
				$scope.ListOfTransactions=response.data;
			});
	};
	
	$scope.print_invoice = function(printtype) 
	{ 
		var data_link=BaseUrl+"print_invoice/"+$scope.id_header+'/'+printtype;
		window.popup(data_link); 
		
	};


	$scope.print_label = function(id_header,PRINTTYPE) 
	{ 
		var BaseUrl=domain_name+"Project_controller/print_all/";
		var data_link=BaseUrl+id_header+'/'+PRINTTYPE;
		window.popup(data_link); 
	};

// 	$scope.printDiv = function(divName) {
// 	var printContents = document.getElementById(divName).innerHTML;
// 	var popupWin = window.open('', '_blank', 'width=300,height=300');
// 	popupWin.document.open();
// 	popupWin.document.write('<html><head></head><body onload="window.print()">' + printContents + '</body></html>');
// 	popupWin.document.close();
//    } 
  
  

}]);

//************************ACCOUNT PURCHASE END*****************************************//