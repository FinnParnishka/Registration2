$(document).ready(function() {
  
	$('#ok').click(function() {
		var email = $("input[name=email]").val();
		var name = $("input[name=name]").val();
		var password = $("input[name=password]").val();
		var surname= $("input[name=surname]").val();
		var position= $("select[name=position]").val();



			if (email==""||name==""||password=="") {
				alert('Заполните все поля отмеченные звёздочкой!');
				console.log(email);
			} else {
					var formData = {
                		email: $("input[name=email]").val(),
                		name: $("input[name=name]").val(),
                		password: $("input[name=password]").val(),
                		surname: $("input[name=surname]").val(),
                		position: $("select[name=position]").val()
            		};

		 			$.ajax({
			 			url: 'reg.php',
			 			type: 'POST',
			 			data: formData,
	  		 			success: function(data) {
	  			 			console.log(data);
	  			 			$('#t1').load("index.php #table-users");
			 			}
					});
			}	
	});

	  $('#position').change(function(){
  	var select = $(this).find('option:selected').val();
  	if (select =='Директор') {
		$('.oneHide').show();
		$('.twoHide').show();
		$('.editClickShow').hide();
		$('#input1').hide();
		$('#input2').hide();
		$('#input3').hide();
			
		} else if (select =='Бухгалтер')  {
		$('.oneHide').hide();
		$('.twoHide').hide();
		$('#input1').show();
		$('#input2').show();
		$('#input3').show();
		}
	});



	$('#add').click(function(){
		$('.addClickShow').toggle();
	});

	$('.edit').click(function(){
		$('.addClickShow').toggle();
	});

	$('#editPrivate1').click(function(){
		$('.editClickShow').toggle();
	});


	$('#okPrivate1').click(function() {
		var data = $("input[name=data]").val();
		var coming = $("input[name=coming]").val();
		var realize = $("input[name=realize]").val();
		var salary = (coming - realize) / 10;
		var sendContractor = salary * 2;
		var sendGeneralContractor = salary * 3;


			if (coming!="" && realize!="") {
					
					var formData = {
						data : data,
						coming: coming,
						realize: realize,
						salary: salary,
						sendContractor: sendContractor,
						sendGeneralContractor: sendGeneralContractor
					};

					$.ajax({
			 			url: 'reg.php',
			 			type: 'POST',
			 			data: formData,
	  		 			success: function(data) {
	  			 			console.log(data);
	  			 			$('#t2').load("index.php #report");
			 			}
					});

			} else alert('Введите данные о приходе и реализации!');
	});

	$('#saveChanges').click(function() {
		var data = $("input[name=data]").val();
		var coming = $("input[name=coming]").val();
		var realize = $("input[name=realize]").val();
		var salary = $("input[name=salary]").val();
		var sendContractor = $("input[name=sendContractor]").val();
		var sendGeneralContractor = $("input[name=sendGeneralContractor]").val();
		var getId = $("input[name=getValue]").val();


			if (coming!="" && realize!="") {
					
					var formData = {
						data: data,
						coming: coming,
						realize: realize,
						salary: salary,
						sendContractor: sendContractor,
						sendGeneralContractor: sendGeneralContractor,
						getId : getId
					};

					$.ajax({
			 			url: 'reg.php',
			 			type: 'POST',
			 			data: formData,
	  		 			success: function(data) {
	  			 			console.log(data);
	  			 			$('#t2').load("index.php #report");
			 			}
					});

			} else alert('Введите данные о приходе и реализации!');
	});

});