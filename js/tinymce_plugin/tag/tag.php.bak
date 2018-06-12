<?php
if (!session_id()) {
    session_start();
}

$lingua = 4;
if (isset($_SESSION['lingua'])) {
    $lingua=$_SESSION['lingua'];
}

require_once $_SERVER['DOCUMENT_ROOT']."/adminpath.php";
require_once adminpath."/inc/lib.php";
require_once "./libtag.php";

$type='News';
if (isset($_GET['type'])) {
    $type=$_GET['type'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Inserisci il tag (EnteWeb)</title>
	<meta charset="UTF-8">
	<style>
	img{border:none;}
	a{text-decoration:none;font-family:verdana,arial;color:#000;}
	a:hover{text-decoration:underline;font-family:verdana,arial;color:#900;}
	body{font-family:verdana,arial;font-size:0.6em;}
	.testo{font-family:verdana,arial;font-size:0.6em;}
	.input{border:1px solid #000;color:#000;font-size:0.6em;}
	.submit{border:1px solid #000;color:#fff;font-size:0.6em;background-color:#c00;}
	</style>
	<script language="javascript" type="text/javascript">
		function selectTag(val){
			document.form1.title.value=val;
			document.form1.title.focus();
		}//end selectTag
	</script>
</head>
<body id="link" bgcolor=#eeeeee>
<div>
	<form id="form1" name="form1"  action="#">
		<table cellpadding=0 bgcolor=#eeeeee border=0>
			<tr>
				<td valign="top">
					
					<span>Inserisci il tag (EnteWeb)</span>
					
					<div class="panel_wrapper">
						<div id="general_panel" class="panel current">
							<table border="0" cellpadding="4" cellspacing="0">
								<tr>
									<td nowrap="nowrap"><label for="href">tag selzionanto</label></td>
									<td><input id="title" name="title" type="text" value="" style="width: 350px" ></td> 
								</tr>
								<tr>
									<td colspan=2">
										<ul>
										<?php
                                            $arType=array('News','Foto','link','Lista Pagine','Form');
                                            $arTypeLabel=array('News','Foto','link','Lista Pagine','Form');
                                            
                                            //if(isset($_SESSION['DOC']) and $_SESSION['DOC'])$arType[]='Documenti';
                                            
                                            if (isset($_SESSION['REG_EVENTI']) and $_SESSION['REG_EVENTI']) {
                                                $arType[]='ModuliRegistrazioneEventi';
                                                $arTypeLabel[]='Moduli di Registrazione Eventi';
                                            }
                                            
                                            if (isset($_SESSION['CLASSIFICATION_PAGE']) and $_SESSION['CLASSIFICATION_PAGE']) {
                                                $arType[]='ClassificazionePagine';
                                                $arTypeLabel[]='Classificazione Pagine';
                                            }
                                            if (isset($_SESSION['MAKE_CLASSIFICATION_PAGE']) and $_SESSION['MAKE_CLASSIFICATION_PAGE']) {
                                                $arType[]='Crea_ClassificazionePagine';
                                                $arTypeLabel[]='Crea tag per Classificazione Pagine';
                                            }
                                            if (isset($_SESSION['CLASSIFICATION_DOC']) and $_SESSION['CLASSIFICATION_DOC']) {
                                                $arType[]='ClassificazioneDocumenti';
                                                $arTypeLabel[]='Classificazione Documenti';
                                            }
                                            if (isset($_SESSION['MAKE_CLASSIFICATION_DOC']) and $_SESSION['MAKE_CLASSIFICATION_DOC']) {
                                                $arType[]='Crea_ClassificazioneDocumenti';
                                                $arTypeLabel[]='Crea tag per Classificazione Documenti';
                                            }
                                        
                                            for ($i=0;$i<sizeof($arType);$i++) {
                                                if ($arType[$i]==$type) {
                                                    echo '<li>Categoria: <strong>'.$arTypeLabel[$i].'</strong></li>';
                                                } else {
                                                    echo '<li><a href="tag.php?type='.$arType[$i].'">Categoria: <font color=blue>'.$arTypeLabel[$i].'</font></a></li>';
                                                }
                                            }
                                        ?>
										</ul>
									</td> 
								</tr>
							</table>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td bgcolor=#ffffff><?php echo getListTag(); ?></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>