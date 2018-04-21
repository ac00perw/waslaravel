(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

$(function () {

	function doSearch() {
		var $term = $('#searchbox').val();
		var $team_type = $('#team_type').val();
		var $challenge_id = parseInt($('#challenge_id').val());

		if ($term.length > 2 || $team_type != 'any') {

			var url = '/challenges/search/' + '?team_type=' + $team_type + '&term=' + $term + '&challenge_id=' + $challenge_id;

			$.getJSON(url, function (data) {
				$('.results').html(' ');
				$('.results').append("<h3>Found " + data.length + " teams.</h3>");
				for (var i = 0; i < data.length; i++) {

					var d = data[i];
					$('.results').append('<div class="col-md-3">' + "<img src=\"" + d.avatar_path + "\"/>" + "<div class='team-name'>" + d.team_name + "</div>" + "<div class='team-type'>" + d.team_type + "</div>" + "<div class='team-location'>" + d.city + ", " + d.state + "</div>" + '<div><a href="/challenges/prepareChallenge/' + d.id + '?challenge=' + $challenge_id + '">Challenge</a></div>' + "</div>");
				}
			});
		}
	}
	$('#team_type').change(doSearch);
	$('#searchbox').keyup(doSearch);
});

},{}]},{},[1]);

//# sourceMappingURL=search-teams.js.map
