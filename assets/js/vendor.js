var ajax_url='/back_end/ajax/';
var csrf_token=$("#input_csrf").val();
$(document).ready(function() {
	// $( function() {
	//     $(".Mydatepicker" ).datepicker({
	//     	maxDate: 'today',
	//     });
	// });
	// $( function() {
	//     $(".commondatepicker" ).datepicker();
	// });
	// $( function() {
	//     $(".MyDminatePicker" ).datepicker({
	//     	minDate: 'today',
	//     });
	// });
	$(".product-view").on('click',function () {
		var id=$(this).attr('element-id');
		// alert(id)
		$("#vendor_product_id").val(id);
		$("#btn_vendorproduct_id").click();
	});
	$(".medicine-view").on('click',function () {
		var id=$(this).attr('element-id');
		// alert(id)
		$("#vendor_medicine_id").val(id);
		$("#btn_vendormedicine_id").click();
	});
	$(".add-images").on('click',function () {
		$("#vendor_product_images").click();
	});
	$(".add-images").on('click',function () {
		$("#vendor_product_images").click();
	});
	$("#btn-add-product-imgs").on('click',function () {
		$("#form_vendor_product_images").submit();
	});
	$(".remove-product-images").on('click',function () {
		var img=$(this).attr('element-id');
		var id=$(this).attr('data-form');
		$("#msg-remove-img-row").addClass('open');
		$(".msgb-remove-img-yes").attr('element-id',img);
		$(".msgb-remove-img-yes").attr('data-form',id);
	});
	$(".msgb-remove-img-yes").on('click',function () {
		var img=$(this).attr('element-id');
		var id=$(this).attr('data-form');
		alert(img)
		$.ajax({
			'url' : ajax_url+'remove-product-image',
			'method' : 'post',
			'data' : {
				'_token':csrf_token,
				'image' : img,
				'id' : id,
			},
			'dataType' : 'json',
			success : function(data) {
				// alert(data['options'])
				// $(".mb-control-close").click();
    //    			if(data['status']==1) {
				// 	$("#upload_message").css('color','green');
				// } else {
				// 	$("#upload_message").css('color','red');
				// }
				// $("#upload_message").html(data['message']);
				window.location.reload();
				// setTimeout(function(){// wait for 5 secs(2)
			 //           location.reload(); // then reload the page.(3)
			 //     }, 1000);
			}
		});
	});
	$(".disable-details").on('click',function(){
		var id=$(this).attr('element-id');
		$("#msg-disable-row").addClass('open');
		$(".msgb-disable-yes").attr('element-id',id);
		$(".msgb-disable-yes").attr('data-table','details');
	});
	$(".enable-details").on('click',function(){
		var id=$(this).attr('element-id');
		$("#msg-enable-row").addClass('open');
		$(".msgb-enable-yes").attr('element-id',id);
		$(".msgb-enable-yes").attr('data-table','details');
	});
	$(".delete-details").on('click',function () {
		var id=$(this).attr('element-id');
		$("#msg-delete-row").addClass('open');
		$(".msgb-delete-yes").attr('element-id',id);
		$(".msgb-delete-yes").attr('data-table','details');
	});
	$(".delete-sale").on('click',function () {
		var id=$(this).attr('element-id');
		$("#msg-delete-row").addClass('open');
		$(".msgb-delete-yes").attr('element-id',id);
		$(".msgb-delete-yes").attr('data-table','sale');
	});
	$(".edit-sale").on('click',function () {
		var id=$(this).attr('data-form');
		$(this).hide();
		$(".list-sale-element"+id).addClass('hidden');
		$("#save-sale"+id).removeClass('hidden');
		$(".edit-sale-element"+id).removeClass('hidden');
	});
	$(".save-sale").on('click',function () {
		var id=$(this).attr('data-form');
		var sale=$("#sale"+id).val();
		var start_date=$("#start_date"+id).val();
		var end_date=$("#end_date"+id).val();
		// alert(sale)

		var status='';
		$("#status"+id+':checked').each(function(){
			status=$(this).val();
		});
		if(start_date=='') {
			$("#start_date"+id).css('border','1px solid red');
			return false;
		}
		if(end_date=='') {
			$("#end_date"+id).css('border','1px solid red');
			return false;
		} 
		if(Date.parse(end_date)<Date.parse(start_date)) {
			$("#end_date"+id).css('border','1px solid red');
			$("#start_date"+id).css('border','1px solid red');
			return false;
		}
		if(sale=='') {
			$("#sale"+id).css('border','1px solid red');
			return false;
		} else {
			$.ajax({
			'url' : ajax_url+'update-sale',
			'method' : 'post',
			'data' : {
				'_token':csrf_token,
				'id' : id,
				'title' : sale,
				'status' : status,
				'start_date' : start_date,
				'end_date' : end_date,
			},
			// 'dataType' : 'json',
			success : function() {
				// alert(data['options'])
				window.location.reload();
				$(this).parents(".message-box").removeClass("open");
       			return false;
			}
		});
		}
	});
	$(".view-sale-products").on('click',function () {
		var id=$(this).attr('element-id');
		// alert(id)
		$("#vendor_sale_id").val(id);
		$("#btn_vendorsale_id").click();
	});
	$(".addStock").on('click',function () {
		var id=$(this).attr('element-id');
		$(this).hide();
		$("#text"+id).removeClass('hidden');
		$("#save"+id).removeClass('hidden');
		$("#span"+id).addClass('hidden');
	});
	$(".saveStock").on('click',function () {
		var id=$(this).attr('element-id');
		var stock=$("#text"+id).val();
		if(stock=='') {
			$("#text"+id).css('border','1px solid red');
			return false;
		} else {
			$.ajax({
				'url' : ajax_url+'update-stock',
				'method' : 'post',
				'data' : {
					'_token':csrf_token,
					'id' : id,
					'stock' : stock,
				},
				'dataType' : 'json',
				success : function(data) {
					if(data['status']==0) {
						$("#text"+id).css('border','1px solid red');
					} else {
						window.location.reload();
					}
					// // alert(data['options'])
					// window.location.reload();
					// $(this).parents(".message-box").removeClass("open");
     //   				return false;
				}
			});
		}
	});
	//2-06-2020
	$(".change-image").on('click',function () {
		$("#vendor-image").click();
	});
	$("#vendor-image").on('change',function () {
		$("#update-profile").submit();
	});
	$(".vendor-order-view").on('click',function () {
		var id=$(this).attr('element-id');
		// alert(id)
		$("#vendor_order_id").val(id);
		$("#btn_vendor_order_id").click();
	});
	
    // 	21-07-2020
    $(".change-order-status").on('click',function () {
		var id=$(this).attr('element-id');
		var status=$(this).attr('element-value');
// 		alert(img)
		$.ajax({
			'url' : ajax_url+'change-order-status',
			'method' : 'post',
			'data' : {
				'_token':csrf_token,
				'status' : status,
				'id' : id,
			},
			'dataType' : 'json',
			success : function() {
				window.location.reload();
			}
		});
	});
});