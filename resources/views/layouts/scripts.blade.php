<!-- Global scripts -->
<script defer src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/core/jquery/jquery.js') }}"></script>
<script src="{{ asset('js/core/jquery/jquery.ui.js') }}"></script>
<script src="{{ asset('js/core/tether.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('js/core/bootstrap/jasny_bootstrap.min.js') }}"></script>
<script src="{{ asset('js/core/navigation/nav.accordion.js') }}"></script>
<script src="{{ asset('js/core/hammer/hammerjs.js') }}"></script>
<script src="{{ asset('js/core/hammer/jquery.hammer.js') }}"></script>
<script src="{{ asset('js/core/slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/extensions/smart-resize.js') }}"></script>
<script src="{{ asset('js/extensions/blockui.min.js') }}"></script>
<script src="{{ asset('js/forms/uniform.min.js') }}"></script>
<script src="{{ asset('js/forms/switchery.js') }}"></script>
<script src="{{ asset('js/forms/select2.min.js') }}"></script>
<script src="{{ asset('js/plugins/ekko-lightbox.min.js') }}"></script>
<script src="{{asset('js/plugins/notifications/pnotify.min.js')}}"></script>
{{-- <script src="{{asset('js/pages/extensions/extension_pnotify.js')}}"></script> --}}
<!-- /Global scripts -->

<!-- Core scripts -->
<script src="{{ asset('js/core/app/layouts.js') }}"></script>
<script src="{{ asset('js/core/app/core.js') }}"></script>
<!-- /Core scripts -->

<!-- Scripts -->
<script>
    $(function() {
        if(!window.server || typeof window.server == "undefined") {
            window.server = "http://127.0.0.1/fcda/public/";
        }
        Noty.overrideDefaults({
            theme: 'bootstrap-v4',
            closeWith: ['click', 'button'],
        });
    });

    function showNot(type, msg) {
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

    @if(active('projects/*'))
    function completeProject(id, status) {
        $.ajax({
            type: 'post',
            url: '/projects/status',
            data: {id: id, status: status, _token: $("#cipher").val()},
            dataType: 'json',
            success: function(data) {
                if(data == 1) {
                    showNot('success', 'Status successfully updated!');
                } else {
                    showNot('warning', 'Unable to update status!');
                }
            },
            fail: function(error) {
                console.log(error);
                showNot('error', 'Unable to connect to server. Please check your connection and try again.');
            }
        })
    }
    @endif
</script>
<!-- Styles -->

@if(active('beneficiaries/create') || active('beneficiaries/create/*'))
<script src="{{ asset('js/forms/form.min.js') }}"></script>
{{-- <script src="{{ asset('js/pages/forms/beneficiary.js') }}"></script> --}}
@if(active('beneficiaries/create/structure'))
<script src="{{ asset('js/pages/forms/structure-beneficiary.js') }}"></script>
@elseif(active('beneficiaries/create/crops-and-economic-trees'))
<script src="{{ asset('js/pages/forms/cet-beneficiary.js') }}"></script>
@endif
<script src="{{ asset('js/webcam.min.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
@elseif(active('structures/capture/*') || active('structures/beneficiaries/*') || active('beneficiaries/properties/stucture/add/*'))
<script src="{{ asset('js/pages/forms/structure-capture.js') }}"></script>
@elseif(active('beneficiaries/finger-print-upload/*'))
<script src="{{ asset('js/pages/forms/beneficiary.js') }}"></script>
@elseif(active('beneficiaries/search'))
<script src="{{ asset('js/webcam.min.js') }}"></script>
<script src="{{ asset('js/pages/forms/search.js') }}"></script>
@elseif(active('beneficiaries/*'))
<script>
    function confirmDeleteProperty(property_id, property_code)
    {
        var notice = new PNotify({
            title: 'Confirmation Request',
            text: '<p>Are you sure you want to discard property: ' +property_code+ '?</p><p>This will also delete all associated structures / crop economic trees under this property?</p>',
            hide: false,
            type: 'warning',
            width: 380,
            addclass: 'bg-warning',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn btn-sm bg-danger-900'
                    },
                    {
                        addClass: 'btn btn-sm btn-secondary'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        });

        notice.get().on('pnotify.confirm', function() {
            window.location.href = server + "properties/destroy/" + property_id;
        });

        notice.get().on('pnotify.cancel', function() {
            showNot('success', 'No action taken.');
        });
    }
    $(function() {
        // other functions go here...
    });
</script>
@elseif(active('reports') || active('/'))
<script src="{{ asset('js/charts/highcharts.js') }}"></script>
<script src="{{ asset('js/charts/highcharts-more.js') }}"></script>
<script src="{{ asset('js/pages/dashboard_store.js') }}"></script>
<script src="{{ asset('js/pages/charts/charts_highcharts_pie.js') }}"></script>
<script src="{{ asset('js/pages/charts/charts_highcharts_bar.js') }}"></script>
@elseif(active('projects/*'))
<script src="{{ asset('js/webcam.min.js') }}"></script>
<script>
    function changeProject(id) {
        window.location.href=server + "projects/" + id;
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
    $(function() {
        baseURL = "http://fcda";
        // window.server = "http://fcda";
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
                formDataToUpload.append("_token", $("#_token").val());

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
                        alert('Unable to post image!');
                    },
                    success:function(data){
                        console.log(data);
                        if(data == "no image") {
                            alert('Please capture image to continue.');
                            return false;
                        }
                        if(data.status == 200) {
                            alert('No match found!');
                            return false;
                        }
                        if(data.status == 300) {
                            console.log('Match found!');
                            alert('Match Found!');

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

                            $('#resultList').html(list);
                            var t1 = performance.now();
                            var t = t1 - t0;
                            t = parseFloat(Math.round(t * 100) / 100).toFixed(2);
                            t = t / 1000;
                            $('#stat').html("About " + data.msg.length + " results (" + t + " seconds).");
                        }
                    }
                });
            });
        });
    });
