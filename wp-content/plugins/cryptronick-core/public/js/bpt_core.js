"use strict";
( function ($){

	window.addEventListener( "load", function (){
	}, false );

	jQuery(document).ready(function (){	
		bpt_core_init();
	});
	
	function bpt_core_init (){
		var i, section;
		var sections = document.getElementsByClassName( 'bpt_cpt_section' );
		for ( i = 0; i < sections.length; i++ ){
			section = sections[i];
			bpt_ajax_init ( section );
		}
	}
	var wait_load = false;
	function bpt_ajax_init ( section ){

		var grid, form, data_field, data, request_data, load_more;

		var offset_items = 0;
		if ( section == undefined ) return;
		grid = section.getElementsByClassName( 'container-grid' );
		
		if ( !grid.length ) return;
		grid = grid[0];
		
		form = section.getElementsByClassName( 'posts_grid_ajax' );
		if ( !form.length ) return;
		form = form[0];
		data_field = form.getElementsByClassName( 'ajax_data' );
		if ( !data_field.length ) return;
		data_field = data_field[0];
		data = data_field.value;
		data = JSON.parse( data );
		request_data =  data;

		offset_items += request_data.post_count;
		
		load_more = section.getElementsByClassName( 'load_more_item' );
		if ( load_more.length ){
			load_more = load_more[0];
			load_more.addEventListener( 'click', function ( e ){
				if ( wait_load ) return;
				wait_load = true;
				jQuery(this).addClass('loading');
				e.preventDefault();
				request_data['offset_items'] = offset_items;
				request_data['items_load'] = request_data.items_load;
				
				$.post( bpt_core.ajaxurl, {
					'action'		: 'bpt_ajax',
					'data'			: request_data

				}, function ( response, status ){
					var response_container, new_items, load_more_hidden;
					response_container = document.createElement( "div" );
					response_container.innerHTML = response;
					new_items = $( ".item", response_container );
					load_more_hidden = $( ".hidden_load_more", response_container );

					if(load_more_hidden.length){
						jQuery(section).find('.load_more_wrapper').fadeOut(300, function() { $(this).remove(); });
					}else{
						jQuery(section).find('.load_more_wrapper .load_more_item').removeClass('loading');
					}
					
					if($( grid ).hasClass('carousel')){
						$( grid ).find('.slick-track').append( new_items );
						$( grid ).find('.slick-dots').remove();
						$( grid ).find('.cryptronick_carousel_slick').slick('reinit');						
					}
					else if($( grid ).hasClass('grid')){
						new_items = new_items.hide();
						$( grid ).append( new_items );
						new_items.fadeIn('slow');							
					}else{
                        var items = jQuery(new_items);
                        jQuery(grid).isotope( 'insert', items );
                        jQuery(grid).imagesLoaded().always(function(){
                        	jQuery(grid).isotope( 'layout' );
                        	updateFilter();
                        });                     	
					}

					//Call vc waypoint settings
					if(typeof jQuery.fn.waypoint === "function"){
						jQuery(grid).find(".wpb_animate_when_almost_visible:not(.wpb_start_animation)").waypoint(function() {
					        jQuery(this).addClass("wpb_start_animation animated")
					    }, { offset: "100%"});						
					}

					//Update Items
					offset_items += parseInt(request_data.items_load);
					
					wait_load = false;
				});
			}, false );
		}			
	}
	
	function updateFilter(){
		jQuery(".isotope-filter a").each(function(){
			var data_filter = this.getAttribute("data-filter");
			var num = jQuery(this).closest('.bpt_portfolio_list').find('.bpt_portfolio_list-item').filter( data_filter ).length;
			jQuery(this).find('.number_filter').text( num );
		});
			
	}


}(jQuery));
