<script type="text/javascript">
	$(document).ready(function(){

function makeCalculation(){
	let total_fee = $('#total_fee').val();
		let discount = $('#discount').val();
		let discounted_fee = total_fee * (discount/100);
		$('#discounted_fee').val(discounted_fee);
		let total_net_fee = total_fee - discounted_fee;
		$('#total_net_fee').val(total_net_fee);
		let fee_paid = $('#fee_paid').val();
		let remaining_fee = total_net_fee - fee_paid;
		$('#remaining_fee').val(remaining_fee);
}





	// $('#new_paid').on('input' , function(){
	// 		let fee_paid = $('#fee_paid').val();
	// 		let newPaid = $('#new_paid').val();
	// 		total_paid = parseFloat(fee_paid) + parseFloat(newPaid);
	// 		$('#fee_paid').val(total_paid);
	// 		makeCalculation();
	// });

	// $('#student_id').on('change' , function(event){
	// 	let name = $(this).find('option:selected').attr('data-student');
	// 	let father_name = $(this).find('option:selected').attr('data-father');
	// 	$('#name').val(name);
	// 	$('#father_name').val(father_name);
	// });


	$('#total_fee').on('input' , function(){
		
		makeCalculation();



	});



	$('#discount').on('input' , function(){
		makeCalculation();

		
	});





	

	
	
	

	$('#fee_paid').on('input' , function(){
		makeCalculation();
	})



	 // $(document).ready( function () {
  //   $('.myTable').DataTable({
  //     bSort: false,
  //   });
  //     } );

	});
</script>