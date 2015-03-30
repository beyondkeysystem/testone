<?php
class ImageupdateShell extends Shell {

	public $uses = array('Product');

	private function image_type_to_extension($imagetype) {
		if(empty($imagetype)) {
			return false;
		}
		switch($imagetype) {
			case IMAGETYPE_GIF      : return 'gif';
			case IMAGETYPE_JPEG     : return 'jpg';
			case IMAGETYPE_PNG      : return 'png';
			case IMAGETYPE_SWF      : return 'swf';
			case IMAGETYPE_PSD      : return 'psd';
			case IMAGETYPE_BMP      : return 'bmp';
			case IMAGETYPE_TIFF_II  : return 'tiff';
			case IMAGETYPE_TIFF_MM  : return 'tiff';
			case IMAGETYPE_JPC      : return 'jpc';
			case IMAGETYPE_JP2      : return 'jp2';
			case IMAGETYPE_JPX      : return 'jpf';
			case IMAGETYPE_JB2      : return 'jb2';
			case IMAGETYPE_SWC      : return 'swc';
			case IMAGETYPE_IFF      : return 'aiff';
			case IMAGETYPE_WBMP     : return 'wbmp';
			case IMAGETYPE_XBM      : return 'xbm';
			default                 : return false;
		}
	}

	public function resample($src, $dst, $width = '', $height = '', $square = false) {
		if(is_file($dst)) {
			return;
			// unlink($dst);
		}

		$size = getimagesize($src);
		if (!$size[0] || !$size[1]) {
			return;
		}

		list($oldWidth, $oldHeight, $type) = getimagesize($src);
	    $ext = $this->image_type_to_extension($type);

		$scale = min($width / $size[0], $height / $size[1]);

		// echo $scale;

		if ($scale == 1) {
			// return;
		}

		$newwidth = (int) ($size[0] * $scale);
		$newheight = (int) ($size[1] * $scale);

		if($square) {
			$xpos = (int) (($width - $newwidth) / 2);
			$ypos = (int) (($height - $newheight) / 2);
		} else {
			$width = $newwidth;
			$height = $newheight;
			$xpos = 0;
			$ypos = 0;
		}

		$destImg = ImageCreateTrueColor($width, $height);
		$backColor=ImageColorAllocate($destImg, 255, 255, 255);
		ImageFilledRectangle($destImg, 0, 0, $width, $height, $backColor);
		// $sourceImg = ImageCreateFromJPEG ($src);

		switch($ext) {
	      case 'gif' :
	        $sourceImg = imagecreatefromgif($src);
	        break;
	      case 'png' :
	        $sourceImg = imagecreatefrompng($src);
	        break;
	      case 'jpg' :
	      case 'jpeg' :
	        $sourceImg = imagecreatefromjpeg($src);
	        break;
	      default :
	        return false;
	        break;
	    }

		ImageCopyResampled($destImg, $sourceImg, $xpos, $ypos, 0, 0, $newwidth, $newheight, $size[0], $size[1]);
		imagejpeg($destImg, $dst, 70);

		$data['width'] = $width;
		$data['height'] = $height;

		return $data;
	}


	public function main() {

		$products = $this->Product->find('all', array(
			'fields' => array(
				'Product.product_id',
				'Product.image_original',
				'Product.image',
			),
			'conditions' => array(
				'Product.user_id' => 11
			),
			'limit' => 100000,
		));

		$this->out(pr($products));

		$i = 0;

		if(is_dir(WWW_ROOT . '/images/')) {
			rename(WWW_ROOT . '/images/', WWW_ROOT . '/imagesold/');
		} else {
			mkdir(WWW_ROOT . '/imagesold/', 0777);
		}


		mkdir(WWW_ROOT . '/images/', 0777);
		mkdir(WWW_ROOT . '/imagestemp/', 0777);


		$this->out(count($products));

		foreach($products as $product)  {

			if(!empty($product['Product']['image_original'])) {

				// $this->out($product['Product']['imageurl']);
				// $this->out($product['Product']['local_image']);

				if(file_exists(WWW_ROOT . '/imagesold/' . $product['Product']['image']) && !file_exists(WWW_ROOT . '/images/' . $product['Product']['image'])) {

					$this->out($product['Product']['image']);

					if (!copy(WWW_ROOT . '/imagesold/' . $product['Product']['image'], WWW_ROOT . '/images/' . $product['Product']['image'])) {
						$this->out('failed to copy');
					}

					$i++;
					$this->out($i);

				}

			}

		}

		$i = 0;

		foreach($products as $product)  {

			$i++;
			$this->out($i);

			if(!empty($product['Product']['image_original'])) {

				if(!file_exists(WWW_ROOT . '/images/' . $product['Product']['image'])) {

					$this->out($product['Product']['image_original']);

					// $imageurl = $product['Product']['imageurl'];
					$imageurl = str_replace('/135/', '/', $product['Product']['image_original']);

					$image = $product['Product']['image'];

					$lp  = fopen(WWW_ROOT . '/imagestemp/' . $image, 'w+');

					$l = file_get_contents($imageurl);

					fputs($lp, $l);
					fclose($lp);
					unset($l);
					//
					$localimage = 	$this->resample(WWW_ROOT . '/imagestemp/' . $image, WWW_ROOT . '/images/' . $image, 640, 640, 1);
					$localimage2 = 	$this->resample(WWW_ROOT . '/imagestemp/' . $image, WWW_ROOT . '/thumbs/' . $image, 200, 200, 1);

					// unlink(TMP . $image);

					// $d = array();
					// $d['Product']['id'] = $product['Product']['id'];
					// $d['Product']['width'] = $localimage['width'];
					// $d['Product']['height'] = $localimage['height'];
					// $this->Product->save($d, false);

				}

			}

		}

	}

}
