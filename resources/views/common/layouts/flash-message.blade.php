@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
$(document).ready(function() {
    toastr.options.timeOut = 15000;
    toastr.options.closeButton = true;
    toastr.options.closeMethod = 'fadeOut';
    toastr.options.showEasing = 'swing';
    toastr.options.hideEasing = 'linear';
    toastr.options.closeEasing = 'linear';
    toastr.options.newestOnTop = true;
    @if (Session::has('error'))
        toastr.error('{{ Session::get("error") }}');
    @elseif(Session::has('success'))
        toastr.success('{{ Session::get("success") }}');
    @elseif(Session::has('warning'))
        toastr.warning('{{ Session::get("warning") }}');
    @elseif(Session::has('info'))
        toastr.info('{{ Session::get("info") }}');
    @elseif(Session::has('status'))
        toastr.info('{{ Session::get("status") }}');
    @endif
});
</script>
@endpush