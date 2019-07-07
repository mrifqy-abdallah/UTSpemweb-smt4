var blop_audio = document.createElement("audio");
blop_audio.setAttribute("src", "sounds/blop.mp3"); 

var winOrLose = false;

$(".letter").click(function(){
$.ajax({
	data: {letter: $(this).text(), action: 2},
	type: "POST",
	dataType: "json",
	url: "controller.php",
	context: this,
	success: function(data){
	if(!winOrLose)
	{
		if(data.win == null)
		{
		$("#hangman").attr("src",data.image);
		$("#lives-left").text(data.lives);
		$("#guessed-word-div").html(data.guessedWord);
		$(this).addClass("display-none");
		blop_audio.play();
		}
		else
		{
		if(data.win == false)
		{
			winOrLose = true;
			$("#lives-left").text(data.lives);
			$("#hangman").attr("src",data.image);
			$("#the-word-was-div").html(data.word);
			$("#the-word-was-div").removeClass("display-none");
			$("#play-again-div").removeClass("display-none");
			boo_audio.play();
		}
		else
		{
			winOrLose = true;
			$("#guessed-word-div").html(data.guessedWord);
			$("#play-again-div").removeClass("display-none");
			applause_audio.play();
		}
		}
	}
	},
	error: function (jqXHR, textStatus, errorThrown)
	{
	alert(textStatus);
	}
}); 
}); 
