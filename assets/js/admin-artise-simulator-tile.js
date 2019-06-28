jQuery( document ).ready( function( $ ){
	window.frame = false;



	// Grout Shapes Meta Box
	var $groutShapesInput = $( '#tile-grout-shape' );
	var groutShapes = Object.getOwnPropertyNames( drawGroutShapes );

	for( var i=0; i < groutShapes.length; i++ ){
		var option = document.createElement( 'option' );

		option.text = groutShapes[i];
		option.value = groutShapes[i];

		$groutShapesInput.append( option );

	}

	$groutShapesInput.val( groutShape );



	// On ready
	var maskCanvases = $( '#tile-masks-container canvas' );

	for (var i=0; i<maskCanvases.length; i++) {
		loadCanvas( maskCanvases[i] );
	}



	// Background
	if( $( '#background-input' ).val(  ) == -1 ){
		$( '#artise_tile_mask' ).addClass( 'no-bg' );
	}

	
	drawColor( 
		$( '#background-button canvas' )[0], 
		bgColor 
	);




	// Functions

	function drawGrout( color, weight ){
		var canvas = jQuery( '#preview-grout' )[0];

		canvas.height = $( '#preview-column' ).data( 'max-height' );


		drawGroutShapes[ $groutShapesInput.val(  ) ]( canvas, color, weight );

		
	}
	function drawColor( canvas, color, changeHeight ){
		var ctx = canvas.getContext( '2d' );

		if( changeHeight != undefined && changeHeight )
			canvas.height = $( '#preview-column' ).data( 'max-height' );

		ctx.fillStyle = color;
		ctx.fillRect( 0, 0, canvas.width, canvas.height );

	}
	function drawColoredMask( canvas, maskImg, color ){
		var ctx = canvas.getContext( '2d' );

		ctx.clearRect( 0, 0, canvas.width, canvas.height );

		ctx.drawImage( maskImg, 0, 0, canvas.width, canvas.height );
		ctx.globalCompositeOperation = 'source-in';

		ctx.fillStyle = color;
		ctx.fillRect( 0, 0, canvas.width, canvas.height );

		ctx.globalCompositeOperation = 'source-over';
	}

	function drawColorOnlyMask( canvas, color ){
		var ctx = canvas.getContext( '2d' );


		ctx.globalCompositeOperation = 'source-in';

		ctx.fillStyle = color;
		ctx.fillRect( 0, 0, canvas.width, canvas.height );

		ctx.globalCompositeOperation = 'source-over';

	}

	function getTileCanvas(  ){
		var $previewColumn = $( '#preview-column' );

		var canvas = document.createElement( 'canvas' );
		var ctx = canvas.getContext( '2d' );

		canvas.width = 256;
		canvas.height = canvas.width * ( $previewColumn.data( 'max-height' ) / $previewColumn.width(  ) );


		jQuery( 'canvas:not(#preview-grout)', $previewColumn ).each( function(  ){

			if( !( $( this ).data( 'itile' ) == 0 && $( '#artise_tile_mask' ).hasClass( 'no-bg' ) ) ){
				ctx.drawImage( this, 0, 0, canvas.width, canvas.height );

			}
		} );

		ctx.drawImage( $( '#preview-grout' )[0], 0, 0, canvas.width, canvas.height );


		return canvas;
	}

	function loadCanvas( canvas ){
		var canvasPreview = document.createElement( 'canvas' );
		var divPreview = $( '#preview-column' );

		var maskImg = new Image(  );
		maskImg.setAttribute( 'crossOrigin', 'anonymous' );
		maskImg.src = $( canvas ).data( 'mask-src' );

		$( maskImg ).load( function(  ){
			// Canvas Size
			canvasPreview.width = 200;
			canvasPreview.height = 200 * ( maskImg.height / maskImg.width );

			divPreview.data( 'max-height', Math.max( canvasPreview.height, divPreview.data( 'max-height' ) ) );



			// Grout and BG
			drawGrout( '#e9e9e9', 2 );

			drawColor( 
				$( '#preview-column canvas[data-itile=0]' )[0], 
				bgColor,
				true
			);

			

			// Draw mask
			drawColoredMask( canvas, this, $( canvas ).data( 'color' ) );
			drawColoredMask( canvasPreview, this, $( canvas ).data( 'color' ) );

			var iTile = $( '#preview-column canvas' ).length;

			$( canvasPreview )
				.data( 'itile', iTile )
				.attr( 'data-itile', iTile )

			$( canvas )
				.data( 'itile', iTile )
				.attr( 'data-itile', iTile )


			$( '#preview-column' ).append( canvasPreview );

			$( '#tile-image-input' ).val( getTileCanvas(  ).toDataURL(  ) );

		} )

	}


	$( document ).on( 'click', '#color-grid .tile-color-box', function(  ){

		var selectedCanvas = $( '#settings-column .thickbox.color-picker canvas.selected' );
		var iTile = selectedCanvas.data( 'itile' );

		var previewCanvas = $( '#preview-column canvas[data-itile=' + iTile + ']' );

		var colorId = $( this ).data( 'color-id' );
		var color = $( this ).data( 'color' );



		if( iTile === 0 ){
			$( '#background-input' ).val( colorId );

			selectedCanvas
				.data( 'color-id', colorId )
				.attr( 'data-color-id', colorId )
				.data( 'color', color )
				.attr( 'data-color', color );

			drawColorOnlyMask( selectedCanvas[0], color );
			drawColorOnlyMask( previewCanvas[0], color );

			tb_remove(  );

			// No Background
			if( colorId == -1 ){
				$( '#artise_tile_mask' ).addClass( 'no-bg' );
			}else
				$( '#artise_tile_mask' ).removeClass( 'no-bg' );

		}else{
			$( '#TB_window' ).block( { message: null } );

			$.post(
				ajaxurl,
				{
					'action'		: 'edit_artise_tile_mask_color',
					'mask_id'		: selectedCanvas.data( 'mask-id' ),
					'color_id'		: colorId
				},
				function( response ){
					if( response === 'unsuccessfull' ){
						alert( 'Oops! Something went wrong. Please press the update button and try again!' );

					}else{
						selectedCanvas
							.data( 'color-id', colorId )
							.attr( 'data-color-id', colorId )
							.data( 'color', color )
							.attr( 'data-color', color );

						drawColorOnlyMask( selectedCanvas[0], color );
						drawColorOnlyMask( previewCanvas[0], color );

						$( '#tile-image-input' ).val( getTileCanvas(  ).toDataURL(  ) );
						

					}

					$( '#TB_window' ).unblock(  );

					tb_remove(  );

				}
			);
		}


	} );


	$( '#tile-masks-container' ).on( 'click', '.remove-button', function( e ){

		var canvas = $( this ).siblings( 'canvas' );
		var maskId = canvas.data( 'mask-id' );
		var iTile = canvas.data( 'itile' );

		$( '#artise_tile_mask' ).block( { message:null } );

		$.post(
			ajaxurl,
			{
				'action'		: 'remove_artise_tile_mask',
				'mask_id'		: maskId
			},
			function( response ){
				if( response === 'unsuccessfull' ){
					alert( 'Oops! Something went wrong. Please press the update button and try again!' );

				}else{

					canvas.parents( 'a' ).remove(  );
					$( '#preview-column canvas[data-itile=' + iTile + ']' ).remove(  );

					$( '#tile-image-input' ).val( getTileCanvas(  ).toDataURL(  ) );

					
				}

				$( '#artise_tile_mask' ).unblock(  );

			}
		);

		e.stopPropagation(  );
	} )


	$( '#settings-column' ).on( 'click', '.thickbox.color-picker', function(  ){

		$( '#settings-column .thickbox.color-picker canvas.selected' ).removeClass( 'selected' );
		$( 'canvas', this ).addClass( 'selected' );

	} );


	$( '#add-mask-button' ).click( function( e ){
		e.preventDefault(  );

		if( frame ){
			frame.open(  );
			return;
		}

		frame = wp.media( {
			title 			: 'Select/Upload Tile Mask',
			button 			: {
				text		: 'Use as tile mask'
			},
			multiple		: true
		} );

		frame.on( 'select', function(  ){
			var selection = frame.state(  ).get( 'selection' );

			selection.map( function( attachment ){

				attachment = attachment.toJSON(  );

				$( '#artise_tile_mask' ).block( { message:null } );
				$.post(
					ajaxurl,
					{
						'action'		: 'add_artise_tile_mask',
						'tile_id'		: postId,
						'img_id'		: attachment.id
					},
					function( response ){
						if( response !== 'unsuccessfull' ){
							response = $( response );

							$( '#tile-masks-container' ).append( response );
							loadCanvas( $( 'canvas', response )[0] );
							
						}
						$( '#artise_tile_mask' ).unblock(  );
						
					}
				);
			} );


		} );

		frame.open(  );
	} )

	$groutShapesInput.change( function(  ){

		drawGrout( '#e9e9e9', 2 );	

	} )

	$( '#tile-ratio' ).change( function(  ){
		var $previewCanvases = $( '#preview-column canvas' );

		$previewCanvases.each( function(  ){
			var newCanvas = document.createElement( 'canvas' );
			var newCtx = newCanvas.getContext( '2d' );

			var ctx = this.getContext( '2d' );

			newCanvas.width = this.width;
			newCanvas.height = this.height;

			newCtx.drawImage( this, 0, 0, this.width, this.height );

			this.height = this.width * $( '#tile-ratio' ).val(  );
			ctx.drawImage( newCanvas, 0, 0, this.width, this.height );



		} )
	} )


} );