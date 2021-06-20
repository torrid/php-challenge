#!/bin/python3 

import requests 
import sys, csv

URL="http://localhost:9080/api"

def getProduct(itemId, productId):
	assert type(productId) == type(1) and type(itemId) == type(1)
	r = requests.get("%s/products/items/%d/products/%d" %(URL, itemId, productId))
	r.status_code != 200 and sys.exit(5)
	return r.json()
	

# Get List of Item IDs. 
r = requests.get("%s/products/items" %(URL))
r.status_code != 200 and sys.exit(3)

productItems=r.json()
ids=list(map(lambda x: x["id"], productItems))

# Get List of ProductIDs 

productIds = []
for i in ids:
	r = requests.get("%s/products/items/%d/products" %(URL, i))
	r.status_code != 200 and sys.exit(4)

	for pi in list(map(lambda x: x["id"], r.json())):
		productIds.append([i, pi])

(i,j) = productIds[0]

fieldnames=["itemId","productId","country","vat","name","description"] 

with open('products.csv', 'w', newline='') as csvfile:
	writer = csv.DictWriter(csvfile, fieldnames=fieldnames)
	writer.writeheader()

	for (i, j) in productIds:
		a = getProduct(i,j)
		a["itemId"] = i
		a["productId"] = j
		out = {}
		for key in fieldnames:
			out[key] = a[key]	
		writer.writerow(out)
	
# {'item': 1, 'name': 'boskop', 'description': 'Boskop, a classic', 'country': 'DE', 'id': 2, 'price': 75, 'vat': 7, 'available_from': '2020-01-01T00:00:00+0000', 'available_until': '2025-12-31T23:59:59+0000', 'min_subscription_time': 3, 'min_quantity': 10, 'shipping_costs': [{'from': 0, 'costs': 100}, {'from': 50, 'costs': 50}], 'notes': '', 'created_at': '2021-06-01T11:27:38+0000', 'updated_at': '2021-06-01T11:27:38+0000'}
   # writer.writerow({'first_name': 'Wonderful', 'last_name': 'Spam'})

	



	
