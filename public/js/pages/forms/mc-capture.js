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

$(function() {
    Webcam.set({
        width: 300,
        height: 300,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach( '#capture' );

    $('#saveBtn').click(function() {
        $(this).html('please wait...').attr('disabled', true);
        Webcam.snap( function(data_uri) {
            // display results in page
            // document.getElementById('preview').innerHTML = '<img src="'+data_uri+'"/>';

            // Split the base64 string in data and contentType
            var block = data_uri.split(";");
            // Get the content type of the image
            var contentType = block[0].split(":")[1];// In this case "image/gif"
            // get the real base64 content of the file
            var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."

            // Convert it to a blob to upload
            var blob = b64toBlob(realData, contentType);

            // formdata
            let tkn = $('#anthony').val();

            var formDataToUpload = new FormData();
            formDataToUpload.append("file", blob);
            formDataToUpload.append("_token", tkn);
            formDataToUpload.append("project", $("#project").val());
            formDataToUpload.append("code", $("#code").val());
            formDataToUpload.append("name", $("#name").val());
            formDataToUpload.append("address", $("#address").val());
            formDataToUpload.append("city", $("#city").val());
            formDataToUpload.append("phone", $("#phone").val());
            formDataToUpload.append("month", $("#month").val());
            formDataToUpload.append("day", $("#day").val());
            formDataToUpload.append("year", $("#year").val());
            formDataToUpload.append("gender", $('input[name=gender]:checked').val());
            formDataToUpload.append("state_of_origin", $("#state_of_origin").val());
            formDataToUpload.append("tribe", $("#tribe").val());
            formDataToUpload.append("amount_collected", $("#amount_collected").val());

            $.ajax({
                url: server + 'monitoring-and-control/store',
                type: 'POST',
                dataType: 'JSON',
                data: formDataToUpload,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if(data.project)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.project);
                        return false;
                    }
                    if(data.code)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.code);
                        return false;
                    }
                    if(data.name)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.name);
                        return false;
                    }
                    if(data.address)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.address);
                        return false;
                    }
                    if(data.city)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.city);
                        return false;
                    }
                    if(data.phone)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.phone);
                        return false;
                    }
                    if(data.date_of_birth)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.date_of_birth);
                        return false;
                    }
                    if(data.gender)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.gender);
                        return false;
                    }
                    if(data.state_of_origin)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.state_of_origin);
                        return false;
                    }
                    if(data.tribe)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.tribe);
                        return false;
                    }
                    if(data.status && data.status == 'ok')
                    {
                        showNot('success', 'Beneficiary successfully captured.');
                        setTimeout(function() {
                            window.location.href = server + 'monitoring-and-control/beneficiaries/' + data.bid + '/' + data.mc_id;
                        }, 1500);
                    }
                }, 
                error: function(error) {
                    $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                    showNot('error', 'unable to complete request');
                    console.log('unable to complete request.');
                    console.log(error);
                }
            });
        });
    });
});