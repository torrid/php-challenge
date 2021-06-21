/* Database Migration Transaction 
Drop products(vat).
Add countries(vat) without NOT NULL constraint.
Populate vat column.
Re-change vat column to NOT NULL.
Commit.

TODO: The default constraint 7.00 for VAT should be dropped when going global.
*/


use challenge;

START TRANSACTION; 
SET SQL_SAFE_UPDATES = 0;
SET autocommit = 0;

ALTER TABLE products DROP COLUMN `vat`;
ALTER TABLE countries ADD COLUMN `vat` decimal(4,2);

UPDATE countries SET vat = 7.0 WHERE id = 'DE';
UPDATE countries SET vat =10.0 WHERE id = 'AT';
UPDATE countries SET vat = 2.5 WHERE id = 'CH';
UPDATE countries SET vat = 6.0 WHERE id = 'BE';
UPDATE countries SET vat = 9.0 WHERE id = 'NL';
UPDATE countries SET vat =10.0 WHERE id = 'FR';
UPDATE countries SET vat =25.0 WHERE id = 'DK';
UPDATE countries SET vat = 5.0 WHERE id = 'PL';

-- CHANGE -> MODIFY
ALTER TABLE countries MODIFY vat decimal(4,2) NOT NULL DEFAULT 7.0;

SET SQL_SAFE_UPDATES = 1;
COMMIT;


