class Construir_tabela {

  constructor(info, table) {
    this.info = info
    this.table = table
    this.render()
  }

  render() {
    let infoTable = `<table class="table table-hover">`
    infoTable += '<thead> <th>Nome</th> <th>Matricula</th> <th>Situação</th> </thead>'

    for (let [key, values] of Object.entries(this.info)){
      infoTable += '<tr>'
      for (let [key_2, values_2] of Object.entries(this.info[key])){
        infoTable += ` <td> ${values_2} </td> `
      }
      infoTable += '</tr>'
    }
    infoTable += `</table>`

    this.table.innerHTML = infoTable
  }
}

(function() {

  var width = 320;    // We will scale the photo width to this
  var height = 0;     // This will be computed based on the input stream

  // |streaming| indicates whether or not we're currently streaming
  // video from the camera. Obviously, we start at false.

  var streaming = false;

  // The various HTML elements we need to configure or control. These
  // will be set by the startup() function.

  var video = null;
  var canvas = null;
  var photo = null;
  var startbutton = null;

  function startup() {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    photo = document.getElementById('photo');
    startbutton = document.getElementById('startbutton');
    analisar = document.getElementById('analisar');
    tabela_html = document.getElementById('tabela');
    resultado = document.getElementById('resultado');

    navigator.mediaDevices.getUserMedia({ video: true, audio: false })
    .then(function(stream) {
        video.srcObject = stream;
        video.play();
    })
    .catch(function(err) {
        console.log("An error occured! " + err);
    });

    video.addEventListener('canplay', function(ev){
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);

        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    startbutton.addEventListener('click', function(ev){
      takepicture();
      ev.preventDefault();
    }, false);

    resultado.addEventListener('click', function(){
      fetch('/dweb/projeto/presenca.json')
      .then(res => res.json())
      .then(info => {
        console.log(info)
        let tabela = new Construir_tabela(info, tabela_html)
      })
    });

    clearphoto();
  }

  // Fill the photo with an indication that none has been
  // captured.

  function clearphoto() {
    var context = canvas.getContext('2d');
    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);

    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
  }

  // Capture a photo by fetching the current contents of the video
  // and drawing it into a canvas, then converting that to a PNG
  // format data URL. By drawing it on an offscreen canvas and then
  // drawing that to the screen, we can change its size and/or apply
  // other changes before drawing it.

  function takepicture() {
    var context = canvas.getContext('2d');
    if (width && height) {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);

      var data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);

      console.log(data)
      // document.querySelector('#dl-btn').href = data;
      document.querySelector('#snapshot').value = data;

    } else {
      clearphoto();
    }
  }

  // Set up our event listener to run the startup process
  // once loading is complete.
  window.addEventListener('load', startup, false);
})();
