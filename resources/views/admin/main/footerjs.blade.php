<!-- Vendor js -->
<script src="{{ asset('admin/assets/js/vendors.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('admin/assets/js/app.js') }}"></script>

<!-- Dashboard Page js -->
<script src="{{ asset('admin/assets/js/pages/dashboard.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if (session('success'))
    <script>
        let timerInterval
        Swal.fire({
            title: "{{ session('success') }}",
            timer: 4000,
            timerProgressBar: true,
            icon: 'success',
            onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                            b.textContent = Swal.getTimerLeft()
                        }
                    }
                }, 100)
            },
            onClose: () => { clearInterval(timerInterval) }
        })
    </script>
@endif
@if (session('error'))
<script>
        let timerInterval
        Swal.fire({
            title: "{{ session('error') }}",
            timer: 4000,
            timerProgressBar: true,
            icon: 'error',
            onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                            b.textContent = Swal.getTimerLeft()
                        }
                    }
                }, 100)
            },
            onClose: () => { clearInterval(timerInterval) }
        })
    </script>
@endif