<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/materialize.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="../js/materialize.min.js"></script>
<script src="https://use.fontawesome.com/78e47248c7.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="../js/jquery.dataTables.min.js"></script>

<script>
	$(document).ready(function(){
		$(document).on("input", "input", function(){
			$oldValue = $(this).val();
			$newValue = $oldValue.replace(/'/g,"").replace(/"/g,"");
			$(this).val($newValue);
			if (/'/g.test($oldValue) || /"/g.test($oldValue)){
				Materialize.toast("Chỉ được nhập chữ cái và số",4000);
			}
		})
	})
		
</script>