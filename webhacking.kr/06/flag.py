import base64

id = 'admin'.encode()
password = 'nimda'.encode()

for i in range(20):
	
	id = base64.b64encode(id)
	password = base64.b64encode(password)
	
print('id = \n', id)

print('\n\n\n\n')

print('password = \n', password)
