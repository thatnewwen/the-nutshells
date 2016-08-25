$(document).ready(function(){


  $(".post-content").each(function(){
  	console.log()
  	var bar = new ProgressBar.Line(this, {
  	  strokeWidth: 1,
  	  easing: 'easeInOut',
  	  duration: 1400,
  	  color: '#FFEA82',
  	  trailColor: '#eee',
  	  trailWidth: 1,
  	  svgStyle: {width: '100%', height: '100%'},
  	  from: {color: '#FFEA82'},
  	  to: {color: '#ED6A5A'},
  	  step: (state, bar) => {
  	    bar.path.setAttribute('stroke', state.color);
  	  }
  	});

  	bar.animate($(this).find(".score").text()/10);  // Number from 0.0 to 1.0
  })

})