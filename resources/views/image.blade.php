{{-- <video id="player" controls autoplay></video>
<button id="capture">Capture</button>
<canvas id="canvas" width=320 height=240></canvas>
<script>
  const player = document.getElementById('player');
  const canvas = document.getElementById('canvas');
  const context = canvas.getContext('2d');
  const captureButton = document.getElementById('capture');

  // const constraints = {
  //   video: true,
  // };
  const hdConstraints = {
  video: {video: true,width: {min: 1280}, height: {min: 720}}
};

  captureButton.addEventListener('click', () => {
    // Draw the video frame to the canvas.
    context.drawImage(player, 0, 0, canvas.width, canvas.height);
  });

  // Attach the video stream to the video element and autoplay.
  navigator.mediaDevices.getUserMedia(hdConstraints)
    .then((stream) => {
      player.srcObject = stream;
    });
</script> --}}


<!DOCTYPE html>
<html>
<head>
  <title></title>
  
<style type="text/css">
  .video{
    width: 400px;
    height: 300px;
  }
  #screenshot-img {
    width: 400px;
    height: 300px;
}
  
  
</style>
</head>
<body>
  <div id="screenshot" style="text-align: center;">
    <video autoplay></video>
    <img src="">

    <canvas style="display:none;"></canvas>
    <button class="capture-button">Capture video</button>
    <button id="screenshot-button">Take screenshot</button>
  </div>
  <img src="kayaks.jpg?w=250&dpr=2">
</body>
</html>
<script>
const captureVideoButton =
  document.querySelector('#screenshot .capture-button');
const screenshotButton = document.querySelector('#screenshot-button');
const img = document.querySelector('#screenshot img');
const video = document.querySelector('#screenshot video');

const canvas = document.createElement('canvas');
const constraints = {
  video :true,
  width: {min: 1080}, height: {min: 920},
  frameRate: 100
  };

captureVideoButton&&(captureVideoButton.onclick = function () {
  navigator.mediaDevices.getUserMedia(constraints).
    then(handleSuccess).catch(handleError);
});

screenshotButton&&(screenshotButton.onclick = video.onclick = function() {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext('2d').drawImage(video, 0, 0);
  // Other browsers will fall back to image/png
  img.src = canvas.toDataURL('image/webp?dpr=3');
});

function handleSuccess(stream) {
  screenshotButton.disabled = false;
  video.srcObject = stream;
}
function handleError(error) {
  console.error('Error: ', error);
}
</script>


{{-- <video autoplay></video>

<script>
const constraints = {
  video: true
};

const video = document.querySelector('video');

navigator.mediaDevices.getUserMedia(constraints).
  then((stream) => {video.srcObject = stream});
</script> --}}