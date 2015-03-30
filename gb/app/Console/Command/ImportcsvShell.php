<?php
class ImportcsvShell extends Shell {

	public $uses = array('Product', 'Tag', 'ProductsTag', 'Category', 'Subcategory', 'Subsubcategory');

	private function titleMix($string = null) {
		if($string) {
			$array = explode(' ', $string);
			shuffle($array);
			return implode(' ', $array);
		}
	}

	public function main() {

		$slugtype = '-';

		$filename = TMP . 'kitchentlc.csv';

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
		$this->Product->query("DELETE from products where user_id = 111");


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

			$data['Product']['price'] = preg_replace('/[^0-9\.]/', '', $data['Product']['price']);

			$data['Product']['image'] = $data['Product']['slug'] . '.jpg';

			$data['Product']['user_id'] = 111;

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

			if($count == 0) {

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


				$category = $this->Category->find('first', array(
					'conditions' => array('Category.name' => $data['Product']['category'])
				));
				if(!empty($category)) {
					$data['Product']['category_id'] = $category['Category']['id'];
				} else {
					$data['Product']['category_id'] = 1;
				}

				if(empty($category['Category']['id'])) {
					$data['Product']['category_id'] = 2;
				}




				$subcatname = trim(str_replace('&', '-', $data['Product']['subcategory']));

				$subcategory = $this->Subcategory->find('first', array(
					'conditions' => array('Subcategory.name' => $subcatname)
				));
				if(!empty($category)) {
					$data['Product']['subcategory_id'] = $subcategory['Subcategory']['id'];
				} else {
					$data['Product']['subcategory_id'] = 2;
				}


				if(empty($subcategory['Subcategory']['id'])) {
					$data['Product']['subcategory_id'] = 2;
				}



				$subsubcatname = trim(str_replace('&', '-', $data['Product']['subsubcategory']));

				$subsubcategory = $this->Subsubcategory->find('first', array(
					'conditions' => array('Subsubcategory.name' => $subsubcatname)
				));
				if(!empty($category)) {
					$data['Product']['sub_subcat_id'] = $subsubcategory['Subsubcategory']['id'];
				} else {
					$data['Product']['sub_subcat_id'] = 3;
				}

				if(empty($subsubcategory['Subsubcategory']['id'])) {
					$data['Product']['sub_subcat_id'] = 3;
				}

				print_r($data);

				$this->Product->create();
				//$this->set($data);
				$this->Product->save($data, false);
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
