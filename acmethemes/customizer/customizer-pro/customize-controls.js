( function( api ) {

	// Extends our custom "weblog" section.
	api.sectionConstructor['weblog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );