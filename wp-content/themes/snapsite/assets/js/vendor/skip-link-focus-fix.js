/**
 * Skip Link Focus v0.1.0
 * https://github.com/cedaro/skip-link-focus
 *
 * @copyright Modifications Copyright (c) 2015 Cedaro, LLC
 * @license BSD-3-Clause
 */

/**
 * Make "skip to content" links work correctly in IE9, Chrome, and Opera to
 * improve accessibility.
 *
 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
 */
(function( root, factory ) {
  'use strict';

  if ( 'function' === typeof define && define.amd ) {
    define( [], factory );
  } else if ( 'object' === typeof exports ) {
    module.exports = factory();
  } else {
    root.skipLinkFocus = factory();
  }
}( this, function() {
  'use strict';

  function init() {
    if ( window && /webkit|opera|msie/i.test( window.navigator.userAgent ) && window.addEventListener ) {
      var i,
        skipLinks = window.document.querySelectorAll( '.skip-link' );

      window.addEventListener( 'hashchange', function() {
        skipToElement( location.hash.substring( 1 ) );
      }, false );

      // Fix for when the address bar already contains a hash.
      for ( i = 0; i < skipLinks.length; ++i ) {
        skipLinks[ i ].addEventListener( 'click', skipLinkClickHandler );
      }
    }
  }

  function skipLinkClickHandler( e ) {
    skipToElement( e.target.hash.substring( 1 ) );
  }

  function skipToElement( id ) {
    var element;

    if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
      return;
    }

    element = window.document.getElementById( id );

    if ( element ) {
      if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
        element.tabIndex = -1;
      }

      element.focus();
    }
  }

  return {
    init: init,
    skipToElement: skipToElement
  };
}));
