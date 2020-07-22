(function(window) {
  function triggerCallback(e, callback) {
    if(!callback || typeof callback !== 'function') {
      return;
    }
    var files;
    if(e.dataTransfer) {
      files = e.dataTransfer.files;
    } else if(e.target) {
      files = e.target.files;
    }
    console.log(files);
    
    var fileInput = document.querySelector('.input');
    fileInput.files = files;
    
    callback.call(null, files);
  }
  function makeDroppable(ele, callback) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('multiple', true);
    input.style.display = 'none';
    input.addEventListener('change', function(e) {
      triggerCallback(e, callback);
    });
    ele.appendChild(input);
    
    ele.addEventListener('dragover', function(e) {
      e.preventDefault();
      e.stopPropagation();
      ele.classList.add('dragover');
      var disp = document.querySelector('.disp');
      disp.innerHTML = 'Drop File';
    });

    ele.addEventListener('dragleave', function(e) {
      e.preventDefault();
      e.stopPropagation();
      ele.classList.remove('dragover');
      var disp = document.querySelector('.disp');
      disp.innerHTML = 'Drag files here or click to upload';
    });

    ele.addEventListener('drop', function(e) {
      e.preventDefault();
      e.stopPropagation();
      ele.classList.remove('dragover');
      var disp = document.querySelector('.disp');
      disp.innerHTML = 'Drag files here or click to upload';
      triggerCallback(e, callback);
    });
    
    ele.addEventListener('click', function() {
      input.value = null;
      input.click();
    });
  }
  window.makeDroppable = makeDroppable;
})(this);
(function(window) {
  makeDroppable(window.document.querySelector('.demo-droppable'), function(files) {
    
    var output = document.querySelector('.output');
    output.innerHTML = '';
    for(var i=0; i<files.length; i++) {
      if(files[i].type.indexOf('image/') === 0) {
        output.innerHTML += '<img width="200" src="' + URL.createObjectURL(files[i]) + '" />';
      }
      output.innerHTML += '<p>'+files[i].name+'</p>';
    }
    var disp = document.querySelector('.disp');
    disp.innerHTML = '';
  });
})(this);
