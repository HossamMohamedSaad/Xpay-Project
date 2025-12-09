<script src="{{ asset('client/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/swiper.js') }}"></script>
    <script src="{{ asset('client/assets/js/countto.js') }}"></script>
    <script src="{{ asset('client/assets/js/count-down.js') }}"></script>
    <script src="{{ asset('client/assets/js/simpleParallax.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/gsap.js') }}"></script>
    <script src="{{ asset('client/assets/js/SplitText.js') }}"></script>
    <script src="{{ asset('client/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/ScrollTrigger.js') }}"></script>
    <script src="{{ asset('client/assets/js/gsap-animation.js') }}"></script>
    <script src="{{ asset('client/assets/js/tsparticles.js') }}"></script>
    <script src="{{ asset('client/assets/js/tsparticles.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/main.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap.bundle.min.js')}}"></script>




    



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