
var form		= document.querySelector('#add_block form');
var element 	= document.querySelector('#add_block h2');
var sort_date 	= document.querySelector('.sort_date');

sort = "ASC";
limit = 7;

element.addEventListener("click", function(e) {
	if(form.style.display == 'block'){
    	form.style.display = 'none';
    }
    else{
        form.style.display = 'block';
    }   
}, false);

function OnSelectionChange (select) {
    var selectedOption = select.options[select.selectedIndex];
    limit = selectedOption.value;
    const xhr = new XMLHttpRequest();
	xhr.onload = function(){
		const json = JSON.parse(xhr.responseText);		
		const table_body = document.querySelector('.table_feedbacks > tbody');
		table_body.innerHTML = this.responseText;
		onChangeJson(json);
	};

	xhr.open("POST", "ajax.php");
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("sort="+sort+"&limit="+limit);
}


sort_date.addEventListener("click", function(e) {
	const xhr = new XMLHttpRequest();
	xhr.onload = function(){
		const json = JSON.parse(xhr.responseText);
		const table_body = document.querySelector('.table_feedbacks > tbody');
		table_body.innerHTML = this.responseText;
		onChangeJson(json);
	};

	xhr.open("POST", "ajax.php");
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	if(sort  == 'ASC'){
    	sort = 'DESC';
    }
    else{               
        sort = 'ASC';
    } 

	xhr.send("sort="+sort+"&limit="+limit);
	 
}, false);


function onChangeJson(json){
	table_body = document.querySelector('.table_feedbacks > tbody');
	while(table_body.firstChild) {
		table_body.removeChild(table_body.firstChild);
	}
	json.forEach((row) => {
		const tr = document.createElement("tr");
		Object.keys(row).forEach(key => {
			const td = document.createElement("td");
			td.textContent = row[key];
			tr.appendChild(td);
		})
		table_body.appendChild(tr);		
	})	
}