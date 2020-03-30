O envio de dados deve ser:

[
	'customer': {
	   	'name': string,
		'person_type': string,
		'cpf_cnpj': string,
		'ie_rg': string,
		'address': string,
		'number': string,
		'complement': string,
		'cep': string,
		'city': string,
		'state': string,
		'country': string,
		'neighborhood': string,
		'phone': string,
		'email': string
	},
	'freight':{
	   	'name': string,
           	'cnpj': string,
		'ie': string,
		'address': string,
		'number': string,
		'complement': string,
		'cep': string,
		'city': string,
		'state': string,
		'country': string,
		'neighborhood': string,
		'tag_name': string,

	},
	'order':{

		'items': {
			''		

		},
		'delivary_price': float,
		'discount': float,
		'country': float,
		'value': float,
		'pay_value': float,
		'weight': float,
	}


]
