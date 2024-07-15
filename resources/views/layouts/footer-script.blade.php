        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('public/panel/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('public/panel/libs/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('public/panel/libs/metismenu/metismenu.min.js')}}"></script>
        <script src="{{ URL::asset('public/panel/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ URL::asset('public/panel/libs/node-waves/node-waves.min.js')}}"></script>

        @yield('script')

        <!-- App js -->
        <script src="{{ URL::asset('public/panel/js/app.min.js')}}"></script>
        <script>
            function replaceNewLines() {
                var textarea = document.getElementById('mytextarea');
                var content = textarea.value;
                content = content.replace(/\n/g, '<br>');
                textarea.value = content;
            }
        </script>
        @yield('script-bottom')
