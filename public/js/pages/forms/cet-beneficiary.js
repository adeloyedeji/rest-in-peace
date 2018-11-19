$(function() {
    Webcam.set({
        width: 300,
        height: 300,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach( '#capture' );

    $("#snap").click(function() {
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            document.getElementById('preview').innerHTML = '<img src="'+data_uri+'"/>';

            // Split the base64 string in data and contentType
            var block = data_uri.split(";");
            // Get the content type of the image
            var contentType = block[0].split(":")[1];// In this case "image/gif"
            // get the real base64 content of the file
            var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."

            // Convert it to a blob to upload
            var blob = b64toBlob(realData, contentType);

            // Create a FormData and append the file with "image" as parameter name
            var formDataToUpload = new FormData();
            formDataToUpload.append("file", blob);
            formDataToUpload.append("_token", $("#_token").val());
            formDataToUpload.append("bid", $('#bid').val());
            formDataToUpload.append('opcode', 4);
            console.log("Form Data:");
            console.log(formDataToUpload);

            $.ajax({
                url: server + 'beneficiaries',
                data: formDataToUpload,// Add as Data the Previously create formData
                type:"POST",
                contentType:false,
                processData:false,
                cache:false,
                dataType:"json", // Change this according to your response from the server.
                error:function(err){
                    console.error(err);
                    showNote('error', 'Unable to complete request. Please refresh page and try again.');
                },
                success:function(data){
                    console.log(data);
                    if(data == "404") {
                        showNote('warning', 'Image or beneficiary not found!');
                        return;
                    }

                    if(data) {
                        showNote('success', 'Image captured.');
                    }
                }
            });
        } );
    });
});

function b64toBlob(b64Data, contentType, sliceSize) 
{
    contentType = contentType || '';
    sliceSize = sliceSize || 512;

    var byteCharacters = atob(b64Data);
    var byteArrays = [];

    for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
        var slice = byteCharacters.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
            byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
    }

  var blob = new Blob(byteArrays, {type: contentType});
  return blob;
}