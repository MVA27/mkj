function table_or_insert(){
	var result = parseInt(prompt("Enter 1 -> Create new Table\nEnter 2 -> Add new record"));

	var anchor = document.getElementById('add_product_id');

	if(result == 1) anchor.href = 'add_table.html'
	else if(result == 2) anchor.href = 'add_product.html';
}

function number_of_attributes(){
	var n = parseInt(prompt("Enter number of columns you want"));
	document.write("Database Name : <input type='text' id='table_name_id' placeholder='DATABASE NAME' name='databaseName' class='form_input_attribute'/> <br></br>");
	document.write("Table Name : <input type='text' id='table_name_id' placeholder='TABLE NAME' name='tableName' class='form_input_attribute'/> <br></br>");
	for(var i = 1 ; i<= n ; i++){
		document.write("column "+i+" Details : <input type='text' name='columnNames[]' placeholder='column_name TYPE CRNST' class='form_input_attribute'/> <br></br>");
	}
	document.write("Table Level Constraint : <input type='text' id='crnst_id' placeholder='PRIMARY KEY(COL_NAME)' name='crnstName' class='form_input_attribute'/> <br></br>");
}
