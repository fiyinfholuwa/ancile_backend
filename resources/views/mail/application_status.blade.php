


<body style="font-family: 'Raleway', sans-serif; background-color: #e3eaea; font-size: 14px; max-width: 800px; margin: 0 auto; padding: 3%;">
<div id="wrapper" style="background-color: #f0f6fb;">
    <header style="width: 98%;">
        <div id="logo" style="max-width: 120px; margin: 3% 0 3% 3%; float: left;">
            <img src="https://ancileacademy.com/ancileacad.png" alt="" style="max-width: 100%;" />
        </div>
        <div>
            <ul id="social" style="float: right; margin: 3% 2% 4% 3%; list-style-type: none; display: inline;">
                <li style="display: inline-block; margin-right: 10px;">
                    <a href="https://www.instagram.com/ancileacademy/" target="_blank"
                    ><img
                            src="https://mdbgo.io/dawidadach/responsiveemail/img/in-color.png"
                            alt=""
                            style="max-width: 35px;"
                        /></a>
                </li>
                <li style="display: inline-block; margin-right: 10px;">
                    <a href="https://twitter.com/ancileacademy" target="_blank"
                    ><img
                            src="https://mdbgo.io/dawidadach/responsiveemail/img/tw-color.png"
                            alt=""
                            style="max-width: 35px;"
                        /></a>
                </li>
                <li style="display: inline-block;">
                    <a href="https://www.youtube.com/@AncileAcademy" target="_blank"
                    ><img
                            src="https://mdbgo.io/dawidadach/responsiveemail/img/yt-color.png"
                            alt=""
                            style="max-width: 35px;"
                        /></a>
                </li>
            </ul>
        </div>
    </header>
    <div id="banner">
        <!-- <h1 style="margin: 3%; margin-top: 100px !important;">Learn how to create emails in HTML!</h1> -->
    </div>
    <div class="" style="padding-top: 100px !important;">
        </br>
        @if($mailData['status'] == 'welcome')
            <p style="margin: 3%; color: black;">I hope this message finds you in great spirits. We are thrilled to welcome you onboard! Your journey with us starts now, and we're here to support you every step of the way. We appreciate you choosing us and look forward to a successful journey together. Welcome aboard!

            </p>
        @elseif($mailData['status'] == 'admin')
            <p style="margin: 3%; color: black">ust a quick heads-up - we've got a new user application request on the website.

                Please follow up at your earliest convenience.</p>J
        @else
            <p style="margin: 3%; color: black;">I hope this message finds you well. I wanted to inform you that your  application status has been changed to <span style="font-weight: bolder">{{$mailData['status']}}</span> We appreciate your patience and will update you with the final decision soon.
            </p>

        @endif

        @if($mailData['status'] == 'admin')
            <a href="http://admin.ancileacademy.com" class="btn" style="float: right; margin: 0 2% 4% 0; background-color: #303840; color: #f6faff; text-decoration: none; font-weight: 800; padding: 8px 12px; border-radius: 8px; letter-spacing: 2px;">Login To Check</a>

        @else
            <a href="http://ancileacademy.com/contact" class="btn" style="float: right; margin: 0 2% 4% 0; background-color: #303840; color: #f6faff; text-decoration: none; font-weight: 800; padding: 8px 12px; border-radius: 8px; letter-spacing: 2px;">Contact Us</a>

        @endif

        <hr style="height: 1px; background-color: #303840; clear: both; width: 96%; margin: auto;" />

        <footer style="margin: 0; padding: 0;">
            <p id="contact" style="text-align: center; padding-bottom: 3%; line-height: 16px; font-size: 12px; color: #303840;">
                Best regards, <br />
                Ancileacademy <br />
            </p>
        </footer>
    </div>
</div>
</body>
</html>
