( function( api ) {

	// Extends our custom "auto-parts-garage" section.
	api.sectionConstructor['auto-parts-garage'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );