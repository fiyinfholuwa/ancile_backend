

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
        <h3 style="margin: 3%;"> Dear {{ $mailData['name'] }}</h3>
    </div>
    <div class="" style="padding-top: 100px !important;">
        </br>

        <p style="margin: 3%; color: black;">
            @if($mailData['status'] == 'welcome')
                I hope this message reaches you in good spirits. I'm writing to let you know that we've successfully received your loan application and it is currently under review. We value your interest and are working diligently to process your request. An update regarding our final decision will be shared with you shortly.

            @elseif($mailData['status'] == 'admin')

                Just a quick heads-up - we've got a new loan application request on the website.

                Please follow up at your earliest convenience.

            @else
                I hope this message finds you well. I wanted to inform you that your loan request status has changed to <span style="font-weight: bolder">{{$mailData['status']}}</span> We appreciate your patience and will update you with the final decision soon.


            @endif.</p>
        <a href="http://ancileacademy.com/contact" class="btn" style="float: right; margin: 0 2% 4% 0; background-color: #303840; color: #f6faff; text-decoration: none; font-weight: 800; padding: 8px 12px; border-radius: 8px; letter-spacing: 2px;">Contact Us</a>

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

