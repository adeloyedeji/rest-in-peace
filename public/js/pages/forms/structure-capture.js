$(function() {
    let key = 'structure' + $('#ben_id').val();
    $('#saveValBtn').click(function(e) {
        let load = {
            '_token': $('#anthony').val(),
            'ben': $('#ben_id').val(),
            'property': $('#property_id').val(),
            'current_interest': $('#current_interest').val(),
            'interest_address': $('#interest_address').val(),
            'interest': $('#interest').val(),
            'month': $('#month').val(),
            'day': $('#day').val(),
            'year': $('#year').val(),
            'title': $('#title').val(),
            'size_of_plots': $('#size_of_plots').val(),
            'building_plan': $('#building_plan').val(),
            'type_of_development': $('#type_of_development').val(),
            'roof': $('#roof').val(),
            'ceiling': $('#ceiling').val(),
            'wall': $('#wall').val(),
            'window': $('#window').val(),
            'door': $('#door').val(),
            'floor': $('#floor').val(),
            'fence': $('#fence').val(),
            'state_of_repairs': $('#state_of_repairs').val(),
            'accomodation': $('#accomodation').val()
        };

        $.ajax({
            url: server + 'structures/store',
            type: 'POST',
            dataType: 'JSON',
            data: load,
            success: function(data) {
                if(data.status == 'ok')
                {
                    showNot('success', 'Property successfully captured.');
                    $('#saveSubBtn').fadeIn("slow");
                    localStorage.setItem(key, data.id)
                }
                else if(data == 'b404')
                {
                    showNot('warning', 'Unknown beneficiary. Please capture a beneficiary to continue.');
                    return false;
                }
                else if(data == 'pp404')
                {
                    showNot('warning', 'Beneficiary property was not captured. Please capture a property for this beneficiary to continue.');
                    return false;
                }
                else
                {
                    showNot('warning', 'Unable to capture property');
                    return false;
                }
            }, 
            error: function(error) {
                showNot('error', 'Unable to complete request');
                console.log('unable to save property');
                console.error(error);
                if(error.status == 419)
                {
                    showNot('error', 'Please reload page to continue.');
                    return false;
                }
            }
        });
    });

    $('#captureSubBtn').click(function() {
        let pid = parseInt(localStorage.getItem(key));
        if(!pid)
        {
            showNot('warning', 'You need to add at least one construction details to continue!');
            return false;
        }
        let load = {
            '_token'    :   $('#anthony').val(),
            'pid'       :   pid,
            'roof'      :   $('#construction_roof').val(),
            'ceiling'   :   $('#construction_ceiling').val(),
            'wall'      :   $('#construction_wall').val(),
            'window'    :   $('#construction_window').val(),
            'door'      :   $('#construction_door').val(),
            'floor'     :   $('#construction_floor').val(),
        };

        $.ajax({
            url: server + 'structures/store-sub',
            type: 'POST',
            dataType: 'JSON',
            data: load,
            success: function(data) {
                if(data == "ok")
                {
                    showNot('success', 'Data successfully captured.');
                    $('#construction_roof').val('');
                    $('#construction_ceiling').val('');
                    $('#construction_wall').val('');
                    $('#construction_window').val('');
                    $('#construction_door').val('');
                    $('#construction_floor').val('');
                }
                else if(data == 404) 
                {
                    showNot('warning', 'Unable to capture sub property. Please add a property to continue.');
                    return false;
                }
                else
                {
                    showNot('warning', 'Something went wrong while trying to save your data.');
                    return false;
                }
            }, 
            error: function(error) {
                showNot('error', 'Unable to save sub property!');
                console.log('unable to save sub property');
                console.log(error);
                if(error.status == 419)
                {
                    showNot('error', 'Please reload page to continue.');
                    return false;
                }
            }
        });
    });

    $('#othersBtn').click(function() {
        let pid = parseInt(localStorage.getItem(key));
        if(!pid)
        {
            showNot('warning', 'You need to add at least one construction details to continue!');
            return false;
        }

        let load = {
            'pid'               : pid,
            '_token'            : $('#anthony').val(),
            'external_works'    : $('#external_works').val(),
            'services'          : $('#services').val(),
            'electricity'       : $('#electricity').val(),
            'water'             : $('#water').val(),
            'valuation_data'    : $('#valuation_data').val(),
            'valuation'         : $('#valuation').val(),
            'compensation'      : $('#compensation').val(),
        };

        $.ajax({
            url: server + 'structures/finalize',
            type: 'POST',
            dataType: 'JSON',
            data: load,
            success: function(data) {
                if(data == 404)
                {
                    showNot('warning', 'Unable to capture sub property. Please add a property to continue.');
                    return false;
                }
                else if(data.valuation)
                {
                    showNot('warning', data.valuation);
                    return false;
                }
                else if(data.compensation)
                {
                    showNot('warning', data.compensation);
                    return false;
                }
                else if(data == "ok")
                {
                    showNot('success', 'Data capture complete.');
                    setTimeout(function() {
                        let bid = $('#ben_id').val();
                        let property_id = $('#property_id').val();
                        let sid = parseInt(localStorage.getItem(key));
                        window.location.href = server + 'structures/beneficiaries/' + bid + '/' + property_id + '/' + sid;
                    }, 1500);
                }
                else
                {
                    showNot('warning', data);
                    return false;
                }
            }, 
            error: function(error) {
                showNot('warning', 'unable to finalize property!');
                console.log('unable to finalize property');
                console.log(error);
                if(error.status == 419)
                {
                    showNot('error', 'Please reload page to continue.');
                    return false;
                }
            }
        });
    });

    $('#saveAnotherBtn').click(function() {
        var load = {
            '_token'                : $('#anthony').val(),
            'ben'                   : $('#ben_id').val(),
            'project'               : $('#project_id').val(),
            'property_code'         : $('#property_code').val(),
            'village'               : $('#village').val(),
            'address'               : $('#address').val(),
            'location'              : $('#location').val(),
            'current_interest'      : $('#current_interest').val(),
            'interest_address'      : $('#interest_address').val(),
            'interest'              : $('#interest').val(),
            'month'                 : $('#month').val(),
            'day'                   : $('#day').val(),
            'year'                  : $('#year').val(),
            'title'                 : $('#title').val(),
            'size_of_plots'         : $('#size_of_plots').val(),
            'building_plan'         : $('#building_plan').val(),
            'type_of_development'   : $('#type_of_development').val(),
            'roof'                  : $('#roof').val(),
            'ceiling'               : $('#ceiling').val(),
            'wall'                  : $('#wall').val(),
            'window'                : $('#window').val(),
            'door'                  : $('#door').val(),
            'floor'                 : $('#floor').val(),
            'fence'                 : $('#fence').val(),
            'state_of_repairs'      : $('#state_of_repairs').val(),
            'accomodation'          : $('#accomodation').val(),
        };

        $.ajax({
            url: server + 'structures/store-another-property',
            type: 'POST',
            dataType: 'JSON',
            data: load,
            success: function(data) {
                console.log(data);
                if(data.f_c_d_a_structure_beneficiary_code)
                {
                    showNot('warning', data.f_c_d_a_structure_beneficiary_code);
                    return false;
                }
                if(data.project_id)
                {
                    showNot('warning', data.project_id);
                    return false;
                }
                if(data.date_of_inspection)
                {
                    showNot('warning', data.date_of_inspection);
                    return false;
                }
                if(data.title)
                {
                    showNot('warning', data.title);
                    return false;
                }
                if(data.f_c_d_a_beneficiary_id)
                {
                    showNot('warning', data.f_c_d_a_beneficiary_id);
                    return false;
                }
                if(data.code)
                {
                    showNot('warning', data.code);
                    return false;
                }
                if(data.village)
                {
                    showNot('warning', data.village);
                    return false;
                }
                if(data.address)
                {
                    showNot('warning', data.address);
                    return false;
                }
                if(data.location)
                {
                    showNot('warning', data.location);
                    return false;
                }
                if(data.status && data.status == 'ok')
                {
                    showNot('success', 'Property successfully captured.');
                }
            }, 
            error: function(error) {
                showNot('error', 'Unable to complete the request. Please refresh page and try again.');
                console.log('Unable to complete request.');
                console.log(error);
            }
        });
    });

    $('#preMoreBtn').click(function() {
        let b = $('#ben_id').val();
        let p = $('#project').val();
        let ci = $('#current_interest').val();
        let intr = $('#interest').val();
        let intr_addr = $('#interest_address').val();
        let tit = document.getElementById('title').value;
        let load = {
            '_token': $('#anthony').val(),
            'property_code': $('#property_code').val(),
            'project': p,
            'current_interest': ci,
            'interest_address': intr_addr,
            'interest': intr,
            'month': $('#month').val(),
            'day': $('#day').val(),
            'year': $('#year').val(),
            'title': tit,
        };
        console.log(load);
        
        $.ajax({
            url: server + 'structures/pre-add-more',
            type: 'POST',
            dataType: 'JSON',
            data: load,
            success: function(data) {
                if(data.f_c_d_a_structure_beneficiary_code)
                {
                    showNot('warning', data.f_c_d_a_structure_beneficiary_code);
                    return false;
                }
                if(data.project_id)
                {
                    showNot('warning', data.project_id);
                    return false;
                }
                if(data.date_of_inspection)
                {
                    showNot('warning', data.date_of_inspection);
                    return false;
                }
                if(data.title)
                {
                    showNot('warning', data.title);
                    return false;
                }
                if(data.status && data.status == 'ok')
                {
                    let i = data.id;
                    window.location.href = server + 'beneficiaries/properties/stucture/add/' + b + '/' + p + '/' + i;
                }
            },
            error: function(error) {
                console.log('Unable to create beneficiary');
                console.error(error);
                showNot('error', 'Unable to create beneficiary. Please try again.');
            }
        });
        return false;
    });
});


function addMoreProperty()
{
    var noticeMore = new PNotify({
        text: $('#property_more').html(),
        width: '350px',
        hide: false,
        addclass: 'bg-slate-200',
        buttons: {
            closer: false,
            sticker: false
        },
        insert_brs: false
    });

    noticeMore.get().find('button[name=cancel]').on('click', function() {
        noticeMore.remove();
    });

    // noticeMore.get().find('button[name=submit]').on('click', function() {
        
    // });
}
