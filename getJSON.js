$.getJSON("playlists.js", function(data) {
	var items = [];
	$.each( data, function(key, val) {
// 	items.push("<a href='playlist_" + key + ".html'><li id='" + key + "' class='playlist'>" + val + "</li></a>");
	items.push("<a href='#'><li id='" + key + "' class='playlist'>" + val + "</li></a>");
	});

	$("<ul/>", {
		"class": "playlistList",
		html: items.join("")
		}).appendTo("body");
});