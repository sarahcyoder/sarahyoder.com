$(document).ready(function() {
	//AJAX to load nav
    $(".nav").load("inc/nav.html");

/*
    $("icon").click(function() {
    	var navig = $("#navig");
    	if (navig.className === "nav") {
    		navig.addClass("responsive");
		} else {
			navig.removeClass("responsive");
		}
    });
    */

	$("#quizHeader").animate({left: "3px"}, "slow")
		.animate({fontSize: "150%"}, "2000")
		.css("visibility", "visible");
	
	
	//AJAX to query if username already taken
	$("#username").focusout(function() {
		if (this.value === 0) {
			$("#usernameMsg").html = "";
			return;
		} else {
			$("#usernameMsg").load("php/check-username.php?q="+this.value);	
		}
	});
	
	//AJAX to query noun hints for quiz
	$("#nounQuestion").keyup(function() {
	//console.log(this.value);
		if (this.value === 0) {
			$("#suggestNouns").html = "";
			return;
		} else {
			$("#suggestNouns").load("php/suggest-nouns.php?q="+this.value);	
		}
	});


		//AJAX to query country hints for quiz
	$("#countryQuestion").keyup(function() {
		//console.log(this.value);
		if (this.value === 0) {
			$("#suggestCountries").html = "";
			return;
		} else {
			$("#suggestCountries").load("php/suggest-countries.php?q="+this.value);	
		}
	});
	
		//AJAX to query food hints for quiz
	$("#foodQuestion").keyup(function() {
		//console.log(this.value);
		if (this.value === 0) {
			$("#suggestFoods").html = "";
			return;
		} else {
			$("#suggestFoods").load("php/suggest-foods.php?q="+this.value);	
		}
	});
	
	/*
	$("#signupSubmit").click(function(){
		var username = $("#username").val();
		var email = $("#email").val();
		var pw1 = $("#pw1").val();
		console.log(username);
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'username='+ username + '&email='+ email + '&password='+ pw1;
		if (username===''||email===''||pw1===''||pw2==='') {
			alert("Please enter data in all fields.");
			}
			else
				{
				// AJAX Code To Submit Form.
				$.ajax({
					type: "POST",
					url: "submit-signup.php",
					data: dataString,
					cache: false,
					success: function(){}
				});
			}
			return false;
	});
	*/
	
	$("#quizSubmit").click(function(){
		
		var noun = $("#nounQuestion").val().toLowerCase().trim();
		var country = $("#countryQuestion").val().toLowerCase().trim();
		var food = $("#foodQuestion").val().toLowerCase().trim();
		
		if (noun===''||country===''||food==='') {
			alert("Please enter data in all fields.");
			} else {
				
				$("#quizResults").css("display", "block");
		
				$.ajax({
					url: "inc/check-login-quiz.php",
					success: function(resp) {
					if (resp === "1") {
						$("#seeResults").css("display", "block");
					} else {
						$("#quizRegister").css("display", "block");
					}
				}
		});
		
				$("#nounInput").text(noun);
				if (noun === "time") {
					$("#nounResult").text("You got it right!");
				} else {
					$("#nounResult").text("Rats, not right!");
				}
		
				$("#countryInput").text(country);
				if (country === "france") {
					$("#countryResult").text("You got it right!");
				} else {
					$("#countryResult").text("Rats, not right!");
				}
		
				$("#foodInput").text(food);
				if (food === "cheese") {
					$("#foodResult").text("You got it right!");
				} else {
					$("#foodResult").text("Rats, not right!");
				}
		
				console.log(noun);
				// Returns successful data submission message when the entered information is stored in database.
				var dataString = 'noun='+ noun + '&country='+ country + '&food='+ food;
				if (noun===''||country===''||food==='') {
				}
					else {
						// AJAX Code To Submit Form.
						$.ajax({
						type: "POST",
						url: "php/submit-quiz.php",
						data: dataString,
						cache: false,
						//success: function(){}
					});
				}
			return false;
		}
	});
}); // end jQuery fcn
	
$(document).scroll(function() {
		if (window.scrollY >= 20) {
		$(".nav").addClass("sticky");
		} else {
		$(".nav").removeClass("sticky");
		}
	
});


/*
// start sticky nav function when user scrolls
window.onscroll = function() {
	stickyNav();
};

// function to move nav to bottom and keep it there when scrolling
function stickyNav() {
	var nav = document.getElementsByClassName("nav");
	//console.log(nav);
	// add and remove sticky class to nav when user scrolls down and up page
	if (window.scrollY >= 20) {
		nav.classList.add("sticky");
		} else {
		nav.classList.remove("sticky");
		}	
} // end function stickyNav
*/

// start typing function when window loads
window.onload = function() {
	typeAbout();
};

// function to type text on intro
var i = 0;
function typeAbout() {
	var text = "Hi, I'm Sarah :)";
	// move through each letter to text and repeat function until finished	
	if (i < text.length) {
		document.getElementById("aboutHeader").innerHTML += text[i];
		i++;
		setTimeout(typeAbout, 100);
	}
}// end function typeAbout

// Function to add hamburger menu on mobile.
function hamburger() {
    var navig = document.getElementById("navig");
    if (!navig.classList.contains("responsive")) {
        navig.classList.add("responsive");
    } else {
        navig.classList.remove("responsive");
    }
}
