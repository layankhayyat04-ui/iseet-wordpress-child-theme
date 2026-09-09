/**
 * ISEET Latest Posts — REST API powered front-end component.
 *
 * Fetches the most recent published posts from the WordPress REST API
 * and renders them into the `.iseet-latest-posts` container inserted by
 * the [iseet_latest_posts] shortcode. Runs after DOMContentLoaded and is
 * loaded with `defer`, so it never blocks first paint.
 */
( function () {
	'use strict';

	function escapeHtml( str ) {
		var div = document.createElement( 'div' );
		div.textContent = str;
		return div.innerHTML;
	}

	function renderCard( post ) {
		var card = document.createElement( 'article' );
		card.className = 'iseet-latest-posts__card';
		card.setAttribute( 'role', 'listitem' );

		var imageHtml = '';
		if ( post.iseet_featured_image_url ) {
			imageHtml =
				'<img src="' +
				escapeHtml( post.iseet_featured_image_url ) +
				'" alt="" loading="lazy" width="600" height="338">';
		}

		var title = post.title && post.title.rendered ? post.title.rendered : '';
		var excerptHtml = post.excerpt && post.excerpt.rendered ? post.excerpt.rendered : '';

		card.innerHTML =
			imageHtml +
			'<h3 class="iseet-latest-posts__title">' +
			'<a href="' + escapeHtml( post.link ) + '">' + title + '</a>' +
			'</h3>' +
			'<div class="iseet-latest-posts__excerpt">' + excerptHtml + '</div>';

		return card;
	}

	function loadPosts() {
		var container = document.querySelector( '.iseet-latest-posts' );
		if ( ! container || typeof iseetSettings === 'undefined' ) {
			return;
		}

		var url = iseetSettings.restUrl +
			'?per_page=' + encodeURIComponent( iseetSettings.postsToShow || 6 ) +
			'&_fields=id,title,excerpt,link,iseet_featured_image_url';

		fetch( url )
			.then( function ( response ) {
				if ( ! response.ok ) {
					throw new Error( 'REST request failed: ' + response.status );
				}
				return response.json();
			} )
			.then( function ( posts ) {
				var fragment = document.createDocumentFragment();
				posts.forEach( function ( post ) {
					fragment.appendChild( renderCard( post ) );
				} );
				container.appendChild( fragment );
			} )
			.catch( function ( error ) {
				container.textContent = 'Unable to load posts right now.';
				if ( window.console && window.console.error ) {
					window.console.error( 'ISEET latest posts:', error );
				}
			} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', loadPosts );
	} else {
		loadPosts();
	}
} )();
