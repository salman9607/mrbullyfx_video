
var BASE_URL = "localhost";

document.getElementById('p-bar').value = 0;

			var datafile = new plupload.Uploader({
	
	runtimes : 'html5,flash,silverlight,html4',
	browse_button : 'uploadFile', // you can pass in id...
	container: document.getElementById('container'), // ... or DOM Element itself
	chunk_size: '10mb', 
	url : routes.upload_video,
	max_file_count: 1,
	// max_file_upload: 1,


	//ADD FILE FILTERS HERE
	filters : {
		 mime_types: [
				{title : "VIDEO files", extensions : "mp4"},
			]
		
	}, 

	// Flash settings
	// flash_swf_url : BASE_URL + 'public/js/plupload/Moxie.swf',

	// Silverlight settings
	// silverlight_xap_url : BASE_URL + 'public/js/plupload/Moxie.xap',
	 

	init: {
		PostInit: function() {
			document.getElementById('filelist').innerHTML = '';	 
			document.getElementById('upload').onclick = function() {
			datafile.start();
				return false;
			};
		},

		FilesAdded: function(up, files) {
			plupload.each(files, function(file) {
				document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
			});
			datafile.start();
			
		},

		UploadProgress: function(up, file) {
			document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
			document.getElementById('p-bar').value = file.percent;
			if (file.percent == 100) {
    $('#create_movie').prop('disabled', false);
    // $('#episode-upload').prop('disabled', false);
document.getElementById("create_movie").disabled = false;



			}
			// console.log(file.percent);

		},

		Error: function(up, err) {
			document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
		}
	}
});

datafile.init();