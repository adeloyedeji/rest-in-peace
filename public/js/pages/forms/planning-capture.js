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
            formDataToUpload.append("village", $("#village").val());
            formDataToUpload.append("address", $("#address").val());
            formDataToUpload.append("city", $("#city").val());
            formDataToUpload.append("household_head", $("#household_head").val());
            formDataToUpload.append("sub_household_head", $("#sub_household_head").val());
            formDataToUpload.append("month", $("#month").val());
            formDataToUpload.append("day", $("#day").val());
            formDataToUpload.append("year", $("#year").val());
            formDataToUpload.append("gender", $('input[name=gender]:checked').val());
            formDataToUpload.append("wives", $("#wives").val());
            formDataToUpload.append("child_total", $("#child_total").val());
            formDataToUpload.append("occupation", $("#occupation").val());
            formDataToUpload.append("state_of_origin", $("#state_of_origin").val());
            formDataToUpload.append("tribe", $("#tribe").val());
            formDataToUpload.append("indigene", $('input[name=indigene]:checked').val());
            formDataToUpload.append("resident_duration", $("#resident_duration").val());
            formDataToUpload.append("household_size", $("#household_size").val());
            formDataToUpload.append("property_type", $("#property_type").val());
            formDataToUpload.append("accomodation_type", $("#accomodation_type").val());
            formDataToUpload.append("ownership_type", $("#ownership_type").val());
            formDataToUpload.append("plan_approval", $('input[name=plan_approval]:checked').val());

            $.ajax({
                url: server + 'planning/store',
                type: 'POST',
                dataType: 'JSON',
                data: formDataToUpload,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    if(data.name)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.name);
                        return false;
                    }
                    if(data.gender)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.gender);
                        return false;
                    }
                    if(data.project_id)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.project_id);
                        return false;
                    }
                    if(data.code)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.code);
                        return false;
                    }
                    if(data.village)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.village);
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
                    if(data.household_head)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.household_head);
                        return false;
                    }
                    if(data.sub_household_head)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.sub_household_head);
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
                    if(data.wives)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.wives);
                        return false;
                    }
                    if(data.children)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.children);
                        return false;
                    }
                    if(data.occupation)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.occupation);
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
                    if(data.indigene)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.indigene);
                        return false;
                    }
                    if(data.duration)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.duration);
                        return false;
                    }
                    if(data.household_size)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.household_size);
                        return false;
                    }
                    if(data.property_type)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.property_type);
                        return false;
                    }
                    if(data.accomodation_type)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.accomodation_type);
                        return false;
                    }
                    if(data.ownership_type)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.ownership_type);
                        return false;
                    }
                    if(data.plan_approval)
                    {
                        $('#saveBtn').html('<b><i class="icon-checkmark3"></i></b> Save Beneficiary').attr('disabled', false);
                        showNot('warning', data.plan_approval);
                        return false;
                    }
                    if(data.status && data.status == 'ok')
                    {
                        showNot('success', 'Beneficiary successfully captured.');
                        setTimeout(function() {
                            window.location.href = server + 'planning/beneficiaries/' + data.bid + '/' + data.pid;
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

    $('#occupation').change(function() {
        let o = $(this).val();
        if(o == 'others')
        {
            $('#occupation').fadeOut("fast");
            $('#occupationText').fadeIn("slow");
            $('#choose').fadeIn("fast");
        }
        else
        {
            $('#occupation').fadeIn("slow");
            $('#occupationText').fadeOut("fast");
            $('#choose').hide();
        }
    });

    $('#choose').click(function() {
        $(this).fadeOut("fast");
        $('#occupation').fadeIn("slow");
        $('#occupationText').fadeOut("fast");
    });

    $('#accomodation_type').change(function() {
        let a = $(this).val();
        if(a == 'others')
        {
            $('#accomodation_type').fadeOut("fast");
            $('#accomodation_type_text').fadeIn("slow");
            $('#property_others').fadeIn('fast');
        }
        else
        {
            $('#accomodation_type').fadeIn("slow");
            $('#accomodation_type_text').fadeOut("fast");
            $('#property_others').fadeOut('fast');
        }
    });

    $('#property_others').click(function() {
        $(this).fadeOut("fast");
        $('#accomodation_type').fadeIn("slow");
        $('#accomodation_type_text').fadeOut("fast");
    });
});