<script>

$(function () {
                                     
$('#simpan').click(function (){
    var merk     = $('#merk').val();
    var jenis    = $('#jenis').val();
    var tipe     = $('#tipe').val();
    var supplier = $('#supplier').val();
    var modal    = $('#modal').val();
    var jual     = $('#jual').val();
    var jumlah   = $('#jumlah').val();
    var tanggal  = $('#tanggal').val();
    //alert(nama);
    
        $.ajax({
        type: "POST",
        url: "proses.php",
        data:"merk="+merk+"&jenis="+jenis+"&tipe="+tipe+"&supplier="+supplier+"&modal="+modal+"&jual="+jual+"&jumlah="+jumlah+"&tanggal="+tanggal,
        success: function(data) { 
            //alert("Request Berhasil Dikirim");
                                $("#merk").val("");
                                $("#jenis").val("");
                                $("#tipe").val("");
                                $("#supplier").val("");
                                $("#modal").val("");
                                $("#jual").val("");
                                $("#jumlah").val("");
                                $("#tanggal").val("");     
        },
        error: function(data_respon, e) {
                if (e == "error") { alert("errorx proses.php"); }
                else { alert("error2x proses.php"); } 
              
        }
    });
         
 
    return false; 
                 
            });
                        
             
            });

	//function logout() {
	//	swal({
	//			title: "You really want to exit?",
	//			text: "",
	//			type: "warning",
	//			showCancelButton: true,
	//			confirmButtonClass: "btn-primary",
	//			confirmButtonText: "Yes",
	//			closeOnConfirm: false
	//		},
	//		function() {
	//			window.location.href = '../index/logout.php';
	//		});
	//}
	function succedit() {
		swal({
				title: "Data berhasil diubah",
				text: "",
				type: "success",
				showCancelButton: false,
				confirmButtonClass: "btn-success",
				confirmButtonText: "OK",
				closeOnConfirm: false
			},
			function() {
				window.location.href = 'master_brg.php';
			});
	}

	function gagaledit() {
		swal({
				title: "Site gagal diubah!!",
				text: "",
				type: "warning",
				showCancelButton: false,
				confirmButtonClass: "btn-warning",
				confirmButtonText: "OK",
				closeOnConfirm: false
			},
			function() {
				window.location.href = 'master_brg.php';
			});
	}


	function deleteFile(kode) {
		swal({
				title: "Anda yakin ingin menghapus site "+ kode +"?" ,
				text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes!",
				closeOnConfirm: false
			},
			function() {
				window.location.href = "../index/del_prod.php?id=" + kode;
			});
	}


	function logout() {
		swal({
				title: "Anda ingin log out?",
				text: "",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-primary",
				confirmButtonText: "Ya",
				closeOnConfirm: false
			},
			function() {
				window.location.href = '../../logout.php';
			});
	}


	function konfirmasihapus() {
		swal({
				title: "Site berhasil dihapus",
				text: "",
				type: "success",
				showCancelButton: false,
				confirmButtonClass: "btn-success",
				confirmButtonText: "OK",
				closeOnConfirm: false
			},
			function() {
				window.location.href = 'master_brg.php';
			});
	}

	function gagalhapus() {
		swal({
				title: "Data gagal diubah!!",
				text: "",
				type: "warning",
				showCancelButton: false,
				confirmButtonClass: "btn-warning",
				confirmButtonText: "OK",
				closeOnConfirm: false
			},
			function() {
				window.location.href = 'master_brg.php';
			});
	}
</script>