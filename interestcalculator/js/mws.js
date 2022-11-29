/*
 * MWS Admin v2.1 - Core JS
 * This file is part of MWS Admin, an Admin template build for sale at ThemeForest.
 * All copyright to this file is hold by Mairel Theafila <maimairel@yahoo.com> a.k.a nagaemas on ThemeForest.
 * Last Updated:
 * December 08, 2012
 *
 */
 
(function($) {
	$(document).ready(function() {	
	
		/*
		if( $.fn.wizard ) {
            $('#mws-wizard-form').wizard({
                element: 'fieldset', 
                buttonContainerClass: 'mws-button-row'
            });
        }
		*/
        // Data Tables
		/*
        if( $.fn.dataTable ) {
            $(".mws-datatable").dataTable({
                "aoColumns": [
                    null, 
                    null,
                    null, 
                    null, 
                    null, 
                    { "bSortable": false }
                ]
            });
        }
		*/
		
		$(".mws-datepicker").datepicker({dateFormat:'dd-mm-yy',changeMonth: true,changeYear: true,yearRange: "-80:+10"});//to change formate of date at user input time
		
		$("#memo_date").datepicker({dateFormat:'dd-mm-yy',changeMonth: true,changeYear: true});  /**ADDED BHARGAV **/
		$("#deli_date").datepicker({dateFormat:'dd-mm-yy',changeMonth: true,changeYear: true});  /**ADDED BHARGAV **/
		// $(".mws-datepicker").prop('readonly','true');		/*** Commented By Bhargav ***/
		
        //$("#ot_prodid").select2();
        //$("select.mws-select").select2();

		if( $.fn.timepicker ) {
			$(".mws-tpicker").timepicker({
				 timeFormat: "hh:mm TT",
			});
		}
		$(".mws-tpicker").prop('readonly','true');
		
	// Commented By Bhargav 08.10.2016 for specific row load in table
		// Data Tables
   //      if( $.fn.dataTable ) {
   //          $(".mws-datatable").dataTable({
			// 	aoColumnDefs: [{
			// 		 bSortable: false,
			// 		 aTargets: [ -1 ]
			// 	}]
			// });
   //          $(".mws-datatable-fn").dataTable({
   //              sPaginationType: "full_numbers",
			// 	aoColumnDefs: [{
			// 		 bSortable: false,
			// 		 aTargets: [ -1 ]
			// 	}]
			// });
   //      }

		/*** Bhargav POP UP ****/
		$(".mws-form-dialog-2").dialog({
			autoOpen: false, 
			title: $(this).find('#change-title').val(), 
			modal: true, 
			resizable: true,
			width: "50%",
		});					
		// $(".mws-form-dialog-mdl-btn-2").bind("click", function(event) {				
		// 	$(".mws-form-dialog-2").dialog("option", {modal: true}).dialog("open");
		// 	event.preventDefault();
		// });
		/****END POP UP****/

		/* Chosen Select Box Plugin */
        if( $.fn.select2 ) {
            $("select.mws-select").select2();
        }
        //Added By Bhargav 21.01.2019
    	// if($.fn.chosen) {
	  		// $("select.chzn-select").chosen();
	   	// }        
		///
		
		$.fn.iButton && $('.ibutton').iButton();
		
		 // AutoSize
        $.fn.autosize && $( '.autosize' ).autosize();

       
		// Collapsible Panels
		$( '.mws-panel.mws-collapsible' ).each(function(i, element) {
			var p = $( element ),	
				header = p.find( '.mws-panel-header' );

			if( header && header.length) {
				var btn = $('<div class="mws-collapse-button mws-inset"><span></span></div>').appendTo(header);
				$('span', btn).on( 'click', function(e) {
					var p = $( this ).parents( '.mws-panel' );
					if( p.hasClass('mws-collapsed') ) {
						p.removeClass( 'mws-collapsed' )
							.children( '.mws-panel-inner-wrap' ).hide().slideDown( 250 );
					} else {
						p.children( '.mws-panel-inner-wrap' ).slideUp( 250, function() {
							p.addClass( 'mws-collapsed' );
						});
					}
					e.preventDefault();
				});
			}

			if( !p.children( '.mws-panel-inner-wrap' ).length ) {
				p.children( ':not(.mws-panel-header)' )
					.wrapAll( $('<div></div>').addClass( 'mws-panel-inner-wrap' ) );
			}
		})
	
		/* Side dropdown menu */
		$("div#mws-navigation ul li a, div#mws-navigation ul li span")
			.on('click', function(event) {
				if(!!$(this).next('ul').length) {
					$(this).next('ul').slideToggle('fast', function() {
						$(this).toggleClass('closed');
					});
					event.preventDefault();
				}
			});
		
		/* Responsive Layout Script */
		$("#mws-nav-collapse").on('click', function(e) {
			$( '#mws-navigation > ul' ).slideToggle( 'normal', function() {
				$(this).css('display', '').parent().toggleClass('toggled');
			});
			e.preventDefault();
		});
		
		/* Form Messages */
		$(".mws-form-message").on("click", function() {
			$(this).animate({ opacity:0 }, function() {
				$(this).slideUp("normal", function() {
					$(this).css("opacity", '');
				});
			});
		});
		
		$("#error").on("click", function() {
			$("#error").html('');
		});

		// Checkable Tables
		$( 'table thead th.checkbox-column :checkbox' ).on('change', function() {
			var checked = $( this ).prop( 'checked' );
			$( this ).parents('table').children('tbody').each(function(i, tbody) {
				$(tbody).find('.checkbox-column').each(function(j, cb) {
					$( ':checkbox', $(cb) ).prop( "checked", checked ).trigger('change');
				});
			});
		});

		// Bootstrap Dropdown Workaround
		$(document).on('touchstart.dropdown.data-api', '.dropdown-menu', function (e) { e.stopPropagation() });
		
		/* File Input Styling */
		//$.fn.fileInput && $("input[type='file']").fileInput();

		// Placeholders
		$.fn.placeholder && $('[placeholder]').placeholder();

		// Tooltips
		$.fn.tooltip && $('[rel="tooltip"]').tooltip();

		// Popovers
		$.fn.popover && $('[rel="popover"]').popover();
	});
}) (jQuery);