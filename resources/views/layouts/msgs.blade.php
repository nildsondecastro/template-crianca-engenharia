@if (session('msg_success'))
    <script>
        window.alert(`{{ session('msg_success') }}`);
    </script>
@endif

@if (session('msg_error'))
    <script>
        window.alert(`{{ session('msg_error') }}`);
    </script>
@endif
