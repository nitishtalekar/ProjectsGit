

url = new URL(window.location.href);
err = url.searchParams.get('error');
cre = url.searchParams.get('create');
if (err === 'wrong') {
    errdiv = document.getElementById('error');
    errdiv.innerHTML = 'INCORRECT ROOM NAME OR PASSWORD';
}
else if (err === 'duplicate'){
  errdiv = document.getElementById('error');
  errdiv.innerHTML = 'USER ALREADY EXISTS IN THIS ROOM';
}

if (cre === 'true') {
    creatediv = document.getElementById('created');
    creatediv.innerHTML = '&nbsp;&nbsp;ROOM HAS BEEN CREATED&nbsp;&nbsp;';
    collapse_element = document.getElementById('collapseCardExample');
    show_element = document.getElementById('collapseCardExample2');
    collapse_element.classList.remove("show");
    show_element.classList.add("show");    
}
else if (cre === 'false1'){
  creatediv = document.getElementById('pwd_err');
  creatediv.innerHTML = 'PASSWORDS DO NOT MATCH';
  collapse_element = document.getElementById('collapseCardExample');
  show_element = document.getElementById('collapseCardExample2');
  collapse_element.classList.remove("show");
  show_element.classList.add("show");  
}
else if (cre === 'false2'){
  creatediv = document.getElementById('pwd_err');
  creatediv.innerHTML = 'ROOM ALREADY EXISTS';
  collapse_element = document.getElementById('collapseCardExample');
  show_element = document.getElementById('collapseCardExample2');
  collapse_element.classList.remove("show");
  show_element.classList.add("show");  
}
