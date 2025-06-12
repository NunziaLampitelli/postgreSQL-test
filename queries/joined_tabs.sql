SELECT
  users.name AS user_name,
  products.name AS product_name,
  purchases.purchase_date
FROM
  purchases
JOIN users ON purchases.user_id = users.id
JOIN products ON purchases.product_id = products.id;