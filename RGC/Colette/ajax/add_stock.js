$(document).ready(function()
{

	$('#modal_add_item').click(function(){

		  

            $.get("./ajax/check_itemcode.php?ITEM_CODE=" + $("#id_modal_itemcode").val(), function(r){
         var result = JSON.parse(r);
         if(result.ErrorCode === "Error 2"){
            alert('Item Code Exist! Make sure it is unique!');
         }else{
          $("#therest").animate({
            height : 0
          });
      

		var itemcode = $('#id_modal_itemcode').val();
		var itemname = $('#id_modal_itemname').val();
		var quantity = Number(document.getElementById("id_modal_quantity").value);
		var critical_level = Number(document.getElementById("id_modal_clevel").value);
		var store_price = Number(document.getElementById("id_modal_sprice").value);
		var supplier_price = Number(document.getElementById("id_modal_supprice").value);
		var supplier_name = $('#id_modal_sup_name').val();
		var category = $('#id_modal_category').val();
		var description = $('#id_modal_dtion').val(); 
		var substring = "remove";



		if(itemcode ==="" || itemcode ===null){
			alert('Item Code is Required');

		}else if( itemname ==="" || itemname ===null){

			alert('Item Name is Required');
		}else if( quantity ==="" || quantity ===null){

			alert('Quantity is Required');
		}else if( critical_level ==="" || critical_level ==null){

			alert('Critical Level is Required!');


		}else if( store_price ==="" || store_price ===null ){

			alert('Store Price is Required!');
		}else if( supplier_price ==="" || supplier_price ===null){

			alert('Supplier Price is Required!');
		}else if( supplier_name ==="" || supplier_name ===null){

			alert('Supplier Name is Required!');
		}else if( category ==="" || category ===null){

			alert('Category is Required!');
		}else if( description ==="" || description.includes(substring)){

			alert('Description is Required!');
		}else if( critical_level >= quantity || quantity <= critical_level){
				
			alert('Critical Level should be less than to the quantity!' );
			$("#therest").animate({
            height : 700
          });


			
		}else if( supplier_price >= store_price){

			alert('Supplier Price should be less than to the Store Price!');
			$('#id_modal_supprice').val("");
			$('#id_modal_sprice').val("");
			$("#therest").animate({
            height : 700
          });

		}else{

		




		$.ajax({
			type:'POST',
			data: {itemcode:itemcode,itemname:itemname,quantity:quantity,critical_level:critical_level,store_price:store_price,supplier_price:supplier_price,supplier_name:supplier_name,category:category,description:description},
			url:"php/add_stock.php",

			
			success :function(){
				alert(itemcode + ' is Successfully Added!');
				$('#id_modal_itemcode').val("");
				$('#id_modal_itemname').val("");
				$('#id_modal_dtion').val("");
				$('#id_modal_category').val("");
				$('#id_modal_supprice').val("");
				$('#id_modal_sprice').val("");
				$('#id_modal_clevel').val("");
				$('#id_modal_quantity').val("");
				$('#id_modal_sup_name').val("");

				

				

			}

		});
		}
	   }  
     });
	})

});
	
	

