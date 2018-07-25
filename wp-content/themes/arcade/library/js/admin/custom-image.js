( function($) {
	var file_frame;
	$( '#theme-slider-image' )
        .on('click', '.select_image', function(e) {
            e.preventDefault();
            if ( file_frame ) {
                file_frame.open();
	            return;
	        }

	        file_frame = wp.media.frames.file_frame = wp.media( {
	            title: $(this).data( 'uploader_title' ),
	            button: {
	                text: $(this).data( 'uploader_button_text' )
	            },
	            multiple: false
	        } );

	        file_frame.on( 'select', function() {
	            var attachment = file_frame.state().get( 'selection' ).first().toJSON();
	            $( '#arcade_custom_image' ).val( attachment.url );
	            $( '#custom-image-container' ).html( '<img src="' + attachment.url + '" alt="" style="max-width:100%;" />' );
	            $( '#theme-slider-image' ).find( '.delete_image' ).show();
	        } );

	        file_frame.open();
	    } )
	    .on('click', '.delete_image', function(e) {
	        e.preventDefault();
	        $( '#arcade_custom_image' ).val( '' );
	        $( '#custom-image-container' ).html( '' );
	 		$( '#theme-slider-image' ).find( '.delete_image' ).hide();
	   } );
} )(jQuery);