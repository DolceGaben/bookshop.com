function onclickAddBook(book_id){
	var div_book="buy-status-" + book_id;
  var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            document.getElementById(div_book).innerHTML = this.responseText;
        }
    };
    xhr.open('GET','buybook.php?' + 'id=' + book_id, true); //async
    xhr.send();

}