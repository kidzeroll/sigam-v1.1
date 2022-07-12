<script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
<script src="{{ asset('backend/assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom.js') }}"></script>

<!-- iziToast -->
<script>
    @if (Session('error'))
        iziToast.error({
            message: '{{ session('error') }}',
            position: 'topRight'
        });
    @endif
</script>

<script>
    @if (Session('success'))
        iziToast.success({
            message: '{{ session('success') }}',
            position: 'topRight'
        });
    @endif
</script>
