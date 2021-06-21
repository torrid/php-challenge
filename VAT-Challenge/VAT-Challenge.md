Analysis
--------
Currently the VAT is hard-coded into the database, in the project table. Therefore, if the VAT for a land changes, each product would have to be changed.* Example: Greece has reduced their current VAT for certain products from 24 to 13 percent for the proposed durage of the Corona Pandemy. That tells us that those changes can be common and temporary.*
The different types of VAT should be stored independently of the Product, and rather depend of the country of origin. 
On the other hand, many EU-Countries provide different tax rates, depending on the kind of product, or type of Trade. 
*Example: Germany: 19.00% for usual value added trades, 7.00% reduced rate for certain types of businesses or products, especially agricultural goods.*

VAT rates Source: https://www.avalara.com/vatlive/en/vat-rates/european-vat-rates.html 
______

Tasks, User Stories
-------------------
Find the current data by dumping product, country and VAT into a text/CSV file. This is useful for:

 * analyzing the current data,
 * moving the VAT values to their new destination, and
 * creating a test case for comparision of new vs. old behaviour.

Create a table for all (EU) countries, with possible and applicable VAT rate, identify the most common rate from the types of products as seen in the dump table. 

Invent some test cases for the desirable behaviour.

Program the changes. 

Test. 

Document. 


User Story
----------
When inserting a new product, the user doesn't have to lookup or know the current VAT rate for the current product or country. Instead the API inserts the VAT by itself. 

- Break down the tasks  

- Implementation of the necessary features and adaptation of the existing code.

The Python code dump_products.py iterates over all item_ids and product_ids to fetch all products from the API and dumps all products("itemId","productId","country","vat","name","description") into an CSV file. 


- Changes to the database should be made through migrations and previous data should be converted.
- Creation of the documentation.

Note: it is not required to create an API for the management of tax rates. Please add tasks and user stories to this document. 
