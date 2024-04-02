
<div  style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border-radius:20px; background-color:#EDE9E8; box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px; color:black; ">
    <div style="text-align:center">
        <img style="width:150px; height:80px;" src="https://ancileacademy.com/assets/image/AncileAcad-logo.svg"/>
    </div>
<h3> Dear {{ $mailData['name'] }}</h3>
</br>
    @if($mailData['status'] == 'welcome')
        <p>I hope this message finds you in great spirits. We are thrilled to welcome you onboard! Your journey with us starts now, and we're here to support you every step of the way. We appreciate you choosing us and look forward to a successful journey together. Welcome aboard!

        </p>
    @else
        <p style="">I hope this message finds you well. I wanted to inform you that your  application status has been changed to <span style="font-weight: bolder">{{$mailData['status']}}</span> We appreciate your patience and will update you with the final decision soon.
        </p>

    @endif

<p>Best regards,</p>
<p>Ancileacademy</p>
</div>
