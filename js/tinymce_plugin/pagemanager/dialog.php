<?php
if(isset($_POST['submit'])){

include('upload.php');

}else{

include 'config.php';
include('utils.php');


function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        return false;
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}

if (isset($_GET['fldr']) && !empty($_GET['fldr'])) {
    $subdir = trim($_GET['fldr'],'/') . '/';
}
else
    $subdir = '';

$cur_dir = $upload_dir . $subdir;
$cur_path = $current_path . $subdir;


if (isset($_GET['del_file'])) {
    @unlink($root. $cur_dir . $_GET['del_file']);
    @unlink( "thumbs/".$subdir.$_GET['del_file']);
}

if (isset($_GET['del_folder'])) {
    @ deleteDir($root. $cur_dir . $_GET['del_folder']);
    @ deleteDir("thumbs/".$subdir. $_GET['del_folder']);
}

if (isset($_GET['lang']) && $_GET['lang'] != 'undefined' && is_readable('lang/' . $_GET['lang'] . '.php')) {
    require_once 'lang/' . $_GET['lang'] . '.php';
} else {
    require_once 'lang/en_EN.php';
}
if(!isset($_GET['type'])) $_GET['type']=0;
if(!isset($_GET['field_id'])) $_GET['field_id']='';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <meta name="robots" content="noindex,nofollow">
        <title>Administration</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-lightbox.min.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/jquery.1.9.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-lightbox.min.js"></script>
		<script type="text/javascript" src="js/dropzone.min.js"></script>
		<script>
	    	var ext_img=new Array('<?php echo implode("','", $ext_img)?>');
	    	var allowed_ext=new Array('<?php echo implode("','", $ext)?>');

		    //dropzone config
		    Dropzone.options.myAwesomeDropzone = {
			    dictInvalidFileType: "<?php echo lang_Error_extension;?>",
			    dictFileTooBig: "<?php echo lang_Error_Upload; ?>",
			    dictResponseError: "SERVER ERROR",
			    paramName: "file", // The name that will be used to transfer the file
			    maxFilesize: <?php echo $MaxSizeUpload; ?>, // MB
			    url: "upload.php",
			    accept: function(file, done) {
			    var extension=file.name.split('.').pop();
			      if ($.inArray(extension, allowed_ext) > -1) {
				done();
			      }
			      else { done("<?php echo lang_Error_extension;?>"); }
			    }
		    };
	    </script>
		<script type="text/javascript" src="js/include.js"></script>
    </head>
    <body>
		<input type="hidden" id="track" value="<?php echo $_GET['editor']; ?>" />
		<input type="hidden" id="cur_dir" value="<?php echo $cur_dir; ?>" />
		<input type="hidden" id="cur_dir_thumb" value="<?php echo "thumbs/".$subdir; ?>" />
		<input type="hidden" id="root" value="<?php echo $root; ?>" />
		<input type="hidden" id="insert_folder_name" value="<?php echo lang_Insert_Folder_Name; ?>" />
		<input type="hidden" id="new_folder" value="<?php echo lang_New_Folder; ?>" />
		<input type="hidden" id="base_url" value="<?php echo $base_url?>"/>
		
<?php if($upload_files){ ?>
<!----- uploader div start ------->
<div class="uploader">    
	<form action="dialog.php" method="post" enctype="multipart/form-data" id="myAwesomeDropzone" class="dropzone">
		<input type="hidden" name="path" value="<?php echo $cur_path?>"/>
		<input type="hidden" name="path_thumb" value="<?php echo "thumbs/".$subdir?>"/>
		<div class="fallback">
			<input name="file" type="file" />
			<input type="hidden" name="fldr" value="<?=$_GET['fldr']?>"/>
			<input type="hidden" name="type" value="<?=$_GET['type']?>"/>
			<input type="hidden" name="field_id" value="<?=$_GET['field_id']?>"/>
			<input type="hidden" name="editor" value="<?=$_GET['editor']?>"/>
			<input type="hidden" name="lang" value="<?=$_GET['lang']?>"/>
			<input type="submit" name="submit" value="OK" />
		</div>
	</form>
	<center><button class="btn btn-large btn-primary close-uploader"><i class="icon-backward icon-white"></i> <?php echo lang_Return_Files_List?></button></center>
	<div class="space10"></div><div class="space10"></div>
</div>
<!----- uploader div start ------->

<?php } ?>		
          <div class="container-fluid">
          

    <div class="row-fluid ff-container">
	<div class="span12 pull-right">
		
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/js/inc/cerca_link_tmce4.php'); ?>
	    
		<!-- parte php con definizioni APPLY vari... -->
	    
		
		
	</div>
    </div>
</div>
    
    <!----- lightbox div start ------->    
    <div id="previewLightbox" class="lightbox hide fade"  tabindex="-1" role="dialog" aria-hidden="true">
	    <div class='lightbox-content'>
		    <img id="full-img" src="">
	    </div>    
    </div>
    <!----- lightbox div end ------->

    <!----- loading div start ------->  
    <div id="loading_container" style="display:none;">
	    <div id="loading" style="background-color:#000; position:fixed; width:100%; height:100%; top:0px; left:0px;z-index:100000"></div>
	    <img id="loading_animation" src="img/storing_animation.gif" alt="loading" style="z-index:10001; margin-left:-32px; margin-top:-32px; position:fixed; left:50%; top:50%"/>
    </div>
    <!----- loading div end ------->  
</body>
</html>
<?php } ?>