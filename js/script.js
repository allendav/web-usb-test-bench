jQuery( document ).ready( function( $ ) {

	console.log( 'Web USB Test Bench JavaScript loaded' );

	// Install click handler
	$( '#wutb_go' ).click( function() {
		console.log( 'you clicked go' );

		navigator.usb.requestDevice( { filters: [ { vendorId: 0x2341 } ] } )
		.then( device => {
			console.log( device.productName );
			console.log( device.manufacturerName );
		} )
		.catch( error => { console.log( error ); } );
	} );

} );