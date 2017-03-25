<?php

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//	CREA TAG PER CLASSIFICAZIONE
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
function makeTag_Classification($type,$tableRif)
{
global $mdb2,$lingua;
	switch($tableRif)
	{
		case 'tbl_page' :
			$tag='page_list_';
		break;
		case 'tbl_doc' :
			$tag='doc_list_';
		break;
		default:
			$tag='';
	}//end switch
		
	$result['title']='Crea il tag';

	$table='
	<tr>
		<td bgcolor="#333333"><strong><font color=white>'.$result['title'].'</font></strong></td>
	</tr>';

	$table1='<tr>
<table cellpadding=5 cellspacing=0 border=0>';
	$strsql="
select 
	id_".$tableRif."_properties
	,property
	,admin_type_order
from
	".$tableRif."_properties
where
	id_tbl_lingua=".$lingua."
order by
	pos";
	
	$ris=$mdb2->query($strsql);
	while($row=$ris->fetchRow())
	{
		$table1.="<tr><td>".$row['property']."</td><td>=</td>"; 

		switch($row['admin_type_order'])
		{
			case FORM_TYPEORDER_POS_ASC :
				$orderby='order by pos asc';
			break;
			case FORM_TYPEORDER_POS_DESC :
				$orderby='order by pos desc';
			break;
			case FORM_TYPEORDER_ALF_ASC :
				$orderby='order by property_value asc';
			break;
			case FORM_TYPEORDER_ALF_DESC :
				$orderby='order by property_value desc';
			break;
		}//end switch

		$strsql="
select 
	id_".$tableRif."_property_values
	,id_".$tableRif."_properties
	,property_value
from
	".$tableRif."_property_values
where
	id_".$tableRif."_properties='".$row['id_'.$tableRif.'_properties']."'
	and id_tbl_lingua=".$lingua." ".$orderby;
		$ris1=$mdb2->query($strsql);
		$select='<select id="prop_'.$row['id_'.$tableRif.'_properties'].'" onchange="setCheckBoxPage(\''.$row['id_'.$tableRif.'_properties'].'\');"><option value="">---</option>'; 
		while($row1=$ris1->fetchRow())
		{
			$select.="<option value='".($row1['id_'.$tableRif.'_properties'])."==".($row1['id_'.$tableRif.'_property_values'])."'>".$row1['property_value']."</option>";
		}//end while
		$select.="</select>";
		$table1.="<td>".$select.'</td>
<td><input type="checkbox" id="set_'.$row['id_'.$tableRif.'_properties'].'" value="1"/></td>		
		</tr>'; 
		
	
		$table1.="</tr>"; 
	}//end while
	
	$table1.='</tr>
	<tr>
		<td colspan=4 align="center"><input type="reset" value="Reset">&nbsp;&nbsp;&nbsp;<input type="button" value="Crea Tag" onclick="creaTagPage();"></td>
	</tr>
	</table>'; 
	
	$script='
<script>

function setCheckBoxPage(prop)
{
	idcheckbox=\'set_\'+prop;
	idselect=\'prop_\'+prop;
	mycheckbox=document.getElementById(idcheckbox);
	myselect=document.getElementById(idselect);
	if(myselect.selectedIndex>0)
		mycheckbox.checked=true;
	else
		mycheckbox.checked=false;
}//end setCheckBoxPage

function creaTagPage(){
	var myform=document.getElementById(\'form1\');
	tag=\'##'.$tag.'\';
	for(i=0;i<myform.length;i++)
	{
		el=myform.elements[i];
		if(el.type==\'checkbox\')
		{
			if(el.checked)
			{
				prop=el.id.substr(4);
				idselect=\'prop_\'+prop;
				sel=document.getElementById(idselect);
				if(sel.selectedIndex>0)
				{
					tag+=sel.options[sel.selectedIndex].value+\'&\';
				}
			}
		}//end if(el.type==\'checkbox\')
	}//end for
	if(tag!=\'##'.$tag.'\')
	{
		tag=tag.substr(0,tag.length-1)+\'##\';
		selectTag(tag);
	}
	else
		alert(\'Devi impostare almeno una select ad attivare la checkbox a lato.\');
}//end creaTagPage
</script>
';

	return $script.$table.$table1;
}//end makeTag_Classification
////////////////////////////////////////////////////////////////////////////////






////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//	DOCUMENTI
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
function getTagDocProp($type)
{
global $mdb2,$lingua;

	//estraggo i tag della proprietà
	$strsql="
select
	property
	,tag_associated
from
	tbl_doc_properties
where
	id_tbl_lingua=".$lingua."
order by
	property
";
	$ris=$mdb2->query($strsql);
	
	$arList=array();
	while($row=$ris->fetchRow())
	{
		$arList[$row['tag_associated']]=$row['property'];
	}//end while
	
	$result['title']=strtoupper($type).' : Tag per le proprietà';
	$result['list']=$arList;

	return $result;
}//end getTagDocProp
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
function getTagDocPropVal($type)
{
global $mdb2,$lingua;

	//estraggo i tag della proprietà
	$strsql="
select
	B.property
	,A.property_value
	,A.tag_associated
from
	tbl_doc_property_values A
	,tbl_doc_properties B
where
	A.id_tbl_doc_properties=B.id_tbl_doc_properties
	and A.id_tbl_lingua=".$lingua."
	and B.id_tbl_lingua=".$lingua."
order by
	B.property
	,A.property_value
";
	$ris=$mdb2->query($strsql);
	
	$arList=array();
	while($row=$ris->fetchRow())
	{
		$arList[$row['tag_associated']]='['.$row['property'].'] - '.$row['property_value'];
	}//end while
	
	$result['title']=strtoupper($type).' : Tag per i valori delle proprietà';
	$result['list']=$arList;

	return $result;
}//end getTagDocPropVal
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
function getTagDoc($type)
{
global $mdb2,$lingua;

	//estraggo i tag della proprietà
	$strsql="
select
	title
	,tag_associated
from
	tbl_doc
where
	id_tbl_lingua=".$lingua."
order by
	title
";
	$ris=$mdb2->query($strsql);
	
	$arList=array();
	while($row=$ris->fetchRow())
	{
		$arList[$row['tag_associated']]=$row['title'];
	}//end while
	
	$result['title']=strtoupper($type).' : Tag di un documento';
	$result['list']=$arList;

	return $result;
}//end getTagDoc
////////////////////////////////////////////////////////////////////////////////



	
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//	CLASSIFICAZIONE PAGINE
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
function getTagClassPageProp($type)
{
global $mdb2,$lingua;

	//estraggo i tag della proprietà
	$strsql="
select
	property
	,tag_associated
from
	tbl_page_properties
where
	id_tbl_lingua=".$lingua."
order by
	property
";
	$ris=$mdb2->query($strsql);
	
	$arList=array();
	while($row=$ris->fetchRow())
	{
		$arList[$row['tag_associated']]=$row['property'];
	}//end while
	
	$result['title']=strtoupper($type).' : Tag per le proprietà';
	$result['list']=$arList;

	return $result;
}//end getTagClassPageProp
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
function getTagClassPagePropVal($type)
{
global $mdb2,$lingua;

	//estraggo i tag della proprietà
	$strsql="
select
	B.property
	,A.property_value
	,A.tag_associated
from
	tbl_page_property_values A
	,tbl_page_properties B
where
	A.id_tbl_page_properties=B.id_tbl_page_properties
	and A.id_tbl_lingua=".$lingua."
	and B.id_tbl_lingua=".$lingua."
order by
	B.property
	,A.property_value
";
	$ris=$mdb2->query($strsql);
	
	$arList=array();
	while($row=$ris->fetchRow())
	{
		$arList[$row['tag_associated']]='['.$row['property'].'] - '.$row['property_value'];
	}//end while
	
	$result['title']=strtoupper($type).' : Tag per i valori delle proprietà';
	$result['list']=$arList;

	return $result;
}//end getTagClassPagePropVal
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//	MODULI DI REGISTRAZIONE
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
function getTagRegisterEvent($type)
{
global $mdb2,$lingua;

	//estraggo i tag dei moduli di registrazione
	$strsql="
select
	title
	,tag_associated
from
	tbl_registerevent
where
	id_tbl_lingua=".$lingua."
order by
	title
";
	$ris=$mdb2->query($strsql);
	
	$arList=array();
	while($row=$ris->fetchRow())
	{
		$arList[$row['tag_associated']]=$row['title'];
	}//end while
	
	$result['title']=strtoupper($type).' : Tag di un Modulo di Registrazione';
	$result['list']=$arList;

	return $result;
}//end getTagRegisterEvent
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//	NEWS
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

function getTagCatNews($type)
{
global $mdb2,$lingua;

	//verifico l'esistenza di tbl_news1
	$strsql="
select
	1
from
	tbl_news1
LIMIT 0,1
";
	@mysql_query($strsql);
	if(mysql_error()) return getTagCatNotizie($type);
	else
	{

	//estraggo i tag della proprietà
	$strsql="
select
	nome
	,id_tbl_news_cat
from
	tbl_news_cat
where
	id_tbl_lingua=".$lingua."
order by
	posizione
	,nome
";
	$ris=$mdb2->query($strsql);
	
	
	$arList=array();
	while($row=$ris->fetchRow())
	{
		$arList['news_'.$row['id_tbl_news_cat']]=$row['nome'];
	}//end while
	
	$result['title']=strtoupper($type).' : Tag per le News';
	$result['list']=$arList;

	return $result;
	}
}//end getTagCatNews
////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
function getTagCatNotizie($type)
{
global $mdb2,$lingua;


	//estraggo i tag della proprietà
	$strsql="
select
	nome
	,id_tbl_notizie_cat
from
	tbl_notizie_cat
where
	id_tbl_lingua=".$lingua."
order by
	posizione
	,nome
";
	$ris=$mdb2->query($strsql);
	
	
	$arList=array();
	$arList['notizie_all_paginato']='Visualizza lista di news di qualsiasi categoria';
	$arList['notizie_all_visualizza']='Visualizza una news di qualsiasi categoria';
	$arList['notizie_all_archiviopaginato']='Visualizza lista di news in archivio di qualsiasi categoria';
	$arList['notizie_all_ricerca']='Visualizza modulo di ricerca per le news di qualsiasi categoria';
	while($row=$ris->fetchRow())
	{
		$arList['notizie_'.$row['id_tbl_notizie_cat'].'_paginato']='Visualizza lista di news della categoria "'.$row['nome'].'"';
		$arList['notizie_'.$row['id_tbl_notizie_cat'].'_visualizza']='Visualizza una news della categoria "'.$row['nome'].'"';
		$arList['notizie_'.$row['id_tbl_notizie_cat'].'_archiviopaginato']='Visualizza lista di news in archivio della categoria "'.$row['nome'].'"';
		$arList['notizie_'.$row['id_tbl_notizie_cat'].'_ricerca']='Visualizza modulo di ricerca solo per le news della categoria "'.$row['nome'].'"';
	}//end while
	
	$result['title']=strtoupper($type).' : Tag per le News';
	$result['list']=$arList;

	return $result;
}//end getTagCatNotizie
////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//	LINK
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

function getTagCatLink($type)
{
global $mdb2,$lingua;

	//estraggo i tag della proprietà
	$strsql="
select
	nome
	,id_tbl_cat_link
from
	tbl_cat_link
where
	id_tbl_lingua=".$lingua."
order by
	posizione
	,nome
";
	$ris=$mdb2->query($strsql);
	
	$arList=array();
	while($row=$ris->fetchRow())
	{
		$arList['link_'.$row['id_tbl_cat_link']]=$row['nome'];
	}//end while
	
	$result['title']=strtoupper($type).' : Tag per i Link';
	$result['list']=$arList;

	return $result;

}//end getTagCatLink
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//	Foto
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

function getTagCatFoto($type)
{
global $mdb2,$lingua;

	//estraggo i tag della proprietà
	$strsql="
select
	nome
	,id_tbl_photo_cat
from
	tbl_photo_cat
where
	id_tbl_lingua=".$lingua."
order by
	posizione
	,nome
";
	$ris=$mdb2->query($strsql);
	
	$arList=array();
	while($row=$ris->fetchRow())
	{
		$arList['album_'.$row['id_tbl_photo_cat']]=$row['nome'];
	}//end while
	
	$result['title']=strtoupper($type).' : Tag per gli Album';
	$result['list']=$arList;

	return $result;

}//end getTagCatFoto
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//	Foto
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

function getTagForm($type)
{
global $mdb2,$lingua;

	//estraggo i tag della proprietà
	$strsql="
select
	nome
	,id
from
	tbl_form
order by
	posizione
	,nome
";
	$ris=$mdb2->query($strsql);
	
	$arList=array();
	while($row=$ris->fetchRow())
	{
		$arList['form_'.$row['id']]=$row['nome'];
	}//end while
	
	$result['title']=strtoupper($type).' : Tag per i Moduli di inserimento dati';
	$result['list']=$arList;

	return $result;

}//end getTagForm
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
function printResult($result)
{
	echo 
	$table='';
	$table.='
	<tr>
		<td bgcolor="#333333"><strong>'.$result['title'].'</strong></td>
	</tr>
';
	if(sizeof($result['list']>0))
	{
		foreach($result['list'] as $tag=>$title)
		{
			$tag='##'.$tag.'##';
			$table.='
	<tr>
		<td><li><a href="#" onClick="selectTag('."'$tag'".')"><font color=blue>'.htmlentities($tag).'</font></a><br>
<div style="background-color:#cccccc; height:20px;">'.htmlentities($title).'</li></td>
	</tr>
';
		}//end foreach
	}//end if(sizeof($result['list']>0))
	return $table;
}//end printResult
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
function getListTagFromType($type)
{
	$table='';
	print strtoupper($type);
	switch(strtoupper($type))
	{
		case 'CLASSIFICAZIONEDOCUMENTI' :
			$result=getTagDocProp($type);
			$table.=printResult($result);
			$result=getTagDocPropVal($type);
			$table.=printResult($result);
			$result=getTagDoc($type);
			$table.=printResult($result);
		break;

		case 'CREA_CLASSIFICAZIONEDOCUMENTI' :
			$table.=makeTag_Classification($type,'tbl_doc');
		break;

		case 'CLASSIFICAZIONEPAGINE' :
			$result=getTagClassPageProp($type);
			$table.=printResult($result);
			$result=getTagClassPagePropVal($type);
			$table.=printResult($result);
		break;


		case 'CREA_CLASSIFICAZIONEPAGINE' :
			$table.=makeTag_Classification($type,'tbl_page');
		break;

		case 'MODULIREGISTRAZIONEEVENTI' :
			$result=getTagRegisterEvent($type);
			$table.=printResult($result);
		break;
		case 'NEWS' :
			$result=getTagCatNews($type);
			$table.=printResult($result);
		break;
		case 'FOTO' :
			$result=getTagCatFoto($type);
			$table.=printResult($result);
		break;
		case 'LINK' :
			$result=getTagCatLink($type);
			$table.=printResult($result);
		break;
		case 'FORM' :
			$result=getTagForm($type);
			$table.=printResult($result);
		break;
		default:
			$result['title']=$type.' not defined';
			$result['list']=array();
			$table.=printResult($result);
	}
	return $table;
}//end getListTagFromType
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
function getListTag()
{
global $mdb2,$lingua,$type;

	$strsql="select * from tbl_qtool where find_in_set('1',checkbox_tbl_gruppi)";
	$ris=$mdb2->query($strsql);
	$qtool=array();
	while($row=$ris->fetchRow())
		$qtool[strtoupper($row['nome'])]=$row;
	
	$table='';

	$qtool['CLASSIFICAZIONEPAGINE']=1;
	$qtool['CREA_CLASSIFICAZIONEPAGINE']=1;

	$qtool['CLASSIFICAZIONEDOCUMENTI']=1;
	$qtool['CREA_CLASSIFICAZIONEDOCUMENTI']=1;

	
	if(isset($qtool[strtoupper($type)]))
	{
		$table=getListTagFromType($type);

	}//end if(isset($qtool[$type]))

	$table='
	<table cellpadding=1 cellspacing=0 border=0 bgcolor=#919b9c width=400><tr><td>
	<table cellpadding=3 border=0 bgcolor=#eeeeee width=100%>'.$table.'</table>
	</td></tr></table>';
	return $table;
}//end getListTag
////////////////////////////////////////////////////////////////////////////////