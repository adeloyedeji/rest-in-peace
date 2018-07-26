$(function() {
    $("#step1").click(function() {
        let p = $("#pk").val();
        let f = $("#fname").val();
        let l = $("#lname").val();
        let o = $("#oname").val();
        let oc = $("#occupation").val();
        let y = $("#year").val();
        let m = $("#month").val();
        let d = $("#day").val();
        let g = $('input[name=gender]:checked').val();
        let w = $("#wives").val();
        let c = $("#child").val();

        let pl = {'_token':p, f:f, l:l, o:o, oc:oc, y:y, m:m, d:d, g:g, w:w, c:c, op:1};

        $.ajax({
            url: '/beneficiaries',
            type: "POST",
            dataType: "JSON",
            data: pl,
            success: function(data) {
                if(data.fname) {
                    showNote('warning', 'First name is required');
                    return;
                }
                if(data.lname) {
                    showNote('warning', 'Last name is required');
                    return;
                }
                if(data.occupations_id) {
                    showNote('warning', 'Occupation is required');
                    return;
                }
                if(data.dob) {
                    showNote('warning', 'Date of birth is a required field');
                    return;
                }
                if(data.gender) {
                    showNote('warning', 'Please select a valid gender.');
                    return;
                }
                if(data.wives_total) {
                    showNote('warning', 'Total number of wives is required enter 0 for none.');
                    return;
                }
                if(data.children_total) {
                    showNote('warning', 'Total number of children is required enter 0 for none.');
                    return;
                }
                if(data) {
                    showNote('success', 'Data was successfully captured.');
                    $("#step2head").click();
                    $("#acc1a").click();
                }
            }
        });
    });

    $("#step2").click(function() {
        let hh =  $("#household_head").val();
        let hhs =  $("#household_size").val();
        let hht = $("#tribe").val();
        let _token = $("#pk").val();
        var pl = {hh:hh, hhs:hhs, hht:hht, _token:_token, op:2};
        $.ajax({
            url: '/beneficiaries',
            type: 'POST',
            dataType: 'JSON',
            data: pl,
            success: function(data) {
                console.log(data);
                if(data.tribe) {
                    showNote('warning', 'Please enter the tribe');
                    return;
                }
                if(data.household_head) {
                    showNote('warning', 'Household head name is required');
                    return;
                }
                if(data.household_size) {
                    showNote('warning', 'Select a house hold size');
                    return;
                }
                if(data == "404") {
                    showNote('warning', 'Beneficiary not found! You need to create this beneficiary to continue.');
                    return;
                }
                if(data) {
                    showNote('success', 'House hold data saved.');
                    $("#step3head").click();
                    $("#step2head").click();
                }
            },
            fail: function(error) {
                console.log(error);
                showNote('error', 'Unable to complete request. Please refresh and try again.');
            }
        });
    });

    $("#step3").click(function() {
        let p = $("#phone").val();
        let e = $("#email").val();
        let a = $("#address").val();
        let s =  $("#states").val();
        let l = $("#lgas").val();
        let c = $("#city").val();

        let pl = {p:p, e:e, st:a, sid:s, l:l, c:c, '_token':$("#pk").val(), ben: 0, op:3};

        $.ajax({
            url: '/beneficiaries',
            type: 'POST',
            dataType: 'JSON',
            data: pl,
            success: function(data) {
                console.log(data);
                if(data.email) {
                    showNote('warning', 'E-mail is required');
                    return false;
                }
                if(data.phone) {
                    showNote('warning', 'Phone is required');
                    return false;
                }
                if(data.street) {
                    showNote('warning', 'Address is required');
                    return false;
                }
                if(data.city) {
                    showNote('warning', 'City is required');
                    return false;
                }
                if(data.states_id) {
                    showNote('warning', 'State is required');
                    return false;
                }
                if(data.lgas_id) {
                    showNote('warning', 'Local government area is required');
                    return false;
                }

                showNote('success', 'Contact data successfully captured.');
                $("#step3head").click();
                $("#step5head").click();
            },
            fail: function(error) {
                console.log(error);
                showNote('warning', 'Unable to reach server. Please check your network and try again.');
            }
        })
    });

    $("#step4").click(function() {
        let p = $("#project").val();
        let t = $("#pk").val();
        let ben = 0;

        let pl = {p:p, ben:ben, '_token':t, op:4};

        $.ajax({
            url: '/beneficiaries',
            type: 'POST',
            dataType: 'JSON',
            data: pl,
            success: function(data) {
                if(data.project) {
                    showNote('warning', 'Project is required');
                    return;
                }
                if(data == "404") {
                    showNote('warning', 'Invalid Project! Please select a valid project.');
                    return;
                }
                if(data) {
                    showNote('success', 'Working directory successfully configured');
                    $("#acc1a").click();
                    $("#step4head").click();
                }
            },
            fail: function(error) {
                console.log(error);
                showNote('warning', 'unable to reach the server. Please check your connection and try again');
            }
        })
    });

    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach( '#camera' );

    $("#snap").click(function() {
        // take snapshot and get image data
        Webcam.snap( function(data_uri) {
            // display results in page
            console.log(data_uri);
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
            formDataToUpload.append("_token", $("#pk").val());
            formDataToUpload.append('op', 5);

            $.ajax({
                url:"/beneficiaries",
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
    })
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
            url: `/utilities/get-lga/${st}`,
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
                url: '/utilities/save-occupation',
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