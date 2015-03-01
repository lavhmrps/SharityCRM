$("#showImage").click(function() {
   $("#file_background").trigger('click');
   
    
});

(function () {
    var file_background = document.querySelector("#file_background"),
        showImage = document.querySelector("#showImage");

    if (file_background && showImage) {
        // Set events
        file_background.onchange = function (event) {
            // Get a reference to the taken picture or chosen file
            var files = event.target.files,file;
            if (files && files.length > 0) {
                file = files[0];
                try {
                    // Get window.URL object
                    var URL = window.URL || window.webkitURL;

                    // Create ObjectURL
                    var imgURL = URL.createObjectURL(file);

                    // Set img src to ObjectURL
                    showImage.src = imgURL;

                    // Revoke ObjectURL
                    URL.revokeObjectURL(imgURL);
                }
                catch (e) {
                    try {
                        // Fallback if createObjectURL is not supported
                        var fileReader = new FileReader();
                        fileReader.onload = function (event) {
                            showImage.src = event.target.result;
                        };
                        fileReader.readAsDataURL(file);
                    }
                    catch (e) {
                        // Display error message
                        var error = document.querySelector("#error");
                        if (error) {
                            error.innerHTML = "Neither createObjectURL or FileReader are supported";
                        }
                    }
                }
            }
        };
    }
})();
