jQuery(document).ready(function($) {
	var champCode=$('#billing_postcode');
	var champEmail=$('#billing_email');
	$('#billing_city_field').css('position','relative');
	var champVille=$('#billing_city');
	champVille.after('<div class="villes" id="villes" style="display:none;"></div>');
	var divVilles=$('#villes');
	var baseUrl='http://api.zippopotam.us/FR/';

	champCode.keyup(function(){
		var code = champCode.val().toString();
		if (code.length == 5) {
			if ((code >= 75000) && (code < 76000)) {
				champVille.val('Paris');
			} else {
				url=baseUrl+code;
				$.get( url, function( data ) {
					champVille.val(String(data.places[0]["place name"]));
					if (data.places.length>1) {
						var html='';
						for (var i = 0; i < data.places.length; i++) {
							var ville = String(data.places[i]["place name"]);
							html += '<input type="radio" id="'+ville+'" name="ville" value="'+ville+'"';
							if (i==0) { html += 'checked';}
							html += '>';
							html += '<label for="'+ville+'">'+ville+'</label>';
						}
						divVilles.html(html);
						divVilles.slideDown();							
						$('#villes input').on('click', function() {
							champVille.val($('input[name="ville"]:checked',divVilles).val());
							divVilles.slideUp(); 
							champEmail.focus();
						});
						champVille.focus(function() {divVilles.slideDown();});
						champVille.focusout(function() {divVilles.slideUp();});
						champEmail.focus(function() {divVilles.slideUp();});				
					}
				});	
			}
		}
	});
});