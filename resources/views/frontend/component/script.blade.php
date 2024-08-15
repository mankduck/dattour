    <!-- jquery-->
    <script src="/frontend/js/jquery-3.7.0.min.js"></script>
    <script src="/frontend/js/popper.min.js"></script>
    <script src="/frontend/js/bootstrap-5.3.0.min.js"></script>
    <script src="/frontend/js/location.js"></script>

    <!-- Plugin -->
    <script src="/frontend/js/plugin.js"></script>
    <!-- Main js-->
    <script src="/frontend/js/main.js"></script>

    {{-- Custom js --}}
    <script src="/frontend/library/booking.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signBtn = document.querySelector('.sign-btn');
            const dropdownMenu = signBtn.querySelector('.dropdown-menu');

            signBtn.addEventListener('click', function(e) {
                e.preventDefault();
                console.log(2131321313);
                dropdownMenu.classList.toggle('show');
            });
        });
    </script>
