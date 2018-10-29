$(function() {

    var marker = $('#marker').val();

    if(marker == 4) {
        Webcam.set({
            width: 300,
            height: 300,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach( '#camera' );

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

        $('#fingerBtn').click(function() {
            $.ajax({
                url: server + 'beneficiaries/launch-finger-print',
                type: 'GET',
                dataType: 'JSON',
                success: function(data) {
                    showNote('success', 'Fingerprint launch successful.');
                },
                error: function(error) {
                    showNote('warning', 'Unable to launch finger print application!');
                    console.log(error);
                    return false;
                }
            });
        });

        $('#basic-next').click(function() {
            var o = 6;
            var b = $('#bid').val();
            var t = $('#_token').val();
            $.ajax({
                url: server + 'beneficiaries/store',
                type: 'POST',
                data: {'o': o, 'b':b, '_token':t},
                dataType: 'JSON',
                success: function(data) {
                    showNote('success', 'Fingerprint launch successful.');
                },
                error: function(error) {
                    showNote('warning', 'Unable to launch finger print application!');
                    console.log(error);
                    return false;
                }
            });
        });
    }

    $('#verifyBtn').click(function() {
        $(this).html("Loading please wait...");
        $(this).attr('disabled', true);
        var id = $('#bid').val();
        $.ajax({
            url: server + 'beneficiaries/verify-finger-print/' + id,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                console.log("Finger print verification:");
                console.log(data);
                if(data && data > 0) {
                    showNote('success', 'Finger print verification successful.');
                    window.location.href = server + "beneficiaries/" + id;
                } else {
                    showNote('warning', 'Finger print samples have not been captured yet!');
                    $('#verifyBtn').html("Verify samples");
                    $('#verifyBtn').attr('disabled', false);
                    return false;
                }
            },
            error: function(error) {
                $('#verifyBtn').html("Verify samples");
                showNote('warning', 'Unable to complete request. Please try again.');
                console.error(error);
                return false;
            }
        });
    });
    $('#saveBtn').click(function() {
        $(this).html("Loading please wait...");
        $(this).attr('disabled', true);
        var id = $('#bid').val();
        $.ajax({
            url: server + 'beneficiaries/verify-finger-print/' + id,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                if(data && data > 0) {
                    showNote('success', 'Finger print verification successful.');
                    window.location.href = server + "beneficiaries/" + id;
                } else {
                    $('#decideModal').modal('show');
                    $('#saveBtn').attr('disabled', false);
                    $('#saveBtn').html("Save & Continue");
                }
            },
            error: function(error) {
                $('#saveBtn').html("Save & Continue");
                $('#saveBtn').attr('disabled', false);
                showNote('warning', 'Unable to complete request. Please try again.');
                console.error(error);
                return false;
            }
        });
    });
    $('#continueBtn').click(function() {
        var id = $('#bid').val();
        window.location.href = server + "beneficiaries/" + id;
    });
})

function reload() {
    setTimeout(function() {
        window.location.reload();
    }, 1000);
}
function changeState() {
    let st = $("#states").val();
    if(st && st.length > 0 && st != "") {
        $.ajax({
            url: server + 'utilities/get-lga/' + st,
            type: 'GET',
            data: {'st': st},
            dataType: 'JSON',
            success: function(data) {
                var opts = '';
                console.log(data);
                $.each(data, function(index, item) {
                    opts += "<option value='"+item.id+"'>"+item.lga+"</option>";
                });
                $("#lgas").html(opts);
            },
            fail: function(error) {
                console.log(error);
                showNote('warning', 'Unable to communicate with the server. Kindly check your network and try again.');
            }
        });
    }
}
function changeOccupation() {
    let occupation = $("#occupation").val();
    console.log(`Occupation = ${occupation}`);

    if(occupation == "50" || occupation == "0") {
        let occ = prompt("Enter new occupation here...");
        if(occ && occ.length > 0 && occ != "") {
            $.ajax({
                url: server + '/utilities/save-occupation',
                type: 'POST',
                data: {occupation: occ, _token: $("#pk").val()},
                dataType: 'JSON',
                success: function(data) {
                    if(data == "success") {
                        showNote('success', 'Occupation added. Please wait...');
                        reload();
                    } else {
                        showNote('warning', 'Unable to save occupation. Please try again');
                    }
                },
                fail: function(error) {
                    console.log(error);
                    showNote('warning', 'Unable to communicate with the server. Kindly check your network and try again.');
                }
            });
        }
    }
}
function showNote(type, msg) {
    new Noty({
        type: type,
        layout: 'bottomRight',
        text: msg
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