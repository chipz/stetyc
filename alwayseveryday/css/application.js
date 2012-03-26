// Define functions that will be used by the various functions
var portal = {
		
	upload_status: function()
	{
			$('upload_thinking').show();
			$('progress').show();
			
			if (!JS_BRAMUS) { 
				var JS_BRAMUS = new Object(); 
			}
				
			JS_BRAMUS.jsProgressBarAjaxHandler = Class.create();
			
			JS_BRAMUS.jsProgressBarAjaxHandler.prototype = {

				activeRequestCount			: 0,
				totalRequestCount			: 0,

				initialize					: function() {

					// Register Ajax Responders
						Ajax.Responders.register({
							onCreate: function() {
								this.activeRequestCount++;
								this.totalRequestCount++;
							}.bind(this),
							onComplete: function() {
								this.activeRequestCount--;
								myJsProgressBarHandler.setPercentage(
									'progress',
									parseInt((this.totalRequestCount - this.activeRequestCount) / this.totalRequestCount * 100)
								);
								//if (this.activeRequestCount == 0) { alert("All Done!"); }
							}.bind(this)
						});

					// Perform some Ajax Calls
					/*
						new Ajax.Updater('box1', 'ajaxprogressbar.php', {
							parameters: { text: "call1", sleep: 1 }
						});

						new Ajax.Updater('box2', 'ajaxprogressbar.php', {
						  parameters: { text: "call2", sleep: 2 }
						});

						new Ajax.Updater('box3', 'ajaxprogressbar.php', {
						  parameters: { text: "call3", sleep: 3 }
						});

						new Ajax.Updater('box4', 'ajaxprogressbar.php', {
						  parameters: { text: "call4", sleep: 4 }
						});

						new Ajax.Updater('box5', 'ajaxprogressbar.php', {
						  parameters: { text: "call5", sleep: 5 }
						});
						*/

				}
			}
	}
	
};