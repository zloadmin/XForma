{{--<script type="text/javascript" src="/hyper/js/jquery.js" data-navigate-once></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{--<script type="text/javascript" src="/hyper/js/metisMenu.js" data-navigate-once></script>--}}
<script data-navigate-once>
    // $(document).ready(function() {
    //     $('.side-nav').metisMenu();
    // });
    // $(document).on('click', '.button-menu-mobile', function(e) {
    //     e.preventDefault();
    //     $('body').toggleClass('sidebar-enable');
    //
    //     // if (self.window.width() >= 768) {
    //     //   self.body.toggleClass('enlarged');
    //     // } else {
    //     //   self.body.removeClass('enlarged');
    //     // }
    // });
</script>

<livewire:modals/>
<livewire:scripts/>
@vite('resources/js/app.js')


@stack('scripts')