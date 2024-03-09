<footer>
    <div class="footer-box1">
        <div class="footer-quest">
            <img src="{{asset('assets/image/quest.svg')}}" />
            <h3>Questions?</h3>
            <h4>AskOurGPT</h4>
        </div>
        <div class="footer-quest">
            <img src="{{asset('assets/image/footer-signal.svg')}}" />
            <h3>Guide</h3>
            <h4>Available Counsellor</h4>
        </div>
    </div>
    <div class="read-container">
        <div class="read-link">
            <a href="{{route('about')}}">About Us</a>
            <a href="{{route('about')}}">Services</a>
            <a href="{{route('resources')}}">Resources</a>
            <a href="{{route('blog')}}">Blog</a>
        </div>
        <div class="read-social">
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a target="_blank" href="https://www.linkedin.com/showcase/ancile-academy/"><i class="fa-brands fa-linkedin-in"></i></a>
            <a target="_blank" href="https://www.instagram.com/ancileacademy/"><i class="fa-brands fa-instagram"></i></a>
        </div>
    </div>
    <div class="footer-parag">
        <p class="parag-text">Ancile Academy is an educational travel consultancy creating a diverse range of
            opportunities that allows
            students to
            travel to their dream universities from students and parents to educators and institutions, while showcasing
            the value
            and impact of experiential learning through travel.</p>
        <p class="copy"></p>

        <script>
            // Get the current year
            var currentYear = new Date().getFullYear();

            // Find the element with the class "copy" and update its content
            var copyElement = document.querySelector('.copy');
            copyElement.innerHTML = currentYear + ' © Ancile Inc. All rights reserved.';
        </script>

    </div>
</footer>
