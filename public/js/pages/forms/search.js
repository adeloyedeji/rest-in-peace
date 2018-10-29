$(function() {
    Webcam.set({
        width: 300,
        height: 300,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach( '#camera' );

    $("#snap").click(function() {
        $(this).html("Loading please wait...");
        $(this).attr('disabled', true);
        // start recording time.
        var t0 = performance.now();
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            // console.log(data_uri);
            // document.getElementById('preview').innerHTML = '<img src="'+data_uri+'"/>';

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
            formDataToUpload.append("_token", $("#pk").val());

            $.ajax({
                url: server + "beneficiaries/search",
                data: formDataToUpload,// Add as Data the Previously create formData
                type:"POST",
                contentType:false,
                processData:false,
                cache:false,
                dataType:"json", // Change this according to your response from the server.
                error:function(err){
                    console.error(err);
                    showNote('error', 'Unable to complete request. Please refresh page and try again.');
                    $('#snap').html('Verify Samples');
                    $('#snap').attr('disabled', false);
                },
                success:function(data){
                    console.log("Done searching");
                    console.log(data);
                    $('#snap').html('Verify Samples');
                    $('#snap').attr('disabled', false);
                    if(data == "no image") {
                        // showNote('warning', 'Please capture image to continue.');
                        alert('Please capture image to continue.');
                        return false;
                    }
                    if(data.status == 200) {
                        alert('No match found!');
                        return false;
                    }
                    if(data.status == 300) {
                        console.log('Match found!');
                        // showNote('success', 'Match found!');

                        var list = "";
                        $.each(data.msg, function(index, item){
                            list += "<li class='media'>";
                            list += "<div class='media-left'><img src='" + item.household_head_photo + "' alt='' class='rounded min-width-150 min-height-100'></div>";
                            list += "<div class='media-body'>";
                            list += "<h5 class='m-t-10 m-b-10'><a href='#' class='text-lg text-semibold'>" + item.fname + " " + item.lname + "</a></h5>";
                            list += "<ul class='list-inline text-muted'>";
                            list += "<li><i class='icon-folder4 position-left'></i> Beneficiary Code: " + item.code + "</li>";
                            list += "<li><i class='icon-history position-left'></i> " +item.created_at + "</li>";
                            list += "</ul>";
                            list + "";
                            list += "</div>";
                            list += "</li>";
                        });

                        // console.log(list);
                        $('#resultList').html(list);
                        var t1 = performance.now();
                        var t = t1 - t0;
                        t = parseFloat(Math.round(t * 100) / 100).toFixed(2);
                        t = t / 1000;
                        $('#stat').html("About " + data.msg.length + " results (" + t + " seconds).");
                    }
                }
            });
        } );
    });

    $('#txtSearchBtn').click(function() {
        var p0 = performance.now();
        var needle = $('#inlineFormInputGroup').val();
        console.log('needle: ' + needle);
        $.ajax({
            url: server + 'beneficiaries/search/text/' + needle,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                var p1 = performance.now();
                var P = p1 - p0;
                P = parseFloat(Math.round(P * 100) / 100).toFixed(1);
                P = P / 1000;
                $('#textStat').html('About ' + data.length + ' results (' + Math.round(P * 100) / 100 + ' seconds).');
                var list = "";
                $.each(data, function(index, item) {
                    list += "<li class='media'>";
                    list += "<div class='media-left'><img src='" + item.household_head_photo + "' alt='' class='rounded min-width-150 min-height-100'></div>";
                    list += "<div class='media-body'>";
                    list += "<h5 class='m-t-10 m-b-10'><a href='#' class='text-lg text-semibold'>" + item.fname + " " + item.lname + "</a></h5>";
                    list += "<ul class='list-inline text-muted'>";
                    list += "<li><i class='icon-folder4 position-left'></i> Beneficiary Code: " + item.code + "</li>";
                    list += "<li><i class='icon-history position-left'></i> " +item.created_at + "</li>";
                    list += "</ul>";
                    list + "";
                    list += "</div>";
                    list += "</li>";
                });
                console.log('list');
                console.log(list);
                $('#resultBlock').html(list);
            },
            error: function(error) {
                console.log('Unable to complete request.');
                console.error(error);
                alert('Unable to complete request.');
            }
        });
    });
});

function showNote(type, msg) {
    var notification = new Noty({
        type: type,
        layout: 'bottomRight',
        text: msg
    }).on('afterShow', function() {
        setTimeout(function() {
            notification.close();
        }, 1500);
    }).show();
}

function b64toBlob(b64Data, contentType, sliceSize) {
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