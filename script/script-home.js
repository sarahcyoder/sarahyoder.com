$(document).ready(function() {

	// Hello World intro animation
	$("#intro").animate({left: "1px"}, "slow")
		.animate({fontSize: "500%"}, "2000")
		.css("visibility", "visible");
		//.css("margin-left", "-100px")
		//.css("padding-left", "-100px");
	
	// fade out links and question on portfolio click
	$("#skip").click(function() {
		$("#choosePath").fadeOut();
		$("#typedIntro").fadeOut();
		$("#noGameIntro").fadeIn();
		$("#portfolioIntro").fadeIn();
	});
	
	$(".column img").mouseenter(function() {
		var images = $(this).attr('class');
		console.log(images);
		$(this).toggleClass("flipping");
	});
}); // end jQuery fcns for homepage
	
// start typing function when window loads
window.onload = function() {
	typeChar();
};

// function to type text on intro
var i = 0;
function typeChar() {
	var text = "My name is Sarah. Want to play a game?";
	// move through each letter to text and repeat function until finished	
	if (i < text.length) {
		document.getElementById("typedIntro").innerHTML += text[i];
		i++;
		setTimeout(typeChar, 60);
	}
}// end function typeChar