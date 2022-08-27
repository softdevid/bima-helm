1. <pre>composer install</pre>
2. rename / copypaste .env
3. <pre>php artisan key:generate</pre>
4. <pre>php artisan laravolt:indonesia:seed</pre>
5. <pre>Paste di .env
	CLOUDINARY_API_KEY=284977252145521
	CLOUDINARY_API_SECRET=cA_OwFvwjCPjAanWJxKvLlzYgl4
	CLOUDINARY_URL=CLOUDINARY_URL=cloudinary://284977252145521:cA_OwFvwjCPjAanWJxKvLlzYgl4@cv-mekar-cutting-digital
	CLOUDINARY_UPLOAD_PRESET=https://api.cloudinary.com/v1_1/cv-mekar-cutting-digital/image/uploads
	CLOUDINARY_NOTIFICATION_URL=
    </pre>
6. done, if error just WA me :)

<hr>

mysql query to get stock
<pre>
SELECT 
categories.id AS category_id,
COALESCE(SUM(sizes.xs+sizes.s+sizes.m+sizes.lg+sizes.xl+sizes.xxl), 0) as store, 
COALESCE(SUM(gudangs.xs+gudangs.s+gudangs.m+gudangs.lg+gudangs.xl+gudangs.xxl), 0) as storehouse, 
CURRENT_DATE() as date 
FROM products 
JOIN sizes ON products.size_id = sizes.id 
JOIN gudangs ON products.gudang_id = gudangs.id 
RIGHT JOIN categories ON products.category_id = categories.id 
GROUP BY categories.id;
</pre>
