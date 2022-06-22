@push('styles')
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
    <style>
        *{
            box-sizing:border-box;
            /* outline:1px solid ;*/
        }
        body{
            background: #ffffff;
            background: linear-gradient(to bottom, #ffffff 0%,#e1e8ed 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e1e8ed',GradientType=0 );
            height: 100%;
            margin: 0;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        .wrapper-1{
            width:100%;
            height:100vh;
            display: flex;
            flex-direction: column;
        }
        .wrapper-2{
            padding :30px;
            text-align:center;
        }
        h1{
            font-family: 'Kaushan Script', cursive;
            font-size:4em;
            letter-spacing:3px;
            color:var(--theme-deafult) ;
            margin:0;
            margin-bottom:20px;
        }
        .wrapper-2 p{
            margin:0;
            font-size:1.3em;
            color:#aaa;
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing:1px;
        }
        .go-home{
            color:#fff;
            background:var(--theme-deafult);
            border:none;
            padding:10px 50px;
            margin:30px 0;
            border-radius:30px;
            text-transform:capitalize;
            box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
        }
        .footer-like{
            margin-top: auto;
            background:#D7E6FE;
            padding:6px;
            text-align:center;
        }
        .footer-like p{
            margin:0;
            padding:4px;
            color:var(--theme-deafult);
            font-family: 'Source Sans Pro', sans-serif;
            letter-spacing:1px;
        }
        .footer-like p a{
            text-decoration:none;
            color: var(--theme-deafult);
            font-weight:600;
        }

        @media (min-width:360px){
            h1{
                font-size:4.5em;
            }
            .go-home{
                margin-bottom:20px;
            }
        }

        @media (min-width:600px){
            .content{
                max-width:1000px;
                margin:0 auto;
            }
            .wrapper-1{
                height: initial;
                max-width:620px;
                margin:0 auto;
                margin-top:50px;
                box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
            }

        }
    </style>
@endpush
{{--<table style="width: 100%">--}}
{{--    <tbody>--}}
{{--    <tr>--}}
{{--        <td>--}}
{{--            <table style="background-color: #f6f7fb; width: 100%">--}}
{{--                <tbody>--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        <table style="width: 650px; margin: 0 auto; margin-bottom: 30px">--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td><img src="../assets/images/logo/small-logo.png" alt=""></td>--}}
{{--                                <td style="text-align: right; color:#999"><span>Some Description</span></td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        <table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px">--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td style="padding: 30px">--}}


{{--                                    <h1>Thank you !</h1>--}}
{{--                                    <p>Thanks for donating.  </p>--}}
{{--                                   <div class="text-center"><a href="#" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px; margin-bottom: 18px">Call To Action </a></div>--}}
{{--                                    <p>This is a really simple email template. It's sole purpose is to get the recipient to click the button with no distractions.</p>--}}
{{--                                    <p style="margin-bottom: 0">Good luck! Hope it works.</p>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        <table style="width: 650px; margin: 0 auto; margin-top: 30px">--}}
{{--                            <tbody>--}}
{{--                            <tr style="text-align: center">--}}
{{--                                <td>--}}
{{--                                   <p style="color: #999; margin-bottom: 0">Powered By Zeta Admin</p>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    </tbody>--}}
{{--</table>--}}
<div class=content>
    <div class="wrapper-1">
        <div class="wrapper-2">
            <h1>Thank you !</h1>
            <p>Thanks for donating some dollars.  </p>
            <p>you should receive a confirmation email soon  </p>
            <a class="btn btn-primary mt-4" href="{{ route('/') }}">
                Go Home
            </a>
        </div>
        <div class="footer-like">
            <p>Email not received?
                <a href="#">Click here to send again</a>
            </p>
        </div>
    </div>
</div>


