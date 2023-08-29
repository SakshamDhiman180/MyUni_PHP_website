<!DOCTYPE html>
<html>
<head>
    <title>GiftCard Redeemed</title>
</head>
<body>
    <h1>GiftCard Successfully Redeemed</h1>
    <p>Hi {{Auth::user()->full_name}}</p>
    <p>You have successfully redeemed a gift card, click button bellow to claim it.</p> 
    <a class="btn btn-primary" href="{{$redeemResponse['url']}}">Claim your gift card!</a>
    <p>Thank you</p>
</body>
</html>