<?php //include'login/header.php'?>

    
        <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>


</body>
</html>
<script type="text/javascript">
	function ajax(){
		var req=new XMLHttpRequest();
		req.onreadystatechange=function(){
			if(req.readyState==4 && req.status==200){
				document.getElementById('resul').innerHTML=req.responseText;
			}
		}
		req.open('GET','<?php echo base_url() ?>ajax/ajax_load',true);
		req.send();
	}
    setInterval(function(){ajax()},1000);
    
    


                 
</script>


<div id="resul" >
</div>
       