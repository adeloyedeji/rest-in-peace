<!-- Global scripts -->
<script src="{{ asset('js/app.js') }}"></script>
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
<!-- /Global scripts -->

@if(active('beneficiaries/create'))
<script src="{{ asset('js/forms/form.min.js') }}"></script>
<script src="{{ asset('js/forms/form_wizard.min.js') }}"></script>
<script src="{{ asset('js/pages/forms/form_wizard.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/pages/forms/beneficiary.js') }}"></script>
@endif
<!-- Core scripts -->
<script src="{{ asset('js/core/app/layouts.js') }}"></script>
<script src="{{ asset('js/core/app/core.js') }}"></script>
<!-- /Core scripts -->

<!-- Scripts -->
<script>
    $(function() {
        Noty.overrideDefaults({
            theme: 'bootstrap-v4',
            closeWith: ['click', 'button'],
        });
    });

    function showNot(type, msg) {
        new Noty({
            type: type,
            layout: 'bottomRight',
            text: msg
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