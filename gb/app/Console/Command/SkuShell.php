<?php
class SkuShell extends Shell {

	public $uses = array('Product');

	public function main() {

		$slugtype = '-';

		$filename = TMP . 'p.csv';

		ini_set('auto_detect_line_endings', true);

		$handle = fopen($filename, 'r');

		$header = fgetcsv($handle);

		print_r($header);

//		die('end header');


//		$handle = fopen($filename, "r");
//		while (($data = fgetcsv($handle)) !== FALSE) {
//			print_r($data);
//		}



		echo $filename;

//		$this->Product->query("TRUNCATE products");
//		$this->Product->query("DELETE from products where user_id = 111");


//		die('end here');

		$handle = fopen($filename, 'r');

		$header = fgetcsv($handle);

		$slugs = array('name' => 'slug');
		$counter = 0;
		$unique = 0;

		while (($row = fgetcsv($handle)) !== FALSE) {

			$data = array();

			foreach ($header as $k => $head) {
				if (strpos($head, '.') !== false) {
					$h = explode('.', $head);
					$data[$h[0]][$h[1]] = (isset($row[$k])) ? trim($row[$k]) : '';
				}
				else {
					$head = strtolower($head);
					$data['Product'][$head] = (isset($row[$k])) ? trim($row[$k]) : '';
				}
			}

			foreach ($slugs as $key => $value) {
				$key_slug = $data['Product'][$key];
				$key_slug = str_replace('\'', '', $key_slug);
				$key_slug = trim($key_slug);
				$key_slug = str_replace('"', '', $key_slug);
				$key_slug = preg_replace('/[^a-z0-9A-Z]/', ' ', $key_slug);
				$data['Product'][$value] = Inflector::slug(strtolower($key_slug), $slugtype);
			}


//			$nut = explode('|', $data['Product']['nutrition']);
//			print_r($nut);
//			echo "\n\n\n\n";


//			$data['Product']['local_image'] = $data['Product']['name_slug'] . '.jpg';

//			$data['Product']['name'] = $data['Product']['name'];

			$data['Product']['user_id'] = 11;

//			$data['Product']['title'] = preg_replace('/[()\-\"\']/', '', $data['Product']['name']);

//			$data['Product']['title_mix'] = $this->titleMix($data['Product']['title']);

//			$keywords = explode(',', Inflector::slug(strtolower($data['Product']['title'] . ',' . $data['Product']['manufacturer'] . ',' . $data['Product']['advertisercategory']), ','));
//			shuffle($keywords);
//			$keywords = array_unique($keywords);
//			$keywords = implode(',', $keywords);
//			$data['Product']['keywords'] = $keywords;


			$count = $this->Product->find('count', array(
				'conditions' => array('Product.slug' => $data['Product']['slug'])
			));

//			echo $count . "\n";

			if($count == 1) {

				// if(!empty($data['Product']['imageurl'])) {
				// 	$this->out($data['Product']['imageurl']);
				// 	// die;
				//
				// 	$l = file_get_contents($data['Product']['imageurl']);
				//
				//
				// 	$image = preg_replace("/[^a-zA-Z-]/", '', $data['Product']['name_slug']) . '.jpg';
				// 	$image = str_replace("--", '-', $image);
				// 	$image = str_replace("--", '-', $image);
				//
				// 	$this->out("\n");
				// 	$this->out($image);
				// 	$this->out("\n");
				//
				// 	$lp  = fopen(TMP . '/i/' . $image, 'w+');
				// 	fputs($lp, $l);
				// 	fclose($lp);
				// 	// unset($l);
				// 	$localimage = $this->resample(TMP . '/i/' . $image, TMP . '/t/' . $image, 500, 500, 1);
				//
				// 	$this->out('aaaaaaaaaaaaaaa');
				// 	$this->out(print_r($localimage));
				// 	$this->out('bbbbbbbbbbbbbbb');
				//
				// 	// $sp  = fopen(TMP . '/s/' . $image, 'w+');
				// 	// fputs($sp, $l);
				// 	// fclose($sp);
				// 	// unset($l);
				// 	// $this->resample(TMP . '/i/' . $image, TMP . '/s/' . $image, 200, 200, 1);
				//
				//
				//
				//
				// 	$data['Product']['width'] = $localimage['width'];
				// 	$data['Product']['height'] = $localimage['height'];
				// 	$data['Product']['local_image'] = $image;
				// }




				print_r($data);

//				$this->Product->create();
				//$this->set($data);
//				$this->Product->save($data, false);
				$unique++;

//				$productId = $this->Product->getLastInsertID();
//				$tagtext = $data['Product']['name'] . ' ' . $data['Product']['category_name'] . ' ' . $data['Product']['subcategory'] . ' ' . $data['Product']['sub_subcategory'];
//				$key_slug = preg_replace('/[^a-zA-Z]/', ' ', $tagtext);
//				$tt = Inflector::slug(strtolower($key_slug), '-');
//				$tags = explode('-' , $tt);
//				print_r($tags);
//				foreach($tags as $tagname) {
//					if(strlen($tagname) > 21111) {
//						echo $tagname . "\n";
//						$tag = $this->Tag->find('first', array(
//							'conditions' => array('Tag.name' => $tagname)
//						));
//						if(!$tag) {
//							$this->Tag->create();
//							$t['Tag']['name'] = $tagname;
//							$this->Tag->save($t);
//							$tagId = $this->Tag->getLastInsertID();
///						} else {
///							$tagId = $tag['Tag']['id'];
//						}
//						$this->ProductsTag->create();
//						$pt['ProductsTag']['product_id'] = $productId;
///						$pt['ProductsTag']['tag_id'] = $tagId;
//						$this->ProductsTag->save($pt);
//					}
//				}


			}

			$count = 1;

			$counter++;

//			$this->out(' - ' . $unique . ' - ' . $data['Product']['name']);

		}

		$this->out(' - Processed Records: ' . $counter . ' - ');
		$this->out(' - Inserted Records: ' . $unique . ' - ');

		fclose($handle);

	}

}
