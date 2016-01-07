WebFontConfig = {google: { families: [ 'Open+Sans:800italic,400:latin' ]}};
(function() {
	var wf = document.createElement('script');
	wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
})();
				
$(document).ready(function(){

	var languages = $("input[name*='jhe_newyearsheader_languages']").val();
	var arrLanguages = languages.split(',');
	var lang = new Array();

	for(var i = 0; i < arrLanguages.length; i++){
		if(arrLanguages[i]) {
			lang[i] = arrLanguages[i];
		}
	}

	$("#sensitive_area").mouseover(function(){
		var numRand = Math.floor(Math.random()*lang.length);
		$("#" + lang[numRand]).fadeIn(500);
		createFirework(66,139,4,5,1,1,97,96,true,true);
		return false;
	});
	$("#sensitive_area").mouseout(function(){
		$(".greeting").fadeOut(500);
	});
	
	$("#sensitive_area").click(function(){
		createFirework(66,139,4,5,1,1,97,96,true,true);
		return false;
	});
	
	$('body').append('<div id="fireworks-template"><div id="fw" class="firework"></div><div id="fp" class="fireworkParticle"><img src="../typo3conf/ext/jhe_newyearsheader/Resources/Public/Images/particles.gif" alt="" /></div></div><div id="fireContainer"></div>');
	
});