</script>
@elseif(active('admin/*') || active('crops-trees-valuation/*') || active('structure-valuations/*'))
<script>
    function confirmDelete(userID) {
        var notice = new PNotify({
            title: 'Confirmation',
            text: '<p>Are you sure you want to delete this user?</p>',
            hide: false,
            type: 'success',
            width: 380,
            addclass: 'bg-grey-50',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn btn-sm bg-danger-900'
                    },
                    {
                        addClass: 'btn btn-sm btn-secondary'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        });

        notice.get().on('pnotify.confirm', function() {
            var data = {
                _method: 'DELETE',
                _token: $('#csrf-token').val()
            };
            $.ajax({
                url: server + 'admin/user/' + userID,
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function(data) {
                    if(data == 'ok') {
                        showNot('success', 'User account deleted.');
                        window.location.reload();
                    } else if(data == '404') {
                        showNot('warning', 'User account not found!');
                        return false;
                    }
                },
                error: function(error) {
                    console.log('Unable to delete user account');
                    console.error(error);
                    showNot('error', 'Unable to complete request. Please try again later.');
                }
            });
        });

        notice.get().on('pnotify.cancel', function() {
            // alert('Oh ok. Chicken, I see.');
        });
    }
    @if(active('crops-trees-valuation/*'))
    function loadForm() {
        var notice = new PNotify({
            text: $('#form_notice').html(),
            width: '260px',
            hide: false,
            addclass: 'bg-slate-200',
            buttons: {
                closer: false,
                sticker: false
            },
            insert_brs: false
        });

        notice.get().find('button[name=cancel]').on('click', function() {
            notice.remove();
        })

        notice.get().submit(function() {
            var code = $(this).find('input[name=create_ben_code]').val();
            var pid  = $('#create_ben_project').val();
            var token = $(this).find('input[name=forge]').val();
            var data = {code:code, project:pid, _token:token, opcode:6};
            if (!code) {
                showNot('warning', 'Please provide a beneficiary code.');
                return false;
            }
            if(!pid) {
                showNot('warning', 'Please select a project');
                return false;
            }
            $.ajax({
                url: server + 'beneficiaries',
                type: 'POST',
                dataType: 'JSON',
                data: data,
                success: function(data) {
                    if(data.code) {
                        showNot('warning', data.code);
                        return false;
                    }
                    if(data.project) {
                        showNot('warning', data.project);
                        return false;
                    }
                    if(data.bid) {
                        notice.update({
                            title: 'Success',
                            text: 'Beneficiary can be added later using code: ' + code,
                            addclass: 'bg-success',
                            icon: true,
                            width: PNotify.prototype.options.width,
                            hide: true,
                            buttons: {
                                closer: true,
                                sticker: true
                            }
                        });
                        setTimeout(function() {
                            window.location.href = server + 'properties/crops-economic-trees/index/' + data.bid;
                        }, 1500);
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
    }
    @endif
    @if(active('structure-valuations/valuations'))
    function loadForm() {
        var notice = new PNotify({
            text: $('#form_notice').html(),
            width: '260px',
            hide: false,
            addclass: 'bg-slate-200',
            buttons: {
                closer: false,
                sticker: false
            },
            insert_brs: false
        });

        notice.get().find('button[name=cancel]').on('click', function() {
            notice.remove();
        })

        notice.get().submit(function() {
            var code = $(this).find('input[name=create_ben_code]').val();
            var pid  = $('#create_ben_project').val();
            var token = $(this).find('input[name=forge]').val();
            var data = {code:code, project:pid, _token:token, opcode:6};
            if (!code) {
                showNot('warning', 'Please provide a beneficiary code.');
                return false;
            }
            if(!pid) {
                showNot('warning', 'Please select a project');
                return false;
            }
            $.ajax({
                url: server + 'beneficiaries',
                type: 'POST',
                dataType: 'JSON',
                data: data,
                success: function(data) {
                    if(data.code) {
                        showNot('warning', data.code);
                        return false;
                    }
                    if(data.project) {
                        showNot('warning', data.project);
                        return false;
                    }
                    if(data.bid) {
                        notice.update({
                            title: 'Success',
                            text: 'Beneficiary can be added later using code: ' + code,
                            addclass: 'bg-success',
                            icon: true,
                            width: PNotify.prototype.options.width,
                            hide: true,
                            buttons: {
                                closer: true,
                                sticker: true
                            }
                        });
                        setTimeout(function() {
                            window.location.href = server + 'properties/structure/index/' + data.bid;
                        }, 1500);
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
    }
    @endif
</script>
@elseif(active('crops-trees-valuation') || active('crops-trees-valuation/*') || active('structure-valuations'))
<script>
    function reloadProject(id) {
        window.location.href = server + 'crops-trees-valuation?project_id=' + id;
    }

    function downloadReport() {
        var current_project = $('#projects').val();
        window.location.href = server + 'crops-trees-general/download/' + current_project;
    }

    function downloadStructureReport() {
        var current_project = $('#projects').val();
        window.location.href = server + 'structures-general/download/' + current_project;
    }
</script>
@elseif(active('pricing'))
<script>
    function confirmDelete(cid, name, grade)
    {
        var notice = new PNotify({
            title: 'Confirmation Request',
            text: '<p>Are you sure you want to discard crop: ' +name+ ': ' + grade + '?</p><p>This cannot be reversed.</p>',
            hide: false,
            type: 'warning',
            width: 380,
            addclass: 'bg-warning',
            confirm: {
                confirm: true,
                buttons: [
                    {
                        text: 'Yes',
                        addClass: 'btn btn-sm bg-danger-900'
                    },
                    {
                        addClass: 'btn btn-sm btn-secondary'
                    }
                ]
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        });

        notice.get().on('pnotify.confirm', function() {
            var j = $('#john').val();
            var load = {'_method': 'DELETE', '_token': j};
            $.ajax({
                url: server + 'pricing/' + cid,
                type: 'POST',
                data: load,
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    if(data == 1)
                    {
                        showNot('success', 'Item successfully deleted.');
                        window.location.href = server + 'pricing/';
                    }
                    else
                    {
                        showNot('warning', 'Unable to delete item.');
                    }
                },
                error: function(error) {
                    console.log('unable to delete item!');
                    console.error(error);
                    showNot('error', 'Unable to delete item!');
                }
            });
        });

        notice.get().on('pnotify.cancel', function() {
            showNot('success', 'No action taken.');
        });
    }
</script>
@endif

@if(active('beneficiaries/create/planning'))
<script src="{{ asset('js/pages/forms/planning-capture.js') }}"></script>
@endif

@if(active('beneficiaries/create/monitoring-and-control'))
<script src="{{ asset('js/pages/forms/mc-capture.js') }}"></script>
@endif