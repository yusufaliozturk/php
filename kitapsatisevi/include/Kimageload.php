<?
		
		
		
		$saveerror="";
			
	function kimageload($image){
		$imagedirectory="resimk/";
 		$handle = new upload($_FILES[$image]);
 		if ($handle->uploaded) {
			$filename=md5($image.date("d.m.Y").date("H:i:s"));
 		    $handle->file_new_name_body   = $filename;
 		    $handle->image_resize         = true;
 		    $handle->image_x              = 130;
			$handle->image_y              = 200;
			
 		    $handle->image_ratio_y        = true;
 			$handle->image_convert ="png";
 		    $handle->process($imagedirectory);
 		    if ($handle->processed) {
 		          $handle->clean();
 		    } else {
			        	$saveerror.="$image dosyasında yukleme hatası<br>";  
					}
 		}
		if($filename)	return $filename.".png";
		
	
	}
	
	function imageguncelle($image){
		$imagedirectory="../resim/";
 		$handle = new upload($_FILES[$image]);
 		if ($handle->uploaded) {
			$filename=md5($image.date("d.m.Y").date("H:i:s"));
 		    $handle->file_new_name_body   = $filename;
 		    $handle->image_resize         = true;
 		    $handle->image_x              = 150;
			$handle->image_y              = 150;
			
 		    $handle->image_ratio_y        = true;
 			$handle->image_convert ="png";
 		    $handle->process($imagedirectory);
 		    if ($handle->processed) {
 		          $handle->clean();
 		    } else {
			        	$saveerror.="$image dosyasında yukleme hatası<br>";  
					}
 		}
		if($filename)	return $filename.".png";
		
	
	}
	function videoload($video){
		$imagedirectory="video/";
 		$handle = new upload($_FILES[$video]);
 		$filename=md5($video.date("d.m.Y").date("H:i:s"));
		if ($handle->uploaded) {
 		    $handle->file_new_name_body   = $filename;
			$handle->image_convert ="flv";
 		    $handle->process($imagedirectory);
 		    if ($handle->processed) {
 		          $handle->clean();
 		    } 
 		}
		if($filename)	return $filename.".flv";
		
	
	}

?>