
<div class="footerBotto">
    <div class="container">
        <p class="footerBottomData">&copy; 2024 Developed By <a href="#" target="_blank">Bakibillah.</a></p>
    </div>
</div>

   <!-- Jquery js -->
    <script src="/assets/frontend/bootstrap.min.js"></script>
    <script src="/assets/frontend/jQuery3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/assets/frontend/script.js"></script>

    {{-- Global js --}}
    <script>
        $(document).ready(function(){

            // Prevent multiple form submissions
            $('.multiple-submit-prevent').on('submit', function(e) {
                let form = $(this);
                let submitButton = form.find('button[type="submit"]');

                if (form.data('submitted') === true) {
                    e.preventDefault();
                    return;
                }

                submitButton.prop('disabled', true);
                submitButton.text('Processing...');
                form.data('submitted', true);
            });

            //Shift + N = login page
            $(document).keydown(function(e){
                console.log(e,'Shift + N');
                if(e.shiftKey && e.key === 'N'){
                    window.open("{{route('login')}}", '_blank');
                }
            });
        });
    </script>

<script>
    $('.order-now-button-track').on('click',function(){
        fbq('track', 'OrderNow');
    });

    $('.search-form').on('submit', function() {
        fbq('track', 'Search', {
            search_string: $('#search-input').val()
        });
    });
</script>
{{-- in page js  --}}
@stack('custom-js')



@stack('g_fb_js')


