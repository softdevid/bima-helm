<?php

$mysqli = new mysqli("localhost", "root", "dzaky654",  "bima_helm");

if ($mysqli->connect_errno) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "INSERT INTO daily_stocks SELECT
NULL,
categories.id AS category_id,
COALESCE(SUM(sizes.xs+sizes.s+sizes.m+sizes.lg+sizes.xl+sizes.xxl), 0) as store,
COALESCE(SUM(gudangs.xs+gudangs.s+gudangs.m+gudangs.lg+gudangs.xl+gudangs.xxl), 0) as storehouse,
CURRENT_DATE() as date
FROM products
JOIN sizes ON products.size_id = sizes.id
JOIN gudangs ON products.gudang_id = gudangs.id
RIGHT JOIN categories ON products.category_id = categories.id
GROUP BY categories.id;";

if ($mysqli->query($sql)) {
    echo json_encode(["message" => "success"]);
} else {
    echo json_encode(["message" => $mysqli->error]);
}

$mysqli->close();
