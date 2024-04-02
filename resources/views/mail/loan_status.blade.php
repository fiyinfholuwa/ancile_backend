
<div  style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border-radius:20px; background-color:#EDE9E8; box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px; color:black; ">
    <div style="text-align:center">
        <img style="width:150px; height:80px;" src="https://ancileacademy.com/assets/image/AncileAcad-logo.svg"/>
    </div>
    <h3> Dear {{ $mailData['name'] }}</h3>
    </br>
    @if($mailData['status'] == 'welcome')
        I hope this message reaches you in good spirits. I'm writing to let you know that we've successfully received your loan application and it is currently under review. We value your interest and are working diligently to process your request. An update regarding our final decision will be shared with you shortly.

    @elseif($mailData['status'] == 'admin')
        <p>
            Just a quick heads-up - we've got a new loan application request on the website.

            Please follow up at your earliest convenience.
        </p>
    @else
        <p style="">I hope this message finds you well. I wanted to inform you that your loan request status has changed to <span style="font-weight: bolder">{{$mailData['status']}}</span> We appreciate your patience and will update you with the final decision soon.
        </p>

    @endif

    <p>Best regards,</p>
    <p>Ancileacademy</p>
</div>
