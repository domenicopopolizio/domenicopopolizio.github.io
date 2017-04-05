<?php
	error_reporting(0);
	if (isset($_POST["psw"])) {
		$psw = hash( "sha512",  $_POST["psw"]);
	} else {
		$psw = "error";
	}
	$correct_psw = "601d88357328e7f884605f639a061d79e12e61cabbeea3bae4a57cb8aa664ef1dec7d0299b506748d326c456c61ce801c5326e4937ad8598dd534d877d0134ce";
			
	if ($psw==$correct_psw) {
		$file="proj.json";
		if (isset($_POST["type_to_delete"]) and isset($_POST["n_to_delete"]) ){
			if ($_POST["n_to_delete"] == "") {
				$type =  $_POST["type_to_delete"];
				$json = file_get_contents($file);
				$arr = json_decode($json, true);
				if (array_key_exists ( $type , $arr )) {	
					unset($arr[$type]);
					$new_json= json_encode($arr);	
					file_put_contents($file, $new_json);							
				}
			}
		
			else if ( $_POST["type_to_delete"] != "" and $_POST["n_to_delete"] != "") {
				$type =  $_POST["type_to_delete"];
				$n =  ((int) $_POST["n_to_delete"])-1;
				if ($n >= 0) {
					$json = file_get_contents($file);
					$arr = json_decode($json, true);
					if (array_key_exists ( $type , $arr )) {
						if (count($arr[$type])>$n) {
							array_splice( $arr[$type] , $n, 1 );
							if( count($arr[$type])==0 ) {
								unset($arr[$type]);
							}
							$new_json= json_encode($arr);	
							file_put_contents($file, $new_json);						
						}
					}
				}
			}
		}
		
		else if(isset($_POST["name"])) {
			$type=$_POST["type"]??"Altri progetti";
			if($type == "") {
				$type = "Altri progetti";
			}
			$name=$_POST["name"]??"";
			$info=$_POST["info"]??"";
			$page=$_POST["page"]??"";
			$github=$_POST["github"]??"";

			
			$json = file_get_contents($file);
			$arr = json_decode($json, true);
			
			$arr[$type][(string)(count($arr[$type])??0)] = array(
				"name"=>$name, 
				"info"=>$info,
				"pagina"=>$page,
				"github"=>$github,
			);

			$new_json= json_encode($arr);
			
			if (!($name=="" and $info=="" and $page=="" and $github=="")) {
				file_put_contents($file, $new_json);

			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Area</title>
	</head>
	<body>
		<?php if ($psw == "error"): ?>
			
			<form method="post">
				Password:<br>
				<input name="psw" type="Password"/>
				<br><br>
				<input  type="submit" value="Log in"/>
				<br><br>
			</form>
		<?php elseif ($psw != $correct_psw): ?>
			<form method="post">
				Password:<br>
				<input name="psw" type="Password"/>
				<br><br>
				<input  type="submit" value="Log in"/>
				<br><br>
				<font color="red">Wrong password!</font>
			</form>
		<?php elseif($psw == $correct_psw): ?>
			<form method="post">
				<input style="display: none" name="psw" value="<?php echo $correct_psw ?>"/>
				Project type(ex. html, C, etc):<br>
				<input style="width: 490px" name="type">
				<br><br>
				Name:<br>
				<input style="width: 490px" name="name">
				<br><br>
				Info:<br>
				<textarea style="width: 490px; height:190px;" name="info"></textarea>
				<br><br>
				Page:<br>
				<input style="width: 490px" name="page">
				<br><br>
				Code url (ex. github url):<br>
				<input style="width: 490px" name="github"> 
				<br><br><br>
				<input type="submit" value="Conferma Tutto">
			</form>
			<br><br><br><br><br><br>
			<form method="post">
				<input style="display: none" name="psw" value="<?php echo $correct_psw ?>"/>
				<font color="red">Delete</font><br>
				Project type(ex. html, C, etc):<br>
				<input style="width: 490px" name="type_to_delete">
				<br><br>
				Number(1 is the first):<br>
				<input style="width: 490px" name="n_to_delete">
				<br><br>
				<input type="submit" value="ELIMINA">
			</form>
		<?php endif ?>
		<br>
		<br>
		<br>
		<br>
	</body>
</html>
