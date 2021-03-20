function handleOnce(name, math, vnmese, forlang, physics, chemistry) {
	var form_data = new FormData();
	form_data.append("name", name);
	form_data.append("math", math);
	form_data.append("vnamese", vnamese);
	form_data.append("forlang", forlang);
	form_data.append("physics", physics);
	form_data.append("chemistry", chemistry);

	$.ajax({
		type: 'POST',
		url: 'ajax/ajax_read.php',
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		success:function(data){
			$("#content").html(data);
		},
		error:function(){
			console.log("failed");
		}
	});

	$.ajax({
		type: 'POST',
		url: 'ajax/ajax_potential.php',
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		success:function(data){
			$("#content_2").html(data);
		},
		error:function(){
			console.log("failed");
		}
	});
}

function handleMultiple(name, math, vnmese, forlang, physics, chemistry) {
	var name = $("#name").val();
	var math = $("#math").val();
	var vnamese = $("#vnamese").val();
	var forlang = $("#forlang").val();
	var physics = $("#physics").val();
	var chemistry = $("#chemistry").val();

	var form_data = new FormData();
	form_data.append("name", name);
	form_data.append("math", math);
	form_data.append("vnamese", vnamese);
	form_data.append("forlang", forlang);
	form_data.append("physics", physics);
	form_data.append("chemistry", chemistry);

	$.ajax({
		type: 'POST',
		url: 'ajax/ajax_full_potential.php',
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		success:function(data){
			$("#content_2").html(data);
		},
		error:function(){
			console.log("failed");
		}
	})
}

function handleFile(file) {

	var form_data = new FormData();
	form_data.append("upload", file);
	console.log(file);
	$.ajax({
		type: 'POST',
		url: 'ajax/ajax_file_upload.php',
		mimeType: "multipart/form-data",
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		success:function(data, error){
			if (error) console.log(error);
			$("#content").html(data);
		},
		error:function(error){
			console.log("failed");
		}
	})
}