window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
	window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
	console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.Vue = require('vue');

function guid() {
	function s4() {
		return Math.floor((1 + Math.random()) * 0x10000)
		.toString(16)
		.substring(1);
	}
	return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
	s4() + '-' + s4() + s4() + s4();
}
var exampleAnnotations = [
	{
		"id": guid(),
		"range": {
			"start": 55, "end": 60
		},
		"shape": {
			"x1":23.47,"y1":9.88,"x2":60.83,"y2":44.2
		},
		"comments":[
		{
			"id":guid(),
			"meta":{
				"datetime": "2017-03-28T19:17:32.238Z",
				"user_id":1,
				"user_name": "Jack Pope"
			},
			"body": "Is the \"Stories API\" the only API we want to highlight here? It makes the system feel a little limited, even though we have robust functionality and multiple APIs"
		}
		]
	},
	{
		"range": {
			"start":65,"stop":null
		},
		"shape": {
			"x1":0.97,"y1":65.19,"x2":36.25,"y2":97.28
		},
		"comments": [
		{
			"id": "2854a682-ffdf-78a4-796d-22abb6d9cac3",
			"meta": {
				"datetime":"2017-03-28T19:18:25.485Z",
				"user_id":2,
				"user_name": "Evan Carothers"
			},
			"body": "Can we replace this logo with Microsoft?"
		},
		{
			id: guid(),
			meta: {
				"datetime":"2017-03-29T00:18:25.485Z",
				user_id: 1,
				user_name: "Jack Pope"
			},
			body: "Great idea Evan, that's a SUPER recognizable brand!\n\nAny other major company brands we are missing in this shot?"
		}
		]
	},
	{
		"range": {
			"start":100,"end":null
		},
		"shape": null,
		"comments": [
		{
			"id": "e0b9787b-fbe7-f1e9-5134-d0eb69a783aa",
			"meta": {
				"datetime": "2017-03-28T19:21:41.351Z",
				"user_id":1,
				"user_name": "Jack Pope"
			},
			"body": "Can we have a music change for this final section that transitions towards the final frame? Some sweet heavy rock 80s ballad?"
		}
		]
	},
	{
		"range": {
			"start":21,"end":61
		},
		"shape": null,
		"comments": [
		{
			"id": "e0b9787b-fbe7-f1e9-5134-d0eb69a783aa",
			"meta": {
				"datetime": "2017-03-28T19:21:41.351Z",
				"user_id": 2,
				"user_name": "Evan Carothers"
			},
			"body": "The music is a little loud through this section and distracts from the content and narration a bit - can we tone 'er down a couple nocks here?"
		}
		]
	}
];

var annotations = []
if (video.annotations != null) {
	annotations = JSON.parse(video.annotations);
}

var playerOptions = { controlBar: { volumePanel: { inline: false } } };
var pluginOptions = {
	annotationsObjects: annotations,
	bindArrowKeys: true,
	meta: {
		user_id: user.id,
		user_name: user.name
	},
	showControls: true,
	showCommentList: true,
	showFullScreen: true,
	startInAnnotationMode: false,
	showMarkerShapeAndTooltips: true
}

var player = window.videojs('video-1', playerOptions);
player.ready(function(){
	var plugin = player.annotationComments(pluginOptions);
	plugin.onReady(function(){
		console.log("Video:", video.name);
	});
	player.muted(false);

	plugin.on('onStateChanged', (event) => {
		var params = {
			annotations: JSON.stringify(event.detail)
		}
	    axios.post(`${Laravel.url}/api/videos/update/annotations/${video.id}`, params)
	    .then(function (response) {
	    	// console.log(response);
	    	/*var error = response.data.error;
	    	if (error == 0) {
	    		
	    	} else {

	    	}*/
	    })
	    .catch(function (response) {
	    	console.log(response);
	    });
	});
});

