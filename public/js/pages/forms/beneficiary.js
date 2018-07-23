Dropzone.autoDiscover = false;

$(function() {
    var dropZ = new Dropzone("#photo", {
        url: "/beneficiaries",
        autoProcessQueue: false,
        acceptedFiles:'image/png,image/jpeg,image/jpg',
        uploadMultiple: false,
        maxFiles: 1,
        maxFileSize: 5,
    });
    dropZ.on("sending", function(file, xhr, formData) {
        formData.append('hh', $("#household_head").val());
        formData.append('hs', $("#household_size").val());
        formData.append('t', $("#tribe").val());
        formData.append('ben', localStorage.getItem("ben"));
        formData.append('_token', $("#pk").val());
        formData.append('op', 2);
    });
    dropZ.on("success", function(file, response) {
        console.log(response);
        if(response.tribe) {
            showNote('warning', 'Please enter the tribe');
            return;
        }
        if(response.household_head) {
            showNote('warning', 'Household head name is required');
            return;
        }
        if(response.household_size) {
            showNote('warning', 'Select a house hold size');
            return;
        }
        showNote('success', 'House hold data saved.');
        $("#step2head").click();
        $("#step3head").click();
    });
    dropZ.on("error", function(file, response) {
        dropZ.removeFile(file);
        console.log(response);
    });

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
                console.log(data);
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
                localStorage.setItem("ben", data);
                showNote('success', 'Data was successfully captured.');
                $("#step2head").click();
                $("#acc1a").click();
            }
        });
    });

    $("#step2").click(function() {
        if(dropZ.files.length > 0) {
            dropZ.processQueue();
        } else {
            showNote('warning', 'Please upload household head photo');
            return;
        }
    });

    $("#step3").click(function() {
        let p = $("#phone").val();
        let e = $("#email").val();
        let a = $("#address").val();
        let s =  $("#states").val();
        let l = $("#lgas").val();
        let c = $("#city").val();

        let pl = {p:p, e:e, st:a, sid:s, l:l, c:c, '_token':$("#pk").val(), ben: localStorage.getItem("ben"), op:3};

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
                reload();
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
        let ben = localStorage.getItem("ben");

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
                    showNote('warning', 'Project or beneficiary not found. Please make sure they exist before adding.');
                    return;
                }
                showNote('success', 'Beneficiary successfully added to project');
                reload();
            },
            fail: function(error) {
                console.log(error);
                showNote('warning', 'unable to reach the server. Please check your connection and try again');
            }
        })
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