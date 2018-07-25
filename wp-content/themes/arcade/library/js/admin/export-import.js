( function($){
	$( '#customize-theme-controls' ).on( 'click', '#export-theme-options', function(e) {
		e.preventDefault();
		window.location.href = BavotasanCustomizer.customizerURL + '?bavotasan-export=' + BavotasanCustomizer.exportNonce;
	} );
} )(jQuery);