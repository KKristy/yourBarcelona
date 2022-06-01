<!DOCTYPE html>
<html lang="ru">
	<head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=devise-width", install-scale=1.0>
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	  <title>your Barcelona</title>
	  
	  <script>
				
			function f1()
			{
				var elf=document.getElementById('name').value;
				var name=new String(elf);
				var mask=new RegExp("^[A-zА-я]{2,}$");
				if(!mask.test(name))
				{
					document.getElementById('rezname').innerHTML = 'Имя введено некорректно. Можно использовать только буквы';
					return false;
				}
				else
				{
					document.getElementById('rezname').innerHTML = '';
				}
			}
			
			/*
			function val()
			{
			    if (document.getElementById('name').value!='' && document.getElementById('mail').value!='' && document.getElementById('comment').value!=')
			    {
			        document.getElementById('bttn').disabled=false;
			    }
			    else
			    {
			        alert("Заполнены не все поля!");
                    return false;
			    }
			}
			*/
			
		</script>
	</head>
	<body>
	<?php include "blocks/header.php"  ?>
		<div class="main">
			<div class="container">
				<div class="title">
					<h2>Предложения по улучшению сайта</h2>
				</div>
				<div class="forma clearfix">
					<form method="POST" action=""> <!--onsubmit="return val()"-->
							<p>
						Имя<br>
						<input type=text name=name id=name placeholder="Введите имя" onblur="f1();" width=250>
						<br><span id=rezname class="spn"></span>
						</p>
						<p>
						Почта<br>
						<input type=email name=mail id=mail placeholder="Введите вашу почту" width=250>
						</p>
						<p>
						Комментарий<br>
						<input type=textarea name=comment id=comment placeholder="Введите ваше предложение">
						</p>
						<input type=submit id=bttn value="ОК" class="button">
					</form>
					
					<?php			 
		include("incdb.php");

		if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['comment']))
		{

			$name = $_POST['name'];
			$mail=$_POST['mail'];
			$comment=$_POST['comment'];
			$c=0;
			
            if($name!=''&&$mail!=''&&$comment!='')
	        {
	            
    			$rez=mysql_query("SELECT * FROM comment WHERE name='$name' AND mail='$mail' AND comment='$comment' ");
    			if(!(mysql_fetch_array($rez)))
    			{
    				$zapros=mysql_query("INSERT INTO comment (name, mail, comment) VALUES ('$name', '$mail', '$comment')");
    			
    				if($zapros==true)
    				{
    					?> 
    					<h2>Данные добавлены</h2>
    					<?php
    				}
    				else
    				{
    					echo "Ошибка добавления";
    				}
    			}
    		}
    		else
    		{
    		    ?> 
    			<h3>Заполнены не все поля</h3>
    			<?php
    		}
		}
			
		?>
					
				
				</div>
			</div>
		</div>			
	<?php include "blocks/footer.php" ?> 	
	</body>
</html>
			 

