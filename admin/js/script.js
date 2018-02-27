$("#table").hide();
$("#dataTable").hide();
$("#dataTable-gr").hide();
$(document).ready(function() {
    Dropzone.autoDiscover = false;
});
// Dropzone
// $("#postForm").dropzone({ url: "../uploads" });
Dropzone.options.postForm = {
    url: '../config/upload.php',
    addRemoveLinks: true,
    dictRemoveFileConfirmation: 'Are you sure that you want to remove this file?',
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 1, // MB
    maxFiles: 10,
    success: function(file, response) {
        // console.log(file,response);
        file.previewElement.classList.add("dz-success");
        //    var res = JSON.parse(response);
        //      if (res.status == "200") {
        //        fil   e.sName = res.name;
        //        file.sUrl = res.url;
        //         }
        $("#table").fadeIn();
        $("#dataTable").show();
        document.getElementById('tbody').innerHTML = response;
        $("#dataTable").DataTable();
    },
    error: function(file, response) {
        file.previewElement.classList.add("dz-error");
    }
};
Dropzone.options.postFormGr = {
    url: '../config/upload-gr.php',
    addRemoveLinks: true,
    dictRemoveFileConfirmation: 'Are you sure that you want to remove this file?',
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 1, // MB
    maxFiles: 10,
    success: function(file, response) {
        // console.log(file,response);
        file.previewElement.classList.add("dz-success");
        //    var res = JSON.parse(response);
        //      if (res.status == "200") {
        //        fil   e.sName = res.name;
        //        file.sUrl = res.url;
        //         }
        $("#table").fadeIn();
        $("#dataTable").hide();
        $("#dataTable-gr").show();
        document.getElementById('tbody-gr').innerHTML = response;
        $("#dataTable-gr").DataTable();
    },
    error: function(file, response) {
        file.previewElement.classList.add("dz-error");
    }

};