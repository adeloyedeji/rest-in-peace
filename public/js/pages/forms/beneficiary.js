Dropzone.autoDiscover = false;

$(function() {
    var dropZ = new Dropzone("#photo", {
        url: "/beneficiaries/store",
        autoProcessQueue: false,
        acceptedFiles:'image/png,image/jpeg,image/jpg',
        uploadMultiple: false,
        maxFiles: 1,
        maxFileSize: 5,
    });
    dropZ.on("sending", function(file, xhr, formData) {
        formData.append('household_head', $("#household_head").val());
        formData.append('household_size', $("#household_size").val());
        formData.append('tribe', $("#tribe").val());
        formData.append('phone', $("#phone").val());
        formData.append('email', $("#email").val());
        formData.append('address', $("#address").val());
        formData.append('states', $("#states").val());
        formData.append('lgas', $("#lgas").val());
    });
    dropZ.on("success", function(file, response) {
    });
    dropZ.on("error", function(file, response) {
        dropZ.removeFile(file);
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
            url: '/beneficiaries/store',
            type: "POST",
            dataType: "JSON", 
            data: pl,
            success: function(data) {
                if(data.)
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