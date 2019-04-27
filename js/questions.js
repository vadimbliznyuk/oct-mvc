//document.getElementById('courses').onclick = function () {
//    var xhr = new XMLHttpRequest();
//    xhr.open('GET', 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
//    xhr.onreadystatechange = function () {
//	if (xhr.readyState === 4) {
//	    if (xhr.status === 200) {
//		var json_text = xhr.responseText;
//		var courses = JSON.parse(json_text);
////		alert(xhr.responseText);
//		console.log(courses);
//		for(var i=0; i < courses.length; i++){
//		    alert(courses[i].ccy); //TODO выводи как хочешь
//		}
//	    } else {
//		alert('error :' + xhr.statusText);
//	    }
//	}
//    }
//    xhr.send();
//}

//document.getElementById('questions-btn').onclick = function (){
//    var xhr = new XMLHttpRequest();
//    xhr.open('GET', '/api/questions');
//    xhr.onreadystatechange = function () {
//	if (xhr.readyState === 4) {
//	    if (xhr.status === 200) {
//		var json_text = xhr.responseText;
//		var questions = JSON.parse(json_text);
//		console.log(questions); 
//		// TODO вывести в табличку
//		var tbody = document.querySelector('#questions tbody');
//		tbody.innerHTML = '';
//		for(var i=0; i < questions.length; i++){
//		    tbody.innerHTML += '<tr>\n\
//<td>'+questions[i].id+'</td>\n\
//<td>'+questions[i].author+'</td>\n\
//<td>'+questions[i].text+'</td>\n\
//</tr>';
//		}
//	    } else {
//		return false;
//	    }
//	}
//    }
//    xhr.send();
//}

function showQuestion() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/api/questions');
    xhr.onreadystatechange = function () {
	if (xhr.readyState === 4) {
	    if (xhr.status === 200) {
		var json_text = xhr.responseText;
		var questions = JSON.parse(json_text);
//		console.log(questions);
		// TODO вывести в табличку
		var tbody = document.querySelector('#questions tbody');
		tbody.innerHTML = '';
		for (var i = 0; i < questions.length; i++) {
		    tbody.innerHTML += '<tr>\n\
<td>' + questions[i].id + '</td>\n\
<td>' + questions[i].author + '</td>\n\
<td>' + questions[i].text + '</td>\n\
<td>' + '<form name="delete"><input type="hidden" name="id" value="' + questions[i].id + '"><button>delete</button></form>' + '</td>\n\
</tr>';
		}
		var delete_form = document.getElementsByName('delete');
		for (var i = 0; i < delete_form.length; i++) {
		    delete_form[i].onsubmit = function (e) {
			
			var id = this.id;
			console.log(id.value);
			var post_data = 'id=' + id.value;
			var xhr = new XMLHttpRequest();
			xhr.open('POST', '/api/deletequestion');
			xhr.onreadystatechange = function () {
			    if (xhr.readyState === 4) {
				if (xhr.status === 200) {
				    showQuestion();
				}
			    }
			}
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhr.send(post_data);


			e.preventDefault();
		    };
		}
	    } else {
		return false;
	    }
	}
    }
    xhr.send();

}

showQuestion();

function sendQuestion(author, text) {
    var post_data = 'author=' + author + '&text=' + text;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/addquestion');
    xhr.onreadystatechange = function () {
	if (xhr.readyState === 4) {
	    if (xhr.status === 200) {
		showQuestion();
	    }
	}
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(post_data);


}

document.forms.question.onsubmit = function (event) {
    var form_elements = this.elements;
    var author = form_elements.author.value;
//    form_elements.author.value='';
    var text = form_elements.text.value;
//    form_elements.text.value='';
    this.reset();
    sendQuestion(author, text);
    event.preventDefault();
};



document.forms.delete.onsubmit = function (event) {
    alert('afd');
}