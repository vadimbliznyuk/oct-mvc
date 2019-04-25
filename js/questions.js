document.getElementById('courses').onclick = function () {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
    xhr.onreadystatechange = function () {
	if (xhr.readyState === 4) {
	    if (xhr.status === 200) {
		var json_text = xhr.responseText;
		var courses = JSON.parse(json_text);
//		alert(xhr.responseText);
		console.log(courses);
		for(var i=0; i < courses.length; i++){
		    alert(courses[i].ccy); //TODO выводи как хочешь
		}
	    } else {
		alert('error :' + xhr.statusText);
	    }
	}
    }
    xhr.send();
}

document.getElementById('questions-btn').onclick = function (){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/api/questions');
    xhr.onreadystatechange = function () {
	if (xhr.readyState === 4) {
	    if (xhr.status === 200) {
		var json_text = xhr.responseText;
		var questions = JSON.parse(json_text);
		console.log(questions); 
		// TODO вывести в табличку
		var tbody = document.querySelector('#questions tbody');
		tbody.innerHTML = '';
		for(var i=0; i < questions.length; i++){
		    tbody.innerHTML += '<tr>\n\
<td>'+questions[i].id+'</td>\n\
<td>'+questions[i].author+'</td>\n\
<td>'+questions[i].text+'</td>\n\
</tr>';
		}
	    } else {
		return false;
	    }
	}
    }
    xhr.send();
}


