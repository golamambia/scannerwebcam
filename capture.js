var snapShot=null;
document.addEventListener('DOMContentLoaded', function () {

    cam_start_btn=document.querySelector('#start'); 

    capture_btn=document.querySelector('#take-pic');

    video=document.querySelector('#video');

     var stopVideo;
     var constraints = { 
        audio: false,
        video: {
          facingMode: 'environment'
      }
    };
    cam_start_btn.addEventListener('click',function(e){

        e.preventDefault();
        
        navigator.mediaDevices.getUserMedia(constraints)
.then(stream => {
    try {

        video.src = window.URL.createObjectURL(stream);

        stopVideo=stream.getVideoTracks()[0];                            

       capture_btn.classList.remove("d-none");

        cam_start_btn.classList.add("d-none");

        capture_btn.removeAttribute('disabled');

    } catch (error) { 

       video.srcObject=stream;

       stopVideo=stream.getTracks()[0];                      

       capture_btn.classList.remove("d-none");

       cam_start_btn.classList.add("d-none");

       capture_btn.removeAttribute('disabled');

    }

    video.play();  
})
.catch(err => {
    alert("There was an error with accessing the camera stream: " + err.name, err);
})


           

    });

    capture_btn.addEventListener('click',function(){

        capture_btn.setAttribute('disabled',"");

        capture();

    });

    function capture(){

        image=document.querySelector('#image');

        canvas=document.querySelector('#canvas');

        context = canvas.getContext('2d');

        var width = video.videoWidth,

            height = video.videoHeight;

            if (width && height) {

                canvas.width = width;

                canvas.height = height;

                context.drawImage(video, 0, 0, width, height);

                snap=canvas.toDataURL('image/png');
                snapShot = snap;
                image.setAttribute('src', snap);

                stopVideo.stop();

                //image.classList.add("visible");

            }

    }

});