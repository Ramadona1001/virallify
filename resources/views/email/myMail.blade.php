 <!DOCTYPE html>
    <html>
    <head>
        <title>{{$mailData['title'] }}</title>
    </head>
    <body>
    <div style="padding:10px">

        <h1>{{ $mailData['title'] }}</h1>
        <h3>{{$mailData['sub_title']}}</h3>
        <p>Email: {{ $mailData['email'] }}</p>
        <p>Password: {{ $mailData['password'] }}</p>


        <p>Thank you,</p>
        <p>Elite Home</p>
    </div>


    </body>
    </html>
