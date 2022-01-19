import base64

id = 'admin'.encode('id input')
password = 'nimda'.encode('password input')

for i in range(20):
	
	id = base64.b64encode(id)
	password = base64.b64encode(pw)
	
print(id)

print('\n\n\n\n')

print(pw)
