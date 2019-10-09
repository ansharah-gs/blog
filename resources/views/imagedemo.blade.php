<canvas id="grafi-canvas"></canvas>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="{{ asset('grafi/grafi.js') }}"></script>
<script>
  const grafiCanvas = document.getElementById('grafi-canvas')
  let canvas = document.createElement('canvas')
  let ctx = canvas.getContext('2d')
  let original, newImage, imageCtx
  let img = new Image()
  img.src = "{{ asset('images/download.png') }}";

  img.onload = function () {
    canvas.width = img.width
    canvas.height = img.height
    ctx.drawImage(img, 0, 0)
    original = ctx.getImageData(0,0, canvas.width, canvas.height)

    grafiCanvas.width = img.width
    grafiCanvas.height = img.height
    imageCtx = grafiCanvas.getContext('2d')
    imageCtx.putImageData(grafi.sharpen(original, {level: 2}), 0, 0),(grafi.brightness(img, {level: 127})),(grafi.contrast(img, {level: 2})),(grafi.threshold(img, {level: 127}))
  }
</script>