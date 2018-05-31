<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div id="slider">
		<div id="box">
			<img src="../img/laptop1.jpg">
                      
		</div>

		<!-- buttons for controls slider -->
		<button class="prew fa fa-chevron-left" onclick="prewImage()"></button>
		<button class="next fa fa-chevron-right" onclick="nextImage()"></button>
	</div>



  <script type="text/javascript">

  	var slider_content = document.getElementById('box');

  	// contain images in an array
    var image = ['../img/laptop1','../img/laptop2', '../img/laptop3'];

    var i = image.length;


    // function for next slide 

    function nextImage(){
    	if (i<image.length) {
    		i= i+1;
    	}else{
    		i = 1;
    	}
    	  slider_content.innerHTML = "<img src="+image[i-1]+".jpg>";
    }


    // function for prew slide

    function prewImage(){

    	if (i<image.length+1 && i>1) {
    		i= i-1;
    	}else{
    		i = image.length;
    	}
    	  slider_content.innerHTML = "<img src="+image[i-1]+".jpg>";

    }

  
  // script for auto image slider

  setInterval(nextImage , 4000);

  </script>

