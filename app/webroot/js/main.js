document.observe('dom:loaded',function(){

    $$('tr:nth-child(odd)').each(function(e){
        e.addClassName('altrow');
    });

	$$('.category .title').each ( function (e) {
		Event.observe(e, 'click', function (event) {
			e.next().toggle();
			e.toggleClassName('expand');
		});
	});

	Ajax.Responders.register({
		onCreate: function() {
			if($('notification') && Ajax.activeRequestCount > 0)
				Effect.Appear('notification',{duration: 0.25, queue: 'end'});
		},
		onComplete: function() {
			if($('notification') && Ajax.activeRequestCount == 0)
				Effect.Fade('notification',{duration: 0.25, queue: 'end'});
		}
	});

});


//check ajax form
// json format should be: {"error":{"code":1,"messages":{"name":"This field cannot be left blank"}},"redirect":"\/cake\/jv_core\/menu"}
function checkForm(form, json, formNameFormat, messageContainer){
	if(json.error.code){
		var formNameTemplate = new Template(formNameFormat);
		var errorMessage = "";

		//remove previously error class
		$$('form .input').each(function (element) {
			element.removeClassName('error');
		});

		for (var name in json.error.messages) {
			if (json.error.messages.hasOwnProperty(name)) {
				var replacement = {field: String(name)};
				formName = formNameTemplate.evaluate(replacement);
				form[formName].up().addClassName('error');
				errorMessage += json.error.messages[name] + "<br />";
			}
		}
		htmlMessage = "<div class='error-box'>"+errorMessage+"</div>"
		if (messageContainer.innerHTML == "") {
			messageContainer.hide();
			messageContainer.update(htmlMessage);
			new Effect.SlideDown(messageContainer, {duration:0.5});
		} else {
			messageContainer.update(htmlMessage);
		}
	}else{
		location.href = json.redirect;
	}
}
