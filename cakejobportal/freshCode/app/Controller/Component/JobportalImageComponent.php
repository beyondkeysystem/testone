<?php
App::uses('Component', 'Controller');
class JobportalImageComponent extends Component {
	function uploadImage($uploadedInfo, $uploadTo, $prefix){
		//pr($uploadedInfo);
		//
		//echo $uploadedInfo.' , ' .$uploadTo.' , ' .$prefix;
		//die;
		$webpath = $uploadTo;
		$upload_dir = WWW_ROOT.DS."img".DS.str_replace("/", DS, $uploadTo);
		$upload_path = $upload_dir.DS;
		$max_file = "34457280";// Approx 30MB
		$max_height = 650;
		$userfile_name = $uploadedInfo['name'];
		$userfile_tmp =  $uploadedInfo["tmp_name"];
		$userfile_size = $uploadedInfo["size"];
		//$filename = $prefix.basename($uploadedInfo["name"]);
		//$file_ext = strtolower(substr($filename, strrpos($filename, ".") + 1));
		//$filename = String::uuid().".".$file_ext;
		//$uploadTarget = $upload_path.$filename;
		$filename = $prefix;
		$file_ext = strtolower(substr($filename, strrpos($filename, ".") + 1));
		$uploadTarget = $uploadTo.$filename;
		
		//pr($uploadTo.$filename);
		//die;
		if(empty($uploadedInfo)) {
			return false;
		}
		if($file_ext != 'bmp' && $file_ext != 'gif' && $file_ext != 'jpg' && $file_ext != 'jpeg' && $file_ext != 'png') {
			return false;
		}
		if (isset($uploadedInfo['name'])){
			move_uploaded_file($userfile_tmp, $uploadTarget);
			chmod ($uploadTarget , 0755);
			$width = $this->getWidth($uploadTarget);
			$height = $this->getHeight($uploadTarget);
			// Scale the image if it is greater than the width set above
			if ($height > $max_height){
				$scale = $max_height/$height;
				$uploaded = $this->resizeImage($uploadTarget, $width, $height, $scale);
			}else{
				$scale = 1;
				$uploaded = $this->resizeImage($uploadTarget, $width, $height, $scale);
			}
		}
		return $webpath.$filename;
	}
	
	function resizeImage($image,$width,$height,$scale) {
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
		$ext = strtolower(substr(basename($image), strrpos(basename($image), ".") + 1));
		$source = "";
		if($ext == 'jpeg') $ext = 'jpg';
		switch($ext){
		  case 'bmp': $source = imagecreatefromwbmp($image); break;
		  case 'gif': $source = imagecreatefromgif($image); break;
		  case 'jpg': $source = imagecreatefromjpeg($image); break;
		  case 'png': $source = imagecreatefrompng($image); break;
		}
		// preserve transparency
		if($ext == "gif" or $ext == "png"){
		  imagecolortransparent($source, imagecolorallocatealpha($source, 0, 0, 0, 127));
		  imagealphablending($newImage, false);
		  imagesavealpha($newImage, true);
		}
		imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
		imageinterlace($newImage, true);
		switch($ext){
		    case 'bmp': imagewbmp($newImage, $image); break;
		    case 'gif': imagegif($newImage, $image); break;
		    case 'jpg': imagejpeg($newImage, $image, 100); break;
		    case 'png': imagepng($newImage, $image, 0); break;
		  }
		chmod($image, 0777);
		return $image;
	}
	
	function getHeight($image) {
		$sizes = getimagesize($image);
		$height = $sizes[1];
		return $height;
	}
	
	function getWidth($image) {
		$sizes = getimagesize($image);
		$width = $sizes[0];
		return $width;
	}
}
