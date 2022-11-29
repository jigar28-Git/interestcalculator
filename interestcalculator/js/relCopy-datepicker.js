// JavaScript Document

/**
 * jQuery-Plugin "relCopy"
 * 
 * @version: 1.1.0, 25.02.2010
 * 
 * @author: Andres Vidal
 *          code@andresvidal.com
 *          http://www.andresvidal.com
 *
 * Instructions: Call $(selector).relCopy(options) on an element with a jQuery type selector 
 * defined in the attribute "rel" tag. This defines the DOM element to copy.
 * @example: $('a.copy').relCopy({limit: 5}); // <a href="example.com" class="copy" rel=".phone">Copy Phone</a>
 *
 * @param: string	excludeSelector - A jQuery selector used to exclude an element and its children
 * @param: integer	limit - The number of allowed copies. Default: 0 is unlimited
 * @param: string	append - HTML to attach at the end of each copy. Default: remove link
 * @param: string	copyClass - A class to attach to each copy
 * @param: boolean	clearInputs - Option to clear each copies text input fields or textarea
 * 
 */

(function($) {
	$.fn.relCopy = function(options) {
		var settings = jQuery.extend({
			excludeSelector: ".exclude",
			emptySelector: ".empty",
			copyClass: "copy",
			append: '',
			clearInputs: true,
			limit: 0 // 0 = unlimited
		}, options);
		
		settings.limit = parseInt(settings.limit);
		
		// loop each element
		this.each(function() {
			
			// set click action
		
			$(this).click(function(){
				var rel = $(this).attr('rel'); // rel in jquery selector format				
				var counter = $(rel).length;
				//alert(counter);
				// stop limit
				if (settings.limit != 0 && counter >= settings.limit){
					return false;
				};
				
				var master = $(rel+":first");
				var parent = $(master).parent();						
				var clone = $(master).clone(true).addClass(settings.copyClass+counter).append(settings.append);
				

				$(clone).find('input:first').each(function(){
					//$(this).removeClass('mws-datepicker');
					//$(this).removeClass('hasDatepicker');
				 });
				// alert("Remove Elements with excludeSelector");
				//Remove Elements with excludeSelector
				if (settings.excludeSelector){
					$(clone).find(settings.excludeSelector).remove();
				};
				
				//alert("Empty Elements with emptySelector");
				//Empty Elements with emptySelector
				if (settings.emptySelector){
					$(clone).find(settings.emptySelector).empty();
				};								
				
				// Increment Clone IDs
				if ( $(clone).attr('id') ){
					var newid = $(clone).attr('id') + (counter +1);
					$(clone).attr('id', newid);
					
				 	};
				
				//alert("// Increment Clone Children IDs");
				// Increment Clone Children IDs
				$(clone).find('[id]').each(function(){
					var newid = $(this).attr('id') + (counter +1);
					$(this).attr('id', newid);	
		
				});
				
				//Clear Inputs/Textarea
				if (settings.clearInputs){
					$(clone).find(':input').each(function(){
						var type = $(this).attr('type');
						switch(type)
						{
							case "button":
								break;
							case "reset":
								break;
							case "submit":
								break;
							case "checkbox":
								$(this).attr('unchecked', '');
								break;
							default:
								
							if(!$(this).hasClass('memo_date mws-textinput hasDatepicker'))
							{
						  		$(this).val("");
							}

							if($(this).is('select'))
							{
								$(this).attr('disabled',false);	
							}
						}						
					});	
					
				};
				
					
				var x = $(parent).find(rel+':last').after(clone);
				//alert(x);
				
/******************************* Copy Data From Prev. Line *******************************/
			if($('#do_repeat_cust').val() != 'N'){
				$(document).find($(".cust")).each(function(){
					var picker = "cust"+(counter+1);
					if(counter == 1){counter='';}
					var value = $('#cust'+(counter)).val();
					//var value = $('#cust').val();
					$('#'+picker).val(value);
				});
			}
				/****Add Received***/
				$(document).find($(".banks")).each(function(){
					if(counter == ''){var picker = "banks2";}else{var picker = "banks"+(counter+1);}
					var value = $('#banks'+(counter)).val();
					$('#'+picker).val(value);
				});
				
				/****Exp Done From ***/
				$(document).find($(".from_bank")).each(function(){
					if(counter == ''){var picker = "from_bank2";}else{var picker = "from_bank"+(counter+1);}
					var value = $('#from_bank'+(counter)).val();
					$('#'+picker).val(value);
				});
/************* ========================For Each time new datepicker ================ ******************************** */
				
				$(document).find($(".memo_date")).each(function(index,element){
					
					$(this).datepicker("destroy");
					$(this).removeClass('hasDatepicker');
					$(this).datepicker({dateFormat:'dd-mm-yy',changeMonth: true,changeYear: true});
					var picker = "memo_date"+(counter+1);
					if(counter == 1){counter='';}
					var dtval  = $('#memo_date'+counter).val();
					$('#'+picker).val(dtval);
				});
				
				/********* destroy time picker**********/
				$(document).find($(".memo_time")).each(function(){
					$(this).timepicker("destroy");
					$(this).timepicker({});
					
				});
/*****************************************************************************************************************************************/
/**************************************TIME PICKER FOR EACH EMAIL & SMS *****************************************************************/
					$(document).find($(".smstime")).each(function(){
					var picker = "smstpicker"+(counter+1);
					//alert(picker+"(#"+picker+")");
					$('#'+picker).timepicker("destroy");
					$('#'+picker).removeClass('hasDatepicker');
					$('#'+picker).timepicker({});	
					
					});
					
					$(document).find($(".emailtime")).each(function(){
					var picker = "emailtpicker"+(counter+1);
					//alert(picker+"(#"+picker+")");
					$('#'+picker).timepicker("destroy");
					$('#'+picker).removeClass('hasDatepicker');
					$('#'+picker).timepicker({});	
					
				});

				return false;
				
			}); // end click action
			
		}); //end each loop
		
		return this; // return to jQuery
	};
	
})(jQuery);