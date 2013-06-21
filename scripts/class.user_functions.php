<?php
/**
*  Stonebriar newsletter helper methods
*
*  @author Michael Cannon <michael@peimic.com>
*  @version $Id: .vimrc,v 1.9 2011/09/02 23:39:34 peimic.comprock Exp $
 */

class user_functions {
	// @ref http://www.toao.net/48-replacing-smart-quotes-and-em-dashes-in-mysql
	function user_encodeSmartQuotes( $content, $conf ) {
		$findUTF8				= array(
			"\xe2\x80\x98",
			"\xe2\x80\x99",
			"\xe2\x80\x9c",
			"\xe2\x80\x9d",
			"\xe2\x80\x93",
			"\xe2\x80\x94",
			"\xe2\x80\xa6",
		);

		$findWindows			= array(
			chr(145),
			chr(146),
			chr(147),
			chr(148),
			chr(150),
			chr(151),
			chr(133),
		);

		$replace				= array(
			'&lsquo;',	// left single curly quote
			'&rsquo;',	// right single curly quote
			'&ldquo;',	// left double curly quote
			'&rdquo;',	// right double curly quote
			'&ndash;',	// en dash
			'&mdash;',	// em dash
			'&hellip;',	// ellipsis dash
		);

		$content				= str_replace( $findUTF8, $replace, $content );
		$content				= str_replace( $findWindows, $replace, $content );

		return $content;
	}
}
?>