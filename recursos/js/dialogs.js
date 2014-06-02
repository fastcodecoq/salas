(function(a){
 "use strict";
 a.dialog = function(){
                 
 
                 if(!$){ console.log("jQuery is required"); return false; }
		 

		 var confirm = '<div id="overr"><div id="confirmation" >'
	                 + '<div class="content" ></div>'
	                 + '<div class="buttons" "></div>'
	                 + '</div></div>';

	        

	        $("body").append(confirm);
	        



	        var live_controller = function(e){
	        	 e.preventDefault();
	        	 e.stopPropagation();

	        	 var msg = $(this).attr("data-msg");
	        	 show_(msg);

	        }

	        this.show = function(msg, opts){

	        	 if(!msg)
	        	 	var msg = "";

	        	  if(!opts)
	        	  	show_(msg);
	        	  else
	        	  	show_(msg, opts);

	        }

		 	 var show_ = function(msg, opts_){

		 	 	// opts {}
		 	// cancel true | false
		 	// customButtons [ { "text" : "String", type" : "String (cancel | accept)"" , "callback" : function(){} } ]
		 	// onAccept Function
		 	// onCancel Function
		 	// autohide
		 	// onlyCustom
		 	 	 

		 	 	  var opts = {		 	 	  	 
		 	 	  	 autohide : true,		 	 	  	 
		 	 	  	 onlyCustom : false,
		 	 	  	 onAccept : {},
		 	 	  	 onCancel : {},
		 	 	  	 beforeShow : {},
		 	 	  	 beforeHide : {},
		 	 	  	 AfterShow : {},
		 	 	  	 AfterHide  : {},
		 	 	  	 acceptText : false,
		 	 	  	 cancelText : false,
		 	 	  	 ask : false,
		 	 	  	 theme : false,
		 	 	  	 title : false
		 	 	  }


		 	 	  if(opts_ instanceof Object)
		 	 	  	  $.extend(opts, opts_);

		 	 	  if(opts.theme)
		 	 	  	$("#confirmation").addClass(opts.theme);

		 	 	  var title = (opts.title) ? "<div class='title'><span>" + opts.title + "</span></div>" : "";

		 	 	    msg = title + msg;
		 	 	  	
		 	 	  	console.log(opts);



		 	 	  if(opts instanceof Object)
		 	 	  {

		 	 	  	var buttons = "";
		 	 	    var at = (opts.acceptText) ? opts.acceptText : "Aceptar";
		 	 	    var ct = (opts.cancelText) ? opts.cancelText : "Cancelar";

		 	 	       buttons += "<span class='button-confirmation' {{style}} data-callback='false' data-accept>"+at+"</span>";


		 	 	  	 if(opts.ask)		 	 	  	 	
		 	 	  	 	buttons += "<span class='button-confirmation' {{style}} data-callback='false' data-cancel>"+ct+"</span>";

		 	 	  	 var style = (opts.ask) ? "" : "style=\"width:100%\"";				 	 	  	 	
		 	 	  	 buttons = buttons.replace(/{{style}}/g, style); 

		 	 	  	 if(opts.customButtons)
		 	 	  	 	{

		 	 	  	 	  if(opts.customButtons.length > 2)
		 	 	  	 	  {
		 	 	  	 	  	console.log("Maximun of custom buttons are 2");
		 	 	  	 	  	return false;
		 	 	  	 	  }

		 	 	  	 	  buttons = "";		 	 	  	 	  
		 	 	  	 	  	 for(x in opts.customButtons)
		 	 	  	 			 	   if(opts.customButtons[x].callback)
		 	 	  	 			 	 	  	 buttons += "<span class='button-confirmation' {{style}} data-callback='"+opts.customButtons[x].callback+"' data-"+opts.customButtons[x].type+">" + opts.customButtons[x].text + "</span>";
		 	 	  	 			       else
		 	 	  	 			 	 	  	 buttons += "<span class='button-confirmation' {{style}} data-callback='false' data-"+opts.customButtons[x].type+">" + opts.customButtons[x].text + "</span>";		 	 	  	 	 	

		 	 	  	 	var style = (opts.customButtons > 1) ? "style=\"width:50%\"" : "style=\"width:100%\"";		

		 	 	  	 	 buttons = buttons.replace(/{{style}}/g, style); 	 	  	 	

		 	 	  	   }
		 	 	  }



		 	      $("[data-accept]").die("click").live("click", function(){

		 	      	        hidde(opts);
		 	      			
		 	      			return return_(opts);	

		 	      });

		 	      $("[data-cancel]").die("click").live("click", function(){
		 	      	 	
		 	      	 	  hidde(opts);
		 	      			
						  return return_(opts, true);		 	      			

		 	      });

		 	      $("#confirmation .content")
		 	      .html(msg);		 	      
		 	     
		 	      $("#confirmation .buttons")
		 	      .html(buttons);

		 	       if(opts.beforeShow instanceof Function)
		 	 	      opts.beforeShow();	

		 	 	  if(opts.AfterShow instanceof Function)
		 	      $("#overr").show(opts.AfterShow);		 	  
		 	      else
		 	      $("#overr").show();		 	  


		 	 }

		 	 var return_ = function(opts, cancel){


		 	 				var ret = (cancel) ? false : true;

		 	 				if(ret)
		 	 	            if(opts.onAccept instanceof Function)
		 	      				  {opts.onAccept(ret); return ret;}
		 	      			else
		 	      				  {opts.onCancel(ret); return ret;}



		 	      		    if(callback = $(this).attr("callback"))
		 	      		    	{eval(callback + "("+ret+")"); return ret;}
		 	      

		 	      		    return ret;
		 	 }

		 	 var hidde = function(opts){
		 	 	    if(opts.beforeHide instanceof Function)
		 	 	      opts.beforeHide();		 	 	    
		 	 	    if(opts.autohide)
		 	 	     if(opts.AfterHide instanceof Function)
		 	      	 $("#overr").hide(opts.AfterHide);
		 	      	 else
		 	      	 $("#overr").hide();

		 	 }

		 	 this.ask = function(msg){

		 	 	 show_(msg, {onAccept : function(){return true;} , onCancel : function(){ return false;}, ask : true , acceptText : "Si"  })

		 	 }

		 	 this.hide = function(callback){

		 	 	   $("#confirmation .content").html("");
		 	 	   $("#confirmation .buttons").html("");
		 	 	   $("#overr").hide();
		 	 	   
		 	 	   if(callback instanceof Function)
		 	 	     callback(true);
		 	 }



		 }

		 a.dialog = new dialog();
		 a.alert = a.dialog.show;

		 function live(){

		 	$("[data-dialogs]").live("click", function(e){
		 		  e.preventDefault();
		 		  var msg = $(this).attr("data-msg");
		 		  alert(msg);
		 	});
		 }

		 $(live);

})(window);