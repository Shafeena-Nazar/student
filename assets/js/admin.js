var admin_url='/studentmanagement/admin/ajax/';
var csrf_token=$('meta[name="csrf-token"]').attr('content')
$(document).ready(function() {
	$(".select-box").select2();
	$(".dynamic-select-box").select2({
		 tags: true
	});
	$(document).on("click",".delete-content",function() {
		var id=$(this).attr('element-id');
		var table=$(this).attr('element-table');
		swal({
			title: "Are you sure?",
			text: "This action will delete your records permanently.",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#1c7430',
			confirmButtonText: 'Yes, go ahead.',
			cancelButtonText: "No, forget it.",
			closeOnConfirm: false,
			closeOnCancel: false },

			function (isConfirm) {
				if (isConfirm) {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						'url' : admin_url+'delete-data',
						'method' : 'post',
						'data' : {
							'_token':csrf_token,
							'id' : id,
							'table' : table,
						},
						'dataType' : 'json',
						success : function(data) {
							// alert(data['options'])
							if(data['status']==1) {
								swal("Deleted!", "Your imaginary file has been deleted!", "success");
							} else {
								swal({
									title: "Sorry!",
									text: "Unable to delete the record!",
									buttons: {
										cancel: "Close",
									}
								});
							}
							setTimeout(function() {
							    location.reload();
							}, 2000);
							
						}
					});
				} else {
					swal({
						title: "Hurray!",
						text: "Your record is safe",
						buttons: {
							cancel: "Close",
						}
					});
				}
			});
	});
});
	