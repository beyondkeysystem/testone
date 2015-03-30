<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss">
<channel>
<title>Gourmetdev.com Products</title>
<link>http://www.gourmetdev.com/</link>
<description/>
<?php foreach ($products as $product): ?>
<item>
<title><?php echo h($product['Product']['name']); ?> - <?php echo h($product['Product']['id']); ?> <?php echo h($product['User']['business_name']); ?></title>
<link>http://<?php echo h($product['User']['slug']); ?>.gourmetdev.com/product/<?php echo h($product['Product']['id']); ?>-<?php echo h($product['Product']['slug']); ?></link>
<guid isPermaLink="true">http://<?php echo h($product['User']['slug']); ?>.gourmetdev.com/product/<?php echo h($product['Product']['id']); ?>-<?php echo h($product['Product']['slug']); ?></guid>
<description><?php echo h($product['Product']['name']); ?></description>
<media:content url="http://gourmetdev.com/img/products/image/<?php echo $product['Product']['image']; ?>" type="image/jpg" media="image" />
<pubDate><?php echo date('D, d M Y H:i:s O', strtotime($product['Product']['created'])); ?></pubDate>
</item>
<?php endforeach; ?>
</channel>
</rss>